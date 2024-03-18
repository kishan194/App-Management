@extends('Admin.layouts.master')

@section('title')
      ApkIndex
@endsection

@section('styles')
 <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
              @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<h1>View Apk</h1>
               <table>
                   <thead>
                       <tr>
                           <th>APP Name</th>
                           <th>Apk</th>
                           <th>Version_name</th>
                           <th>release_notes</th>
                           <th>Edit</th>
                           <th>Delete</th>
                         <tr>
                       </thead>
                       @foreach ($apk as $item )
                            <tbody>
                                 <tr>
                                     <td>{{$item->app_id}}</td>
                                       <td><a href="{{ route('admin.apk.download', ['filename' => $item->apk_path]) }}">{{ $item->apk_path }}</a></td>
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
