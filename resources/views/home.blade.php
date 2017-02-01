@extends('layouts.layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="content">
        <div class="top-content">
            <div class="header">
                @include('common.header')
            </div>
            <div class="search">
                <form method="get" action="{{ url('/alexa/') }}">
                    <input class="input_text" type="text" name="domain" placeholder="Insert domain: domain.com">
                    <button class="input_submit">Check</button>
                </form>
            </div>
        </div>

        <div class="bottom_content">
            <div class="bottom_content_wrapper">
                <div>
                    <img src="../../public/image/icon.png">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pulvinar dolor odio,
                        sed faucibus nisl commodo sed. Duis elementum eu ligula at interdum. Sed id libero enim.</p>
                    <button>Button</button>
                </div>
                <div>
                    <img src="../../public/image/icon.png">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pulvinar dolor odio,
                        sed faucibus nisl commodo sed. Duis elementum eu ligula at interdum. Sed id libero enim.</p>
                    <button>Button</button>
                </div>
                <div>
                    <img src="../../public/image/icon.png">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pulvinar dolor odio,
                        sed faucibus nisl commodo sed. Duis elementum eu ligula at interdum. Sed id libero enim.</p>
                    <button>Button</button>
                </div>
            </div>
        </div>

        @include('common.footer')
    </div>
@endsection