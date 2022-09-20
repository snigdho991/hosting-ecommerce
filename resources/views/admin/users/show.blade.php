@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h3 class="page-header"><i class="fa fa-user"></i> {{ $users->fullName }} </h3>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Created at: {{ $users->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">Details<hr>
                            <address><b>First Name:</b> {{ $users->first_name }}<br><b>Last Name:</b> {{ $users->last_name }}<br><b>Email:</b> {{ $users->email }}</address>
                        </div>
                        <div class="col-4">Address<hr>
                            <address><b>Address: </b>{{ $users->address }}<br><b>State:</b> {{ $users->state }}<br><b>City:</b> {{ $users->city }} <br> <b>Country:</b> {{ $users->country }} <br> <b>Post Code:</b> {{ $users->zipcode }}<br><b>Phone:</b> {{ $users->phone }}<br></address>
                        </div>
                        <div class="col-4">
                            Others<hr>
                            <b>Theme:</b> {{ $users->theme }}<br>
                            <b>Status:</b> 
                            @if ($users->status == 0)
                              <span class="badge badge-success">Active</span>
                            @else
                              <span class="badge badge-secondary">Inactive</span>
                            @endif
                            <br>
                        </div>
                    </div>
                    
                </section>
            </div>
        </div>
    </div>
@endsection