<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('ordering::auth.login'); // ここでパッケージのビューを指定
    }

    public function login(Request $request)
    {
        Log::debug('Login attempt started'); // ログイン開始

        // バリデーション（パスワードのみを受け取る）
        $request->validate([
            'password' => ['required'],
        ]);

        Log::debug('Validation passed'); // バリデーション通過後

        // 管理者用ユーザーをデータベースから検索
        $user = User::where('email', 'admin@example.com')->first();
        Log::debug('User fetched: ' . ($user ? 'found' : 'not found')); // ユーザーの取得状況

        // ユーザーが存在し、パスワードが一致する場合
        if ($user && Hash::check($request->password, $user->password)) {
            // 実際のユーザーでログイン
            Auth::login($user);

            Log::debug('Login successful, redirecting to admin dashboard'); // ログイン成功

            // ログイン後、/admin にリダイレクト
            return redirect('/admin');
        }

        Log::warning('Invalid password or user not found'); // パスワードが間違っていた場合

        // パスワードが間違っていた場合
        return back()->withErrors([
            'password' => 'パスワードが間違っています。',
        ]);
    }
}
