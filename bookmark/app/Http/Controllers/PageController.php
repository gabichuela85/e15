<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $searchResults = session('searchResults', null);
        $searchType = session('searchType', null);
        $searchTerms = session('searchTerms', null);
        
        return view('pages/welcome', [
            'searchTerms'=> $searchTerms,
            'searchType' => $searchType,
            'searchResults'=>$searchResults]);
    }
    
    public function contact()
    {
        return view('pages/contact');
    }
}