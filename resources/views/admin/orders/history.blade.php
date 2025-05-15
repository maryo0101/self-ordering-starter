<!-- resources/views/admin/orders/history.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>注文履歴</h1>

    @foreach ($orderHistory as $orderId => $orders)
        <div>
            <h2>注文ID: {{ $orderId }}</h2>
            <ul>
                @foreach ($orders as $order)
                    <li>
                        テーブル: {{ $order->table }}<br>
                        メモ: {{ $order->memo }}<br>
                        商品ID: {{ $order->product_id }}<br>
                        価格: {{ $order->price }}<br>
                        数量: {{ $order->quantity }}<br>
                        時間: {{ $order->rki_upymdhms }}<br>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection
