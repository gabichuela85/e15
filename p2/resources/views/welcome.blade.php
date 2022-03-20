@extends('layouts/main')

@section('head')
@endsection
@section('title')
@endsection
@section('content')
    <form method='GET' action='/search'>
        <fieldset>
            <label for='searchTitle'>
                Title:
                <input type='text' name='title' value='{{ $title }}'>
            </label>
        </fieldset>
        <fieldset>
            <input type='submit' value='search'>
        </fieldset>
    </form>
    <form method='GET' action='movies/review'>
        <fieldset>
            <legend>Feeling Lucky? Randomize your pick!</legend>
            <button>Pick Me a Movie</button>
        </fieldset>
    </form>
@endsection
