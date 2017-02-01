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
                <form id="myForm" method="post"> {{--Action is defined by JS function at the bottom--}}
                    {{ csrf_field() }}
                    <input class="input_text" id="input_text" type="text" name="domain" placeholder="Insert domain: domain.com">
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
    <script src="/../../public/js/jquery.min.js"></script>
    <script>
        $(function() {
            $('#myForm').submit(function(){
                var domain = $('#input_text').val();
                $(this).attr('action', "alexa/" + domain);
            });
        });
    </script>
@endsection