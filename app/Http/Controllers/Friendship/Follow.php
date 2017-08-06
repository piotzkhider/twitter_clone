<?php

namespace App\Http\Controllers\Friendship;

use App\Http\Controllers\Controller;
use App\Models\User;

class Follow extends Controller
{
    /**
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(User $user)
    {
        \Auth::user()->follow($user);

        return redirect()->back();
    }
}
