@extends('layouts/main')

@section('head')
@endsection
@section('title')
    Movies
@endsection
@section('content')
    <div id='movies'>
        @foreach ($movies as $slug => $movie)
            <a href='/movies/{{ $slug }}'>
                <h3>{{ $movie['title'] }}</h3>
            </a>
        @endforeach
    </div>
@endsection
