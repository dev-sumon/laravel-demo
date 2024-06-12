@extends('backend.layouts.master')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Edit Role</h1>
                    <a href="{{ route('role.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                        @csrf
                        <input type="text" name="name" value="{{ $role->name }}" class="form-control mt-3">

                        @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" {{ $role->status== 1 ? 'checked' : ''}} name="status" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Status</label>
                          </div>

                        <div class="submit-button text-end ms-auto">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
