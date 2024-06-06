@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Gender List</h1>
                    <a href="{{ route('gender.create') }}" class="btn btn-info btn-sm float-end align-items-center px-2 py-2">Add Gender</a>
                </div>
                <div class="card-body">
                    @if(session()->has('flash_message'))
                        <div class="alert alert-{{ session('flash_message.level') }}">
                            {{ session('flash_message.message') }}
                        </div>
                    @endif
                                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genders as $gender)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gender->name }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($gender->created_at)) }}</td>
                                    <td>{{ ($gender->created_at == $gender->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($gender->updated_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('gender.edit', $gender->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('gender.delete', $gender->id) }}" class="btn btn-danger btn-sm">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
