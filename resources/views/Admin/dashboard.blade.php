<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}  {{Auth::guard('admin')->user()->name}}
        </h2>
    </x-slot>
    <a href="{{route('admin.create')}}">ADD APP</a>
</x-admin-layout>
