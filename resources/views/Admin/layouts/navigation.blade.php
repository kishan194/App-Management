

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
      Dashboard - {{ Auth::user()->name }}
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse"  id="navbarNav">
      <ul class="navbar-nav ml-auto" >
       <li class="nav-item">
          <a class="btn btn-dark" style="margin-left:600px" href="{{ route('admin.dashboard') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark" style="margin-left:5px" href="{{ route('admin.App.index') }}">Manage APP</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark" style="margin-left:5px" href="{{ route('admin.apk.create') }}">Upload Apk</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark" style="margin-left:5px" href="{{ route('admin.apk.Index') }}">Manage Apk</a>
        </li>
        {{-- <li class="nav-item">
          <a class="btn btn-dark" style="margin-left:5px"  href="{{ route('adminprofile.edit') }}">Profile Update</a>
        </li> --}}
         <li class="nav-item">
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" style="margin-left:5px"  class="btn btn-dark">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
