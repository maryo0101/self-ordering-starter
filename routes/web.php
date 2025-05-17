<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Livewire\Ordering\Menus;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 認証済みのルートグループ
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 管理者用のルートグループ
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/menu/create', [AdminMenuController::class, 'create'])->name('menu.create');
        Route::post('/menu', [AdminMenuController::class, 'store'])->name('menu.store');
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::patch('/orders/archive/{orderId}', [AdminOrderController::class, 'archive'])->name('orders.archive');
        Route::get('orders/history', [AdminOrderController::class, 'orderHistory'])->name('orders.history');
    });
});

// ログインフォーム用
Route::get('/custom-login', [LoginController::class, 'showLoginForm'])->name('custom.login.form');
Route::post('/custom-login', [LoginController::class, 'login'])->name('custom.login');

Route::get('/test-laravel', function () {
    return 'Laravel is working';
});

// routes/web.php に追加
Route::get('/vendor-check', function () {
    return file_exists(base_path('vendor/autoload.php')) ? 'vendor exists' : 'vendor missing';
});


require __DIR__ . '/auth.php';
