<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        return 'Showing all books...';
    }
    
    public function show($title)
    {
        return "This is the details for the book: " . $title;
    }

    public function filter($category, $subcategory)
    {
        echo $category . ", " . $subcategory;
    }
}