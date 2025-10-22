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
        $tamount2022=Wallet::orderBy('id','DESC')->where('amount_type','Dabit')->whereYear('created_at', '=', '2022')->sum('amount');
        $tamount2023=Wallet::orderBy('id','DESC')->where('amount_type','Dabit')->whereYear('created_at', '=', '2023')->sum('amount');
        $tamount2024=Wallet::orderBy('id','DESC')->where('amount_type','Dabit')->whereYear('created_at', '=', '2024')->sum('amount');
        $tamount2025=Wallet::orderBy('id','DESC')->where('amount_type','Dabit')->whereYear('created_at', '=', '2025')->sum('amount');

        return view('backend.paymentmanage.receive',compact('alldata','tamount2023','tamount2024','tamount2025','tamount2022'));
    }
    public function payindex()
    {
        $alldata=Wallet::orderBy('id','DESC')->where('amount_type','Credit')->get();
        return view('backend.paymentmanage.pay',compact('alldata'));
    }
}
