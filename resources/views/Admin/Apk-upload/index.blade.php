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

      <form action="{{ route('admin.search.apk') }}" method="GET"  class="ml-3">
    <input  type="text" name="search" class="search"  placeholder="Search by Apk Name">
    <button type="submit" class="btn btn-info" id="btn-search">Search</button>
</form>
@endsection
@section('content')
              @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

               <table>
                   <thead >
                       <tr>
                           <th>APP Name</th>
                           <th>Download Apk</th>
                           <th>Version_name</th>
                           <th>release_notes</th>
                           <th>Edit</th>
                           <th>Delete</th>
                         <tr>
                       </thead>
                       @foreach ($apk as $item )
                            <tbody style="text-align:center">
                                 <tr>
                                     <td>{{ $appName[$item->app_id] }}</td>
                                       <td><a href="{{ route('admin.apk.download', ['filename' => $item->apk_path]) }}" >{{ $item->apk_path }}</a></td>
                                      <td>{{$item->version_name}}</td> 
                                      <td>{{$item->release_notes}}</td> 
                                   <td> <a href="{{ route('admin.update.apk', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a></td>
                                      <td> <a href="{{route('admin.Delete.apk',['id' => $item->id])}}" class="btn btn-danger">Delete</td>
                                 </tr>  
                              </tbody>   
                       @endforeach
                       </table>
@endsection
@section('script')
  <script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 4000); 
</script>
@endsection         

@section('paginate')
           {{ $apk->links() }}
          
@endsection
