<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\UcasRequest;
use Image;
use Alert;
use App\Models\Wallet;
use App\Mail\BankPayment;
use App\Mail\UcasBooking;
use Mail;
use PDF;

class UcasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create(){
        
    
        // Alert::error('Faild', 'UCAS Applications are currently closed. The application period is not open at this time.');
        // return redirect()->back();
    
        return view('frontend.ucas.applyform');
    }

    public function store(Request $request){

        //  return $request;
        //  Alert::error('Faild', 'UCAS Applications are currently closed. The application period is not open at this time.');
        // return redirect()->back();
       
        $ucasBookingId = 'ucas-' . Auth::user()->id . rand(1111, 9999);

            // Insert initial UCAS request data
            $insertId = UcasRequest::insertGetId([
                'user_id' => Auth::user()->id,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'gender' => $request->gender,
                'emergency_contact_number' => $request->emergency_contact_number,
                'address_line_one' => $request->address_line_one,
                'address_line_two' => $request->address_line_two,
                'city' => $request->city,
                'country' => $request->country,
                'post_code' => $request->post_code,
                'date_of_birth' => $request->date_of_birth,
                'mock_exam_type' => $request->exam_type,
                'review_personal_statement' => $request->review_personal_statement,
                'application_support' => $request->application_support,
                'ucas_booking_id' => $ucasBookingId,
                'created_at' => Carbon::now()->toDateTimeString(),

                'special_access_requirements' => json_encode($request->special_access_requirements) ?? '',
                'update_special_acces' => json_encode($request->special_acces) ?? '',
                'special_acces_evidence' => $request->special_acces_evidence,
               


            ]);
            if ($request->radio10 == 1) {
                UcasRequest::where('id', $insertId)->update([
                    'is_need_pay_sp_fee' => 1,
                    'special_access_initial_fees' => 25,
                     'need_special_access'=>1
                ]);
            }



            // Add optional fees
            if ($request->review_personal_statement === 'yes') {
                UcasRequest::where('id', $insertId)->update(['review_statement_amount' => 50]);
            }

            if ($request->application_support === 'yes') {
                UcasRequest::where('id', $insertId)->update(['doucment_check_amount' => 100]);
            }

            // Handle exam subject details
            $examDetails = [];
            $totalAmount = 0;
            
            if ($request->exam_type === 'GCSE' || $request->exam_type === 'A Level') {
                $fee = $request->exam_type === 'GCSE' ? 70 : 80;
            
                if ($request->has('subject')) {
                    
                    foreach ($request->subject as $index => $subject) {
                        $examDetails[] = [

                            'subject' => $subject,
                            'exam_board' => $request->exam_board[$index] ?? '',
                            'unit_code' => $request->unit_code[$index] ?? '',
                            'paper' => $request->paper[$index] ?? '',
                            'date' => $request->exam_date[$index] ?? '',
                            'fees' => $fee,
                            
                        ];
                        $totalAmount += $fee;
                    }
            
                    UcasRequest::where('id', $insertId)->update([
                        'exam_subject_details' => json_encode($examDetails),
                        'total_subject_amount' => $totalAmount,
                    ]);
                }
            }
            // Handle uploaded documents
            $documentDetails = [];

            if ($request->hasFile('documents')) {
                foreach ($request->documents as $index => $document) {
                    $filename = time() . rand(111, 999) . '.' . $document->getClientOriginalExtension();
                    $document->move(public_path('uploads/'), $filename);

                    $documentDetails[] = [
                        'documents' => $filename,
                        'documents_details' => $request->documents_details[$index] ?? '',
                    ];
                }

                UcasRequest::where('id', $insertId)->update([
                    'application_support_details' => json_encode($documentDetails),
                ]);
            }

            // Upload photo ID
            if ($request->hasFile('photo_id')) {
                $photo = $request->file('photo_id');
                $filename = 'photo_id_' . Auth::user()->id . time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/student/'), $filename);

                UcasRequest::where('id', $insertId)->update([
                    'photo_id' => 'uploads/student/' . $filename,
                ]);
            }

            // Upload recent photo
            if ($request->hasFile('recent_photo')) {
                $recentPhoto = $request->file('recent_photo');
                $filename = 'recent_photo_' . Auth::user()->id . time() . '.' . $recentPhoto->getClientOriginalExtension();
                $recentPhoto->move(public_path('uploads/student/'), $filename);

                UcasRequest::where('id', $insertId)->update([
                    'recent_photo' => 'uploads/student/' . $filename,
                ]);
            }

            if ($request->signed) {
                $this->saveBase64Image($request->signed, 'uploads/student/exambooking/', 'signature', $insertId);
            }

            // Send email confirmation and redirect
            if ($insertId) {
                Mail::to($request->email)->send(new UcasBooking());
                Alert::toast('Your UCAS booking was successful.', 'success');

                return redirect('/make-payment/ucas-booking/' . $ucasBookingId);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'UCAS booking could not be processed.'], 500);
            }

    }
    
    public function payment($ucas_booking_id){
       $data=UcasRequest::where('ucas_booking_id',$ucas_booking_id)->first();
       return view('frontend.ucas.ucaspayment',compact('data'));
    }
    
    public function onlinepayment(Request $request){
       
       Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'gbp',
                            'product_data' => [
                                'name' =>  "ECL Booking ID-".$request->booking_id,
                            ],
                            'unit_amount'  => $request->amount*100,
                            


                        ],
                        'quantity'   => 1,
                    ],
            ],
            'mode'        => 'payment',
            'success_url' => url('/myucasbooked/'.$request->booking_id.'/'.$request->amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'  => route('ucas.checkout'),

        ]);

        return redirect()->away($session->url);
        
    }
    
       public function success(Request $request,$booking_id,$amount)
    {
       
       try {

                        $update=UcasRequest::where('ucas_booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transaction_id'=>$request->session_id,
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
                        
                        $data=UcasRequest::where('ucas_booking_id',$booking_id)->first();
                        $pdf = PDF::loadView('invoice.ucasinvoice',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
                        'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
                        
                        $datas["email"] = $data->email;
                        $datas["title"] = "Welcome to ECL";
                        $datas["body"] = "This is the email body.";
                        
                           Mail::send("mail.ucas_card_payment", $datas, function ($message) use ($datas, $pdf) {
                         
                             $message->to($datas["email"])
                                ->subject("ECL UCAS-Invoice")
                                ->attachData($pdf->output(), "Invoice.pdf");
                        });
              
                         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                        return redirect('/ucas-exam-booking-list');
                        


        } catch (Error $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    
    
    
    public function checkout(){
        return redirect()->back();
    }
    
      public function bankpayment(Request $request){
        
      $update=UcasRequest::where('ucas_booking_id',$request->booking_id)->update([
            'is_paid'=>1,
            'is_paid_verify'=>0,
            'payment_option'=>'Bank',
            'paid_amount'=>$request->amount,
            'transaction_id'=>$request->transection_id,
        ]);

        if ($request->hasFile('file')) {
             $extension = $request->file->getClientOriginalExtension();
                if($extension =='pdf'){
                    
                     $photo =$request->file('file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move(public_path().'/uploads/student/', $name);
                        UcasRequest::where('id', $request->id)->update([
                            'transection_image' => 'uploads/student/'.$name,
                        ]);
                    
                }else{
            
                    $image = $request->file('file');
                    $ImageName = 'file' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->save('uploads/student/' . $ImageName);
                    UcasRequest::where('id', $request->id)->update([
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
            
                 $maindata=UcasRequest::where('ucas_booking_id',$request->booking_id)->first();
                 Mail::to($maindata->email)->send(new BankPayment());
                 
         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
            return redirect('/ucas-exam-booking-list');
        }else{
            Session::flash('error', 'Something Went Wrong!Please try Again');
            return back();
        }
        
    }



    
        private function saveBase64Image($base64, $path, $column, $insertId)
        {
            $imageParts = explode(';base64,', $base64);
            $imageTypeAux = explode('image/', $imageParts[0]);
            $imageType = $imageTypeAux[1];
            $imageBase64 = base64_decode($imageParts[1]);
            $file = $path . uniqid() . '.' . $imageType;
            file_put_contents(public_path($file), $imageBase64);
            UcasRequest::where('id', $insertId)->update([
                $column => $file,
            ]);
        }
}
