<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @param $urlName
     * @return mixed
     */
    public function index($urlName)
    {
        $user = User::whereUrlName($urlName)->first();

        $me = \Auth::user();

        $timeline = Tweet::whereUserId($user->id)->latest()->get();

        return view('user.index', ['me' => $me, 'user' => $user, 'timeline' => $timeline]);
    }

    /**
     * @param $urlName
     * @return mixed
     */
    public function following($urlName)
    {
        $user = User::whereUrlName($urlName)->first();

        $me = \Auth::user();

        return view('user.following', ['me' => $me, 'user' => $user]);
    }

    /**
     * @param $urlName
     * @return mixed
     */
    public function followers($urlName)
    {
        $user = User::whereUrlName($urlName)->first();

        $me = \Auth::user();

        return view('user.followers', ['me' => $me, 'user' => $user]);
    }
}
