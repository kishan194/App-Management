@extends('Admin.layouts.master')

@section('title')
            ApkStore
@endsection

@section('styles')
          <link rel="stylesheet" href="{{asset('css/appmanage.css')}}">
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
        <h1>Apk Upload</h1>
            <form method="post" action="{{ route('admin.apk.Store') }}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
                <label for="app_id">App Name</label>
                    <select class="form-control" id="app_id" name="app_id">
                        <option value="">Select App</option>
                           @foreach($apk as $appId => $appName)
                               <option value="{{ $appId }}">{{ $appName }}</option>
                            @endforeach
                    </select>
             @error('app_id')
                   <div class="text-danger">{{ $message }}</div>
             @enderror
          </div>
            <div class="form-group">
                <label for="Apk">ApkUpload</label>
                <input type="file" name="apk_path" class="form-control-file">
                 @error('apk_upload')
                   <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="VersionName">Version Name</label>
                <input type="text" name="version_name" class="form-control">
                  @error('version_name')
                   <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>
          <div class="form-group">
                            <label for="release_notes">Release Notes</label>
                            <textarea class="form-control" id="release_notes" name="release_notes" rows="3"></textarea>
                        </div>
                         @error('release_notes')
                   <div class="text-danger">{{ $message }}</div>
                  @enderror
               

            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
</form>
</div>
@endsection
