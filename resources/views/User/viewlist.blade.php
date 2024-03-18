@extends('layouts.master')

@section('title')
          View App
@endsection

@section('styles')
  <link href="{{asset('css/index.css')}}" rel="stylesheet">

@endsection

@section('header')
       @include('layouts.navigation')
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<h1>View-List App</h1>
               <table>
                   <thead>
                       <tr>
                           <th>App Name</th>
                           {{-- <th>Description</th>
                           <th>Logso</th>
                           <th>Image</th>
                           <th>Package Name</th>
                           <th>Meta Keywords</th>
                           <th>Meta Description</th>
                           <th>Publish_Status</th> --}}
                           <th>APP Deatils Page</th>
                           
                         <tr>
                       </thead>
                       @foreach ($app as $item )
                            <tbody  style="text-align:center">
                                 <tr>
                                      <td>{{$item->name}}</td> 
                                      {{-- <td>{{$item->description}}</td> 
                                       <td><img src="{{ asset('logo/' . $item->logo) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td>
                                      <td><img src="{{ asset('images/' . $item->image) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td> 
                                      <td>{{$item->PackageName}}</td> 
                                      <td>{{$item->meta_keywords}}</td> 
                                      <td>{{$item->meta_description}}</td> 
                                      <td>{{$item->publish_status}}</td>  --}}
                                   <td> <a href="{{route('detail.app')}}" class="btn btn-primary">App Details</td>
                                   
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