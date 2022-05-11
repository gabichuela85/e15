@extends('layouts/main')

@section('head')
@endsection
@section('title')
    {{ $single->days }}
@endsection
@section('content')
    <div class='d-flex justify-content-center flex-row'>
        <div class='single'>
            <img src='{{ $single->pic_url }}' alt='kitten'>
            <h2>{{ $single->days }}</h2>
            <p>{{ $single->notes }}</p>
            <p><q>{{ $single->quote->text }}</q><i>{{ $single->quote->author }}</i></p>
        </div>
    </div>
    <a href='daily/{{$single->id}}/edit}}'>Edit my Entry</a>
@endsection
