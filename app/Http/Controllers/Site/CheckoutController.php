<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $payPal;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $this->validate($request, [
            'first_name'     => 'required|max:255',
            'last_name'  => 'required|max:255',
            'address'     => 'required|max:255',
            'city'  => 'required|max:255',
            'country'     => 'required|max:255',
            'post_code'  => 'required|max:255',
            'phone_number'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
        ]);
        $order = $this->orderRepository->storeOrderDetails($request->all());
        Cart::clear();
        // You can add more control here to handle if the order
        // is not stored properly
        if ($order) {
            $this->payPal->processPayment($order);
        }
        
        return redirect()->back()->with('message','Order not placed');
    }
    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}