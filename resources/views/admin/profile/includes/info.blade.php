<div class="tile">
    <div class="row mb-4">
        <div class="col-6">
            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $user->name }}</h2>
        </div>
        <div class="col-6">
            <h5 class="text-right">Role: &nbsp;<span class="badge badge-success">Admin</span></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <b>Full Name:</b> {{ $user->name }} <br>
            <b>Email:</b> {{ $user->email }}<br>
            <b>Date Created:</b> {{ $user->created_at }}<br>
        </div>
    </div>
    <div class="row justify-content-center">
        <ul class="nav">
        <a href="#update" data-toggle="tab" class="btn btn-primary pull-right nav-item">Update Profile</a>
        </ul>
    </div>
</div>