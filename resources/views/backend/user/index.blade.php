@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('User List') }}</h1>
                    @if (auth()->user()->can('user-create'))
                        <a href="{{ route('user.create') }}" class="btn btn-info btn-sm float-end align-items-center px-2 py-2">{{ __('Add User') }}</a>
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
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($user->created_at)) }}</td>
                                    <td>{{ ($user->created_at == $user->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($user->updated_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if (auth()->user()->can('user-edit'))
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
                                            @endif
                                            @if (auth()->user()->can('user-delete'))
                                                <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-sm">{{ __('Delete') }}</a>
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
