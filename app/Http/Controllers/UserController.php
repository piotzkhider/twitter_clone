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

    public function followees()
    {
        //
    }

    public function followers()
    {
        //
    }
}
