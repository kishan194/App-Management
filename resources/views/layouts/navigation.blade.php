  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
                     
    <nav class="navbar navbar-expand-lg blur border-radius-lg z-index-3 shadow py-2  start-0 end-0 mx-3 mt-3 ">
                     <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logos/hyvikk logo.png') }}" class="ml-4" style="width: 30%; height: 60%;" alt="Header Image">
                    </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span> 
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">

                                <li class="nav-item">
                                    </a>
                                </li>

                            </ul>
                        
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="{{ route('View-App') }}" class="nav-link me-2"> <i
                                            class="fa fa-mobile opacity-6 text-dark me-1"></i>All App</a>
                                </li>
                            </ul>

                            <ul class="navbar-nav d-lg-block d-none">
    @guest <!-- Check if the user is a guest (not logged in) -->
    <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link me-2"> <i class="fas fa-key opacity-6 text-dark me-1"></i>Sign In</a>
    </li>
    @else <!-- If the user is logged in -->
    <li class="nav-item">
        <span class="nav-link me-2">Welcome, {{ Auth::user()->name }}</span>
    </li>
    @endguest
</ul>

                        </div>
                </nav>
                    </div>
            
        
          
      