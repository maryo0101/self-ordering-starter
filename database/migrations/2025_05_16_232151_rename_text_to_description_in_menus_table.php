<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTextToDescriptionInMenusTable extends Migration
{
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->renameColumn('text', 'description');
        });
    }

    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->renameColumn('description', 'text');
        });
    }
}

