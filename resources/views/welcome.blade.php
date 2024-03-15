<link href="{{asset('css/welcome.css')}}" rel="stylesheet">

<nav class="navbar">
    <div class="navbar-nav">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif

        @if (Route::has('admin.login'))
            @auth('admin')
                <a href="{{ url('/admin/dashboard') }}">Admin Dashboard</a>
            @else
                <a href="{{ route('admin.login') }}">Admin Login</a>
            @endauth
        @endif
    </div>
</nav>
