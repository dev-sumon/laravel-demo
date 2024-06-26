@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Add Profession</h1>
                    <a href="{{ route('profession.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('profession.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control mt-3" placeholder="Enter Your Profession">
                        @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
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
