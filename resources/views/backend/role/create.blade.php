@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h1 class="float-start">Add Role</h1>
                    <a href="{{ route('role.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <label class="mt-3" for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Role Name">
                        @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <div class="form-check my-2">
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Status</label>
                          </div>
                          <div class="permissions row">
                            @foreach ($permission_groups as $prefix=> $permissions)
                                <div class="col-3">
                                    <h4>{{ $prefix }}</h4>
                                    @foreach ($permissions as $key=> $permission)
                                        <div class="form-check my-2">
                                            <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" name="permissions[]" id="flexCheckDefault-{{ $permission->id }}">
                                            <label class="form-check-label" for="flexCheckDefault-{{ $permission->id }}">
                                                {{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                    </div>
                            @endforeach
                          </div>


                        <div class="submit-button text-right ms-auto">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
