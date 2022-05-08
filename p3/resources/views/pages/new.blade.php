@extends('layouts/main')

@section('title')
    New Daily Entry
@endsection

@section('content')
    <h1>New Entry</h1>
    <form method='POST' action='/home'>
        {{ csrf_field() }}

        <div class='form-group row'>
            <label for='days' class='col-sm-2 col-form-label'>Day of the Week</label>
            <div class='col-sm-10'>
                <select id='days' name='days'>
                    <option value='Monday'>Monday</option>
                    <option value='Tuesday'>Tuesday</option>
                    <option value='Wednesday'>Wednesday</option>
                    <option value='Thursday'>Thursday</option>
                    <option value='Friday'>Friday</option>
                    <option value='Saturday'>Saturday</option>
                    <option value='Sunday'>Sunday</option>
                </select>
            </div>
        </div>
        <div class='form-group row'>
            <label for='notes' class='col-sm-2 col-form-label'>Notes</label>
            <div class='col-sm-10'>
                <textarea name='notes' id='notes'>{{ old('notes') }}</textarea>
            </div>
        </div>
        <div class='form-group row'>
            <label for='pic_url' class='col-sm-2 col-form-label'>Pic URL of the Day</label>
            <div class='col-sm-10'>
                <input type='text' name='pic_url' id='pic_url' value='{{ old('pic_url') }}'>
            </div>
        </div>
        <div class='form-group row'>
            <label for="quote" class='col-sm-2 col-form-label'>Include daily Quote</label>
            <div class='col-sm-10'>
                <input type="checkbox" id="quote" name="quote" value="quote">
            </div>
        </div>
        <button type='submit' class='btn btn-secondary'>Create Entry</button>
    </form>
@endsection
