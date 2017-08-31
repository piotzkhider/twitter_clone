<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Http\Requests\PostRequest;

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
