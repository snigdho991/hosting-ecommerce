@extends('layouts.master')
@section('title', config('settings.site_title'))
@section('content')

    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="page-title">User Gallery</div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact-info" class="container-fluid bd-t">
        <div class="container">
            <div class="row">

            @foreach($images_arr as $image)

                <div class="col-md-4" id="team" style="padding-top: 60px !important; padding-bottom: 75px !important;">
                    <div class="person-box" style="height: 275px;padding: 0px !important; cursor: pointer;">
                        <a href="{{ asset('img-gallery/'.$image) }}" target="_blank">
                            <img src="{{ asset('img-gallery/'.$image) }}" style="width: 355px; height: 269px; border-radius: 14px; margin-top: 3px;" alt="">
                        </a>
                    </div>
                </div>

            @endforeach

            </div>

            <div class="row justify-content-center text-center" style="margin-bottom: 20px;">
                {{ $images_arr->links() }}
            </div>
        </div>
    </div>
    

@stop