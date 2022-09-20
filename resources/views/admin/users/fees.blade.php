@extends('admin.app')


@section('content')

<div class="container">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="row">
    <div class="col-lg-12 margin-tb">
      <h2 class="title1 m-b-md">Welcome {{ Auth::user()->name }},
        @if(!empty(Auth::user()->getRoleNames()))
          @foreach(Auth::user()->getRoleNames() as $v)
              <label class="badge badge-secondary">{{ $v }}</label>
          @endforeach
        @endif
      </h2>
    </div>
</div>



  <div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Users</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Fees</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
        {{-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a> --}}
        {{-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> --}}
      </div>
    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="pull-left">
                <h2 class="font-weight-bold"> Naveen Fees</h2>
            </div>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>1</th>
                    <td>Testing</td>
                    <td>sdf</td>
                    <td>10000</td>
                    <td>NOT PAID</td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td>Testing</td>
                    <td>Something</td>
                    <td>400</td>
                    <td>PAID</td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td>Fee2</td>
                    <td>alsdkj</td>
                    <td>300</td>
                    <td>PAID</td>
                  </tr>
                  <tr>
                    <th>5</th>
                    <td>Annual Fee</td>
                    <td>Something about it</td>
                    <td>100</td>
                    <td>PAID</td>
                  </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Fees</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Fee</a>
                    </div>
                </div>
            </div>
            
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            
            
            <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Description</th>
              <th>Amount</th>
              <th width="200px">Action</th>
            </tr>
            {{-- @foreach ($data as $key => $user) --}}
              <tr>
                <td>1</td>
                <td>Testing</td>
                <td>sdf</td>
                <td>10000</td>
                <td>
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-danger" href="">Delete</a>
                    {{-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a> --}}
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!} --}}
                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                    {{-- {!! Form::close() !!} --}}
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Testing</td>
                <td>sdf</td>
                <td>10000</td>
                <td>
                  <a class="btn btn-info" href="">Show</a>
                  <a class="btn btn-danger" href="">Delete</a>
                  {{-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a> --}}
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!} --}}
                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                    {{-- {!! Form::close() !!} --}}
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Testing</td>
                <td>sdf</td>
                <td>10000</td>
                <td>
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-danger" href="">Delete</a>
                    {{-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a> --}}
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!} --}}
                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                    {{-- {!! Form::close() !!} --}}
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Testing</td>
                <td>sdf</td>
                <td>10000</td>
                <td>
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-danger" href="">Delete</a>
                    {{-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a> --}}
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!} --}}
                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                    {{-- {!! Form::close() !!} --}}
                </td>
              </tr>
            {{-- @endforeach --}}
            </table>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
        
        {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> --}}
      </div>
    </div>
  </div>
</div>

@endsection