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
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control mt-3">

                        @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control mt-3" placeholder="Enter Your Email">
                        @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                        <input type="password" name="password" value="" class="form-control mt-3" placeholder="Enter Your password">
                        @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                        <input type="password" name="password_confirmation" value="" class="form-control mt-3" placeholder="Enter Your Confirmation Password">
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
