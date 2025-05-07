<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {

    return view('welcome');
});

// POSTログイン処理
Route::post('/login', [LoginController::class, 'login'])->name('login');

// 管理画面（認証済みのみ表示）
Route::get('/admin', function () {
    // セッションにadmin_logged_inが設定されていない場合、リダイレクトする
    if (!session('admin_logged_in')) {
        return redirect('/'); // リダイレクト先
    }
    return view('admin.dashboard');
});