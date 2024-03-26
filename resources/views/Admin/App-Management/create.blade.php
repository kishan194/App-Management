@extends('Admin.layouts.master')
@section('title')
     ADD APP
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
      @include('Admin.layouts.navigation')
 @endsection

 @section('sidebar')
      @include('Admin.layouts.sidebar')
 @endsection

 @section('content')

<body class="g-sidenav-show   bg-gray-100">
  <main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                  <h6>Add New App</h6>
            </div>      
            <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
          <form method="post" action="{{  route('admin.App.Store') }}" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" style="margin-left:10px" class="form-control-label">App Name:</label>
                    <input class="form-control" style="margin-left:5px" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                      @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input"  class="form-control-label">Description:</label>
                    <textarea class="form-control"    placeholder="Description" name="description">{{ old('description') }}</textarea>
                      @error('description')
                    <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                </div>              

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" style="margin-left:10px"  class="form-control-label">Logo:</label>
                    <input class="form-control" style="margin-left:5px" id="logo" name="logo" type="file">
                      @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Image:</label>
                    <input class="form-control" name="image" type="file">
                       @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" style="margin-left:10px" class="form-control-label">Package Name:</label>
                    <input type="text" class="form-control border" style="margin-left:5px" placeholder="Package Name" name="PackageName" value="{{ old('PackageName') }}">
                      @error('PackageName')
                    <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Meta Keywords:</label>
                    <input class="form-control" type="text" placeholder="Meta Keywords" name="meta_keywords" value="{{ old('meta_keywords') }}">
                    @error('meta_keywords')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" style="margin-left:10px" class="form-control-label">Meta Description:</label>
                   <textarea class="form-control border" style="margin-left:5px" placeholder="Meta Description" name="meta_description">{{ old('meta_description') }}</textarea>
                     @error('meta_description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                   <label for="example-text-input" class="form-control-label">Publish Status:</label>
                  <label for="publish_status"></label>
                     <select class="form-control border" name="publish_status">
                    <option value="published">Published</option>
                    <option value="unpublished">Unpublished</option>
                </select>
                @error('publish_status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>
                   <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-info" style="width: 100px; text-align:center;">Submit</button>
                </div>
            </div>

 @endsection
 @section('footer')
   @include('Admin.layouts.footer')
@endsection

