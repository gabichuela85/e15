<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
         
        //$books = Arr::sort($books, function ($value) {
        //return $value['title'];
        //});
        
        return view('books/index', ['books' => $books]);
    }
    
    public function show($slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

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
            'title' => 'required|max:255',
            'slug' => 'required|unique:books,slug',
            'author' => 'required|max:255',
            'published_year' => 'required|digits:4',
            'cover_url' => 'required|url',
            'info_url' => 'required|url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:100'
        ]);
        
        $book = new Book();
        $book->title=$request->title;
        $book->slug=$request->slug;
        $book->author=$request->author;
        $book->published_year=$request->published_year;
        $book->cover_url=$request->cover_url;
        $book->info_url=$request->info_url;
        $book->purchase_url=$request->purchase_url;
        $book->description=$request->description;
        
        $book->save();
        
        redirect('books/create')->with(['flash-alert'=>'Your book was added']);
    }

    public function edit(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();


        if (!$book) {
            return redirect('/books')->with(['flash-alert' => 'Book not found.']);
        }

        return view('books/edit', [
            'book' => $book,
        ]);
    }
        
    public function delete($slug)
    {
        $book = Book::where('slug', '=', $slug)->first();
        var_dump($book);
    }
    public function update(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:books,slug,' .$book->id.'|alpha_dash',
            'author' => 'required|max:255',
            'published_year' => 'required|digits:4',
            'cover_url' => 'required|url',
            'info_url' => 'required|url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:100'
        ]);

        $book->title=$request->title;
        $book->slug=$request->slug;
        $book->author=$request->author;
        $book->published_year=$request->published_year;
        $book->cover_url=$request->cover_url;
        $book->info_url=$request->info_url;
        $book->purchase_url=$request->purchase_url;
        $book->description=$request->description;
        $book->save();
        
        return redirect('books/'.$slug.'/edit')->with(['flash-alert'=>'Your changes were saved.']);
    }
}