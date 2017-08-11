<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $me = \Auth::user();

        return view('settings.account', ['me' => $me]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'url_name' => ['required', 'string', 'alpha_num',  'max:15', Rule::unique('users')->ignore(\Auth::id())],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(\Auth::id())],
            'password' => ['required', 'string', 'alpha_num', 'min:8', 'confirmed'],
        ]);

        $attributes = $request->only('url_name', 'email', 'password');

        \Auth::user()->update($attributes);

        return back();
    }
}
