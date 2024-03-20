@extends('Admin.layouts.master')

@section('title')
          View App
@endsection

@section('styles')
  <link href="{{asset('css/index.css')}}" rel="stylesheet">

@endsection

@section('header')
     @include('Admin.layouts.navigation')
@endsection
@section('search')
<h1>View App</h1>
  <form action="{{ route('admin.search.app') }}" method="GET"  class="ml-3">
    <input  type="text" name="search" class="search"  placeholder="Search by App Name">
    <button type="submit" class="btn btn-info" id="btn-search">Search</button>
    
 <a class="btn btn-warning add-app-link" style="margin-bottom:8px;" href="{{ route('admin.App.create') }}">ADD APP</a>
</form>

@endsection
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

               <table>
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Logo</th>
                           <th>Image</th>
                           <th>Package Name</th>
                           <th>Meta Keywords</th>
                           <th>Meta Description</th>
                           <th>Publish_Status</th>
                           <th>Add Apk</th>
                           <th>Edit</th>
                           <th>Delete</th>
                         <tr>
                       </thead>
                       @foreach ($app as $item )
                            <tbody style="text-align:center">
                                 <tr>
                                      <td>{{$item->name}}</td> 
                                      <td>{{$item->description}}</td> 
                                      <td><img src="{{ asset('logo/' . $item->logo) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td>
                                      <td><img src="{{ asset('images/' . $item->image) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td> 
                                      <td>{{$item->PackageName}}</td> 
                                      <td>{{$item->meta_keywords}}</td> 
                                      <td>{{$item->meta_description}}</td> 
                                      <td>{{$item->publish_status}}</td> 
                                      <td><a href="{{ route('admin.single.apk', ['search' => $item->name]) }}" class="btn btn-secondary">View-Apk</a></td>
                                      <td><a href="{{ route('admin.update.app', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a></td>
                                      <td> <a href="{{route('admin.Delete.app',['id' => $item->id])}}" class="btn btn-danger">Delete</td>
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
    <div class="paginate">{{ $app->links() }}</div>
@endsection