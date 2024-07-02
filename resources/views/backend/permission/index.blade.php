@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Permision List</h1>
                    @if (auth()->user()->can('permission-create'))
                    <a href="{{ route('permission.create') }}" class="btn btn-info btn-sm float-end align-items-center px-2 py-2">Add Permision</a>
                    @endif
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
                                <th>{{ __('Prefix') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->prefix }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($permission->created_at)) }}</td>
                                    <td>{{ ($permission->created_at == $permission->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($permission->updated_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if (auth()->user()->can('permission-edit'))
                                            <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            @endif
                                            @if (auth()->user()->can('permission-delete'))
                                            <a href="{{ route('permission.delete', $permission->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            @endif
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
