@extends('backend.layouts.master')

@section('content')
    <section class="profile">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6>
                                    {{ __('Profile Settings') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter your name" name="name" value="{{ $user->name ?? old('name')}}">
                                            @if($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="age">{{ __('Age') }}</label>
                                        <input type="number" class="form-control" id="age"
                                            placeholder="Enter your age" name="age" value="{{ $user->age ?? old('age') }}">
                                            @if($errors->has('age'))
                                                <div class="text-danger">{{ $errors->first('age') }}</div>
                                            @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">{{ __('Gender') }}</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}" {{ $user->gender == $gender->id ? 'selected' : '' }}> {{ $gender->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('gender'))
                                                    <div class="text-danger">{{ $errors->first('gender') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="profession">{{ __('Profession') }}</label>
                                                <select name="profession" id="profession" class="form-control">
                                                    <option value="trader" @if ($user->profession == 'trader') selected @endif>{{ __('Trader') }}</option>
                                                    <option value="software_engineer @if($user->profession == 'software_engineer') @endif">{{ __('Software Engineer') }}</option>
                                                    <option value="doctor" @if($user->profession == 'doctor')>{{ __('Doctor') }} @endif</option>
                                                    <option value="teacher" @if($user->profession == 'teacher')@endif>{{ __('Teacher') }}</option>
                                                    <option value="lawyer" @if($user->profession == 'lawyer') @endif>{{ __('Lawyer') }}</option>
                                                    <option value="artist" @if($user->profession == 'artist') @endif>{{ __('Artist') }}</option>
                                                    <option value="accountant" @if($user->profession == 'accountant') @endif>{{ __('Accountant') }}</option>
                                                    <option value="engineer" @if($user->profession =='enginner') @endif>{{ __('Engineer') }}</option>

                                                </select>
                                                @if($errors->has('profession'))
                                                    <div class="text-danger">{{ $errors->first('profession') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{ __('Address') }}</label>
                                        <textarea class="form-control" id="address" name="address">{{ $user->address ?? old('address') }}</textarea>
                                        @if($errors->has('address'))
                                            <div class="text-danger">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea class="form-control" id="description" name="description">{{ $user->description ?? old('description') }}</textarea>
                                        @if($errors->has('description'))
                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Profile Image</label> <br>
                                        <input type="file" class="filepond-image" id="image" name="image"
                                            accept="image/*">
                                            @if(!empty($user->image))
                                                <div>
                                                    <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" style="max-width: 100%; height: auto;">
                                                </div>
                                            @endif
                                            @if($errors->has('image'))
                                                <div class="text-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="right">
                                <button type="submit" class="btn btn-info w-100">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
