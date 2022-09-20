@extends('layouts.master')

@section('title', $ticket->title)

@section('content')
<div class="row mg-t-20">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
            </div>

            <div class="panel-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <div class="ticket-info">
                    <p>{{ $ticket->message }}</p>
                    <p>Categry: {{ $category->name }}</p>
                    <p>
                        @if ($ticket->status === 'Open')
                        Status: <span class="label label-success">{{ $ticket->status }}</span>
                        @else
                        Status: <span class="label label-danger">{{ $ticket->status }}</span>
                        @endif
                    </p>
                    <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                </div>

                <hr>
                <div class="comments">
                    @foreach ($comments as $comment)
                    @if($comment->is_admin == 1)
                    <div class="panel panel-info">
                    @else
                    <div class="panel panel-primary">
                    @endif
                        <div class="panel panel-heading">
                            @if($comment->is_admin == 1) {{ 'Support Panel' }}
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
                        <input type="hidden" name="c_admin" value="0">
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
    </div>
</div>
@endsection