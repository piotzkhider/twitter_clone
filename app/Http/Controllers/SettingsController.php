<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Response|mixed
     */
    public function account()
    {
        $me = \Auth::user();

        return view('settings.account')->with(compact('me'));
    }

    /**
     * @return \Illuminate\Http\Response|mixed
     */
    public function profile()
    {
        $me = \Auth::user();

        return view('settings.profile')->with(compact('me'));
    }

    public function update(Request $request)
    {
    }
}
