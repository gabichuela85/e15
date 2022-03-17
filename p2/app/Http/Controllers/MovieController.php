<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
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
        
        //$title = Arr::get($random, 'title');
        //$rating = Arr::get($random, 'contentRating');
        //$runningTime = Arr::get($random, 'durationHuman');
        //$summary = Arr::get($random, 'summary');
        
        $movies = json_encode($movie);

        
        return view('movies/review', [
            'random' => $random,
            //'title' => $title,
            //'rating' => $rating,
            //'runningTime' => $runningTime,
            //'summary' => $summary,
        ]);
    }
}