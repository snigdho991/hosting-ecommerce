<style>
    .bd-t {
    border-top: 1px solid #bedaf1 !important;
    }
    
    .mg-t-10 {
    margin-top: 10px !important;
    }
    .row a{
    text-decoration: none !important;
    }
    </style>
@extends('layouts.master')
@section('title', 'Hosting Home Page')
@section('content')
<style>
    .bd-t {
        border-top: 1px solid #bedaf1;
    }

    .mg-t-10 {
        margin-top: 10px;
    }
    .row a{
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="page-head" class="container-fluid inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page-title">Theme Settings</div>
            </div>
        </div>
    </div>
</div>
<div id="contact-info" class="container-fluid bd-t">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a href="#">
                <div class="info-box green-title">
                    
                    <div class="info-title"><i class="fa fa-server"></i> Site Default
                    </div>
                    
                    <div class="info-details">
                        <h5 style="font-weight: 600; font-size: 17px;"><i class="fa fa-hand-o-right" style="font-size: 22px;"></i> {{ \App\Models\Theme::find(1)->first()->theme }} </h5>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-sm-4">
                <a href="#">
                <div class="info-box grey-title">
                    
                    <div class="info-title"><i class="fa fa-money"></i> Change Theme </div>
                
                    <form action="{{ route('user.theme.update') }}" method="POST" role="form">
                    @csrf

                        <div class="info-details">
                            <p>Set up a theme from below to change your currently selected theme.</p>

                            <div class="form-group" style="font-weight: bold; font-size: 16px;">
                               <input <?php if (Auth::user()->theme == 'Classic') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="user_theme" value="Classic"/> Classic
                            </div>

                            <div class="form-group" style="font-weight: bold; font-size: 16px;">
                                <input <?php if (Auth::user()->theme == 'Mightnight Blue') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="user_theme" value="Midnight_Blue"/> Midnight Blue
                             </div>

                             <div class="form-group" style="font-weight: bold; font-size: 16px;">
                                <input <?php if (Auth::user()->theme == 'Cyan') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="user_theme" value="Cyan"/> Cyan
                             </div>

                             <div class="form-group" style="font-weight: bold; font-size: 16px;">
                                <input <?php if (Auth::user()->theme == 'Purple') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="user_theme" value="Purple"/> Purple
                             </div>

                             <div class="form-group" style="font-weight: bold; font-size: 16px;">
                                <input <?php if (Auth::user()->theme == 'Christmas') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="user_theme" value="Christmas"/> Christmas
                             </div>

                            <div class="form-group" style="font-weight: bold; font-size: 16px;">
                               <input <?php if (Auth::user()->theme == 'Blue') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="user_theme" value="Blue"/> Blue
                            </div>

                            <div class="form-group" style="font-weight: bold; font-size: 16px;">
                               <input <?php if (Auth::user()->theme == 'Dark') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="user_theme" value="Dark"/> Dark
                            </div>

                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Set Theme</button>
                        </div>

                    </form>
                </div>
                </a>
            </div>
            
            <div class="col-sm-4">
                <a href="#">
                <div class="info-box blue-title">
                    
                    <div class="info-title"><i class="fa fa-ticket"></i> Your Selected</div>
                    
                    <div class="info-details">
                        <h5 style="font-weight: 600; font-size: 17px;"><i class="fa fa-arrow-circle-right" style="font-size: 22px;"></i> {{ Auth::user()->theme }} </h5>
                    </div>
                </div>
                </a>
            </div>

        </div>
    </div>
</div>

@stop