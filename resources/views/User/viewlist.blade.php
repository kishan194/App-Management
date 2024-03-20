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
<h1>View-List App</h1>

<form action="{{ route('search.app') }}" method="GET"  class="ml-3">
    <input  type="text" name="search" class="search"  placeholder="Search by App Name">
    <button type="submit" class="btn btn-primary" id="btn-search">Search</button>
               <table>
                   <thead>
                       <tr>
                           <th>App Name</th>
                          
                           <th>APP Deatils Page</th>
                           
                         <tr>
                       </thead>
                     @foreach ($app as $item)
                           <tbody style="text-align:center">
                                       <tr>
                                           <td>{{ $item->name }}</td>
                                           <td><a href="{{ route('detail.app', ['search' => $item->name]) }}" class="btn btn-info">Details App</a></td>
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