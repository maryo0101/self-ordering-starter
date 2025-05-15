<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rki_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('table')->nullable();
            $table->text('memo')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamp('rki_upymdhms'); // 登録日時
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rki_orders');
    }
};
