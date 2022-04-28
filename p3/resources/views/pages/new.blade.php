@extends('layouts/main')

@section('title')
    New Daily Entry
@endsection

@section('content')
    This is where users will create a new daily Entry
    <br>
    @if ($notes)
        <br>
        you checked the notes box
    @endif
    @if ($taskList)
        <br>
        you checked the task list
    @endif
    <br>
    @if ($schedule)
        you checked the schedule
    @endif
@endsection
