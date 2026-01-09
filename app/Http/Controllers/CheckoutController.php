<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show(\Illuminate\Http\Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        
        if (!$cart || $cart->items()->count() === 0) {
            return redirect()->route('cart.index')->with('message', 'Keranjang Anda kosong');
        }

        // Require explicit selected items from cart page. If none provided, block checkout.
        if (!$request->has('items')) {
            return redirect()->route('cart.index')->with('message', 'Pilih minimal 1 produk untuk checkout');
        }

        $selected = $request->query('items', []);
        if (!is_array($selected) || count($selected) === 0) {
            return redirect()->route('cart.index')->with('message', 'Pilih minimal 1 produk untuk checkout');
        }

        $items = $cart->items()->with('product')->whereIn('id', $selected)->get();
        if ($items->count() === 0) {
            return redirect()->route('cart.index')->with('message', 'Produk terpilih tidak ditemukan di keranjang Anda');
        }

        // Calculate totals for the items being checked out
        $subtotal = $items->sum(fn($item) => $item->subtotal);
        $tax = $subtotal * 0.1; // 10% tax
        // Shipping only applies when subtotal > 0 and subtotal < threshold
        if ($subtotal <= 0) {
            $shipping = 0;
            $total = 0;
        } else {
            $shipping = $subtotal >= 100000 ? 0 : 15000;
            $total = $subtotal + $tax + $shipping;
        }

        $totals = [
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $total,
        ];

        return view('checkout', compact('items', 'totals', 'cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'phone' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*' => 'required|integer|exists:cart_items,id',
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        // Ensure items belong to this cart
        $selectedIds = $request->input('items', []);
        $items = $cart->items()->with('product')->whereIn('id', $selectedIds)->get();

        $subtotal = $items->sum(fn($item) => $item->subtotal);
        $tax = $subtotal * 0.1;
        $shipping = 15000;
        $total = $subtotal + $tax + $shipping;

        // Prepare item snapshots for payment payload
        $itemSnapshots = $items->map(function ($item) {
            return [
                'cart_item_id' => $item->id,
                'product_id' => $item->product_id,
                'name' => $item->product->name,
                'price' => (int) $item->price,
                'quantity' => $item->quantity,
                'subtotal' => (int) $item->subtotal,
            ];
        })->toArray();

        // Store checkout data in session (used by payment step)
        session([
            'checkout_data' => [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'phone' => $request->phone,
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'total' => $total,
                'items' => $itemSnapshots,
            ],
        ]);

        return redirect()->route('payment.midtrans');
    }
}
