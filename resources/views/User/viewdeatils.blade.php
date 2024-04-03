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

                            <div class="card-header pb-0">
                                <h4>Details App</h4>
                            
     <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($apps as $item)
    <div class="col">
        <div class="card">
            <img src="{{ asset('logo/' . $item->logo) }}" class="card-img-top rounded" width="240px" height="240px" alt="{{ $item->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text"> Description:{{ $item->description }}</p>
                <ul class="list-unstyled">
                    <li>app_id: {{$item->app_id}}</li>
                    <li>Package Name: {{ $item->PackageName }}</li>
                    <li>Publish Status: {{ $item->publish_status }}</li>
                    <li>Version: {{ $item->version_name }}</li>
                    <li>Release Notes: {{ $item->release_notes }}</li>
                </ul>
                <a href="{{ route('apk.download', ['filename' => $item['apk_path']]) }}" class="btn btn-primary">Download APK</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</main>
</body>

      @endsection

   

@section('footer')
       @include('Admin.layouts.footer')
   @endsection
</html>
