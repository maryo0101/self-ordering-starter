<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // resources/database/migrations/xxxx_xx_xx_create_notifications_table.php
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();              // レコードID
            $table->string('order_id'); // 注文ID
            $table->string('table');    // テーブル番号
            $table->string('memo')->nullable(); // メモ
            $table->foreignId('product_id')->constrained('products'); // 商品ID（外部キー）
            $table->integer('quantity'); // 注文数量
            $table->decimal('price', 8, 2); // 合計価格
            $table->timestamps();      // タイムスタンプ
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
