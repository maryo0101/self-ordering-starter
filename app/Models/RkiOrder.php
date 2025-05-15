<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RkiOrder extends Model
{
    use HasFactory;

    // 履歴用テーブルの名前を指定
    protected $table = 'rki_orders';  // rki_orders テーブルを使用

    // ホワイトリストに追加するカラム
    protected $fillable = [
        'order_id', 
        'table', 
        'memo', 
        'product_id', 
        'price', 
        'quantity', 
        'rki_upymdhms'
    ];
}

