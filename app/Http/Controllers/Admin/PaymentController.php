<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use Carbon\Carbon;


class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function receiveindex()
    {
        $alldata=Wallet::orderBy('id','DESC')->where('amount_type','Dabit')->get();
        // $tamount=Wallet::orderBy('id','DESC')->where('amount_type','Dabit')->whereYear('created_at', '=', '2025')->sum('amount');
        $tamount=Wallet::where('amount_type', 'Debit')
    ->whereBetween('created_at', [
        Carbon::create(2024, 1, 1)->startOfDay(),
        Carbon::create(2024, 6, 25)->endOfDay()
    ])
    ->sum('amount');
        return view('backend.paymentmanage.receive',compact('alldata','tamount'));
    }
    public function payindex()
    {
        $alldata=Wallet::orderBy('id','DESC')->where('amount_type','Credit')->get();
        return view('backend.paymentmanage.pay',compact('alldata'));
    }
}
