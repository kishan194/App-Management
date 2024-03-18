@extends('Admin.layouts.master')
@section('title')
         Add-App-Management
@endsection
@section('styles')
          <link href="{{asset('css/appmanage.css')}}" rel="stylesheet">
@endsection

@section('header')
        @include('Admin.layouts.navigation')
@endsection
@section('content')
 @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif
 <div class="container">
        <h1>Add New App</h1>
            <form method="post" action="{{ route('admin.App.Store') }}" enctype="multipart/form-data">
    @csrfs
        <label for="name">Name:</label>
        <input type="text" value="{{ old('name') }}" id="name" name="name">
        @error('name')
                <div class="text-danger">{{$message}}</div>
        @enderror
        
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
                <div class="text-danger">{{$message}}</div>
        @enderror

        <label for="logo">Logo:</label><br>
        <input type="file" id="logo" value="{{ old('logo') }}" name="logo">
           @error('logo')
                <div class="text-danger">{{$message}}</div>
          @enderror

        <label for="image">Image:</label><br>
        <input type="file" id="image" value="{{ old('image') }}" name="image">
         @error('image')
                <div class="text-danger">{{$message}}</div>
        @enderror
        

        <label for="PackageName">Package Name:</label>
        <input type="text" id="PackageName" value="{{ old('PackageName') }}" name="PackageName">
         @error('PackageName')
                <div class="text-danger">{{$message}}</div>
        @enderror

        <label for="meta_keywords">Meta Keywords:</label>
        <input type="text" id="meta_keywords" value="{{ old('meta_keywords') }}" name="meta_keywords">
          @error('meta_keywords')
                <div class="text-danger">{{$message}}</div>
        @enderror


        <label for="meta_description">Meta Description:</label>
        <textarea id="meta_description" name="meta_description"  >{{ old('meta_description') }}</textarea>
        @error('meta_description')
                <div class="text-danger">{{$message}}</div>
        @enderror
        

        <label for="publish_status">Publish Status:</label>
        <select id="publish_status" name="publish_status">Select One
            <option value="published">Published</option>
            <option value="unpublished">Unpublished</option>
        </select><br>
         @error('publish_status')
                <div class="text-danger">{{$message}}</div>
        @enderror

        <button type="submit">Submit</button>
</form>
</div>
@endsection
               