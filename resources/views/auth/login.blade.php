@extends('layouts.layout')

@section('content')
<div class="content">
    <div class="left_block"></div>

    <div class="right_block">
        <div class="login_title">Login</div>
        <div class="login_form">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <label id="email_label" for="email">Email *
                    <input id="email" type="text" name="email" value="{{ old('email') }}" required autofocus>
                </label>

                <div class="error">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <label id="password_label" for="password">Password *
                    <input id="password" type="password" name="password">
                </label>

                <div class="error">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="login_button">login</button>
            </form>
        </div>
        <div class="registration_link">
            <a href="{{url('register')}}">Registration</a>
        </div>
    </div>
</div>
@endsection
