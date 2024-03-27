  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            @if (Auth::check())
    <li class="breadcrumb-item text-sm"><a class="text-white" href="{{ route('dashboard') }}"> User Name : {{ Auth::user()->name }}</a></li>
@else
    <p class="text-white">App Store</p>
@endif
            
          </ol>
          
        </nav>
    </nav>