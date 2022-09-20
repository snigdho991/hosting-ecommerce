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
                <div class="page-title">Customer Portal</div>
            </div>
        </div>
    </div>
</div>
<div id="contact-info" class="container-fluid bd-t">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a href="{{ route('account.orders') }}">
                <div class="info-box green-title">
                    
                    <div class="info-title"><i class="fa fa-server"></i> My Services
                    </div>
                    
                    <div class="info-details">
                        <p>View your total number of current active products.</p>

                        <p>View all of your currently active orders (Hosting, domain, Email etc..).</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="{{ url('my_tickets') }}">
                <div class="info-box blue-title">
                    
                    <div class="info-title"><i class="fa fa-ticket"></i> Tickets</div>
                    
                    <div class="info-details">
                        <p>Quick view to know the status of all your active tickets.</p>

                        <p>Support tickets are a great way of communicating with support team for queries related to
                            technical support. </p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('account.invoices') }}">
                <div class="info-box grey-title">
                    
                    <div class="info-title"><i class="fa fa-money"></i> Invoices</div>
                    
                    <div class="info-details">
                        <p>View your past and pending order payment receipts.</p>

                        <p>Invoice is a record or description of a purchased service detail with the amount paid or due
                            and date.</p>
                    </div>
                </div>
                </a>
            </div>

        </div>
    </div>
</div>

@stop