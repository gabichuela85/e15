@extends('layouts/main')


@section('content')
    <p>Welcome to bookmark please check back later once we add books to our library</p>

    <form method='GET' action='/search'>

        <h2>Search for a book to add to your list</h2>

        <fieldset>
            <label for='searchTerms'>
                Search terms:
                <input type='text' name='searchTerms' value='{{ $searchTerms }}'>
            </label>
        </fieldset>

        <fieldset>
            <label>
                Search type:
            </label>

            <input type='radio' name='searchType' id='title' value='title'
                {{ ($searchType == 'title' or is_null($searchType)) ? 'checked' : '' }}>
            <label for='title'> Title</label>

            <input type='radio' name='searchType' id='author' value='author'
                {{ $searchType == 'author' ? 'checked' : '' }}>
            <label for='author'> Author</label>

        </fieldset>
        <input type='checkbox' name='case-sensitive'> Case sensitive
        <button type='submit' class='btn btn-primary'>Search</button>

    </form>

    @if (!is_null($searchResults))
        @if (count($searchResults) == 0)
            <div class='results alert alert-warning'>
                No results found.
            </div>
        @else
            <div class='results alert alert-primary'>

                {{ count($searchResults) }}
                {{ Str::plural('Result', count($searchResults)) }}:

                <ul class='clean-list'>
                    @foreach ($searchResults as $slug => $book)
                        <li><a href='/books/{{ $slug }}'> {{ $book['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif
    @if (count($errors) > 0)
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
