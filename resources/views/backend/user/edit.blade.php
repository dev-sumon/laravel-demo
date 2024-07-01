@extends('backend.layouts.master')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">User Edit</h1>
                    <a href="{{ route('user.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        <label class="mt-3" for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter Your Name">
                        @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <label  class="mt-3" for="email">{{ __('Email') }}</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter Your Email">
                        @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                        <div class="form-group">
                            <label  class="mt-3" for="role">{{ __('Role') }}</label>
                            <select name="role" id="role" class="form-control">
                                {{-- <option value=" " selected hidden>{{ __('Select Role') }}</option> --}}
                                @foreach ($roles as $role )
                                    <option value="{{ $role->id }}" {{ $role->id==old('role', $user->role_id) ? 'selected': '' }}>{{ $role->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('role'))
                            <div class="text-danger">{{ $errors->first('role') }}</div>
                            @endif
                        </div>
                        <label class="mt-3" for="password">{{ __('Password') }}</label>
                        <input type="password" name="password" value="" class="form-control" placeholder="Enter Your password">
                        @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                        <label class="mt-3"  for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Enter Your Password Again">
                        @if($errors->has('password_confirmation'))
                        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                        <input type="submit" value="Update" class="btn btn-outline-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
