@extends('admin.app')
 
@section('title') {{ $pageTitle }} @endsection
 
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Update Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="info">
                    @include('admin.profile.includes.info')
                </div>
                <div class="tab-pane fade" id="update">
                    @include('admin.profile.includes.update')
                </div>
            </div>
        </div>
    </div>
@endsection