<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response|mixed
     */
    public function index()
    {
        $me = \Auth::user()->load('friends', 'followers');

        $tweets = $me->tweets()->with('user')->withFriendsTweets($me->friends)->latest()->get();

        return view('home')->with('user', $me)->with('tweets', $tweets);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('profile.profile');
    }

    public function friends()
    {
        return view('profile.friends');
    }
}
