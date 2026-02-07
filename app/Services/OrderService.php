<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * Create a new order and its associated items.
     *
     * @param array $data
     * @param array $cartItems
     * @return Order
     */
    public function createOrder(array $data, array $cartItems): Order
    {
        return DB::transaction(function () use ($data, $cartItems) {
            $order = Order::create($data);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'frame_size' => $item['frame_size'] ?? null,
                    'frame_color' => $item['frame_color'] ?? null,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'discount' => $item['discount'] ?? 0,
                ]);
            }

            return $order;
        });
    }
}
