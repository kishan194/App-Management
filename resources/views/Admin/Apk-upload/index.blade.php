
@extends('Admin.layouts.master')

@section('title')
      ApkIndex
@endsection

@section('styles')
 <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('header')
     @include('Admin.layouts.navigation')
@endsection

@section('search')
<h1>View Apk</h1>
<style>
.search {
    position: fixed;
    right: 20px;
    margin-right: 200px;
    z-index: 999;
}

#btn-search {
    position: fixed;
    right: 50px;
    margin-top:3px;
    margin-right: 95px;
    width: 70px;
}

.btnf {
    margin-left:265px;
    margin-top:3px;
}

#filter {
    margin-bottom: -40px;
}

</style>
<form action="{{ route('admin.search.apk') }}" method="GET"  class="ml-3">
    <input  type="text" name="search" class="search"  placeholder="Search by Apk Name">
    <button type="submit" class="btn btn-info" id="btn-search">Search</button>
</form>

       <div class="container">
                <form action="{{ route('admin.filter.apk') }}" method="GET" class="form-inline mb-3">
      <div class="form-group">
           <select id="filter" name="filter" class="form-control">
                   <option class="ofilter" value="name">Filter by App Name</option>
                        @foreach ($appNames as $appId => $appName)
                         <option value="{{ $appId }}" @if(request('filter') == $appId) selected @endif>{{ $appName }}</option>
                        @endforeach    
             </select>
             <div class="btnf">
             <button type="submit"id="btnfilter" class="btn btn-primary">Filter</button>
             </div>
        </div>
          
</form>
@endsection


@section('content')


        
        <table class="table">
            <thead>
                <tr>
                    <th>App Name</th>
                    <th>APK Download</th>
                    <th>Version Name</th>
                    <th>Release Notes</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filteredApks as $apk)
                    <tr>
                        <td>{{ $appNames[$apk->app_id] }}</td>
                        <td><a href="{{ route('admin.apk.download', ['filename' => $apk->apk_path]) }}" >{{ $apk->apk_path }}</a></td>
                        <td>{{ $apk->version_name }}</td>
                        <td>{{ $apk->release_notes }}</td>
                        <td><a href="{{ route('admin.update.apk', ['id' => $apk->id]) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ route('admin.Delete.apk', ['id' => $apk->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 
@section('paginate')
          <div class="paginate">{{ $filteredApks->links() }}
</div>
@endsection
@section('script')
  <script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 4000); 
</script>
@endsection 

@section('footer')
   @include('Admin.layouts.footer')
@endsection


