@extends('layouts/main')

@section('title')
    Delete Confirmation
@endsection
@section('content')
    <h1>Delete Confirmation</h1>
    <form method='POST' action='/books/{{ $book->slug }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <button type='submit' class='btn btn-danger btn-small'>Yes, delete it!</button>
    </form>

    <p class='cancel'>
        <a href='/books{{ $book->slug }}'>No, I changed my mind.</a>
    </p>
@endsection
