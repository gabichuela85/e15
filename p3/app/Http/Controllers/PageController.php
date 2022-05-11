<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages/welcome');
    }

    public function new()
    {
        return view('pages/new');
    }
    
    public function home()
    {
        $entries = Entry::all();
        
        return view('pages/home', [
            'entries'=>$entries,
        ]);
    }
}