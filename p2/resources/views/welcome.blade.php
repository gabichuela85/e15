@extends('layouts/main')

@section('title')
    Movie Reviews
@endsection

@section('content')
    <h1>Movie Reviews</h1>
    <form method='get' action=''>
        <p></p>
        <label for='name'>Your Name:</label>
        <input type='text' name='name' id='name'>
        <label for='email'>Email:</label>
        <input type='email' name='email' id='email'>
        <br />
        <span class="star-rating">
            <input type="radio" name="rating1" value="1"><i></i>
            <input type="radio" name="rating1" value="2"><i></i>
            <input type="radio" name="rating1" value="3"><i></i>
            <input type="radio" name="rating1" value="4"><i></i>
            <input type="radio" name="rating1" value="5"><i></i>
        </span>
        <label for='review'>What did you think?</label>
        <input type='textarea' name='review' id='review'>
        <button type='submit'>submit</button>
    </form>
@endsection
