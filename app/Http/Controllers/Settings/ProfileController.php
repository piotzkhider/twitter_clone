<?php

namespace App\Http\Controllers\Settings;

use App\Domain\Models\User\Avatar\AvatarStorage;
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
        $name = $request->input('display_name');
        $avatar = $request->file('avatar');

        $path = AvatarStorage::load()->store($avatar);

        \Auth::user()->update(['display_name' => $name, 'avatar' => $path]);

        return redirect()->back();
    }
}
