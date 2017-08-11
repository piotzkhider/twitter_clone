<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ログインコントローラ
    |--------------------------------------------------------------------------
    |
    | このコントローラはアプリケーションの認証ユーザを処理し、
    | トップページへリダイレクトする。コントローラはアプリケーションに
    | 機能を便利に提供するためにトレイトを使用している
    |
    */

    use AuthenticatesUsers;

    /**
     * ログイン後のユーザリダイレクト先
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
