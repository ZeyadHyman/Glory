<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'cart' => 'required|array',
            'cart.*.product_id' => 'required|integer',
            'cart.*.frame_size' => 'nullable|string',
            'cart.*.frame_color' => 'nullable|string',
            'cart.*.quantity' => 'required|integer',
            'cart.*.price' => 'required|numeric',
            'cart.*.discount' => 'nullable|numeric',
        ]);

        $validatedData['payment'] = 'cash';

        $orderData = [
            'user_id' => Auth::id(),
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'payment_method' => $validatedData['payment'],
        ];

        if (Auth::check()) {
            $order = Order::create($orderData);

            foreach ($validatedData['cart'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'frame_size' => $item['frame_size'],
                    'frame_color' => $item['frame_color'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'discount' => $item['discount'],
                ]);
            }

            // Clear cart
            Cart::where('user_id', Auth::id())->delete();

            return redirect()->back()->with('success', 'Order placed successfully and cart cleared.');
        } else {
            $orders = session()->get('orders', []);
            $orders[] = $validatedData;
            session()->put('orders', $orders);
            session()->forget('cart');

            return redirect()->back()->with('success', 'Order placed successfully and cart cleared.');
        }
    }
}
