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
                <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $admin->name) }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email', $admin->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="account_type">Chanege Role </label><br>
                            <span class="m-l-5 text-danger"> Remember if you change the role to User, this person will be removed from admin panel.</span>
                            <select id="account_type" class="form-control custom-select mt-15 account_type_admin @error('account_type') is-invalid @enderror" name="account_type" style="margin-top:10px;">
                                    <option value="">Chanege account type</option>
                                    <option value="User"> User </option>
                                    <option value="Admin" @if($admin->role == "Admin") selected @endif> Admin </option>
                                    <option value="Super Admin" @if($admin->role == "Super Admin") selected @endif> Super Admin </option>
                                    <option value="Author" @if($admin->role == "Author") selected @endif> Author </option>
                            </select>
                            @error('account_type') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="themeAdminId">
                            <label for="theme">Theme <span class="m-l-5 text-danger"> *</span></label>
                            <select id="theme" class="form-control custom-select mt-15 @error('theme') is-invalid @enderror" name="theme">
                                    <option value="">Select a theme</option>
                                    <option value="Classic"> Classic </option>
                                    <option value="Midnight_Blue"> Midnight Blue </option>
                                    <option value="Cyan"> Cyan </option>
                                    <option value="Purple"> Purple </option>
                                    <option value="Christmas"> Christmas </option>
                                    <option value="Blue"> Blue </option>
                                    <option value="Dark"> Dark </option>                                    
                            </select>
                            @error('theme') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="phoneAdminId">
                            <label class="control-label" for="phone">Phone</label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone', $admin->phone) }}"/>
                            @error('phone') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="addressAdminId">
                            <label class="control-label" for="address">Address</label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $admin->address) }}"/>
                            @error('address') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="stateAdminId">
                            <label class="control-label" for="state">State</label>
                            <input class="form-control @error('state') is-invalid @enderror" type="text" name="state" id="state" value="{{ old('state', $admin->state) }}"/>
                            @error('state') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="cityAdminId">
                            <label class="control-label" for="city">City</label>
                            <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" id="city" value="{{ old('city', $admin->city) }}"/>
                            @error('city') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="zipcodeAdminId">
                            <label class="control-label" for="zipcode">Post Code</label>
                            <input class="form-control @error('zipcode') is-invalid @enderror" type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $admin->zipcode) }}"/>
                            @error('zipcode') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="countryAdminId">
                            <label class="control-label" for="country">Country</label>
                            <input class="form-control @error('country') is-invalid @enderror" type="text" name="country" id="country" value="{{ old('country', $admin->country) }}"/>
                            @error('country') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group" id="more_infoAdminId">
                            <label class="control-label" for="more_info">More Info</label>
                            <textarea class="form-control" rows="4" name="more_info" id="more_info">{{ old('more_info', $admin->more_info) }}</textarea>
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