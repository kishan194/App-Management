@extends('Admin.layouts.master')
@section('title')
    Edit App
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
        <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" />
    </head>
@endsection

@section('header')
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
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-itmes-center">
                                </div>
                            </div>
                            <div class="card-body ">
                                <p class="text-uppercase text-sm">Edit App</p>
                                <form method="post" action="{{ route('admin.edit.app', $data->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">App Name:</label>
                                                <input class="form-control" type="text" placeholder="Name" name="name"
                                                    value="{{ $data->name }}">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Description:</label>
                                                <textarea class="form-control" placeholder="Description" name="description">{{ old('description', $data->description) }}</textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Logo:</label>
                                                <input class="form-control" id="logo" name="logo" type="file">
                                                @if ($data->logo)
                                                    <img src="{{ asset('logo/' . $data->logo) }}" width="100"
                                                        alt="Current Logo">
                                                @endif
                                                @error('logo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Image:</label>
                                                <input class="form-control" name="image" type="file">
                                                @if ($data->image)
                                                    <img src="{{ asset('images/' . $data->image) }}" width="100"
                                                        alt="Current Image">
                                                @endif
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Package
                                                    Name:</label>
                                                <input type="text" class="form-control border" placeholder="Package Name"
                                                    name="PackageName" value="{{ $data->PackageName }}">
                                                @error('PackageName')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Meta
                                                    Keywords:</label>
                                                <input class="form-control" type="text" placeholder="Meta Keywords"
                                                    name="meta_keywords" value="{{ $data->meta_keywords }}">
                                                @error('meta_keywords')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Meta
                                                    Description:</label>
                                                <textarea class="form-control border" placeholder="Meta Description" name="meta_description">{{ old('description', $data->meta_description) }}</textarea>
                                                @error('meta_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Publish
                                                    Status:</label>
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
                                            <button type="submit"
                                                class="btn btn-primary btn-sm ms-center">Submit</button>
                                        </div>
                                    </div>
        </main>
    @endsection
    @section('footer')
        @include('Admin.layouts.footer')
    @endsection
