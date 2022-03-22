<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RecursiveArrayIterator;

class MovieController extends Controller
{
    public function index()
    {
        $movieList = file_get_contents(database_path('movies.json'));
        $movies = json_decode($movieList, true);
        
        $movies = Arr::sort($movies, function ($value) {
            return $value['title'];
        });

        return view('movies/index', ['movies'=>$movies]);
    }

    public function form()
    {
        $movieList = file_get_contents(database_path('movies.json'));
        $movies = json_decode($movieList, true);
        
        $i = 1;
        foreach ($movies as &$movie) {
            $movie = Arr::add($movie, 'id', $i);
            $i++;
        }
        
        $random = Arr::random($movies);
        $movies = json_encode($movie);

        
        return view('movies/review', [
            'random' => $random,
        ]);
    }
    public function search(Request $request)
    {
        $movieList = file_get_contents(database_path('movies.json'));
        $movies = json_decode($movieList, true);

        $title = $request->input('title');
        
        $searchResults = [];
        foreach ($movies as $slug=>$movie) {
            $title = Str::slug($title, '-');
            if (strtolower($slug) == strtolower($title)) {
                $searchResults[$slug] = $movie;
                $searchResults = Arr::collapse($searchResults);
            }
        }

        $movieArray = [];
        foreach ($movies as $slug=>$movie) {
            array_push($movieArray, $movie['title']);
        }
        //$movieArray = implode(', ', $movieArray);
    
        Validator::make($title, [
            'title' => [
                'required',
                Rule::in([$movieArray]),
            ],
        ]);
        
            
        return view('movies/review', [
            'title'=> $title,
            'searchResults'=> $searchResults,
            'movie'=> $movie,
        ]);
    }
    public function process(Request $request)
    {
        $name = $request->input('name', '');
        $email = $request->input('email', '');
        $review = $request->input('review', '');

        $request->validate([
            'name' => 'required|max:50',
            'email'=> 'required|email:rfc,dns',
            'review' => 'required|min:255'
        ]);
    
        
        return redirect('/')->with([
            'name'=>$name,
            'email'=>$email,
            'review'=>$review
        ]);
    }
}