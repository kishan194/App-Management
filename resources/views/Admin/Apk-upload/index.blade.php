 @extends('Admin.layouts.master')
@section('title')
      Admin DashBoard
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
            @if(session('success'))
              <div id="success-message" class="alert alert-success">
               {{ session('success') }}
             </div>
          @endif
              <h6>Manage Apk</h6>
            </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
        <style>
        .btnf {
    margin-left:265px;
    margin-top:3px;
}

#filter {
    margin-bottom: -43px;
    width:250px;
}
.form{
    margin-bottom: -20px;
}
.input-group{
    margin-bottom:25px;
}


        </style>
        <form action="{{ route('admin.filter.apk') }}" method="GET" class="form-inline mb-3">
                        <select id="filter" style="margin-left:5px"  name="filter" class="form-control">
                                <option  value="name">Filter by App Name</option>
                                    @foreach ($appNames as $appId => $appName)
                                <option class="ofilter"  value="{{ $appId }}" @if(request('filter') == $appId) selected @endif>{{ $appName }}</option>
                                    @endforeach    
                        </select>
                        <div class="btnf">
                        <button type="submit"id="btnfilter" class="btn btn-primary">Filter</button>
                        </div>
        
        </div>
    <div>
    <div>
     <form action="{{ route('admin.search.apk') }}" method="GET" class="mr-2">
            <div class="input-group">
                <input type="text" name="search" class="form-control"  style="width: 300px; height:40px ;margin-right:5px;" placeholder="Search by App Name">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </form>
       
                  </div>

     
          

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
                           <tbody>
                @foreach ($filteredApks as $apk)
                    <tr>
                    
                                      <td class="align-middle text-center text-sm">{{ $appNames[$apk->app_id] }}</td> 
                                      <td class="align-middle text-center text-sm"><a href="{{ route('admin.apk.download', ['filename' => $apk->apk_path]) }}" >{{ $apk->apk_path }}</a></td> 
                                      <td class="align-middle text-center text-sm">{{ $apk->version_name }}</td>
                                      <td class="align-middle text-center text-sm">{{ $apk->release_notes }}</td> 
                                       <td class="align-middle text-center text-sm"><a href="{{ route('admin.update.apk', ['id' => $apk->id]) }}" class="btn btn-primary">Edit</a></td>
                                      <td class="align-middle text-center text-sm"> <a href="{{ route('admin.Delete.apk', ['id' => $apk->id]) }}" class="btn btn-danger">Delete</a></td>
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