@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Add Shift</h1>
                    <a href="{{ route('shift.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('shift.store') }}" method="POST">
                        @csrf
                       <div class="form-group">
                            <input type="text" name="name" class="form-control mt-3" placeholder="Enter Your Shift">
                            @if($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                       </div>
                        <div class="form-group">
                            <div class="input-group" role="group">
                                <input type="time" name="start_time" class="form-control mt-3" placeholder="Enter Your Start Time">
                                @if ($errors->has('start_time'))
                                    <div class="text-danger">{{ $errors->first('start_time') }}</div>
                                @endif
                                <input type="time" name="end_time" class="form-control mt-3" placeholder="Enter Your Shift">
                                @if ($errors->has('end_time'))
                                    <div class="text-danger">{{ $errors->first('end_time') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="submit-button text-right ms-auto my-3">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
