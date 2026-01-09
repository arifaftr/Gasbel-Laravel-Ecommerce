<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Show cart contents
    public function index()
    {
        $cart = $this->cartService->getCart(false);
        $items = $cart ? $cart->items()->with('product')->get() : collect([]);
        $totals = $cart ? $this->cartService->cartTotals($cart) : ['subtotal' => 0, 'tax' => 0, 'shipping' => 0, 'total' => 0];
        return view('cart', compact('items', 'totals'));
    }

    // Add to cart (POST)
    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $qty = $data['quantity'] ?? 1;
        $product = Product::findOrFail($data['product_id']);
        $item = $this->cartService->addProduct($product, $qty);

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    // Update quantity (POST)
    public function update(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|integer|exists:cart_items,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $this->cartService->updateQuantity($data['item_id'], (int)$data['quantity']);
        return redirect()->back()->with('success', 'Jumlah keranjang diperbarui');
    }

    // Remove item (POST)
    public function remove(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|integer|exists:cart_items,id',
        ]);
        $this->cartService->removeItem($data['item_id']);
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang');
    }
}
