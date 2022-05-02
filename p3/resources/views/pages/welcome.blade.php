@extends('layouts/main')
@section('head')


@endsection
@section('content')
    <h1>This is the Welcome Page</h1>
    <form method='GET' action='/new'>
        <input type="checkbox" id="option1" name="option1" value="Task List">
        <label for="option1"> Task List</label><br>
        <input type="checkbox" id="option2" name="option2" value="Schedule">
        <label for="option2"> Schedule</label><br>
        <input type="checkbox" id="option3" name="option3" value="Notes">
        <label for="Notes"> Notes</label><br>
        <button type='submit'>Start my daily spread</button>
    </form>
@endsection
