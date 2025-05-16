<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category',
        'description',          // 説明文
        'image',         // 画像URL
        'sold_out_until' // 売り切れ期限
    ];

    protected $casts = [
        'sold_out_until' => 'datetime',
    ];
}

