@extends('layouts.master')
@section('title', 'Orders')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">My Account - Orders</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <main class="col-sm-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Order No.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Order Amount</th>
                                <th scope="col">Qty.</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->order_number }}</th>
                                    <td>{{ $order->first_name }}</td>
                                    <td>{{ $order->last_name }}</td>
                                    <td>{{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}</td>
                                    <td>{{ $order->item_count }}</td>
                                    <td>
                                        @if ($order->status === 'pending')
                                            <span class="label label-default">{{ucfirst(trans($order->status))}}</span>
                                        @elseif ($order->status === 'processing')
                                            <span class="label label-info">{{ucfirst(trans($order->status))}}</span>
                                        @elseif ($order->status === 'completed')
                                            <span class="label label-success">{{ucfirst(trans($order->status))}}</span>
                                        @else
                                            <span class="label label-danger">{{ucfirst(trans($order->status))}}d</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <div class="col-sm-12">
                                    <p class="alert alert-warning">No orders to display.</p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $orders->render() }}
                </main>
            </div>
        </div>
    </section>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
@stop