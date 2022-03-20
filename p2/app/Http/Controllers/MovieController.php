<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            }
        }
        $movie = $searchResults;
        var_dump($movie);
        //return view('movies/review', [
            //'title'=> $title,
            //'searchResults'=> $searchResults
        //]);
    }
}