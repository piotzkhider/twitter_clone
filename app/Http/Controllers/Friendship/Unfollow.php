<?php

namespace App\Http\Controllers\Friendship;

use App\Http\Controllers\Controller;
use App\Models\User;

class Unfollow extends Controller
{
    /**
     * @param $urlName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($urlName)
    {
        $user = User::whereUrlName($urlName)->first();

        \Auth::user()->following()->detach($user->id);

        return back();
    }
}
