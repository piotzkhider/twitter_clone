<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;

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

        $tweets = $me->tweets()->withFriendsTweets($me->friends)->latest()->get();

        return view('home')
            ->with('user', $me)
            ->with('tweets', $tweets);
    }

    /**
     * @param \App\Http\Requests\TweetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tweet(TweetRequest $request)
    {
        $attributes = $request->only('body');

        \Auth::user()->tweets()->create($attributes);

        return redirect()->route('home');
    }
}
