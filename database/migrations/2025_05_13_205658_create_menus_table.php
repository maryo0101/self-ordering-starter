<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();                            // 商品ID
            $table->string('name');                 // 商品名
            $table->integer('price');               // 価格（整数型に変更）
            $table->string('category');             // 商品カテゴリー
            $table->text('description')->nullable(); // 説明文（空でもOK）
            $table->timestamps();                   // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};



