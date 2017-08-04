<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
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
        $user->load(['friends', 'followers']);

        $timeline = Tweet::forProfileOf($user)->with('user')->get();

        return view('profile.profile')->with(compact('user', 'timeline'));
    }

    /**
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response|mixed
     */
    public function friends(User $user)
    {
        $user->load('tweets', 'friends', 'followers');

        return view('profile.friends')->with('user', $user);
    }

    /**
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response|mixed
     */
    public function followers(User $user)
    {
        $user->load('tweets', 'friends', 'followers');

        return view('profile.followers')->with('user', $user);
    }
}
