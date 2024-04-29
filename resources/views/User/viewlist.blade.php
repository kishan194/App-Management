@extends('layouts.master')

@section('title')
    All Apps
@endsection

@section('styles')
    <head>
        <!-- Add CSS links or stylesheets here -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Argon Dashboard CSS -->
        <link id="pagestyle" href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" />
    </head>
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')

<body class="g-sidenav-show bg-gray-100">
   <main class="main-content position-relative border-radius-lg">
    <div class="container-fluid py-4">
     <div class="row">
      <div class="col-12">
       <div class="card mb-4">
        <div class="card-header pb-0">
         <div class="row">
          <div class="col-lg-12">
            <form action="{{ route('search.app') }}" method="GET" class="mb-3">
              <div class="input-group align-items-center px-4 mt-3">
                <input type="text" name="search" class="form-control" placeholder="Search by App Name">
                  <button type="submit" class="btn btn-primary mt-3">Search</button>
              </div>
            </form>
           </div>
          </div>
            <div class="card-header pb-0">
               <h4>All Apps</h4>
            </div>
       <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($app as $item)
          <div class="col">
            <a href="{{ route('detail.app', ['search' => $item->name]) }}" class="text-decoration-none">
              <div class="card h-100" style="border-radius: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <img src="{{ asset('logo/' . $item->logo) }}" class="card-img-top mt-3" style="width: 143.5px; height: 143.5px; border-radius: 50%;" alt="...">
                 <div class="card-body text-center">
                    <h5 class="card-title">{{ $item->name }}</h5>
                     <strong>Version Name:</strong> {{ $item->version_name }}
                      <h6 class="card-title">Last Updated:
                       {{ date('M d, Y', strtotime($item->updated_at)) }}</h6>
                 </div>
              </div></a>
           </div>
        @endforeach
        </div>
       </div>
     </div>
   </div>
 </div>
</main>
    @endsection
</body>
@section('footer')
    @include('Admin.layouts.footer')
@endsection
