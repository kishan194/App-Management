@extends('Admin.layouts.master')
@section('title')
      Admin DashBoard
@endsection

@section('styles')
      <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
   
  </title>
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
 
 @section('header')
     
 @endsection

 @section('sidebar')
      @include('Admin.layouts.sidebar')
 @endsection



{{-- 

@extends('Admin.layouts.master')

@section('title')
      ApkIndex
@endsection

@section('styles')
 <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('header')
     @include('Admin.layouts.navigation')
@endsection

@section('search')
<h1>View Apk</h1>
<form action="{{ route('admin.search.apk') }}" method="GET"  class="ml-3">
    <input  type="text" name="search" class="search"  placeholder="Search by Apk Name">
    <button type="submit" class="btn btn-info" id="btn-search">Search</button>
</form>
@endsection
@section('content')
       <div class="container">
        <h1>Filtered APKs</h1>
      <form action="{{ route('admin.filter.apk') }}" method="GET" class="form-inline mb-3">
    <div class="form-group mr-2">
        <select name="filter" class="form-control">
            <option value="">Select App</option>
            @foreach ($appNames as $appId => $appName)
                <option value="{{ $appId }}" @if(request('filter') == $appId) selected @endif>{{ $appName }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>
        
        <table class="table">
            <thead>
                <tr>
                    <th>App Name</th>
                    <th>APK Path</th>
                    <th>Version Name</th>
                    <th>Release Notes</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filteredApks as $apk)
                    <tr>
                        <td>{{ $appNames[$apk->app_id] }}</td>
                        <td>{{ $apk->apk_path }}</td>
                        <td>{{ $apk->version_name }}</td>
                        <td>{{ $apk->release_notes }}</td>
                        <td><a href="{{ route('admin.update.apk', ['id' => $apk->id]) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ route('admin.Delete.apk', ['id' => $apk->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
     
    </div>
@endsection 
@section('script')
  <script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 4000); 
</script>
@endsection  

@section('footer')
   @include('Admin.layouts.footer')
@endsection

 --}}
