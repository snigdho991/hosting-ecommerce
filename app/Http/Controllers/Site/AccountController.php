<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getOrders()
    {
        $orders = auth()->user()->orders()->orderBy('id', 'DESC')->paginate(10);

        return view('site.pages.account.orders', compact('orders'));
    }
    public function getInvoices()
    {
        return view('site.pages.account.invoices');
    }
}