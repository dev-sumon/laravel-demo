@extends('backend.layouts.master')



@section('content')
@if(session()->has('flash_message'))
    <div class="alert alert-{{ session('flash_message.level') }}">
        {{ session('flash_message.message') }}
    </div>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" >Dashboard</h1>
    @can('dashboard_view')
    <p> view dashboard</p>
@endcan
</div>

@endsection
