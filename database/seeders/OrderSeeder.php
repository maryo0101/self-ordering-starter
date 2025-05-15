<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // 商品IDを取得
        $product = Product::first();

        Order::create([
            'order_id' => 'ORD001',
            'table' => 'テーブル1',
            'memo' => '特に無し',
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => $product->price * 2
        ]);
    }
}

