<?php

namespace App\Http\Controllers\Friendship;

use App\Http\Controllers\Controller;
use App\Models\User;

class Follow extends Controller
{
    /**
     * @param $urlName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($urlName)
    {
        $user = User::whereUrlName($urlName)->first();

        \Auth::user()->following()->attach($user->id);

        return back();
    }
}
