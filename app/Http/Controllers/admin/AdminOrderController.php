<?php

// app/Http/Controllers/Admin/AdminOrderController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\RkiOrder;


class AdminOrderController extends Controller
{
    public function index()
    {
        // order_idごとにグループ化して一覧表示用に取得
        $orders = Order::orderBy('created_at', 'desc')->get()->groupBy('order_id');

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * 注文を履歴テーブルに移動
     *
     * @param  string  $orderId
     * @return \Illuminate\Http\Response
     */
    public function archive($orderId)
    {
        // 注文IDに紐づく注文データを取得
        $orders = Order::where('order_id', $orderId)->get();

        if ($orders->isEmpty()) {
            return back()->with('error', '注文が見つかりませんでした。');
        }

        $timestamp = Carbon::now();

        DB::transaction(function () use ($orders, $timestamp) {
            foreach ($orders as $order) {
                // 履歴用テーブルに注文データを保存
                RkiOrder::create([
                    'order_id'   => $order->order_id,
                    'table'      => $order->table,
                    'memo'       => $order->memo,
                    'product_id' => $order->product_id,
                    'price'      => $order->price,
                    'quantity'   => $order->quantity,
                    'rki_upymdhms' => $timestamp,
                ]);

                // 注文データを削除
                $order->delete();  // 注文データを削除
            }
        });

        return back()->with('success', '注文を履歴に移動しました。');
    }

    public function orderHistory()
    {
        // 注文履歴を注文IDごとにグループ化して取得（最新順）
        $orderHistory = RkiOrder::orderByDesc('rki_upymdhms')  // rki_upymdhmsを基準に降順で取得
            ->get()                            // すべてのデータを取得
            ->groupBy('order_id');             // order_idでグループ化

        return view('admin.orders.history', compact('orderHistory'));  // 結果をビューに渡す
    }
}

