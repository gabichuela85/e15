{{-- /resources/views/books/create.blade.php --}}
@extends('layouts/main')

@section('title')
    Edit {{ $book->title }}
@endsection

@section('content')

    @if (session('flash-alert'))
        <div class='flash-alert'>{{ session('flash-alert') }}</div>
    @endif


    <h1>Add your edits below</h1>


    <form method='POST' action='/books/{{ $book->slug }}'>
        <div class='details'>* Required fields</div>

        {{ csrf_field() }}
        {{ method_field('put') }}

        <label for='title'>* Title</label>
        <input type='text' name='title' id='title' value='{{ $book->title }}'>

        <label for='slug'>* Slug</label>
        <input type='text' name='slug' id='slug' value='{{ $book->slug }}'>

        <label for='author'>* Author</label>
        <input type='text' name='author' id='author' value='{{ $book->author }}'>

        <label for='published_year'>* Published Year (YYYY)</label>
        <input type='text' name='published_year' id='published_year' value='{{ $book->published_year }}'>

        <label for='cover_url'>Cover URL</label>
        <input type='text' name='cover_url' id='cover_url' value='{{ $book->cover_url, 'http://' }}'>

        <label for='info_url'>* Wikipedia URL</label>
        <input type='text' name='info_url' id='info_url' value='{{ $book->info_url, 'http://' }}'>

        <label for='purchase_url'>* Purchase URL </label>
        <input type='text' name='purchase_url' id='purchase_url' value='{{ $book->purchase_url, 'http://' }}'>

        <label for='description'>Description</label>
        <textarea name='description'>{{ $book->description }}</textarea>

        <button type='submit' class='btn btn-primary'>Add These Edits</button>
    </form>
    @if (count($errors) > 0)
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
