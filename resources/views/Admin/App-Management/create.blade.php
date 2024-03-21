@extends('Admin.layouts.master')

@section('title', 'Add-App-Management')

@section('styles')
    <link href="{{ asset('css/appmanage.css') }}" rel="stylesheet">
    <style>
        /* Add custom styles here if needed */
        /* For example: */
        /* .form-group label { font-weight: bold; } */
    </style>
@endsection

@section('header')
    @include('Admin.layouts.navigation')
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="container">
        <h1>Add New App</h1>
        <form method="post" action="{{ route('admin.App.Store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="Description">Description:</label>
                <textarea class="form-control" placeholder="Description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" class="form-control-file border" id="logo" name="logo">
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file border" id="image" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="PackAge">Package Name:</label>
                <input type="text" class="form-control border" placeholder="Package Name" name="PackageName" value="{{ old('PackageName') }}">
                @error('PackageName')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_keywords">Meta Keywords:</label>
                <input type="text" class="form-control border" placeholder="Meta Keywords" name="meta_keywords" value="{{ old('meta_keywords') }}">
                @error('meta_keywords')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Description:</label>
                <textarea class="form-control border" placeholder="Meta Description" name="meta_description">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="publish_status">Publish Status:</label>
                <select class="form-control border" name="publish_status">
                    <option value="published">Published</option>
                    <option value="unpublished">Unpublished</option>
                </select>
                @error('publish_status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
