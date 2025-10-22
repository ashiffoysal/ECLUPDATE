<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;
use App\Models\Wallet;
use App\Models\ExamRequest;
use App\Models\BeforeRequestTutor;
use App\Models\StudentTutorRequest;
use Carbon\Carbon;
use Session;
use Alert;
use Auth;
use Image;
use Mail;
use App\Mail\BankPayment;
use App\Mail\ExamBooking;
use App\Mail\PaymentInvoice;
use App\Mail\ExamBookingDetailsForAdmin;
use DB;
use App\Models\Subject;
use App\Models\MockTest;

class PaymentController extends Controller
{

    public function __construct()
        {
            $this->middleware('auth');
        }
        
        
        
    public function session(Request $request)
    {
        if($request->payment_type=='mock'){
            $booking=ExamRequest::where('id',$request->main_id)->select(['mock_amount','ucas_reference_fee','id','booking_id','is_mock_fees_paid'])->first();
        
            if($booking->is_mock_fees_paid==0){

                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                $session = \Stripe\Checkout\Session::create([
                    'line_items'  => [
                            [
                                'price_data' => [
                                    'currency'     => 'gbp',
                                    'product_data' => [
                                        'name' =>  "ECL Booking ID-".$request->booking_id,
                                    ],
                                    'unit_amount'  => $booking->mock_amount*100,
                                    


                                ],
                                'quantity'   => 1,
                            ],
                    ],
                    'mode'        => 'payment',
                    'success_url' => url('mymock-fees-paid/'.$request->booking_id.'/'.$booking->mock_amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
                    'cancel_url'  => route('checkout'),

                ]);

                return redirect()->away($session->url);


            }else{
                Alert::toast('Already Mock Fees Paid', 'success');
                return redirect()->back();
            }



        }else{


                $data=ExamRequest::where('id',$request->main_id)->first();


            
                $mockprice = $data->mock_test == 'mock_test_yes' ? $data->mock_amount : 0;
                $mainprice = 0;

                if (!empty($data->exam_information)) {
                    $examInfo = json_decode($data->exam_information, true);
                    $subjectIds = array_column($examInfo, 'subject');

                    $subjects = Subject::whereIn('id', $subjectIds)->get()->keyBy('id');

                    $mainprice = array_sum(
                        array_map(function ($mainsub) use ($subjects) {
                            return optional($subjects[$mainsub['subject']])->fees ?? 0;
                        }, $examInfo),
                    );

                $examInfo = json_decode($data->exam_information, true);
                $mainprice = 0;


                if (!empty($examInfo)){
                    $subjectIds = array_column($examInfo, 'subject');
                    $subjects = Subject::whereIn('id', $subjectIds)->pluck('id')->toArray();

                    $mainprice = array_sum(
                        array_map(fn($mainsub) => in_array($mainsub['subject'], $subjects) ? $mainsub['fees'] : 0, $examInfo),
                    );
                }
                
                $amount=$data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $data->admin_specialaccess_amount + $data->special_access_initial_fees-$data->paid_amount;


                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                    $session = \Stripe\Checkout\Session::create([
                        'line_items'  => [
                                [
                                    'price_data' => [
                                        'currency'     => 'gbp',
                                        'product_data' => [
                                            'name' =>  "ECL Booking ID-".$request->booking_id,
                                        ],
                                        'unit_amount'  => $amount*100,
                                        


                                    ],
                                    'quantity'   => 1,
                                ],
                        ],
                        'mode'        => 'payment',
                        'success_url' => url('mybooked/'.$request->booking_id.'/'.$amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
                        'cancel_url'  => route('checkout'),

                    ]);

                    return redirect()->away($session->url);

                }

         }
    }

    public function success(Request $request,$booking_id,$amount)
    {
       
       try {


                        $data=ExamRequest::where('booking_id',$request->booking_id)->select(['paid_amount','id','booking_id'])->first();
                            $newPaidAmount = $data->paid_amount + $amount;
                        $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transection_id'=>$request->session_id,
                            'paid_amount'=>$newPaidAmount,
                            'due_amount'=>0,
                        ]);
         
                        $insert=Wallet::insert([
                            'order_id'=>$booking_id,
                            'user_id'=>Auth::user()->id,
                            'amount_type'=>'Dabit',
                            'amount'=>$newPaidAmount,
                            'paid_by'=>'Card',
                            'is_verified'=>1,
                            'transection_id'=>$request->session_id,
                            'date'=>Carbon::now(),
                            'created_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                        
                         $email="admin@merittutors.co.uk";
                         $maindata=ExamRequest::where('booking_id',$booking_id)->first();
                        //  Mail::to($email)->send(new ExamBookingDetailsForAdmin($maindata));
                         Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                         return redirect('/exam-booking-list');
                        


        } catch (Error $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }


    public function mocksuccess(Request $request,$booking_id,$amount){
         try {
 
                        $data=ExamRequest::where('booking_id',$booking_id)->select(['paid_amount','id','booking_id'])->first();
                        $examInfo = json_decode($data->exam_information, true);
                        $mainprice = 0;
                        if (!empty($examInfo)){
                            $subjectIds = array_column($examInfo, 'subject');
                            $subjects = App\Models\Subject::whereIn('id', $subjectIds)->pluck('id')->toArray();

                            $mainprice = array_sum(
                                array_map(fn($mainsub) => in_array($mainsub['subject'], $subjects) ? $mainsub['fees'] : 0, $examInfo),
                            );
                        }

                         $mockprice = $data->mock_test == 'mock_test_yes' ? $data->mock_amount : 0;
                            $mainprice = 0;

                            if (!empty($data->exam_information)) {
                                $examInfo = json_decode($data->exam_information, true);
                                $subjectIds = array_column($examInfo, 'subject');

                                $subjects = App\Models\Subject::whereIn('id', $subjectIds)->get()->keyBy('id');

                                $mainprice = array_sum(
                                    array_map(function ($mainsub) use ($subjects) {
                                        return optional($subjects[$mainsub['subject']])->fees ?? 0;
                                    }, $examInfo),
                                );
                            }
                        $remaining_amount=$data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $data->admin_specialaccess_amount + $data->special_access_initial_fees - $amount ;
                        $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                            'is_mock_fees_paid'=>1,
                            'is_mockpaid_verify'=>1,
                            'mock_payment_option'=>'Card',
                            'mock_transection_id'=>$request->session_id,
                            'paid_amount'=>$amount,
                            'due_amount'=>$remaining_amount,
                        ]);

                        $update=MockTest::where('booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'paid_amount'=>$amount,
                            
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
                        
                        //  $email="admin@merittutors.co.uk";
                         $maindata=ExamRequest::where('booking_id',$booking_id)->first();
                        //  Mail::to($email)->send(new ExamBookingDetailsForAdmin($maindata));
                        //  Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
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


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     public function onlinepayment(Request $request)
    {
        
                 
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                try {
                    $paymet=Stripe\Charge::create ([
                            "amount" => $request->amount*100,
                            "currency" => "GBP",
                            "source" => $request->stripeToken,
                            "description" => "ECL Booking ID-".$request->booking_id,
                    ]);
                    if($paymet){
                        $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transection_id'=>$paymet->id,
                            'paid_amount'=>$request->amount,
                            'due_amount'=>0,
                        ]);
                        $insert=Wallet::insert([

                            'order_id'=>$request->booking_id,
                            'user_id'=>Auth::user()->id,
                            'amount'=>$request->amount,
                            'amount_type'=>'Dabit',
                            'paid_by'=>'Card',
                            'is_verified'=>1,
                            'transection_id'=>$paymet->id,
                            'date'=>Carbon::now(),
                            'created_at'=>Carbon::now()->toDateTimeString(),

                        ]);
                        $email="admin@merittutors.co.uk";
                         $maindata=ExamRequest::where('booking_id',$request->booking_id)->first();
                         Mail::to($email)->send(new ExamBookingDetailsForAdmin($maindata));
                         Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                        return redirect('/exam-booking-list');
                    }else{
                        Session::flash('error', 'Something Went Wrong!Please try Again');
                        return back();
                    }
               
            } 
             catch(\Stripe\Exception\CardException $e) {
                 Alert::toast('Card Is not Supported','error');
                return redirect()->back();
            } catch (\Stripe\Exception\RateLimitException $e) {
              // Too many requests made to the API too quickly
                Alert::toast('Please Try Again','error');
                return redirect()->back();
            } catch (\Stripe\Exception\InvalidRequestException $e) {
              // Invalid parameters were supplied to Stripe's API
                Alert::toast('Card Is Invalid','error');
                return redirect()->back();
            } catch (\Stripe\Exception\AuthenticationException $e) {
              // Authentication with Stripe's API failed
              // (maybe you changed API keys recently)
            Alert::toast('Stripe failed! Try Again','error');
                return redirect()->back();
            } catch (\Stripe\Exception\ApiConnectionException $e) {
              // Network communication with Stripe failed
                Alert::toast('Stripe failed! Try Again','error');
                return redirect()->back();
            } catch (\Stripe\Exception\ApiErrorException $e) {
              // Display a very generic error to the user, and maybe send
              // yourself an email
                Alert::toast('Email Not Found','error');
                return redirect()->back();
            } catch (Exception $e) {
                  Alert::toast('completely unrelated to Stripe!Try Again','error');
                return redirect()->back();
              // Something else happened, completely unrelated to Stripe
            }
        

        
        
       
    }






    public function bankpayment(Request $request){

   
      $update=ExamRequest::where('booking_id',$request->booking_id)->update([
            'is_paid'=>1,
            'is_paid_verify'=>0,
            'payment_option'=>'Bank',
            'paid_amount'=>$request->amount,
            'due_amount'=>0,
            'transection_id'=>$request->transection_id,
        ]);

        if ($request->hasFile('file')) {
             $extension = $request->file->getClientOriginalExtension();
                if($extension =='pdf'){
                    
                     $photo =$request->file('file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move(public_path().'/uploads/student/', $name);
                        ExamRequest::where('booking_id', $request->booking_id)->update([
                            'transection_image' => 'uploads/student/'.$name,
                        ]);
                    
                }else{
            
                    $image = $request->file('file');
                    $ImageName = 'file' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->save('uploads/student/' . $ImageName);
                    ExamRequest::where('booking_id', $request->booking_id)->update([
                        'transection_image' => 'uploads/student/' . $ImageName,
                    ]);
                }
            
            
            
            
            
        }
      if($update){
             $insert=Wallet::insert([
                'order_id'=>$request->booking_id,
                'user_id'=>Auth::user()->id,
                'amount'=>$request->amount,
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

  
    public function makePaymentFs($booking_id){
        $data=DB::table('functional_skill_tuition')->where('booking_id',$booking_id)->first();
        return view('frontend.FunctionalSkillTuiton.payment',compact('data'));
    }
    
    public function specialAccessPayment($order_id){
        $data=ExamRequest::where('booking_id',$order_id)->first();
        return view('frontend.specialAccesPayment.payment',compact('data'));
    }



}
