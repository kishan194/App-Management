@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

@section('title')
    login
@endsection

@section('styles')
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


    
    
    <link href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" />

    <style>
     
        .custom-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            object-position: center;
        }
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl{
            padding: 0px !important;
        }
        .row, .col-12{ 
            padding: 0px !important; 
            margin-left: 0px !important; 
            margin-right: 0px !important; 
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
            <img src="{{ asset('img/curved-images/curved4.jpg') }}" class="img-fluid custom-image" alt="Image 1">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <img src="{{ asset('img/bg1.jpg') }}" class="img-fluid custom-image" alt="Image 2">
        </div>
    </div>
</div>
{{-- <div class="row mt-4">
    <div class="col-12">
        @php
            // Sort the apps by creation date (ascending order)
            $sortedApps = $app->sortBy('created_at')->take(5);
        @endphp

        @foreach ($sortedApps as $item)
        <div class="item">
            <img src="{{ asset('logo/' . $item->logo) }}" alt="{{ $item->name }}">
            <h4>{{ $item->name }}</h4>
            <p>Added On: {{ date('M d, Y', strtotime($item->created_at)) }}</p>
        </div>
        @endforeach
    </div>
</div>--}}
{{-- <div class="row">
          <div class="owl-carousel owl-theme">
                <div class="item">
                     <div class="card">
                          <img src="{{asset('img/carousel-2.jpg')}}" class="card-img-top">
                              <div class="card-body">
                              <h4>Owl show</h4>
                     </div>
                
</div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
 $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script> --}}

@endsection

@section('footer')
@include('Admin.layouts.footer')
@endsection
