@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Order Number </th>
                            <th> Placed By </th>
                            <th class="text-center"> Total Amount </th>
                            <th class="text-center"> Items Qty </th>
                            <th class="text-center"> Payment Status </th>
                            <th class="text-center"> Status </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $index =>$order)
                            <tr>
                                <td scope="row">{{ $index +1 }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->user->fullName }}</td>
                                <td class="text-center">{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                                <td class="text-center">{{ $order->item_count }}</td>
                                <td class="text-center">
                                    @if ($order->payment_status == 1)
                                        <span class="badge badge-success">Completed</span>
                                    @else
                                        <span class="badge badge-danger">Not Completed</span>
                                    @endif
                                </td>
                                <td class="dropdown text-center">
                                        <a href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                                        @if ($order->status === 'pending')
                                            <span class="badge badge-secondary">{{ucfirst(trans($order->status))}}</span>
                                        @elseif ($order->status === 'processing')
                                            <span class="badge badge-info">{{ucfirst(trans($order->status))}}</span>
                                        @elseif ($order->status === 'completed')
                                            <span class="badge badge-success">{{ucfirst(trans($order->status))}}</span>
                                        @else
                                            <span class="badge badge-danger">Declined</span>
                                        @endif
                                        </a>
                                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.orders.update', [$order->id,'processing']) }}"> Processing</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.orders.update', [$order->id,'completed']) }}"> Completed</a>
                                            </li>
                                            {{-- <li>
                                                <a class="dropdown-item" href="{{ route('admin.orders.update', [$order->id,'pending']) }}"> Pending</a>
                                            </li> --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.orders.update', [$order->id,'decline']) }}"> Decline</a>
                                            </li>
                                        </ul>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.orders.show', $order->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.orders.delete', $order->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush