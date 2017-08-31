<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Http\Requests\SearchRequest;
use App\Domain\Models\Search\Conditions;

class Search extends Controller
{
    /**
     * @param \App\Http\Requests\SearchRequest $request
     * @return mixed
     */
    public function __invoke(SearchRequest $request)
    {
        $conditions = new Conditions($request->input('search'));
        $timeline = Tweet::timeline()->search($conditions)->get();

        return view('search')->with(compact('conditions', 'timeline'));
    }
}
