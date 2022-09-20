@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> #{{ $ticket->ticket_id }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Created: {{ $ticket->created_at->diffForHumans() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-6">
                            <address>
                                <strong>Categry: {{ $category->name }}</strong>
                                <br>
                                <strong>@if ($ticket->status === 'Open')
                                    Status: <span class="label label-success">{{ $ticket->status }}</span>
                                    @else
                                    Status: <span class="label label-danger">{{ $ticket->status }}</span>
                                    @endif
                                </strong>
                            </address>
                        </div>
                        <div class="col-6">Message
                            <p>{{ $ticket->message }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="comments">
                                @foreach ($comments as $comment)
                                @if($comment->is_admin == 1)
                                <div class="panel panel-success">
                                @else
                                <div class="panel panel-default">
                                @endif
                    <div class="panel panel-heading">
                                        @if($comment->is_admin) {{ 'Admin' }}
                                        @else 
                                        {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                        @endif
                                        <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                                    </div>
            
                                    <div class="panel panel-body">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
            
                            <div class="comment-form">
                                <form action="{{ url('comment') }}" method="POST" class="form">
                                    {!! csrf_field() !!}
            
                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                    <input type="hidden" name="c_admin" value="1">
                                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>
            
                                        @if ($errors->has('comment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                        </span>
                                        @endif
                                    </div>
            
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection