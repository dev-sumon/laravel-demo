@extends('backend.layouts.master')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Edit Shift</h1>
                    <a href="{{ route('shift.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('shift.update', $shifts->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{ $shifts->name }}" class="form-control">
                            @if($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="col-md-6">
                                    <label for="start_time">{{ __('Start Time') }}</label>
                                    <input type="time" name="start_time" value="{{ $shifts->start_time }}" class="form-control">
                                    @if ($errors->has('start_time'))
                                        <div class="text-danger">{{ $errors->first('start_time') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="end_time">{{ __('End Time') }}</label>
                                    <input type="time" name="end_time" value="{{ $shifts->end_time }}" class="form-control">
                                    @if ($errors->has('end_time'))
                                        <div class="text-danger">{{ $errors->first('end_time') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="submit-button text-right ms-auto my-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()