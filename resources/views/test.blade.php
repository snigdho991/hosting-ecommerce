@extends('layouts.master')
@section('title', 'Hosting Home Page')
@section('content')
<a class="btn btn-danger" href="{{ route('product.add.cart','1') }}">Add</a>
@stop