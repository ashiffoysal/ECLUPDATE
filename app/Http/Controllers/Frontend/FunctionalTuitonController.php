<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
use Alert;
use App\Models\Wallet;
use Image;
use Session;
use Mail;
Use App\Mail\proctorMail;

class FunctionalTuitonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


public function functionalSkillTuition(){
        return view('frontend.FunctionalSkillTuiton.create');
    }
    
    public function functionalSkillTuitionSubmit(Request $request){
        $rand_id=rand(11111,99999);
        $booking_id='FST-'.Auth::user()->id.$rand_id;
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'emergency_number' => 'required',
            'address_line_1' => 'required',
            'post_code' => 'required',
            'fileUpload' => 'required',
            
        ]);
        $insert=DB::table('functional_skill_tuition')->insertGetId([
            'booking_id'=>$booking_id,
            'user_id'=>Auth::user()->id,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'date_of_birth'=>$request->date_of_birth,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'emergency_number'=>$request->emergency_number,
            'address_line_1'=>$request->address_line_1,
            'address_line_2'=>$request->address_line_2,
            'post_code'=>$request->post_code,
            'city'=>$request->city,
            'post_code'=>$request->post_code,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
     $exam_information = array();
        if ($request->has('subject')) {
            $total_amount=0;
            foreach ($request->subject as $key => $no) {
              
                $item['subject'] = $request->subject[$key];
                $item['hour'] = $request->hour[$key];
                $item['fees'] = $request->fees_hidden[$key];
                array_push($exam_information, $item);
                $total_amount=$total_amount + $request->fees_hidden[$key];
            }
            $update=DB::table('functional_skill_tuition')->where('id',$insert)->update([
                'subject_details'=>json_encode($exam_information),
                'paid_amount'=>0,
                'total_amount'=>$total_amount,
                'due_amount'=>0,
            ]);
        }
        
        
        
        
        if ($request->hasFile('fileUpload')) {
                $photo =$request->file('fileUpload');
                $name = 'photo_id_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                $newfile =$photo->move(public_path().'/uploads/student/functionalskill/', $name);
                DB::table('functional_skill_tuition')->where('id',$insert)->update([
                    'photo_id' => 'uploads/student/functionalskill/'.$name,
                ]);
        }
        if($request->hasFile('thumbnail_img')) {
       
                    $photos =$request->file('thumbnail_img');
                    $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                    $newfiles =$photos->move(public_path().'/uploads/student/functionalskill/', $names);
                    DB::table('functional_skill_tuition')->where('id',$insert)->update([
                        'recent_photo' => 'uploads/student/functionalskill/'.$names,
                    ]);
            
        }
        
        if($insert){
               Alert::toast('Tuition booking success! Please Pay', 'success');
                return redirect('/make-payment/functional-skils-tuition/'.$booking_id);
            } else {
                Alert::toast('Something Went Wrong', 'error');
                return redirect()->back();
            }
        
    }
    
    public function onlinePaymentFS(Request $request){
        
        
        
        
          
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
            'success_url' => url('/mybooked/'.$request->booking_id.'/'.$request->amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'  => route('checkout'),

        ]);

        return redirect()->away($session->url);
     
        
        
    }
    
    public function success(Request $request,$booking_id,$amount)
    {
       
       try {

                        $update=DB::table('functional_skill_tuition')->where('booking_id',$booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transection_id'=>$request->session_id,
                            'paid_amount'=>$amount,
                            'due_amount'=>0,
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
                        
                        
                        Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                        return redirect('/exam-booking-list');
                        


        } catch (Error $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    
    
    
    
    
    public function bankPaymentFS(Request $request){
   
   
      $update=DB::table('functional_skill_tuition')->where('booking_id',$request->booking_id)->update([
            'is_paid'=>1,
            'is_paid_verify'=>0,
            'payment_option'=>'Bank',
            'paid_amount'=>$request->amount,
            'due_amount'=>0,
            'transection_id'=>$request->transection_id,
        ]);

        if ($request->hasFile('file')) {
                    
                     $photo =$request->file('file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move(public_path().'/uploads/student/', $name);
                        DB::table('functional_skill_tuition')->where('booking_id',$request->booking_id)->update([
                            'transection_image' => 'uploads/student/'.$name,
                        ]);
            
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
            
               
                 
            Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
            return redirect('/functional-skill-tuition-booking-list');
        }else{
              Alert::toast('Something Went Wrong!Please try Again', 'error');
              return back();
        }
    }
    
    
    public function fsindex(){
        $alldata=DB::table('functional_skill_tuition')->where('user_id',Auth::user()->id)->paginate(10);
        return view('frontend.student.fstuitionIndex',compact('alldata'));
    }
    
     public function fsdetails($booking_id){
        $data=DB::table('functional_skill_tuition')->where('booking_id',$booking_id)->first();
        return view('frontend.student.fstuitionDetails',compact('data'));
    }
    
    public function cancelpaymentfs(){
        return redirect('/');
    }
    
    public function proctorexamsCreate(){
        return view('frontend.proctorexam.create');
    }
    
    public function proctorexamsStore(Request $request){
        $rand_id=rand(11111,99999);
        $booking_id='PROCTOR-'.Auth::user()->id.$rand_id;
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'post_code' => 'required',
            'fileUpload' => 'required',
            
        ]);
        $insert=DB::table('proctor_exam')->insertGetId([
            'booking_id'=>$booking_id,
            'user_id'=>Auth::user()->id,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
        
            'email'=>$request->email,
            'phone_number'=>$request->phone,
            'gender'=>$request->gender,
            'emergency_phone'=>$request->emergency_number,
            'address'=>$request->address,
            
            'post_code'=>$request->post_code,
            'city'=>$request->city,
            'post_code'=>$request->post_code,
            'total_amount'=>0,
            'due_amount'=>0,
            'paid_amount'=>0,
            
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
       $exam_information = array();
        if ($request->has('subject')) {
            $total_amount=0;
            foreach ($request->subject as $key => $no) {
              
                $item['subject'] = $request->subject[$key];
                $item['hour'] = $request->hour[$key];
                $item['fees'] = $request->fees_hidden[$key];
                array_push($exam_information, $item);
                $total_amount=$total_amount + $request->fees_hidden[$key];
            }
            $update=DB::table('proctor_exam')->where('id',$insert)->update([
                'subject_details'=>json_encode($exam_information),
                'paid_amount'=>0,
                'total_amount'=>$total_amount + 30,
                'due_amount'=>0,
            ]);
        }
        
        
        
        
        if ($request->hasFile('fileUpload')) {
                $photo =$request->file('fileUpload');
                $name = 'photo_id_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                $newfile =$photo->move(public_path().'/uploads/student/functionalskill/', $name);
                DB::table('proctor_exam')->where('id',$insert)->update([
                    'photo_id' => 'uploads/student/functionalskill/'.$name,
                ]);
        }
      
        
        if($insert){
            
                    $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$booking_id,
                    ]);
                     
                     Mail::to($request->email)->send(new proctorMail($user));
               Alert::toast('Exam booking success! Please Pay', 'success');
                return redirect('proctor-exam/make-payment/'.$booking_id);
            } else {
                Alert::toast('Something Went Wrong', 'error');
                return redirect()->back();
            }
    }
    
    public function proctorexamsMakePayment($booking_id){
        $data=DB::table('proctor_exam')->where('booking_id',$booking_id)->first();
        return view('frontend.proctorexam.payment',compact('data'));
        
        
    }
    public function proctorexamsOnlinepayment(Request $request){
        
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                    [
                        'price_data' => [
                            'currency' => 'gbp',
                            'product_data' => [
                                'name' =>  "ECL Booking ID-".$request->booking_id,
                            ],
                            'unit_amount'  => $request->amount*100,
                            


                        ],
                        'quantity'   => 1,
                    ],
            ],
            'mode'        => 'payment',
            'success_url' => url('/proctorexam/booked/'.$request->booking_id.'/'.$request->amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'  => url('/'),

        ]);

        return redirect()->away($session->url);
    }
    
    
     public function Proctoresuccess(Request $request,$booking_id,$amount)
    {
       
       try {

                        $update=DB::table('proctor_exam')->where('booking_id',$booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transection_id'=>$request->session_id,
                            'paid_amount'=>$amount,
                            'due_amount'=>0,
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
                        
                        
                        Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                        return redirect('/exam-booking-list');
                        


        } catch (Error $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    
     public function bankPaymentProctorexam(Request $request){
   
   
      $update=DB::table('proctor_exam')->where('booking_id',$request->booking_id)->update([
            'is_paid'=>1,
            'is_paid_verify'=>0,
            'payment_option'=>'Bank',
            'paid_amount'=>$request->amount,
            'due_amount'=>0,
            'transection_id'=>$request->transection_id,
        ]);

        if ($request->hasFile('file')) {
                    
                     $photo =$request->file('file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move(public_path().'/uploads/student/', $name);
                        DB::table('proctor_exam')->where('booking_id',$request->booking_id)->update([
                            'transection_image' => 'uploads/student/'.$name,
                        ]);
            
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
            
               
                 
            Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
            return redirect('/functional-skill-tuition-booking-list');
        }else{
              Alert::toast('Something Went Wrong!Please try Again', 'error');
              return back();
        }
    }
    
    
    public function coursePurchaseList(){
        $allData=DB::table('course_purchase')->where('user_id',Auth::user()->id)->where('is_deleted',0)->get();
        return view('frontend.student.coursepurchaselist',compact('allData'));
    }
    
    
    
    public function iesbBookingList(){
        $allData=DB::table('iseb_exams')->where('user_id',Auth::user()->id)->where('is_deleted',0)->get();
        return view('frontend.student.iseblist',compact('allData'));
    }
    
    public function iesbBookingDetails($booking_id){
         $data=DB::table('iseb_exams')->where('user_id',Auth::user()->id)->where('booking_id',$booking_id)->first();
          return view('frontend.student.isebdetails',compact('data'));
    }
    
    
    public function proctorBookingList(){
        $allData=DB::table('proctor_exam')->where('user_id',Auth::user()->id)->where('is_deleted',0)->get();
        return view('frontend.student.proctor.proctorexamlist',compact('allData'));
    }
    
    public function proctorBookingDetails($booking_id){
        $data=DB::table('proctor_exam')->where('user_id',Auth::user()->id)->where('booking_id',$booking_id)->first();
          return view('frontend.student.proctor.details',compact('data'));
    }
  
}
