@extends('layouts.master')
@section('title', $category->name)
@section('content')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">{{ $category->name }}</h2>
    </div>
</section>
<section id="pricing" class="container-fluid">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
                @forelse($category->products as $product)
                {{--
                    <div class="col-md-4">
                        <figure class="card card-product">
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right"><i
                                        class="fa fa-cart-arrow-down"></i> Buy Now</a>
                                @if ($product->special_price != 0)
                                <div class="price-wrap h5">
                                    <span class="price"> {{ config('settings.currency_symbol').$product->special_price }} </span>
                                    <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                </div>
                                @else
                                <div class="price-wrap h5">
                                    <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                </div>
                                @endif
                            </div>
                        </figure>
                    </div> 
                --}}


            <div class="col-sm-6 col-md-4">
                <div class="pricing-box pr-color3">
                    <div class="pricing-title" title="{{ $category->name }}">
                        @if ($product->status == 0)
                            <a href="#">
                        @else
                            <a href="{{ route('product.show', $product->slug) }}">
                        @endif
                                {{ $product->name }}
                            </a></div>
                    <div class="pricing-box-body">
                        <div class="pricing-amount">
                            @if ($product->special_price != 0)
                            <div class="price">
                                <span class="price"> {{ config('settings.currency_symbol').$product->special_price }}
                                </span>
                                <br><del class="price-old">
                                    {{ config('settings.currency_symbol').$product->price }}</del>
                            </div>
                            @else
                            <div class="price">
                                <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                            </div>
                            @endif
                            <span class="duration">monthly</span>
                        </div>

                        <div class="pricing-details">
                            <ul>
                                <li>Storage — {{$product->storage}} GB</li>
                                <li>Bandwidth ( Traffic ) — {{$product->bandwidth}} GB</li>
                                <li>Domain name — Free!</li>
                                <li>Ram — 128 MB</li>
                                <li>Subdomains — 10</li>
                                <li>Sharing data</li>
                                <li>Unlimited Email Account</li>
                                <li>Support 24/7</li>
                                <li>One Click Install</li>
                                <li>Private SSL & IP</li>
                                <li>Free VoIP Phone Service</li>
                            </ul>
                        </div>
                        @if ($product->status == 0)
                        <div class="pricing-button"><a href="#" class="btn btn-danger">Not Active</a></div>
                        @else
                        <div class="pricing-button"><a href="{{ route('product.show', $product->slug) }}"
                                class="pricing-button">Buy now</a></div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <p>No Products found in {{ $category->name }}.</p>
            @endforelse
        </div>
    </div>
    </div>
</section>
@stop