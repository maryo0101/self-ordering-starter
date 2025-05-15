<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>管理者ダッシュボード</h1>

        <!-- メニュー登録ボタン -->
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">メニュー登録</a>

        <!-- 注文一覧ボタン -->
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">注文一覧</a>

        <!-- 注文履歴ボタン -->
        <a href="{{ route('admin.orders.history') }}" class="btn btn-primary">注文履歴</a>

        <!-- 通知一覧 -->
        <h2>通知一覧</h2>
        <ul>
            @foreach($notifications as $notification)
                <li>{{ $notification->data['message'] }} - {{ $notification->created_at }}</li>
            @endforeach
        </ul>
    </div>
@endsection



