<?php

namespace App\Http\Controllers\Friendship;

use App\Http\Controllers\Controller;
use App\Models\User;

class Unfollow extends Controller
{
    /**
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(User $user)
    {
        \Auth::user()->unfollow($user);

        return redirect()->back();
    }
}
