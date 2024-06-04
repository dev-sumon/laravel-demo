@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Add Gender</h1>
                    <a href="{{ route('gender.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('gender.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control mt-3" placeholder="Enter Your Gender">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" value="Save" class="btn btn-outline-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
