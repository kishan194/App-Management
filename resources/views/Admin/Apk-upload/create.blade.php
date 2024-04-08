@extends('Admin.layouts.master')
@section('title')
    Upload Apk
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
<body class="g-sidenav-show bg-gray-100">
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-itmes-center">
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Add Apk</p>
                            <form method="post" action="{{ route('admin.apk.Store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">App Name:</label>
                                            <select class="form-select" id="app_id" name="app_id">
                                                <option value="">Select App</option>
                                                @foreach ($apk as $appId => $appName)
                                                <option value="{{ $appId }}">{{ $appName }}</option>
                                                @endforeach
                                            </select>
                                            @error('app_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">ApkUpload:</label>
                                            <input type="file" class="form-control border" placeholder="Upload Pk" name="apk_path">
                                            @error('apk_path')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Version
                                                Name:</label>
                                            <input class="form-control" type="text" placeholder="Version_name" name="version_name" value="{{ old('version_name') }}">
                                            @error('version_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Release
                                                Notes:</label>
                                            <textarea class="form-control border" name="release_notes">{{ old('release_notes') }}</textarea>
                                            @error('release_notes')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-sm ms-center">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
@endsection

@section('footer')
    @include('Admin.layouts.footer')
@endsection
