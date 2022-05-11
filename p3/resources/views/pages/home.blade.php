@extends('layouts/main')

@section('title')
@endsection
@section('content')
    @if (Auth::user())
        <h2 test='greeting'>
            Hello {{ Auth::user()->name }}!
        </h2>
        <form method='GET' action='/new'>
            <button test='submit' type='submit' class='btn btn-secondary' >Create My Daily Entry</button>
        </form>
    @endif
    <div class='d-flex justify-content-center flex-row flex-wrap'>
        @foreach ($entries as $entry)
            @if ($entry->user->name == Auth::user()->name)
                <a href='daily/{{ $entry['id'] }}'>
                    <div class='entry'>
                        <img src='{{ $entry->pic_url }}'>
                        <h2>{{ $entry->days }}</h2>
                        <p>{{ $entry->notes }}</p>
                        @if ($entry->quote)
                            <p><q>{{ $entry->quote->text }}</q><i>{{ $entry->quote->author }}</i></p>
                        @endif
                    </div>
                </a>
            @endif
        @endforeach
    </div>
@endsection
