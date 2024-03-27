@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

@section('title')
    View App
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
    @include('layouts.sidebar')
@endsection

@section('content')

    <body class="g-sidenav-show   bg-gray-100">
        <main class="main-content position-relative border-radius-lg ">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('search.app') }}" method="GET" class="mb-3">
                                        <div class="input-group align-items-center px-4 mt-3">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search by App Name">
                                            <button type="submit" class="btn btn-primary mt-3">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-header pb-0">
                                <h6>View App</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    App Name</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    App Details</th>

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
                                                    <td class="text-xs font-weight-bold mb-0"><a
                                                            href="{{ route('detail.app', ['search' => $item->name]) }}"
                                                            class="badge badge-sm bg-gradient-primary">Details App</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection

            @section('paginate')
                <div class="paginate">{{ $app->links() }}</div>
            @endsection

            @section('footer')
                @include('Admin.layouts.footer')
            @endsection
</body>

</html>
