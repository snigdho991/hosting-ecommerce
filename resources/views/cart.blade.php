@extends('layouts.master')
@section('title', 'Hosting Home Page')
@section('content')
<div class="container">
    <h2>Your Cart</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
 
        <tbody>
 
            @foreach ($items as $item)
 
                <tr>
                    <td>
                        <p><strong>{{ $item->name }}</strong></p>
                        <p>{{ $item->storage }}</p>
                    </td>
                    <td>{{ $item->quantity}}</td>
                    <td>{{ $item->price}}$</td>
                </tr>
 
            @endforeach
 
        </tbody>
        
        <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Subtotal</td>
                <td><?php echo Cart::subtotal(); ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Tax</td>
                <td><?php echo Cart::tax(); ?></td>
            </tr>
            <?php $tot=$item->price*$item->quantity; ?>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Total</td>
                <td>{{$tot}}$</td>
            </tr>
        </tfoot>
 </table>

 <div class="row justify-content-center" style="padding-right:100px;margin-bottom: 20px;margin-top:20px;">
     <a align="right" style="float:right;" class="btn btn-primary mg-b-10" href="#">Proceed to Checkout</a>
 </div>
</div>

@stop