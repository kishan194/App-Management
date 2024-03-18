@extends('Admin.layouts.master')

@section('title')
           Edit-Apk
@endsection
@section('styles')
          <link rel="stylesheet" href="{{asset('css/appmanage.css')}}">
@endsection
@section('header')
     @include('Admin.layouts.navigation')
@endsection
@section('content')
<h1>Edit Apk</h1>
 <form method="post" action="{{route('admin.apk.edit', $apkUpload->id)}}" enctype="multipart/form-data">
    @csrf
     @method('PUT')
<div class="container">
  <div class="form-group">
        <label for="app_id">App Name</label>
        <select class="form-control" id="app_id" name="app_id">
            <option value="">Select App</option>
            @foreach($appManage as $appId => $appName)
                <option value="{{ $appId }}" @if($apkUpload->app_id == $appId) selected @endif>{{ $appName }}</option>
            @endforeach
        </select>
        @error('app_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="apk_path">Apk Upload</label>
        <input type="file" name="apk_path" class="form-control-file">
        @error('apk_path')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="version_name">Version Name</label>
        <input type="text" name="version_name" class="form-control" value="{{ old('version_name', $apkUpload->version_name) }}">
        @error('version_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="release_notes">Release Notes</label>
        <textarea class="form-control" id="release_notes" name="release_notes" rows="3">{{ old('release_notes', $apkUpload->release_notes) }}</textarea>
        @error('release_notes')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection