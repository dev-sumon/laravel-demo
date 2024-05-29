@extends('backend.layouts.master')

@section('content')
    <section class="profile">
        <div class="row">
            <div class="col-md-12">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
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
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter your name" name="name" value="{{ $user->name ?? old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="age">{{ __('Age') }}</label>
                                        <input type="number" class="form-control" id="age"
                                            placeholder="Enter your age" name="age" value="{{ $user->age ?? old('age') }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">{{ __('Gender') }}</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="1"  {{ $user->gender == '1' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                                    <option value="2" {{ $user->gender == '2' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                                    <option value="0" {{ $user->gender == '0' ? 'selected' : '' }}>{{ __('Other') }}</option>
                                                </select>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{ __('Address') }}</label>
                                        <textarea class="form-control" id="address" name="address">{{ $user->address ?? old('address') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea class="form-control" id="description" name="description">{{ $user->description ?? old('description') }}</textarea>
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
