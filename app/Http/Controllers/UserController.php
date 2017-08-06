<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @param \App\Models\User $user
     * @return mixed
     */
    public function index(User $user)
    {
        $timeline = Tweet::timeline()->ofUser($user)->get();

        return view('user.index')->with(compact('user', 'timeline'));
    }

    /**
     * @param \App\Models\User $user
     * @return mixed
     */
    public function following(User $user)
    {
        return view('user.following')->with(compact('user'));
    }

    /**
     * @param \App\Models\User $user
     * @return mixed
     */
    public function followers(User $user)
    {
        return view('user.followers')->with(compact('user'));
    }
}
