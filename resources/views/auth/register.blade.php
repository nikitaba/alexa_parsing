@extends('layouts.layout')

@section('content')

<div class="content">
    <div class="left_block"></div>

    <div class="right_block">
        <div class="register_title">Registration</div>
        <div class="register_form">
            <form role="form" method="post" action="{{ url('/register') }}">
                {{ csrf_field() }}

                <label id="username_label" for="username">Username *
                    <input id="username" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </label>

                <div class="error">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <label id="email_label" for="email">Email *
                    <input id="email" type="text" name="email">
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

                <label id="confirm_password_label" for="confirm_password">Confirm Password *
                    <input id="confirm_password" type="password" name="password_confirmation">
                </label>

                <button type="submit" class="register_button">register</button>
            </form>
        </div>
        <div class="login_link">
            <a href="{{url('login')}}">Login</a>
        </div>
    </div>
</div>
@endsection
