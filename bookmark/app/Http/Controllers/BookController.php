<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        return view('books/index');
    }
    
    public function show($title)
    {
        $bookFound = true ;
        
        return view('books/show', [
            'bookFound' => $bookFound,
            'title' => $title,
        ]);
    }

    public function filter($category, $subcategory)
    {
        return view('books/category', [
            'category'=> $category,
            'subcategory' => $subcategory,
        ]);
    }
}