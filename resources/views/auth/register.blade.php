@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

@section('title')
      Sign-Up
@endsection

@section('styles')
  

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
        
  </title>
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('css/argon-dashboard.css')}}" rel="stylesheet" />
</head>
@endsection

@section('header')
    @include('layouts.navbar')
@endsection

@section('content')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                     <form method="POST" action="{{ route('register') }}">
                   @csrf
                   
                    <div class="mb-3">
                          <input id="name" class="form-control form-control-lg" placeholder="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
                             @error('name')
                               <div class="text-danger">{{ $message }}</div>
                             @enderror
                     </div>

               <div class="mb-3">
                          <input id="email" class="form-control form-control-lg" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                             @error('email')
                               <div class="text-danger">{{ $message }}</div>
                             @enderror
                </div>
                     <div class="mb-3">
                          <input id="password" class="form-control form-control-lg" placeholder="password"  type="password" name="password" required autocomplete="current-password" />
                             @error('password')
                               <div class="text-danger">{{ $message }}</div>
                             @enderror
                     </div>

                    <div class="mb-3">
                          <input id="password_confirmation" class="form-control form-control-lg" placeholder="Confirm password"  type="password" name="password_confirmation" required autocomplete="new-password" />
                             @error('password_confirmation')
                               <div class="text-danger">{{ $message }}</div>
                             @enderror
                     </div>

                    <div class="block mt-4">
                         <label for="remember_me" class="inline-flex items-center">
                     <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                             <span class="ms-2 text-sm text-gray-600">Remeber Me</span>
                        </label>
                     </div>
                     <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
                    </div>

                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Already Account
                    <a href="{{route('login')}}" class="text-primary text-gradient font-weight-bold">Sign In</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
@endsection
@section('footer')
    @include('Admin.layouts.footer')
@endsection
