<x-admin-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}  {{Auth::guard('admin')->user()->name}}
        </h2>
    </x-slot>
     <a class="btn btn-info" href="{{route('admin.create')}}">ADD APP</a>

     <a class="btn btn-info" href="{{route('admin.App.index')}}">Manage APP</a>
</x-admin-layout>
