

    <div class="container z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                 <!-- Navbar -->
               <nav
                    class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
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
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link me-2"> <i
                                            class="fas fa-key opacity-6 text-dark me-1"></i>Sign In</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>