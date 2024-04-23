 @extends('Admin.layouts.master')
 @section('title')
     Manage Apk
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
                                     <form action="{{ route('admin.filter.apk') }}" method="GET">
                                         <div class="input-group align-items-center px-4">
                                             <select id="filter" name="filter" class="form-select">
                                                 <option value="name">Filter by App Name</option>
                                                 @foreach ($appNames as $appId => $appName)
                                                     <option class="ofilter" value="{{ $appId }}"
                                                         @if (request('filter') == $appId) selected @endif>
                                                         {{ $appName }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                             <button type="submit" id="btnfilter"
                                                 class="btn btn-primary mt-3">Filter</button>
                                         </div>
                                     </form>
                                 </div>


                                 <div class="col-lg-6">
                                     <form action="{{ route('admin.search.apk') }}" method="GET">
                                         <div class="input-group align-items-center px-4 ">
                                             <input type="text" name="search" class="form-control"
                                                 placeholder="Search by App Name">
                                             <button type="submit" class="btn btn-info mt-3">Search</button>
                                         </div>
                                     </form>
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
                                                     APK Download</th>
                                                 <th
                                                     class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                     Version Name</th>
                                                 <th
                                                     class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                     Release Notes</th>
                                                 <th
                                                     class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                     Create Date</th>
                                                 <th
                                                     class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                     Edit</th>
                                                 <th
                                                     class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                     Delete</th>

                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach ($filteredApks as $apk)
                                                 <tr>

                                                     <td>
                                                         <div class="d-flex px-3 py-1">
                                                             <div>
                                                                 {{ $appNames[$apk->app_id] }}
                                                             </div>
                                                             <div class="d-flex flex-column justify-content-center">
                                                             </div>
                                                         </div>
                                                     </td>


                                                     <td class="text-xs font-weight-bold mb-0"><a
                                                             href="{{ route('admin.apk.download', ['filename' => $apk->apk_path]) }}">{{ $apk->apk_path }}</a>
                                                     </td>
                                                     <td class="text-xs font-weight-bold mb-0">{{ $apk->version_name }}
                                                     </td>
                                                     <td class="text-xs font-weight-bold mb-0">{{ $apk->release_notes }}
                                                     </td>
                                                      <td class="text-xs font-weight-bold mb-0">{{ $apk->created_at }}
                                                     </td>

                                                     <td class="align-middle text-center text-sm"><a
                                                             href="{{ route('admin.update.apk', ['id' => $apk->id]) }}"
                                                             class="badge badge-sm bg-gradient-secondary">Edit</a></td>
                                                     <td class="align-middle text-center text-sm"> <a
                                                             href="{{ route('admin.Delete.apk', ['id' => $apk->id]) }}"
                                                             class="badge badge-sm bg-gradient-success">Delete</a></td>
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
                 <div class="paginate">{{ $filteredApks->links() }}
                 </div>
             @endsection
             @section('script')
                 <script>
                     setTimeout(function() {
                         document.getElementById('success-message').style.display = 'none';
                     }, 4000);
                 </script>
             @endsection

             @section('footer')
                 @include('Admin.layouts.footer')
             @endsection
