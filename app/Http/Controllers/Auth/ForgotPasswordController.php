<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | パスワードリセットコントローラ
    |--------------------------------------------------------------------------
    |
    | このコントローラはパスワードリセットメールの処理の責務を持ち、
    | アプリケーションからユーザへ通知を送るために役立つトレイトを
    | 取り込む。自由にこのトレイトを調べてください。
    |
    */

    use SendsPasswordResetEmails;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
