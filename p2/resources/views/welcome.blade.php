@extends('layouts/main')

@section('title')
    Movie Reviews
@endsection

@section('head')
    <link href='/css/app.css' rel="stylesheet">
@endsection

@section('content')
    <div class="movieReview">
        <h1>Movie Reviews</h1>
        <form method='get' action=''>
            <div>
                <label for='name'>Your Name:</label>
                <input type='text' name='name' id='name'>
            </div>
            <br />
            <div>
                <label for='email'>Email:</label>
                <input type='email' name='email' id='email'>
            </div>
            <br />
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <br />
            <div>
                <label for='review'>What did you think?</label>
                <br />
                <input type='textarea' name='review' id='review'>
            </div>
            <br />
            <div>
                <button type='submit'>submit</button>
            </div>
        </form>
    </div>
@endsection
