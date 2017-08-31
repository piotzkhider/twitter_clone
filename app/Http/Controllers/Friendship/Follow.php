<?php

namespace App\Http\Controllers\Friendship;

use App\Models\User;
use App\Http\Controllers\Controller;

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
