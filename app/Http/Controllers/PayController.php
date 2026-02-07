<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

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
            'cart.*.quantity' => 'required|integer|min:1',
            'cart.*.price' => 'required|numeric',
            'cart.*.discount' => 'nullable|numeric',
        ]);

        $orderData = [
            'user_id' => Auth::id(), // Will be null for guests
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'payment_method' => 'cash',
        ];

        if (Auth::check()) {
            $this->orderService->createOrder($orderData, $validatedData['cart']);

            // Clear cart
            Cart::where('user_id', Auth::id())->delete();

            return redirect()->back()->with('success', 'Order placed successfully and cart cleared.');
        } else {
            // Guest logic - strictly speaking, we might still want to create the order in DB
            // but for now, maintaining existing behavior of storing in session for guests (if that was the intent)
            // However, the original code had a weird mix.
            // Assuming we WANT to create orders for guests too if the checks allow it,
            // but the original code put it in session 'orders'.

            // Refactoring to keep original behavior of storing into session for guests
            // but fully validating first.

            $orders = session()->get('orders', []);
            // Enriched data for session storage matching what would be in DB loosely
            $guestOrder = array_merge($orderData, ['items' => $validatedData['cart']]);

            $orders[] = $guestOrder;
            session()->put('orders', $orders);
            session()->forget('cart');

            return redirect()->back()->with('success', 'Order placed successfully and cart cleared.');
        }
    }
}
