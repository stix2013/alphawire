<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'price',
        'image_url',
        'screen_size',
        'ram',
        'storage',
        'color',
        'operating_system',
    ];

    protected $casts = [
        'price' => 'float',
        'screen_size' => 'float',
        'ram' => 'integer',
        'storage' => 'integer',
    ];
}
