@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Add User</h1>
                    <a href="{{ route('user.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <label class="mt-3" for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Name">
                        @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <label  class="mt-3" for="email">{{ __('Email') }}</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Your Email">
                        @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                        <label class="mt-3" for="password">{{ __('Password') }}</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter Your Password">
                        @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                        <label class="mt-3"  for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Enter Your Password Again">
                        @if($errors->has('password_confirmation'))
                        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                        <input type="submit" value="Create" class="btn btn-outline-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
