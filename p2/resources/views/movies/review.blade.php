@extends('layouts/main')

@section('title')
    Movie Reviews
@endsection

@section('head')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('content')
    <div class='container w-75 p-3'>
        @if (isset($random))
            <h1>{{ $random['title'] }}</h1>
            <h4>{{ $random['tagline'] }}</h4>
            <p>Rating: {{ $random['rating'] }} - ({{ $random['year'] }})</p>
            <p>{{ $random['summary'] }}</p>
        @elseif (isset($searchResults))
            <h1>{{ $searchResults['title'] }}</h1>
            <h4>{{ $searchResults['tagline'] }}</h4>
            <p>Rating: {{ $searchResults['rating'] }} - ({{ $searchResults['year'] }})</p>
            <p>{{ $searchResults['summary'] }}</p>
        @endif

        <div>

            <form method='post' action='/process'>
                @if (isset($random))
                    <h1>What did you think of {{ $random['title'] }}?</h1>
                    <input type='hidden' name='random' id='random' value='{{ $random['title'] }}'>
                @else
                    <h1>What did you think of {{ $searchResults['title'] }}?</h1>
                    <input type='hidden' name='searchResults' id='searchResults' value='{{ $searchResults['title'] }}'>
                @endif
                <div class='form-group row'>
                    {{ csrf_field() }}
                    <label for='name'>Reviewed by: </label>
                    <input type='text' name='name' id='name' value='{{ old('name') }}'>
                </div>
                <br />
                <div class='form-group row'>
                    <label for='email'>Email:</label>
                    <input type='email' name='email' id='email' value='{{ old('email') }}'>
                </div>
                <br />
                <div class='form-group row'>
                    <label for='review'>Highs? Lows? Improvements? Let us hear it!</label>
                    <br />
                    <textarea class='form-control' rows='4' name='review' id='review'>{{ old('review') }}</textarea>
                </div>
                <br />
                <div>
                    <button type='submit' class='btn btn-secondary'>submit</button>
                </div>
            </form>
        </div>
        @if (count($errors) > 0)
            <ul class='alert alert-danger'>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
