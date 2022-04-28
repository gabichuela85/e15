<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ListController extends Controller
{
    public function show(Request $request)
    {
        $books = $request->user()->books->sortByDesc('pivot.created_at');
        
        return view('list/show', ['books' => $books]);
    }

    public function add(Request $request, $slug)
    {
        $book = $book = Book::where('slug', '=', $slug)->first();
        
        return view('list/add', ['book' => $book]);
    }

    public function save(Request $request, $slug)
    {
        #TODO possibly add validation to check for notes or no notes
        
        $user = $request->user();
        $book = Book::where('slug', '=', $slug)->first();

        $user->books()->save($book, ['notes' => $request->notes]);
        return redirect('/list')->with(['flash-alert'=> 'The book ' .$book->title . ' was added to your list.' ]);
    }
}