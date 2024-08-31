<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
}
