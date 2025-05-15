<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'table',
        'memo',
        'product_id',
        'quantity',
        'price'
    ];

    /**
     * 商品とのリレーション
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'product_id'); // 外部キーが product_id のままなら
    }
}
