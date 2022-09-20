@extends('layouts.master')
@section('title', config('settings.site_title'))
@section('content')

<div id="features" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">What makes us the best choise for you?</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="mfeature-title">Uptime 100%. Guaranteed.</div>
                    <div class="mfeature-details">Hosting with us we guaranteed 100% uptime!!</div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="mfeature-box active">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mfeature-title">Readymade templates</div>
                    <div class="mfeature-details">We have ready made templates you can use with our website script!!</div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="mfeature-title">Amazing support</div>
                    <div class="mfeature-details">We strive to give you the best amazing support any customer could want and ask for from a
                    company like us and we want to earn your trust and keep it the right way and get the topic done right the first time like expected!!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="info" class="container-fluid">
    <canvas id="infobg" data-paper-resize="true"></canvas>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">
                    The best of the best!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="info-text">
                  We have some of the best working for us and we offer there services to you we want you to come join the remecy family
                  and see what all the fuss is about for your self don't take my word or even our word for remecy but to check it out
                  your self and see if we are the right fit for your website needs!!
                </div>
            </div>
        </div>
    </div>
</div>

@stop