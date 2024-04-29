@extends('layouts.master')

@section('title')
    App Store
@endsection

@section('styles')

    <head>
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
         <!-- Nucleo Icons -->
        <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
         <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link id="pagestyle" href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" />
<style>
    .custom-image {
        width: 100%;
        height: 350px;
        object-fit: cover;
        margin:0px;
        display: flex;
    }
    .carousel-inner {
        padding: 1em;
    }
    .card {
        margin: 0 0.5em;
        box-shadow:2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        border: none;
    }
    .carousel-control-prev,
    .carousel-control-next {
        background-color: #e1e1e1;
        width: 6vh;
        height: 6vh;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }
    @media (min-width: 768px) {
        .carousel-item {
            margin-right: 0;
            flex: 0 0 33.333333%;
            display: block;
        }
        .carousel-inner {
            display: flex;
        }
    }
    .card .img-wrapper {
        max-width: 100%;
        height: 13em;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card img {
        max-height: 100%;
    }
    .card {
        width: 100%;
        border-radius:3%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }
    .col-12{
        padding-right:0px;
        padding-left:0px;
        border-radius:5%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        
    }
    @media (max-width: 767px) {
        .card .img-wrapper {
            height: 17em;
        }
    }
</style>
</head>
@endsection

@section('header')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container-fluid mt-8" style="width:100%;">
        <div class="row">        
            <div class="col-12">
                <div class="">
                    <img src="{{asset('img/bg1.jpg') }}" class="custom-image" alt="Image 1">
            </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                    <img src="{{asset('img/bg1.jpg') }}" class="img-fluid custom-image" alt="Image 2">
            </div>
        </div>
    </div>
@endsection

@section('carousel')
<div class="mt-3 mx-4">
    <h1>Newly Added App</h1>
</div>
<div id="carouselExampleControls" class="carousel slide">
    <div class="carousel-inner">
        <?php $counter = 0; ?>
        @foreach ($app as $item)
        <?php $counter++; ?>
        @if($counter <= 5)
        <div class="carousel-item">
            <div class="card mr-1" style="max-width:80%">
                <a href="{{route('detail.apps', ['search' => $item->name]) }}" class="text-decoration-none">
                    <div class="img-wrapper">
                        <img src="{{asset('logo/' . $item->logo) }}" class="d-block w-40 enlarge-img" alt={{$item->name}}>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">App Name::{{ $item->name }}</h4>
                        <h5 class="card-text">Added on::{{ date('M d, Y', strtotime($item->created_at)) }}</h5>
                   </div>
                </a>
            </div>
        </div>
        @else
        @break
        @endif
        @endforeach
    </div> 
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endsection

@section('script')
<script>
    var multipleCardCarousel = document.querySelector("#carouselExampleControls");
    if (window.matchMedia("(min-width: 768px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarousel, {
            interval: false,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $("#carouselExampleControls .carousel-control-next").on("click", function () {
            if (scrollPosition < carouselWidth - cardWidth * 4) {
                scrollPosition += cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    900
                );
            }
        });
        $("#carouselExampleControls .carousel-control-prev").on("click", function () {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    900
                );
            }
        });
} else {
        $(multipleCardCarousel).addClass("slide");
    }
</script>
<script>    
    $(document).ready(function () {
        $(".enlarge-img").hover(function () {
            $(this).css("transform", "scale(1.3)");
        }, function () {
            $(this).css("transform", "scale(1)"); 
        });
    });
</script>
@endsection

@section('footer')
    @include('Admin.layouts.footer')
@endsection
