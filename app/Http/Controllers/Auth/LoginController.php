<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{
    // ログイン処理
    public function login(Request $request)
    {
        // バリデーション
        $request->validate([
            'password' => ['required'],
        ]);

        // 環境変数から管理者用パスワードを取得
        $correctPassword = env('ADMIN_PASSWORD');

        // パスワードが一致する場合
        if ($request->password === $correctPassword) {
            // 仮の管理者アカウントでログイン
            Auth::login(new class implements Authenticatable {
                public $name = 'Admin'; // 管理者の名前
            
                public function getAuthIdentifierName() {
                    return 'name';
                }
            
                public function getAuthIdentifier() {
                    return $this->name;
                }
            
                public function getAuthPassword() {
                    return null;
                }
            
                public function getAuthPasswordName() {
                    return 'password'; // 任意の文字列（使われないので固定でOK）
                }
            
                public function getRememberToken() {
                    return null;
                }
            
                public function setRememberToken($value) {
                    // 特に実装しない
                }
            
                public function getRememberTokenName() {
                    return null;
                }
            });

            // パスワードがあっていた場合
            // セッションにadmin_logged_inを設定
            session(['admin_logged_in' => true]);
            return redirect()->intended('/admin'); // ログイン後のリダイレクト先を指定
        }


        // パスワードが間違っていた場合
        return back()->withErrors([
            'password' => 'パスワードが間違っています。',
        ]);
    }
}
