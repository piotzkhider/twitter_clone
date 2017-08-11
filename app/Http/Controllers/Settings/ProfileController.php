<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $me = \Auth::user();

        return view('settings.profile', ['me' => $me]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'display_name' => ['string', 'nullable', 'max:20'],
            'avatar' => ['image', 'nullable'],
            'description' => ['string', 'nullable', 'max:160'],
        ]);

        $attributes = $request->only('display_name', 'avatar', 'description');

        \Auth::user()->update($attributes);

        return back();
    }
}
