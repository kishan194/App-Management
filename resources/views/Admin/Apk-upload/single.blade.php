@extends('Admin.layouts.master')
@section('title')
      View Apk
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
              <h6>View Apk</h6>
            </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
        <div>

          </div>
</div>
         <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                   <table class="table align-items-center mb-0">
                      <thead>
                         <tr>

                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">App Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">APK Download</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Version Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Release Notes</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>

                        </tr>
                     </thead>
                @foreach ($apk as $item )
                   <tbody style="text-align:center">
                    <tr>
                    
                                      <td class="align-middle text-center text-sm">{{ $appName[$item->app_id] }}</td> 
                                      <td class="align-middle text-center text-sm"><a href="{{ route('admin.apk.download', ['filename' => $item->apk_path]) }}" >{{ $item->apk_path }}</a></td> 
                                      <td class="align-middle text-center text-sm">{{$item->version_name}}</td>
                                      <td class="align-middle text-center text-sm">{{$item->release_notes}}</td> 
                                       <td class="align-middle text-center text-sm"><a href="{{ route('admin.update.apk', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a></td>
                                      <td class="align-middle text-center text-sm"><a href="{{route('admin.Delete.apk',['id' => $item->id])}}" class="btn btn-danger">Delete</a></td>
                                 </tr>  
                              </tbody>   
                       @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
@section('footer')
   @include('Admin.layouts.footer')
@endsection