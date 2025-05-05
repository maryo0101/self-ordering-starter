<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Log::info('App Name: ' . env('APP_NAME'));  // ログにAPP_NAMEを出力
    return view('welcome');
});
