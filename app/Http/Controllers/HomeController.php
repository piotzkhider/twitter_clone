<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $me = \Auth::user();

        $timeline = Tweet::whereUserId($me->id)
            ->orWhereIn('user_id', $me->following->pluck('id'))
            ->latest()
            ->get();

        return view('home', ['me' => $me, 'timeline' => $timeline]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(Request $request)
    {
        $this->validate($request, [
            'body' => ['required', 'string', 'max:140'],
        ]);

        \Auth::user()->tweets()->create($request->only('body'));

        return back();
    }
}
