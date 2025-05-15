@extends('layouts.app')

@section('content')
<div class="container">
    <h1>注文一覧</h1>

    @foreach($orders as $orderId => $items)
    <div class="card mb-4">
        <div class="card-header">
            注文ID: {{ $orderId }} | テーブル: {{ $items->first()->table }} | メモ: {{ $items->first()->memo }}
        </div>
        <div class="card-body">
            <ul>
                @foreach($items as $item)
                <li>
                    商品名: {{ $item->menu ? $item->menu->name : '不明' }}<br>
                    価格: {{ $item->price }}円 × {{ $item->quantity }}個
                </li>
                @endforeach

            </ul>

            <!-- 履歴に移動ボタン -->
            <form method="POST" action="{{ route('admin.orders.archive', $orderId) }}">
                @csrf
                @method('PATCH') <!-- この行でPATCHリクエストに変更 -->
                <button type="submit" class="btn btn-sm btn-primary">履歴に移動</button>
            </form>

        </div>
    </div>
    @endforeach
</div>
@endsection