<?php

namespace App\Http\Controllers; 

use Illuminate\Support\Arr; 
use Illuminate\Http\Request; 

class MovieController extends Controller
{
    public function index()
    {
        $movieList = file_get_contents(database_path('movies.json')); 
        $movies = json_decode($movieList, true); 
        
        $movies = Arr::sort($movies, function($value){
            return $value['title']; 
        }); 

        return view('movies/index', ['movies'=>$movies]); 
    }
}