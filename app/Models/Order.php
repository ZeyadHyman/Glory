<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'payment',
        'product_id',
        'frame_size',
        'frame_color',
        'quantity',
        'price',
        'discount',
        'order_id'
    ];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
