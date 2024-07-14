@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('Profession List') }}</h1>
                    <a href="{{ route('profession.create') }}" class="btn btn-info btn-sm float-end align-items-center px-2 py-2">{{ __('Add Profession') }}</a>
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
                            @foreach ($professions as $profession)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $profession->name }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($profession->created_at)) }}</td>
                                    <td>{{ ($profession->created_at == $profession->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($profession->updated_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('profession.edit', $profession->id)}}" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
                                            <a href="{{ route('profession.delete', $profession->id)}}" class="btn btn-danger btn-sm">{{ __('Delete') }}</a>
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
</div>

@endsection
