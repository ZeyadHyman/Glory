<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'discount',
        'frame_sizes',
        'frame_colors',
        'images',
    ];

    protected $casts = [
        'frame_sizes' => 'array',
        'frame_colors' => 'array',
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeSortBy($query, $sort)
    {
        return match ($sort) {
            'price-asc' => $query->orderBy('price', 'asc'),
            'price-desc' => $query->orderBy('price', 'desc'),
            'name-asc' => $query->orderBy('name', 'asc'),
            'name-desc' => $query->orderBy('name', 'desc'),
            default => $query->orderBy('created_at', 'desc'),
        };
    }
}
