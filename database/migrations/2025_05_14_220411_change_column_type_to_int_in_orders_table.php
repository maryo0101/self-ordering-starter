<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // 価格を decimal から int に変更
            $table->integer('price')->change();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // down メソッドで元のデータ型に戻す
            $table->decimal('price', 10, 2)->change();
        });
    }
};
