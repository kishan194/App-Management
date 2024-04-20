@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

@section('title')
    App Store
@endsection

@section('styles')

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <!-- Bootstrap JavaScript files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" />

        <style>
            .custom-image {
                width: 100%;
                height: 350px;
                object-fit: cover;
                object-position: center;
            }

            .container,
            .container-fluid,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl {
                padding: 0px !important;
            }

            .row,
            .col-12 {
                padding: 0px !important;
                margin-left: 0px !important;
                margin-right: 0px !important;
            }

            .card {
                padding=0;
            }

            .card-wrapper {}
        </style>
    </head>
@endsection

@section('header')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container-fluid mt-8" style="width: 100%;">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('img/curved-images/curved4.jpg') }}" class="custom-image" alt="Image 1">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <img src="{{ asset('img/bg1.jpg') }}" class="img-fluid custom-image" alt="Image 2">
            </div>
        </div>
    </div>
@endsection

@section('carousel')
    <div id="carouselExampleControls" class="carousel carousel-dark slide mt-6" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php $chunks = $app->chunk(4)->take(2); @endphp <!-- Limit the chunks to 2 -->
            @foreach ($chunks as $key => $chunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="card-wrapper container-sm d-flex justify-content-around">
                        @foreach ($chunk as $item)
                            <div class="card mb-3" style="width: 18rem;">
                               <a href="{{ route('detail.app', ['search' => $item->name]) }}" class="text-decoration-none">
                                <img src="{{ asset('logo/' . $item->logo) }}" class="card-img-top" alt="App Logo"
                                    style="object-fit: fill; height: 200px;"> <!-- Adjust the height as needed -->
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">Added On {{ date('M d, Y', strtotime($item->created_at)) }}</p>
                                </div></a>
                            </div>
                        @endforeach
                    </div>
                </div> 
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon mr-3" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon ml-3" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
@endsection



    {{-- @section('script')
    <script>
    $(document).ready(function() {
        $('#carouselExampleIndicators2').carousel();
    });
</script> --}}




    @section('footer')
        @include('Admin.layouts.footer')
    @endsection
