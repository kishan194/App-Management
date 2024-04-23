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
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
         <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link id="pagestyle" href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" />
    <style>
            .custom-image {
                width: 100%;
                height: 350px;
                object-fit: cover;
                object-position: center;
            }
            .carousel-inner {
            padding: 1em;
            }
            .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
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
    <div class="container-fluid mt-8" style="width: 100%;">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <img src="{{ asset('img/curved-images/curved4.jpg') }}" class="custom-image" alt="Image 1">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <img src="{{ asset('img/bg1.jpg') }}" class="img-fluid custom-image" alt="Image 2">
                </div>
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
                            <div class="img-wrapper">
                                <img src="{{ asset('logo/' . $item->logo) }}" class="d-block w-40" alt="...">
                            </div>
                        <div class="card-body">
                            <h4 class="card-title">App Name::{{ $item->name }}</h4>
                            <h5 class="card-text">Add on Date:: {{ date('M d, Y', strtotime($item->created_at)) }}</h5>
                        </div>
                        </div>
                    </div>
                @else
                @break
            @endif
        @endforeach
    </div>
                         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                        </button>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endsection



        {{-- <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 3</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 4</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 5</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 6</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 7</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 8</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Card title 9</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> --}}
    
    {{-- <div id="carouselExampleControls" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($app->chunk(1) as $key => $chunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $item)
                            <div class="col mr-3">
                            <a href="{{ route('detail.apps', ['search' => $item->name]) }}" class=""> 
                                <div class="card">
                                    <img src="{{ asset('logo/' . $item->logo) }}" class="img-wrapper" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">Add on date::{{ date('M d, Y', strtotime($item->created_at))}}</p>
                                    </div>
                                </div></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}
    

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
                    600
                );
            }
        });
            $("#carouselExampleControls .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselExampleControls .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                    600
                );
            }
        });
    } else {
            $(multipleCardCarousel).addClass("slide");
    }

  </script>
  @endsection 
   

 {{-- <script>
  var multipleCardCarousel = document.querySelector(
  "#carouselExampleControls"
);
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
        600
      );
    }
  });
  $("#carouselExampleControls .carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
} else {
  $(multipleCardCarousel).addClass("slide");
}
  </script> --}}


{{-- <script>
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
                600
            );
            handleActiveClass(scrollPosition, cardWidth);
        }
    });
    
    $("#carouselExampleControls .carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $("#carouselExampleControls .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                600
            );
            handleActiveClass(scrollPosition, cardWidth);
        }
    });
} else {
    $(multipleCardCarousel).addClass("slide");
}

function handleActiveClass(scrollPosition, cardWidth) {
    var visibleItems = Math.ceil($(".carousel-inner").width() / cardWidth);
    var activeIndex = Math.round(scrollPosition / cardWidth);
    var lastIndex = $(".carousel-item").length - visibleItems;
    
    $(".carousel-item").removeClass("active");
    $(".carousel-item").eq(activeIndex).addClass("active");
    
    $(".carousel-control-prev, .carousel-control-next").show();
    if (activeIndex === 1) {
        $(".carousel-control-prev").hide();
    } else if (activeIndex === lastIndex) {
        $(".carousel-control-next").hide();
    }
}
</script> --}}




    @section('footer')
        @include('Admin.layouts.footer')
    @endsection
