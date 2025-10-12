<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wallet;

class StudentPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $alldata=Wallet::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('is_deleted',0)->paginate(10);
        $dabit_amount=Wallet::where('user_id',Auth::user()->id)->where('amount_type','Dabit')->where('is_deleted',0)->sum('amount');
        $credit_amount=Wallet::where('user_id',Auth::user()->id)->where('amount_type','Credit')->where('is_deleted',0)->sum('amount');
        return view('frontend.student.paymenthistory',compact('alldata','dabit_amount','credit_amount'));
    }

    public function paymentHistory(){
        $alldata=Wallet::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('frontend.student.paymenthistory',compact('alldata'));
    }
}
