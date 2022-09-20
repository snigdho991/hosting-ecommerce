@extends('layouts.master')
@section('title', $product->name)
@section('content')
<link rel="stylesheet" href="{{ asset('/assets/css/card.css') }}">
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            {{-- <h2 class="title-page">{{ $product->name }}</h2> --}}
        </div>
    </section>
    <section class="section-content bg padding-y border-top mg-t-20" id="site">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }} <a href="{{ route('checkout.cart') }}">Click here</a> to view your cart.</p>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                <div class="card">
                <header class="card-header">
                    <span class="float-right mt-1">{{ $product->code }}</span>
                    <h4 class="card-title mt-2">{{ $product->name }}</h4>
                </header>
                <article class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><label>Storage:</label> {{ $product->storage }} GB</li>
                    <li class="list-group-item"><label>Bandwidth:</label> {{ $product->bandwidth }} GB</li>
                    <li class="list-group-item form-group">
                        <label>Price:</label>
                        @if ($product->special_price > 0)
                            <var class="price text-danger">
                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->special_price }}</span>
                                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>
                            </var>
                        @else
                            <var class="price text-success">
                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->price }}</span>
                            </var>
                        @endif
                    </li>
                    </ul>
                <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                    @csrf
                    <div class="form-group">
                        <label class="col-2 col-form-label">Select Quantity</label>
                        <div class="col-10">
                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:100px;">
                        </div>
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->special_price!='' ? $product->special_price : $product->price }}">
                    </div> <!-- form-group end.// -->  
                    <div class="form-group text-center">
                        <small class="text-muted">{!! $product->description !!}</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-shopping-cart"></i> Add To Cart  </button>
                    </div> <!-- form-group// -->      
                                                             
                </form>
                </article> <!-- card-body end .// -->
                <div class="border-top"></div>
                </div> <!-- card.// -->
                </div> <!-- col.//-->
                
                </div>
            
        </div>
    </section>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->special_price != '' ? $product->special_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>
@endpush