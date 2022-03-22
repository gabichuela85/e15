@extends('layouts/main')

@section('title')
    Movie Reviews
@endsection

@section('head')
    <link href='/css/app.css' rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('content')
    @if (isset($random))
        <h1>{{ $random['title'] }}</h1>
        <h4>{{ $random['tagline'] }}</h4>
        <p>Rating: {{ $random['rating'] }} - ({{ $random['year'] }})</p>
        <p>{{ $random['summary'] }}</p>
    @endif
    @if (isset($searchResults))
        <h1>{{ $searchResults['title'] }}</h1>
        <h4>{{ $searchResults['tagline'] }}</h4>
        <p>Rating: {{ $searchResults['rating'] }} - ({{ $searchResults['year'] }})</p>
        <p>{{ $searchResults['summary'] }}</p>
    @endif

    <div>
        @if (isset($random))
            <h1>What did you think of {{ $random['title'] }}?</h1>
        @else
            <h1>What did you think of {{ $searchResults['title'] }}?</h1>
        @endif
        <form method='post' action='/'>
            <div class='form-group row'>
                <label for='name'>Reviewed by: </label>
                <input type='text' name='name' id='name' value='name'>
            </div>
            <br />
            <div class='form-group row'>
                <label for='email'>Email:</label>
                <input type='email' name='email' id='email'>
            </div>
            <br />
            <p>Star Rating:</p>
            <div class="rate form-group row-reverse">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5 stars">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4 stars">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3 stars">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2 stars">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1 star">1 star</label>
            </div>
            <br />
            <div class='form-group row'>
                <label for='review'>Highs? Lows? Improvements? Let us hear it!</label>
                <br />
                <textarea class='form-control' rows='4' name='review' id='review'></textarea>
            </div>
            <br />
            <div>
                <button type='button' class='btn btn-secondary'>submit</button>
            </div>
        </form>
    </div>
@endsection
