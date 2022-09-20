@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="first_name">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}"/>
                            @error('first_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="last_name">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}"/>
                            @error('last_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email', $user->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="account_type">Chanege Account Type <span class="m-l-5 text-danger"> *</span></label>
                            <select id="account_type" class="form-control custom-select mt-15 account_type @error('account_type') is-invalid @enderror" name="account_type">
                                    <option value="">Select a role</option>
                                    <option value="User" selected> User </option>
                                    <option value="Admin"> Admin </option>
                                    <option value="Super Admin"> Super Admin </option>
                                    <option value="Author"> Author </option>
                            </select>
                            @error('account_type') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="themeId">
                            <label for="theme">Theme <span class="m-l-5 text-danger"> *</span></label>
                            <select id="theme" class="form-control custom-select mt-15 @error('theme') is-invalid @enderror" name="theme">
                                    <option value="">Select a theme</option>
                                    <option value="Classic" {{$user->theme == 'Classic'  ? 'selected' : ''}}> Classic </option>
                                    <option value="Midnight_Blue" {{$user->theme == 'Midnight_Blue'  ? 'selected' : ''}}> Midnight Blue </option>
                                    <option value="Cyan" {{$user->theme == 'Cyan'  ? 'selected' : ''}}> Cyan </option>
                                    <option value="Purple" {{$user->theme == 'Purple'  ? 'selected' : ''}}> Purple </option>
                                    <option value="Christmas" {{$user->theme == 'Christmas'  ? 'selected' : ''}}> Christmas </option>
                                    <option value="Blue" {{$user->theme == 'Blue'  ? 'selected' : ''}}> Blue </option>
                                    <option value="Dark" {{$user->theme == 'Dark'  ? 'selected' : ''}}> Dark </option>
                            </select>
                            @error('theme') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="phoneId">
                            <label class="control-label" for="phone">Phone</label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"/>
                            @error('phone') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="addressId">
                            <label class="control-label" for="address">Address</label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $user->address) }}"/>
                            @error('address') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="stateId">
                            <label class="control-label" for="state">State</label>
                            <input class="form-control @error('state') is-invalid @enderror" type="text" name="state" id="state" value="{{ old('state', $user->state) }}"/>
                            @error('state') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="cityId">
                            <label class="control-label" for="city">City</label>
                            <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" id="city" value="{{ old('city', $user->city) }}"/>
                            @error('city') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="zipcodeId">
                            <label class="control-label" for="zipcode">Post Code</label>
                            <input class="form-control @error('zipcode') is-invalid @enderror" type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $user->zipcode) }}"/>
                            @error('zipcode') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="countryId">
                            <label class="control-label" for="country">Country</label>
                            <input class="form-control @error('country') is-invalid @enderror" type="text" name="country" id="country" value="{{ old('country', $user->country) }}"/>
                            @error('country') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="more_infoId">
                            <label class="control-label" for="more_info">More Info</label>
                            <textarea class="form-control" rows="4" name="more_info" id="more_info">{{ old('more_info', $user->more_info) }}</textarea>
                            @error('more_info') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection