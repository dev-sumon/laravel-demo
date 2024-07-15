@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('Shift List') }}</h1>
                    @if (auth()->user()->can('shift-create'))
                        <a href="{{ route('shift.create') }}" class="btn btn-info btn-sm float-end align-items-center px-2 py-2">{{ __('Add Shift') }}</a>
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
                                <th>{{ __('SL No') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Start Time') }}</th>
                                <th>{{ __('End Time') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shifts as $shift)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $shift->name }}</td>
                                    <td>{{  date('h:i A', strtotime($shift->start_time)) }}</td>
                                    <td>{{  date('h:i A', strtotime($shift->end_time)) }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($shift->created_at)) }}</td>
                                    <td>{{ ($shift->created_at == $shift->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($shift->updated_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if (auth()->user()->can('shift-edit'))
                                                <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
                                            @endif
                                            @if (auth()->user()->can('shift-delete'))
                                                <a href="{{ route('shift.delete', $shift->id) }}" class="btn btn-danger btn-sm">{{ __('Delete') }}</a>
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
</div>

@endsection
