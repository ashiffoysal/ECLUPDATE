<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamRequest;
use App\Models\Wallet;
use Image;
use Carbon\Carbon;
use Alert;
use Auth;
use Mail;
use App\Mail\BankPayment;
use App\Mail\ExamBooking;
use App\Mail\PaymentInvoice;
use App\Mail\ExamBookingDetailsForAdmin;
use DB;
use Stripe;


class InstallmentController extends Controller
{
    public function bankpaymentIns(Request $request){
       
        $due_amount=$request->total_amount - $request->installment_amount;
        $update=ExamRequest::where('id',$request->examid)->update([
            'is_paid'=>1,
            'is_paid_verify'=>0,
            'payment_option'=>'Bank',
            'paid_amount'=>$request->installment_amount,
            'due_amount'=>$due_amount,
            'is_Installment'=>1,
            'transection_id'=>$request->transection_id,
            'Installment_fee'=>$request->Installment_fee,
            'first_installment_date'=>$request->first_installment_date,
            'second_installment_date'=>$request->second_installment_date,
        ]);

        if ($request->hasFile('file')) {
             $extension = $request->file->getClientOriginalExtension();
                if($extension =='pdf'){
                    
                     $photo =$request->file('file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move(public_path().'/uploads/student/', $name);
                        ExamRequest::where('id', $request->examid)->update([
                            'transection_image' => 'uploads/student/'.$name,
                        ]);
                    
                }else{
            
                    $image = $request->file('file');
                    $ImageName = 'file' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->save('uploads/student/' . $ImageName);
                    ExamRequest::where('id', $request->examid)->update([
                        'transection_image' => 'uploads/student/' . $ImageName,
                    ]);
                }
            
        }
      if($update){
             $insert=Wallet::insert([
                'order_id'=>$request->booking_id,
                'user_id'=>Auth::user()->id,
                'amount'=>$request->installment_amount,
                'amount_type'=>'Dabit',
                'paid_by'=>'Bank Transfer',
                'transection_id'=>$request->transection_id,
                'date'=>Carbon::now(),
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            
         $maindata=ExamRequest::where('booking_id',$request->booking_id)->first();
         Mail::to($maindata->email)->send(new BankPayment());
         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
            return redirect('/exam-booking-list');
        }else{
            Session::flash('error', 'Something Went Wrong!Please try Again');
            return back();
        }
    }

    public function cardPaymentIns(Request $request){

        $mainfees=round($request->amount*100);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'gbp',
                            'product_data' => [
                                'name' =>  "ECL Booking ID-".$request->booking_id,
                            ],
                            'unit_amount'  => $mainfees,
                            


                        ],
                        'quantity'   => 1,
                    ],
            ],
            'mode'        => 'payment',
            'success_url' => url('ilstallment-mybooked/'.$request->Installment_fee.'/'.$request->booking_id.'/'.$request->amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'  => route('checkout'),

        ]);

        return redirect()->away($session->url);
    }


    public function success(Request $request,$Installment_fee,$booking_id,$amount)
    {
       
       try {

                        $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transection_id'=>$request->session_id,
                            'paid_amount'=>$amount,
                            'due_amount'=>$amount,
                            'is_Installment'=>1,
                            'Installment_fee'=>$Installment_fee,
                            'first_installment_date'=>Carbon::now()->format('d-m-Y'),
                            'second_installment_date'=>Carbon::today()->addDays(30)->format('d-m-Y'),
                        ]);
         
                        $insert=Wallet::insert([
                            'order_id'=>$booking_id,
                            'user_id'=>Auth::user()->id,
                            'amount_type'=>'Dabit',
                            'amount'=>$amount,
                            'paid_by'=>'Card',
                            'is_verified'=>1,
                            'transection_id'=>$request->session_id,
                            'date'=>Carbon::now(),
                            'created_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                        
                         $email="admin@merittutors.co.uk";
                         $maindata=ExamRequest::where('booking_id',$booking_id)->first();
                         Mail::to($email)->send(new ExamBookingDetailsForAdmin($maindata));
                         Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                         return redirect('/exam-booking-list');
                        


        } catch (Error $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function checkout(){
        return redirect('/exam-booking-list');
    }


    public function IlstallmentDuepayment($booking_id){
        $check=ExamRequest::where('booking_id',$booking_id)->first();
        if($check->is_Installment==1){
            $data=$check;
            return view('frontend.ilstallment.duepayment',compact('data'));
        }else{
            return redirect('/make-payment/exambooking/'.$booking_id);
        }
    }

    // duepayment
    public function cardDuePaymentIns(Request $request){

        $mainfees=round($request->amount*100);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'gbp',
                            'product_data' => [
                                'name' =>  "ECL Booking ID-".$request->booking_id,
                            ],
                            'unit_amount'  => $mainfees,
                            


                        ],
                        'quantity'   => 1,
                    ],
            ],
            'mode'        => 'payment',
            'success_url' => url('due-payment-ilstallment-mybooked/'.$request->booking_id.'/'.$request->amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'  => route('checkout'),

        ]);

        return redirect()->away($session->url);
    }

    public function Duepaymentsuccess(Request $request,$booking_id,$amount){

                    try {
                        $checkamount=ExamRequest::where('booking_id',$request->booking_id)->first();
                        $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transection_id'=>$request->session_id,
                            'paid_amount'=>$checkamount->paid_amount + $amount,
                            'due_amount'=>0,
                            'is_Installment_completed'=>1,
                        ]);

                        $insert=Wallet::insert([
                            'order_id'=>$booking_id,
                            'user_id'=>Auth::user()->id,
                            'amount_type'=>'Dabit',
                            'amount'=>$amount,
                            'paid_by'=>'Card',
                            'is_verified'=>1,
                            'transection_id'=>$request->session_id,
                            'date'=>Carbon::now(),
                            'created_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                        
                        $email="admin@merittutors.co.uk";
                        $maindata=ExamRequest::where('booking_id',$booking_id)->first();
                        Mail::to($email)->send(new ExamBookingDetailsForAdmin($maindata));
                        Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                        Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                        return redirect('/exam-booking-list');
                        


            } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
            }
    }


    public function bankDuePaymentIns(Request $request){
        $check=ExamRequest::where('id',$request->examid)->first();
        if($check->is_Installment_completed==0){
            $update=ExamRequest::where('id',$request->examid)->update([
                'is_paid'=>1,
                'is_paid_verify'=>0,
                'payment_option'=>'Bank',
                'paid_amount'=>$check->paid_amount + $request->installment_amount,
                'due_amount'=>0,
                'is_Installment_completed'=>1,
                'transection_id'=>$request->transection_id,
            ]);
    
            if ($request->hasFile('file')) {
                 $extension = $request->file->getClientOriginalExtension();
                    if($extension =='pdf'){
                        
                         $photo =$request->file('file');
                            $name = time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/', $name);
                            ExamRequest::where('id', $request->examid)->update([
                                'transection_image' => 'uploads/student/'.$name,
                            ]);
                        
                    }else{
                
                        $image = $request->file('file');
                        $ImageName = 'file' . '_' . time() . '.' . $image->getClientOriginalExtension();
                        Image::make($image)->save('uploads/student/' . $ImageName);
                        ExamRequest::where('id', $request->examid)->update([
                            'transection_image' => 'uploads/student/' . $ImageName,
                        ]);
                    }
                
            }
          if($update){
                 $insert=Wallet::insert([
                    'order_id'=>$request->booking_id,
                    'user_id'=>Auth::user()->id,
                    'amount'=>$request->installment_amount,
                    'amount_type'=>'Dabit',
                    'paid_by'=>'Bank Transfer',
                    'transection_id'=>$request->transection_id,
                    'date'=>Carbon::now(),
                    'created_at'=>Carbon::now()->toDateTimeString(),
                ]);
                
             $maindata=ExamRequest::where('booking_id',$request->booking_id)->first();
             Mail::to($maindata->email)->send(new BankPayment());
                Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                return redirect('/exam-booking-list');
            }else{
                Session::flash('error', 'Something Went Wrong!Please try Again');
                return back();
            }
        }else{
            Alert::toast('You Alredy send request!Please contact if any confusion', 'success');
            return redirect('/exam-booking-list');
        }
       
    }

    
}
