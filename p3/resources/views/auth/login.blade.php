@extends('layouts/main')

@section('title')
    Login
@endsection
@section('content')
    <h1>Login</h1>

    Don’t have an account? <a href='/register'>Register here...</a>

    <form method='POST' action='/login'>

        {{ csrf_field() }}
        <div class='form-group row'>
            <label for='email' class='col-sm-2 col-form-label'>E-Mail Address</label>
            <div class='col-sm-10'>
                <input id='email' type='email' name='email' value='{{ old('email') }}' autofocus>
                @include('includes.error-field', ['fieldName' => 'email'])
            </div>
        </div>
        <div class='form-group row'>
            <label class='col-sm-2 col-form-label' for='password'>Password</label>
            <div class='col-sm-10'>
                <input id='password' type='password' name='password'>
                @include('includes.error-field', ['fieldName' => 'password'])
            </div>
        </div>
        <div class='form-group row'>
            <label class='col-sm-2 col-form-label'>
                <div class='col-sm-10'>
                    <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
                </div>
            </label>
        </div>
        <button type='submit' class='btn btn-primary'>Login</button>

        </a>

    </form>
@endsection
