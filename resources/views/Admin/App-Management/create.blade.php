@extends('Admin.layouts.master')
@section('title')
         Add-App-Management
@endsection
@section('styles')
          <link href="{{asset('css/appmanage.css')}}" rel="stylesheet">
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
    @csrf
    <div class="form-group">
                <label for="name">App Name</label>
                <input type="text" name="name" class="form-control" required>
                @error('name')
                   <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
                @error('description')
                   <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control-file">
                 @error('logo')
                   <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Preview Image</label>
                <input type="file" name="image" class="form-control-file">
                  @error('image')
                   <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="PackageName">Package Name</label>
                <input type="text" name="PackageName" class="form-control" required>
                  @error('PackageName')
                   <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Optional fields -->
            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control">
                 @error('meta_keywords')
                   <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                  @error('meta_description')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
           
           <div class="form-group">
                   <label for="publish_status">Publish Status</label>
                   <div class="form-check">
                       <input type="radio" name="publish_status" value="published" class="form-check-input" id="publish">
                       <label class="form-check-label" for="publish">Publish</label>
                         </div>
                      <div class="form-check">
                           <input type="radio" name="publish_status" value="unpublished" class="form-check-input" id="unpublish">
                           <label class="form-check-label" for="unpublish">Unpublish</label>
                           @error('publish_status')
                               <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
               </div>
               </div>

            <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
               