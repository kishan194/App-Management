@extends('Admin.layouts.master')

<!DOCTYPE html>
<html lang="en">

@section('title')
    Manage App
@endsection

@section('styles')

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
                                @if (session('success'))
                                    <div id="success-message" class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('admin.search.app') }}" method="GET">
                                        <div class="input-group align-items-center px-4">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search by App Name">
                                            <button type="submit" class="btn btn-primary mt-3">Search</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center px-4 mt-4">
                                        <a href="{{ route('admin.App.create') }}" class="btn btn-primary btn-sm ms-auto">ADD
                                            App</a>
                                    </div>
                                </div>


                            </div>

                            <div class="card-header pb-0">
                                <h6>Manage App</h6>
                            </div>

                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    App Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Description</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Logo</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Image</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Package Name</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs opacity-7">
                                                    Meta Keywords</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs  opacity-7">
                                                    Meta Description</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs  opacity-7">
                                                    Publish Status</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs opacity-7">
                                                    Release Apk</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs  opacity-7">
                                                    Edit</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs  opacity-7">
                                                    Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($app as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            <div>
                                                                {{ $item->name }}
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-xs font-weight-bold mb-0">{{ $item->description }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-sm"><img
                                                                src="{{ asset('logo/' . $item->logo) }}"
                                                                class="rounded-circle" width="50" height="50"
                                                                alt="Example Image"></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><img
                                                                src="{{ asset('images/' . $item->image) }}"
                                                                class="rounded-circle" width="50" height="50"
                                                                alt="Example Image"></span>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $item->PackageName }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0 px-3">
                                                            {{ $item->meta_keywords }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0 px-3">
                                                            {{ $item->meta_description }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0 px-3">
                                                            {{ $item->publish_status }}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm"><a
                                                            href="{{ route('admin.single.apk', ['id' => $item->id]) }}"class="badge badge-sm bg-gradient-success">Release Apk</a>
                                                    </td>
                                                    <td class="align-middle text-center text-sm"><a
                                                            href="{{ route('admin.update.app', ['id' => $item->id]) }}"
                                                            class="badge badge-sm bg-gradient-secondary">Edit</a></td>
                                                    <td class="align-middle text-center text-sm"> <a
                                                            href="{{ route('admin.Delete.app', ['id' => $item->id]) }}"
                                                            class="badge badge-sm bg-gradient-success">Delete</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        
    @endsection
    @section('script')
        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 4000);
        </script>
    @endsection

    @section('paginate')
        <div class="paginate" style="color:white;">{{ $app->links() }}</div>
    @endsection

    @section('footer')
        @include('Admin.layouts.footer')
    @endsection
</body>

</html>
    