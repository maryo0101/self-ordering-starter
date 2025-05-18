<?php

// app/Http/Controllers/Admin/AdminController.php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\RkiOrder; // 履歴用テーブル
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        // ユーザーがログインしているか確認
        if (Auth::check()) {
            // ログインユーザーの通知を取得
            $notifications = Auth::user()->notifications()->latest()->get();
        } else {
            $notifications = [];
        }

        return view('admin.dashboard', compact('notifications'));
    }

    public function orders()
    {
        // 注文データを取得
        $orders = Order::with('menu') // メニューの情報を関連付けて取得
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('order_id'); // 注文IDでグループ化

        return view('admin.orders.index', compact('orders'));
    }
}
