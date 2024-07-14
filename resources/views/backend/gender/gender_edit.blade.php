@extends('backend.layouts.master')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('Edit Gender') }}</h1>
                    <a href="{{ route('gender.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('gender.update', $gender->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="{{ $gender->name }}" class="form-control mt-3">
                            @if($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="submit-button text-right ms-auto mt-3">
                            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
