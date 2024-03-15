@extends('Admin.layouts.master')

@section('title')
          View App
@endsection

@section('styles')
  <link href="{{asset('css/index.css')}}" rel="stylesheet">

@endsection

@section('content')
<h1>View All App</h1>
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
                           <th>Edit</th>
                           <th>Delete</th>
                         <tr>
                       </thead>
                       @foreach ($app as $item )
                            <tbody>
                                 <tr>
                                      <td>{{$item->name}}</td> 
                                      <td>{{$item->description}}</td> 
                                       <td><img src="{{ asset('logo/' . $item->logo) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td>
                                      <td><img src="{{ asset('images/' . $item->image) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td> 
                                      <td>{{$item->PackageName}}</td> 
                                      <td>{{$item->meta_keywords}}</td> 
                                      <td>{{$item->meta_description}}</td> 
                                      <td>{{$item->publish_status}}</td> 
                                      <td> <a href="#" class="btn btn-primary">Edit</td>
                                      <td> <a href="#" class="btn btn-danger">Delete</td>
                                 </tr>
                              </tbody>   
                       @endforeach
                       </table>
@endsection