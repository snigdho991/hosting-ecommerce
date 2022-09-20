@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Users</h4>
                <p><b>{{\App\Models\User::All()->count()}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Admins</h4>
                <p><b>{{\App\Models\Admin::All()->count()}}</b></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon">
            <i class="icon fa fa-cubes fa-3x"></i>
            <div class="info">
                <h4>Services</h4>
                <p><b>{{\App\Models\Category::All()->count()}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon">
            <i class="icon fa fa-server fa-3x"></i>
            <div class="info">
                <h4>Plans</h4>
                <p><b>{{\App\Models\Product::All()->count()}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-shopping-basket fa-3x"></i>
            <div class="info">
                <h4>Orders</h4>
                <p><b>{{\App\Models\Order::All()->count()}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-rss fa-3x"></i>
            <div class="info">
                <h4>Blogs</h4>
                <p><b>{{\App\Models\BlogPost::All()->count()}}</b></p>
            </div>
        </div>
    </div>
</div>
@endsection