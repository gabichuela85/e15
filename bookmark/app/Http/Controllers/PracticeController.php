<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Author;
use App\Models\User;

class PracticeController extends Controller
{
    /**
     * First practice example
     * GET /practice/1
     */
    public function practice8()
    {
        # Return the two latest books added
        $book = Book::orderBy('id')->get();

        $newbooks = $book->sortByDesc('id')->take(2);
        
        dump($newbooks);
    }

    public function practice10()
    {
        $books = Book::orderBy('title')->get();
        foreach ($books as $book) {
            dump($book->title);
        }
    }

    public function practice11()
    {
        $books = Book::orderByDesc('published_year')->get();
        foreach ($books as $book) {
            dump($book->title . ' - ' . $book->published_year);
        }
    }

    public function practice12()
    {
        # First get a book to delete
        $books = Book::where('author', 'LIKE', '%Rowling%')->get();
        
        foreach ($books as $book) {
            if (!$book) {
                dump('Did not delete- Book not found.');
            } else {
                $book->delete();
                dump('Deletion complete');
            }
        }

        # Query for books by F. Scott Fitzgerald to confirm the above deletion worked as expected
        # This should yield an empty array
        dump(Book::where('author', 'LIKE', '%Rowling%')->get()->toArray());
    }
    public function practice13()
    {
        $author = Author::where('first_name', '=', 'J.K.')->first();

        $book = new Book;
        $book->slug = 'fantastic-beasts-and-where-to-find-them';
        $book->title = "Fantastic Beasts and Where to Find Them";
        $book->published_year = 2001;
        $book->cover_url = 'https://hes-bookmark.s3.amazonaws.com/cover-placeholder.png';
        $book->info_url = 'https://en.wikipedia.org/wiki/Fantastic_Beasts_and_Where_to_Find_Them';
        $book->purchase_url = 'http://www.barnesandnoble.com/w/fantastic-beasts-and-where-to-find-them-j-k-rowling/1004478855';
        $book->author()->associate($author); # <--- Associate the author with this book
        $book->description = 'Fantastic Beasts and Where to Find Them is a 2001 guide book written by British author J. K. Rowling (under the pen name of the fictitious author Newt Scamander) about the magical creatures in the Harry Potter universe. The original version, illustrated by the author herself, purports to be Harry Potter???s copy of the textbook of the same name mentioned in Harry Potter and the Philosopher???s Stone (or Harry Potter and the Sorcerer???s Stone in the US), the first novel of the Harry Potter series. It includes several notes inside it supposedly handwritten by Harry, Ron Weasley, and Hermione Granger, detailing their own experiences with some of the beasts described, and including in-jokes relating to the original series.';
        $book->save();
        dump($book->toArray());
    }
    public function practice14()
    {
        $user = User::where('email', '=', 'jill@harvard.edu')->first();
        
        dump($user->books->toArray());
    }
    
    public function practice15()
    {
        $book = Book::where('title', '=', 'The Great Gatsby')->first();

        dump($book->users->toArray());
    }
    
    public function practice16()
    {
        $books = Book::with('users')->get();

        foreach ($books as $book) {
            dump($book->title);
            foreach ($book->users as $user) {
                dump($user->toArray());
            }
        }
    }

    public function practice17()
    {
        $user = User::where('email', '=', 'jamal@harvard.edu')->first();
        $book = Book::where('title', '=', 'The Martian')->first();

        $user->books()->save($book, ['notes'=>'I liked this book a lot']);
    }

    public function practice18()
    {
        $user = User::where('email', '=', 'jill@harvard.edu')->first();

        $book = $user->books()->first();

        $book->pivot->delete();

        return 'Delete complete. Check the `book_user` table to confirm.';
    }
    public function practice19()
    {
        $user = User::where('email', '=', 'jill@harvard.edu')->first();
        $book = $user->books()->first();

        $book->pivot->notes = "New note...";
        $book->pivot->save();

        return 'Update complete. Check the `book_user` table to confirm.';
    }
    public function practice9()
    {
        $books = Book::where('published_year', '>', '1950')->get();
        foreach ($books as $book) {
            # Change some properties
            $description = $book->title . ' ' . $book->published_year;
            dump($description);
        }
    }
    
    public function practice7()
    {
        # First get a book to delete
        $book = Book::where('author', '=', 'F. Scott Fitzgerald')->first();

        if (!$book) {
            dump('Did not delete- Book not found.');
        } else {
            $book->delete();
            dump('Deletion complete');
        }

        # Query for books by F. Scott Fitzgerald to confirm the above deletion worked as expected
        # This should yield an empty array
        dump(Book::where('author', '=', 'F. Scott Fitzgerald')->get()->toArray());
    }
    public function practice6()
    {
        # First get a book to update
        $books = Book::where('author', '=', 'J.K. Rowling')->get();

        if (!$books) {
            dump("Book not found, can not update.");
        } else {
            foreach ($books as $book) {
                # Change some properties
                $book->author = 'JK Rowling';
            }

            # Save the changes
            $book->save();

            dump('Update complete');
        }
        dump(Book::orderBy('published_year')->get()->toArray());

        # Output books to confirm the above query worked as expected
        dump(Book::orderBy('published_year')->get()->toArray());
    }
    public function practice5()
    {
        # First get a book to update
        $book = Book::where('author', '=', 'F. Scott Fitzgerald')->first();

        if (!$book) {
            dump("Book not found, can not update.");
        } else {
            # Change some properties
            $book->title = 'The Really Great Gatsby';
            $book->published_year = '2025';

            # Save the changes
            $book->save();

            dump('Update complete');
        }
        dump(Book::orderBy('published_year')->get()->toArray());

        # Output books to confirm the above query worked as expected
        dump(Book::orderBy('published_year')->get()->toArray());
    }
    public function practice4()
    {
        $book = new Book();
        $books = $book->where('title', 'LIKE', '%Harry Potter%')->orWhere('published_year', '>', '1998')->select('title')->get();
        dump($books->toArray());
    }
    
    public function practice1()
    {
        dump('This is the first example.');
    }

    public function practice3()
    {
        dump(DB::select('SHOW DATABASES'));
    }

    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     * http://bookmark.yourdomain.com.loc/practice => Shows a listing of all practice routes
     * http://bookmark.yourdomain.com.loc/practice/1 => Invokes practice1
     * http://bookmark.yourdomain.com.loc/practice/5 => Invokes practice5
     * http://bookmark.yourdomain.com.loc/practice/999 => 404 not found
     */
    public function index(Request $request, $n = null)
    {
        $methods = [];

        # Load the requested `practiceN` method
        if (!is_null($n)) {
            $method = 'practice' . $n; # practice1

            # Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method($request) : abort(404);
        } # If no `n` is specified, show index of all available methods
        else {
            # Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }

            # Load the view and pass it the array of methods
            return view('practice')->with([
                'methods' => $methods,
                'books' => Book::all(),
                'fields' => [
                    'id', 'updated_at', 'created_at', 'slug', 'title', 'author', 'published_year'
                ]
                ]);
        }
    }
}