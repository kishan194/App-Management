@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

@section('title')
     Details App
@endsection

@section('styles')
  

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

@section('sidebar')
      @include('layouts.sidebar')
@endsection

 
 {{-- @section('header')
      @include('layouts.navigation')
 @endsection --}}


@section('content')
<body class="g-sidenav-show   bg-gray-100">
  <main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
        
              <h6>Details App</h6>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <form action="{{ route('search.app') }}" method="GET" class="mr-2">
            <div class="input-group">
                <input type="text" name="search" class="form-control"  style="width: 300px; height:40px ;margin-right:5px; margin-left:5px" placeholder="Search by App Name">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </form>
    </div>
</div>
        <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                   <table class="table align-items-center mb-0">
                      <thead>
                         <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">App Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">ADescription</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">Image</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">Package Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">Publish_Status</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">Download Apk</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">Version_name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width: 100px;">Release_Notes</th>
                        </tr>
                     </thead>
                           @foreach ($apps as $item )
                            <tbody style="text-align:center">
                                 <tr>

                                      <td class="align-middle text-center text-sm">{{ $item->name }}</td> 
                                      <td class="align-middle text-center text-sm"><img src="{{ asset('logo/' . $item->logo) }}" class="rounded-circle" width="50" height="50" alt="{{$item->name}}"></td> 
                                      <td class="align-middle text-center text-sm"><img src="{{ asset('images/' . $item->image) }}" class="rounded-circle" width="50" height="50" alt="{{$item->name}}"></td> 
                                      <td class="align-middle text-center text-sm">{{$item->PackageName}}</</td> 
                                      <td class="align-middle text-center text-sm">{{$item->publish_status}}</td>   
                                      <td class="align-middle text-center text-sm"><a href="{{ route('apk.download', ['filename' => $item['apk_path']]) }}">{{ $item['apk_path'] }}</a></td> 
                                      <td class="align-middle text-center text-sm">{{$item->version_name}}</td> 
                                      <td class="align-middle text-center text-sm">{{$item->release_notes}}</td>        
                                 </tr>  
                              </tbody>   
                       @endforeach
                       </table>
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
</body>

</html>
