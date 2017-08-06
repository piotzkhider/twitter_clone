<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $me = \Auth::user();

        return view('settings.account')->with(compact('me'));
    }

    /**
     * @param \App\Http\Requests\Settings\UpdateAccountRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAccountRequest $request)
    {
        $attributes = $request->only('url_name', 'email', 'password');

        \Auth::user()->update($attributes);

        return redirect()->back();
    }
}
