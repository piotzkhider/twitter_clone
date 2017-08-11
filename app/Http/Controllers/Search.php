<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class Search extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'search' => ['required', 'string'],
        ]);

        $conditions = explode(' ', $request->input('search'));

        $query = Tweet::latest();
        foreach ($conditions as $condition) {
            $query->where('body', 'like', '%'.$condition.'%');
        }
        $timeline = $query->get();

        return view('search', ['conditions' => $conditions, 'timeline' => $timeline]);
    }
}
