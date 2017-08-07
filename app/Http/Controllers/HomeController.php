<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Tweet;

class HomeController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $me = \Auth::user();

        $timeline = Tweet::timeline()->forHome()->get();

        return view('home')->with(compact('me', 'timeline'));
    }

    /**
     * @param \App\Http\Requests\PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(PostRequest $request)
    {
        $body = $request->input('body');

        \Auth::user()->tweet($body);

        return redirect()->back();
    }
}
