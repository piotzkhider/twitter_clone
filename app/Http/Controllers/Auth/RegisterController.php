<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ユーザ登録コントローラ
    |--------------------------------------------------------------------------
    |
    | このコントローラは新しいユーザの登録、バリデーション、生成を処理する。
    | デフォルトで、このコントローラはトレイトを使用しており、これにより
    | 他のコードを追加せずとも、この機能を提供している。
    |
    */

    use RegistersUsers;

    /**
     * 登録後のユーザリダイレクト先
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 送られてきたユーザ登録リクエストのバリデター取得
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'url_name' => [
                'required',
                'string',
                'alpha_num',
                'max:15',
                Rule::unique('users'),
            ],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'alpha_num', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * ユーザ登録成功後の新しいユーザインスタンス取得
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'url_name' => $data['url_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'display_name' => $data['url_name'],
            'avatar' => 'images/no-thumb.png',
        ]);
    }
}
