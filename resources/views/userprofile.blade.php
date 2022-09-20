@extends('layouts.master')

@section('title', $user->first_name)

@section('content')
<div class="row mg-t-20">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $user->first_name }} {{ $user->last_name }} | Profile
            </div>

            <div class="panel-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <a href="{{ route('users.edit') }}" class="btn btn-sm btn-primary float-right"> Update Profile </a>
                <div class="ticket-info mg-t-20">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><label>First Name:</label> {{ $user->first_name }}</li>
                        <li class="list-group-item"><label>Last Name:</label> {{ $user->last_name }}</li>
                        <li class="list-group-item"><label>Address:</label> {{ $user->address }}</li>
                        <li class="list-group-item"><label>State:</label> {{ $user->state }}</li>
                        <li class="list-group-item"><label>City:</label> {{ $user->city }}</li>
                        <li class="list-group-item"><label>Zip Code:</label> {{ $user->zipcode }}</li>
                        <li class="list-group-item"><label>Phone:</label> {{ $user->phone }}</li>
                        <li class="list-group-item"><label>Country:</label> {{ $user->country }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection