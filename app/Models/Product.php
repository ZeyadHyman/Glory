<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'category', 'description', 'price', 'discount', 'frame_sizes', 'frame_colors', 'images',
    ];

    protected $casts = [
        'frame_sizes' => 'array',
        'frame_colors' => 'array',
        'images' => 'array', 
    ];

}
