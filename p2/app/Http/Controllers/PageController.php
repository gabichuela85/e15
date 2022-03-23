<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(Request $request)
    {

        $random = session('random', null);
        $searchResults = session('searchResults', null);
        $name = session('name', null);
        $email = session('email', null);
        $review = session('review', null);

        return view('/welcome', [
            'random'=>$random,
            'searchResults' => $searchResults,
            'name' => $name,
            'email' => $email,
            'review' => $review
        ]);
    }
}