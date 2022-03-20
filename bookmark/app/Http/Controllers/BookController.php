<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $bookData = file_get_contents(database_path('books.json'));

        $books = json_decode($bookData, true);
         
        $books = Arr::sort($books, function ($value) {
            return $value['title'];
        });
        
        return view('books/index', ['books' => $books]);
    }
    
    public function show($slug)
    {
        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);

        $book = Arr::first($books, function ($value, $key) use ($slug) {
            return $key == $slug;
        });
        
        return view('books/show', [
            'book' => $book,
        ]);
    }

    public function filter($category, $subcategory)
    {
        return view('books/category', [
            'category'=> $category,
            'subcategory' => $subcategory,
        ]);
    }

    /**
     * GET /search
     * Search books based on title or author
     */
    
    public function search(Request $request)
    {
        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);
        
        $searchType = $request->input('searchType', 'title');
        $searchTerms = $request ->input('searchTerms', '');
        
        
        $searchResults = [];
        foreach ($books as $slug=>$book) {
            if (strtolower($book[$searchType]) == strtolower($searchTerms)) {
                $searchResults[$slug] = $book;
            }
        }
        $request->validate([
            'searchTerms' => 'required',
            'searchType' => 'required' 
        ]);
        
        return redirect('/')->with([
            'searchTerms'=> $searchTerms,
            'searchType'=> $searchType,
            'searchResults' => $searchResults]);
    }
    /**
* GET /books/create
* Display the form to add a new book
*/
    public function create(Request $request)
    {
        return view('books/create');
    }

    /**
    * POST /books
    * Process the form for adding a new book
    */
    public function store(Request $request)
    {
        # Code will eventually go here to add the book to the database,
        # but for now we'll just dump the form data to the page for proof of concept
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|digits:4',
            'cover_url' => 'url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:255'
        ]);
    }
}