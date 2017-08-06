<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $me = \Auth::user();

        return view('settings.profile')->with(compact('me'));
    }

    /**
     * @param \App\Http\Requests\Settings\UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        $attributes = $request->only('display_name', 'avatar');

        \Auth::user()->update($attributes);

        return redirect()->back();
    }
}
