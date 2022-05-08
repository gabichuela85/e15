@extends('layouts/main')
@section('head')
@endsection
@section('content')
    @if (Auth::user())
        <h2>
            Hello {{ Auth::user()->name }}!
        </h2>
        <form method='GET' action='/new'>
            <button type='submit' class='btn btn-secondary'>Create My Daily Entry</button>
        </form>
    @endif
@endsection
