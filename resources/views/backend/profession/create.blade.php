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
                        <input type="text" name="profession_id" class="form-control mt-3" placeholder="Enter Your Profession">
                        <input type="submit" value="Save" class="btn btn-outline-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
