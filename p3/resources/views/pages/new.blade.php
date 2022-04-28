@extends('layouts/main')

@section('title')
    New Daily Entry
@endsection

@section('content')
    This is where users will create a new daily Entry
    <form method='POST' action='/'>
        {{ csrf_field() }}
        @if ($toDoList)
            <label for='toDoList'>Write out your To Do List here. Separate each item with a comma</label>
            <input type='text' id='toDoList' name='toDoList'>
        @endif
        <br>
        @if ($schedule)
        <div id='task'>
            <label for='schedule'>Time: </label>
            <select name='schedule' id='schedule'>
                <option value='12'>12</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
            </select>
            <select name='earlyLate' id='earlyLate'>
                <option value='AM'>AM</option>
                <option value='PM'>PM</option>
            </select>
            <input name='task' id='task' type='text'>
        </div>
        @endif
        @if ($notes)
            <br>
            <label for='notes'>Notes for Today</label>
            <input type='textarea' id='notes' name='notes'>
        @endif
        <br>
        <button type='submit'></button>
    </form>
@endsection
