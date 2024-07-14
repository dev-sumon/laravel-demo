@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">{{ __('Add Permssion') }}</h1>
                    <a href="{{ route('permission.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mt-3" for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Permission Name">
                            @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                       <div class="form-group">
                            <label class="mt-3" for="prefix">{{ __('Prefix') }}</label>
                            <input type="text" name="prefix" value="{{old('prefix')}}" class="form-control" placeholder="Enter Your Prefix">
                            @if($errors->has('prefix'))
                            <div class="text-danger">{{ $errors->first('prefix') }}</div>
                            @endif
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
