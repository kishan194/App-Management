@extends('layouts.master')

@section('title')
Update Profile
@endsection

@section('styles')
    
@endsection

@section('header')
       @include('layouts.navigation')
@endsection
     
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Profile') }}
</h2>

<div class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-4 rounded">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="p-4 rounded">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="p-4 rounded">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection