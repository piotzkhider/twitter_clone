<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response|mixed
     */
    public function index(User $user)
    {
        $user->load(['tweets', 'friends', 'followers']);

        return view('profile.profile')->with('user', $user);
    }
}
