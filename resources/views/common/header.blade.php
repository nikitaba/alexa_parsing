<div class="alexa_parsing">
    <a href="{{url('home')}}">Alexa parsing</a>
</div>
<div class="logout_button">
    <a href="{{ url('/logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>