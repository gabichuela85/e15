@extends('layouts/main')

@section('title')
@endsection
@section('content')
    <div id='weekly'>
        <div class='daily'>
            <p>{{ $notes }}</p>
            <p>
                @foreach ($items as $item)
                    <input type="checkbox">
                    <label for="option1"> {{ $item }}</label>
                @endforeach
            </p>
            <p>{{ $schedule }}</p>
        </div>
        <div class='daily'>
        </div>
        <div class='daily'>
        </div>
        <div class='daily'>
        </div>
        <div class='daily'>
        </div>
        <div class='daily'>
        </div>
        <div class='daily'>
        </div>
        <div class='daily'>
        </div>
    </div>
@endsection
