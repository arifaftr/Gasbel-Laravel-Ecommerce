<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function midtrans()
    {
        $checkout_data = session('checkout_data');

        if (!$checkout_data || empty($checkout_data['items'])) {
            return redirect()->route('cart.index')->with('message', 'Tidak ada item untuk checkout');
        }

        $user = Auth::user();
        $order_id = 'ORDER-' . time() . '-' . ($user?->id ?? 'guest');

        // Midtrans configuration
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $transaction_details = [
            'order_id' => $order_id,
            'gross_amount' => (int) $checkout_data['total'],
        ];

        $customer_details = [
            'first_name' => $checkout_data['name'],
            'email' => $checkout_data['email'],
            'phone' => $checkout_data['phone'],
            'billing_address' => [
                'first_name' => $checkout_data['name'],
                'email' => $checkout_data['email'],
                'phone' => $checkout_data['phone'],
                'address' => $checkout_data['address'],
                'city' => $checkout_data['city'],
                'postal_code' => $checkout_data['postcode'],
            ],
            'shipping_address' => [
                'first_name' => $checkout_data['name'],
                'email' => $checkout_data['email'],
                'phone' => $checkout_data['phone'],
                'address' => $checkout_data['address'],
                'city' => $checkout_data['city'],
                'postal_code' => $checkout_data['postcode'],
            ],
        ];

        $item_details = [];
        // Use items from checkout_data (only selected items)
        foreach ($checkout_data['items'] as $it) {
            $item_details[] = [
                'id' => $it['product_id'],
                'price' => (int) $it['price'],
                'quantity' => $it['quantity'],
                'name' => $it['name'],
            ];
        }

        // Add tax and shipping as separate line items
        $item_details[] = [
            'id' => 'TAX',
            'price' => (int) $checkout_data['tax'],
            'quantity' => 1,
            'name' => 'Tax (10%)',
        ];

        $item_details[] = [
            'id' => 'SHIPPING',
            'price' => (int) $checkout_data['shipping'],
            'quantity' => 1,
            'name' => 'Shipping',
        ];

        $payload = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($payload);

        return view('payment.midtrans', compact('snapToken', 'order_id', 'checkout_data'));
    }

    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        if ($request->transaction_status === 'capture' || $request->transaction_status === 'settlement') {
            // Payment successful - remove only purchased items from cart
            $user = Auth::user();
            $cart = null;
            if ($user) {
                $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            } else {
                $cart = \App\Models\Cart::where('session_id', session()->getId())->first();
            }

            $checkout_data = session('checkout_data');
            if ($cart && !empty($checkout_data['items'])) {
                $cartItemIds = array_column($checkout_data['items'], 'cart_item_id');
                $cart->items()->whereIn('id', $cartItemIds)->delete();
            }

            // Optionally clear checkout_data
            session()->forget('checkout_data');

            return response()->json(['message' => 'Payment recorded']);
        }

        return response()->json(['message' => 'Payment pending']);
    }
}
