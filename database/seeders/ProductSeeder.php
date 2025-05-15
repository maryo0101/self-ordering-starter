<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => '料理名1',
            'price' => 500,
            'category' => 'カテゴリーA'
        ]);

        Product::create([
            'name' => '料理名2',
            'price' => 800,
            'category' => 'カテゴリーB'
        ]);
    }
}

