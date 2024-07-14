@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('Add Gender') }}</h1>
                    <a href="{{ route('gender.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('gender.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control mt-3" placeholder="Enter Your Gender">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="submit-button text-right ms-auto mt-3">
                            <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
