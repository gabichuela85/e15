<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $title = session('title', null);
        $year = session('year', null);
        $searchResults = session('searchResults', null);

        return view('/welcome', [
            'title' => $title,
            'year' => $year,
            'searchResults' => $searchResults
        ]);
    }
}