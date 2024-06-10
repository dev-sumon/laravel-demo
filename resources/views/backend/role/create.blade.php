@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Role User</h1>
                    <a href="" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <label class="mt-3" for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Name">
                        @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <input type="submit" value="Create" class="btn btn-outline-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
