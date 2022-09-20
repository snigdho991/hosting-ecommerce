@extends('layouts.master')
@section('title', config('settings.site_title'))
@section('content')

    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="page-title">{{ $find_page->title }}</div>
                </div>
            </div>
        </div>
    </div>

    <div id="page-content" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="content-holder">{!! $find_page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop