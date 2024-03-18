@extends('layouts.master')

@section('title')
          ViewDetails
@endsection

@section('styles')
          <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
          <table>
              <thead>
                  <tr>
                        <th>Game Name</th>
                        <th>Description</th>
                        <th>Logo</th>
                        <th>Image</th>
                        <th>Packagename</th>
                        <th>Publish_Status</th>
                        <th>Apk file</th>
                        <th>Version_Name</th>
                        <th>release_Notes</th>
                  </tr>
              </thead>
                @foreach ($apps as $item )
                       @if ($item->id == $item->app_id)
                    
                            <tbody>
                                 <tr>
                                      <td>{{$item->name}}</td> 
                                      <td>{{$item->description}}</td> 
                                       <td><img src="{{ asset('logo/' . $item->logo) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td>
                                      <td><img src="{{ asset('images/' . $item->image) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td> 
                                      <td>{{$item->PackageName}}</td> 
                                      <td>{{$item->publish_status}}</td> 
                                      <td>  <a href="{{ route('admin.apk.download', ['filename' => $item['apk_path']]) }}">{{ $item['apk_path'] }}</a></td>
                                      <td>{{$item->version_name}}</td>
                                      <td>{{$item->release_notes}}</td>
                                </tr>
                        </tbody>
                       @endif
                  @endforeach
          </table>        

@endsection