@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

@section('title')
     Details App
@endsection

@section('styles')
  

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('css/argon-dashboard.css')}}" rel="stylesheet" />
  
</head>
@endsection

@section('sidebar')
      @include('layouts.sidebar')
@endsection

 
 {{-- @section('header')
      @include('layouts.navigation')
 @endsection --}}


@section('content')
 <body class="g-sidenav-show   bg-gray-100">
        <main class="main-content position-relative border-radius-lg ">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                            </div>
                            {{-- <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('search.app') }}" method="GET" class="mb-3">
                                        <div class="input-group align-items-center px-4 mt-3">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search by App Name">
                                            <button type="submit" class="btn btn-primary mt-3">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}

<style>

.carousel-container {
    overflow-x: auto;
    white-space: nowrap;
}

.carousel-inner {
    display: inline-block;
}

.carousel-inner img {
    margin-right: 10px; /* Adjust margin between images as needed */
}
.enlarge-on-hover {
    transition: transform 0.3s ease-in-out;
}

.enlarge-on-hover:hover {
    transform: scale(1.2);
}

</style>
      <div class="card-header pb-0">
    <div class="row align-items-center">
          </div>
</div>
        @php
            // Find the highest version_name
            $highestVersion = $apps->max('version_name');
        @endphp
       <div class="col mx-5 mb-5">
    @foreach ($apps as $item)
        @if ($item->version_name == $highestVersion)
            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $item->name }}</h1>
                    <p>Description: {{ $item->description }}</p>
                    <p>
                        <span>Version: {{ $item->version_name }}</span> |
                        <span>Package Name: {{ $item->PackageName }}</span> |
                        <span>Publish Status: {{ $item->publish_status }}</span>
                        
                    </p>
                    <p>Release Notes: {{ $item->release_notes }}</p>
                    
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" class="enlarge-on-hover" style="border-radius: 20px;"><br><br>

                    <a href="{{ route('apk.download', ['filename' => $item['apk_path']]) }}" class="btn btn-primary download-link">Download APK</a>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('logo/' . $item->logo) }}" alt="{{ $item->name }}" style="max-height: 200px; border-radius: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                </div>
            </div>
            <div class="col">
                   
            </div>
</div>
        @endif
    @endforeach
</div>

  

                          {{--   <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">Description: {{ $item->description }}</p>
                                    <p class="card-text">
                                        <span>Version: {{ $item->version_name }}</span> |
                                        <span>Package Name: {{ $item->PackageName }}</span> |
                                        <span>Publish Status: {{ $item->publish_status }}</span>
                                    </p>
                                    <p class="card-text">Release Notes: {{ $item->release_notes }}</p>
                                    <a href="{{ route('apk.download', ['filename' => $item['apk_path']]) }}" class="btn btn-primary download-link">Download APK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
    </div>
</div> --}}


</div>
</main>
</body>

      @endsection

   

@section('footer')
       @include('Admin.layouts.footer')
   @endsection
</html>
