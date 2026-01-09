<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected function getSessionId()
    {
        return session()->getId();
    }

    /**
     * Get or create cart for current user or session
     */
    public function getCart(bool $create = true): ?Cart
    {
        if (Auth::check()) {
            $cart = Cart::firstOrCreate(
                ['user_id' => Auth::id()],
                ['session_id' => $this->getSessionId()]
            );
            return $cart;
        }

        // guest: use session id
        $sessionId = $this->getSessionId();
        $cart = Cart::where('session_id', $sessionId)->first();
        if (!$cart && $create) {
            $cart = Cart::create(['session_id' => $sessionId]);
        }
        return $cart;
    }

    /**
     * Add product to cart. If exists, increment quantity.
     */
    public function addProduct(Product|int $product, int $quantity = 1): CartItem
    {
        $productId = $product instanceof Product ? $product->id : $product;
        $productModel = $product instanceof Product ? $product : Product::findOrFail($productId);

        if ($quantity < 1) {
            throw new \InvalidArgumentException('Quantity must be at least 1');
        }

        return DB::transaction(function () use ($productModel, $quantity) {
            $cart = $this->getCart(true);

            // find existing item
            $item = $cart->items()->where('product_id', $productModel->id)->first();
            if ($item) {
                $item->quantity += $quantity;
                $item->save();
                return $item;
            }

            // create new item, store current product price
            $item = $cart->items()->create([
                'product_id' => $productModel->id,
                'quantity' => $quantity,
                'price' => $productModel->price,
            ]);

            return $item;
        });
    }

    /**
     * Update quantity for an item; if quantity <= 0 remove it.
     */
    public function updateQuantity(int $itemId, int $quantity): ?CartItem
    {
        if (!is_numeric($quantity) || $quantity < 0) {
            throw new \InvalidArgumentException('Quantity must be a positive integer or zero.');
        }

        return DB::transaction(function () use ($itemId, $quantity) {
            $item = CartItem::findOrFail($itemId);
            if ($quantity === 0) {
                $item->delete();
                return null;
            }
            $item->quantity = $quantity;
            $item->save();
            return $item;
        });
    }

    public function removeItem(int $itemId): void
    {
        CartItem::where('id', $itemId)->delete();
    }

    public function cartTotals(Cart $cart): array
    {
        $subtotal = $cart->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        // placeholder for taxes, shipping, discounts
        $tax = 0;
        $shipping = 0;
        $total = $subtotal + $tax + $shipping;

        return compact('subtotal', 'tax', 'shipping', 'total');
    }
}
