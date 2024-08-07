@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('Add User') }}</h1>
                    <a href="{{ route('user.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mt-3" for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Name">
                            @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label  class="mt-3" for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Your Email">
                            @if($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label  class="mt-3" for="role">{{ __('Role') }}</label>
                            <select name="role" id="role" class="form-control">
                                <option value=" " selected hidden>{{ __('Select Role') }}</option>
                                @foreach ($roles as $role )
                                    <option value="{{ $role->id }}" {{ $role->id==old('role') ? 'selected': '' }}>{{ $role->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('role'))
                            <div class="text-danger">{{ $errors->first('role') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label  class="mt-3" for="gender">{{ __('Gender') }}</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value=" " selected hidden>{{ __('Select gender') }}</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}" {{ $gender->id==old('gender') ? 'selected': '' }}>{{ $gender->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                            <div class="text-danger">{{ $errors->first('gender') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="mt-3" for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter Your Password">
                            @if($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="mt-3"  for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Enter Your Password Again">
                            @if($errors->has('password_confirmation'))
                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                        <div class="submit-button text-right ms-auto my-3">
                            <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
