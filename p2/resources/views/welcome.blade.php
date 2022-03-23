@extends('layouts/main')

@section('content')
    <div class='text-center'>
        <h1>Review my movies</h1>
        <p>I have a collection of movies that need to be reviewed! search for a title, or let us pick a random one for you
            to
            review!</p>
        <div>
            <form method='GET' action='/search'>
                <fieldset>
                    <label for='search'>
                        Title:
                        <input type='text' name='title' value='{{ old('title') }}'>
                    </label>
                </fieldset>
                <fieldset>
                    <input type='submit' value='search' class='my-3'>
                </fieldset>
            </form>
            <form method='GET' action='movies/review'>
                <fieldset>
                    <legend>Feeling Lucky? Randomize your pick!</legend>
                    <button class='my-3'>Pick Me a Movie</button>
                </fieldset>
            </form>
            <div>
                @if (isset($random))
                    <h1>{{ $random }}</h1>
                @else
                    <h1>{{ $searchResults }}</h1>
                @endif
                @if (isset($name))
                    Reviewed by: {{ $name }} -- {{ $email }}
                    <blockquote>
                        <p>{{ $review }}</p>
                    </blockquote>
                @endif
            </div>
        </div>
    </div>
@endsection
