@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('Role List') }}</h1>
                    @if (auth()->user()->can('role-create'))
                    <a href="{{ route('role.create') }}" class="btn btn-info btn-sm float-end align-items-center px-2 py-2">{{ __('Add Role') }}</a>
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
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->status==1 ? 'Active' : 'Deactive'}}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($role->created_at)) }}</td>
                                    <td>{{ ($role->created_at == $role->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($role->updated_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if (auth()->user()->can('role-edit'))
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
                                            @endif
                                            @if (auth()->user()->can('role-delete'))
                                                <a href="{{ route('role.delete', $role->id) }}" class="btn btn-danger btn-sm">{{ __('Delete') }}</a>
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
