<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Account;

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
     * @param \App\Models\Account $account
     * @return \Illuminate\Http\Response|mixed
     */
    public function index(Account $account)
    {
        $account->load('profile', 'friends', 'followers');

        $timeline = Tweet::forProfileOf($account)->with('account.profile')->get();

        return view('profile.profile')->with(compact('account', 'timeline'));
    }

    /**
     * @param \App\Models\Account $account
     * @return \Illuminate\Http\Response|mixed
     */
    public function friends(Account $account)
    {
        $account->load('profile', 'tweets', 'friends.profile', 'followers');

        return view('profile.friends')->with(compact('account'));
    }

    /**
     * @param \App\Models\Account $account
     * @return \Illuminate\Http\Response|mixed
     */
    public function followers(Account $account)
    {
        $account->load('profile', 'tweets', 'friends', 'followers.profile');

        return view('profile.followers')->with(compact('account'));
    }
}
