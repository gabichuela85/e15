<?php

namespace App\Http\Controllers;

use App\Actions\Book\StoreNewBook;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        
        $newBooks = $books->sortByDesc('id')->take(3);
        //$books = Arr::sort($books, function ($value) {
        //return $value['title'];
        //});
        
        return view('books/index', ['books' => $books, 'newBooks' => $newBooks]);
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
        $request->validate([
                'searchTerms' => 'required',
                'searchType' => 'required'
            ]);
        #get form data
        $searchType = $request->input('searchType', 'title');
        $searchTerms = $request ->input('searchTerms', '');
        #query the database
        $searchResults = Book::where($searchType, 'LIKE', '%'. $searchTerms. '%')->get();
        
        return redirect('/')->with([
            'searchResults' => $searchResults])->withInput();
    }
    /**
* GET /books/create
* Display the form to add a new book
*/
    public function create(Request $request)
    {
        $authors = Author::orderBy('last_name')->select('id', 'first_name', 'last_name')->get();
        
        return view('books/create', ['authors' => $authors]);
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
            'author_id' => 'required',
            'published_year' => 'required|digits:4',
            'cover_url' => 'required|url',
            'info_url' => 'required|url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:100'
        ]);
        
        $action = new StoreNewBook((object) $request->all());
        
        redirect('books/create')->with(['flash-alert'=>'Your book" '.$action->results->title.'" was added']);
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
        
        return view('books/delete', [
            'book' => $book
        ]);
    }
    
    public function destroy($slug)
    {
        $book = Book::where('slug', '=', $slug)->first();
        $book->users()->detach();
        $book->delete();

        return redirect('/books')->with([
            'flash-alert' =>'"' . $book->title . '" was removed.'
        ]);
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