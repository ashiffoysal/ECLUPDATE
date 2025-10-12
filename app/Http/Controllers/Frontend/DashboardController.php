<?php

namespace App\Http\Controllers\Frontend;


use App\Models\User;
use App\Models\VerificationCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TutoringSubject;
use App\Models\smschat;
use App\Models\TutorEducation;
use App\Models\SelectedTutorSubject;
use App\Models\Aricle;
use App\Models\Wallet;
use App\Mail\IsebBookingMail;
use App\Mail\CoursePurchaseMail;
use App\Models\StudentTutorRequest;
use Illuminate\Support\Facades\Auth;
use Devfaysal\BangladeshGeocode\Models\Division;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use DB;
use Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        
        $allsubject=TutoringSubject::where('is_deleted',0)->where('status',1)->select(['name','id'])->get();
        return view('frontend.dashboard.dashboard',compact('allsubject'));
    }

// tutor profile update
    public function tutorprofileupdate(Request $request){


        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'date_of_birth' => 'required',
            'address_line_1' => 'required',
            'zip_code' => 'required',
        ]);

        $update=User::where('id',$request->id)->update([

            'for_branch_tutor'=>$request->for_branch,
            'for_online_tutor'=>$request->for_online,
            'for_home_tutor'=>$request->for_home,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'date_of_birth'=>$request->date_of_birth,
            'address'=>$request->address_line_1,
            'address_two'=>$request->address_line_2,
            'branch'=>$request->branch_name,
            'subject'=>json_encode($request->subjects),
            'city'=>$request->city,
            'name_of_title'=>$request->title,
            'gender'=>$request->gender,
            'travel_distence'=>$request->travel_distence,
            'gcse_institution'=>$request->gcse_institution,
            'gcse_grade'=>$request->gcse_grade,
            'gcse_subject'=>$request->gcse_subject,
            'a_level_institution'=>$request->a_level_institution,
            'a_level_grade'=>$request->a_level_grade,
            'a_level_subject'=>$request->a_level_subject,
            'degree_institution'=>$request->degree_institution,
            'degree_grade'=>$request->degree_grade,
            'degree_subject'=>$request->degree_subject,
            'masters_institution'=>$request->masters_institution,
            'masters_grade'=>$request->masters_grade,
            'masters_subject'=>$request->masters_subject,
            'headline_for_tutor'=>$request->headline_for_tutor,
            'bio_details'=>$request->bio_details,
            'tutor_experience'=>$request->tutor_experience,
            'expected_hourly_rate'=>$request->expected_hourly_rate,
            'zip'=>$request->zip_code,

        ]);
        if($request->subjects !=null){
            $checks=SelectedTutorSubject::where('tutor_id',Auth::user()->id)->get();
            if($checks){
                $dele=SelectedTutorSubject::where('tutor_id',Auth::user()->id)->delete();
                foreach($request->subjects as $row){
                    $subinsert=SelectedTutorSubject::insert([
                        'tutor_id'=>Auth::user()->id,
                        'subject_id'=>$row,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);

                }

            }else{
                foreach($request->subjects as $row){
                    $subinsert=SelectedTutorSubject::insert([
                        'tutor_id'=>Auth::user()->id,
                        'subject_id'=>$row,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);

                }
            }
        }

        if ($request->hasFile('gcse_image')) {
            $image = $request->file('gcse_image');
            $ImageName = 'gcse_image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', $request->id)->update([
                'gcse_certificate_image' => 'uploads/student/' . $ImageName,
            ]);
        }
        if ($request->hasFile('a_level_certificate_image')) {
            $image = $request->file('a_level_certificate_image');
            $ImageName = 'a_level_certificate_image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', $request->id)->update([
                'a_level_certificate_image' => 'uploads/student/' . $ImageName,
            ]);
        }
        if ($request->hasFile('degree_certificate_image')) {
            $image = $request->file('degree_certificate_image');
            $ImageName = 'degree_certificate_image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', $request->id)->update([
                'degree_certificate_image' => 'uploads/student/' . $ImageName,
            ]);
        }

        if ($request->hasFile('masters_certificate_image')) {
            $image = $request->file('masters_certificate_image');
            $ImageName = 'masters_certificate_image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', $request->id)->update([
                'masters_certificate_image' => 'uploads/student/' . $ImageName,
            ]);
        }

        


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'Tutor_profile' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', $request->id)->update([
                'photo' => 'uploads/student/' . $ImageName,
            ]);
        }

        // cv
        if($request->hasFile('cv')) {

            $photo =$request->file('cv');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $newfile =$photo->move(public_path().'/uploads/', $name);
            User::where('id', $request->id)->update([
                'cv' => $name,
            ]);
            
        }
        
        if ($update) {
            Alert::toast('congratulation ! successfully update', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }

// tutor informaion update
    public function tutorinformation(){
        return view('frontend.tuitor.information');
    }

    // student request
     public function studentrequestlist(){

        $alldata=StudentTutorRequest::where('tutor_id',Auth::user()->id)
        ->where('is_deleted',0)
        ->where('is_approve',1)
        ->with(['Student','Tutor'])
        ->orderBy('id','DESC')->get();
        return view('frontend.tuitor.studentrequestlist',compact('alldata'));
    }
    public function studentrequestlistview($id){
        $data=StudentTutorRequest::where('tutor_id',Auth::user()->id)
        ->where('id',$id)
        ->with(['Student','Tutor'])
        ->first();
        return view('frontend.tuitor.viewrequest',compact('data'));
    }

    public function studentrequestlistaccept($id){
        $data=StudentTutorRequest::where('tutor_id',Auth::user()->id)
        ->where('id',$id)->update([
            'tutor_is_approve'=>1,
        ]);
        if ($data) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }

    public function studentrequestlistreject($id){
        
        $data=StudentTutorRequest::where('tutor_id',Auth::user()->id)->where('id',$id)->select(['id'])->first();
      
        return response()->json($data);
    }
    // 
    public function studentrejectRequest(Request $request){
        $update=StudentTutorRequest::where('tutor_id',Auth::user()->id)->where('id',$request->requ_id)->update([
            'tutor_reject_reson'=>$request->reeject_reason,
            'tutor_is_approve'=>2,
        ]);
        if ($update) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
      
    }

    public function tutor_account(){

        $allsubject=TutoringSubject::where('is_deleted',0)->where('status',1)->select(['name','id'])->get();
        return view('frontend.tuitor.tutor_account',compact('allsubject'));
        
    }

    // dbs
    public function dbscertification(){
         return view('frontend.tuitor.dbs');
    }

     public function dbscertificationsubmit(Request $request){

       
         $validated = $request->validate([
            'thumbnail_img' => 'required',
        ]);
        $insert=VerificationCenter::insertGetId([
            'item_name'=>'DBS Certification',
            'user_id'=>Auth::user()->id,
            'date'=>Carbon::now(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('thumbnail_img')) {
            $image = $request->file('thumbnail_img');
            $ImageName = 'Tutor_DBS' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            VerificationCenter::where('id', $insert)->update([
                'image' => 'uploads/student/' . $ImageName,
            ]);
        }
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }

         
    }
    


    // verification
    public function verification(){

       $maindata=VerificationCenter::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
       $dbs=VerificationCenter::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('item_name','DBS Certification')->first();
       $proof_of_address=VerificationCenter::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('item_name','Proof Of Address')->first();
       $profileimage=VerificationCenter::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('item_name','Profile Image')->first();
       $cv=VerificationCenter::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('item_name','CV')->first();
       return view('frontend.tuitor.verification',compact('maindata','dbs','proof_of_address','profileimage','cv'));
    }


    // proof of address
      // verification
      public function proofofaddress(){
       
        return view('frontend.tuitor.proof_of_address');
     }
     public function proofofaddresssubmit(Request $request){
        $validated = $request->validate([
           'thumbnail_img' => 'required',
       ]);
       $insert=VerificationCenter::insertGetId([
           'item_name'=>'Proof Of Address',
           'proof_of_address'=>$request->address_type,
           'user_id'=>Auth::user()->id,
           'date'=>Carbon::now(),
           'created_at'=>Carbon::now()->toDateTimeString(),
       ]);
       if ($request->hasFile('thumbnail_img')) {
           $image = $request->file('thumbnail_img');
           $ImageName = 'Tutor_proof_of_adrress' . '_' . time() . '.' . $image->getClientOriginalExtension();
           Image::make($image)->save('uploads/student/' . $ImageName);
           VerificationCenter::where('id', $insert)->update([
               'image' => 'uploads/student/' . $ImageName,
           ]);
       }
       if ($insert) {
           Alert::toast('congratulation ! success', 'success');
           return redirect()->back();
       } else {
           Alert::toast('Something Went Wrong', 'error');
           return redirect()->back();
       }
   }

//    profilie
    public function profileimage(){

        return view('frontend.tuitor.profileimage');
    }

    public function profileimagesubmit(Request $request){

       
        $validated = $request->validate([
           'thumbnail_img' => 'required',
       ]);
       $insert=VerificationCenter::insertGetId([
           'item_name'=>'Profile Image',
           'user_id'=>Auth::user()->id,
           'date'=>Carbon::now(),
           'created_at'=>Carbon::now()->toDateTimeString(),
       ]);
       
       if ($request->hasFile('thumbnail_img')) {
           $image = $request->file('thumbnail_img');
           $ImageName = 'Profile_Image' . '_' . time() . '.' . $image->getClientOriginalExtension();
           Image::make($image)->save('uploads/student/' . $ImageName);
           VerificationCenter::where('id', $insert)->update([
               'image' => 'uploads/student/' . $ImageName,
           ]);
       }
       $update=User::where('id',Auth::user()->id)->update([
           'photo'=>'uploads/student/' . $ImageName,
       ]);
       if ($insert) {
           Alert::toast('congratulation ! success', 'success');
           return redirect()->back();
       } else {
           Alert::toast('Something Went Wrong', 'error');
           return redirect()->back();
       }

   }


    // cv uploads
    public function cvuploads(){
        return view('frontend.tuitor.cv');
    }

    public function cvuploadsubmit(Request $request){
        $validated = $request->validate([
            'cv' => 'required',
        ]);
        $insert=VerificationCenter::insertGetId([
            'item_name'=>'CV',
            'user_id'=>Auth::user()->id,
            'date'=>Carbon::now(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('cv')) {

            $photo =$request->file('cv');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $newfile =$photo->move(public_path().'/uploads/', $name);
            VerificationCenter::where('id', $insert)->update([
                'image' => $name,
            ]);
            
        }
      
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }

    // educational
    public function educationalInformation(){
        $maindata=TutorEducation::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        $basic_identity=TutorEducation::where('user_id',Auth::user()->id)->where('basic_identity',1)->orderBy('id','ASC')->get();
        $gcse=TutorEducation::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('name_of_degree','GCSE')->where('basic_identity',0)->first();
        $alevel=TutorEducation::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('name_of_degree','A Level')->where('basic_identity',0)->first();
        $masters=TutorEducation::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('name_of_degree','Degree')->where('basic_identity',0)->first();
        $degree=TutorEducation::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('name_of_degree','Masters')->where('basic_identity',0)->first();
        return view('frontend.tuitor.educational_identification',compact('maindata','gcse','alevel','masters','degree','basic_identity'));
    }

    // gcse submit
    public function gcsesubmit(Request $request){
        $validated = $request->validate([
            'name_of_degree' => 'required',
            'institution' => 'required',
            'grade' => 'required',
            'subject' => 'required',
        ]);
        $insert=TutorEducation::insertGetId([
            'name_of_degree'=>'GCSE',
            'institution'=>$request->institution,
            'grade'=>$request->grade,
            'subject'=>$request->subject,
            'user_id'=>Auth::user()->id,
            'date'=>Carbon::now(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('gcse_image')) {
            $image = $request->file('gcse_image');
            $ImageName = 'GCSe' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            TutorEducation::where('id', $insert)->update([
                'image' => 'uploads/student/' . $ImageName,
            ]);
        }
        
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }


        
    }
    public function alevelsubmit(Request $request){
        $validated = $request->validate([
            'name_of_degree' => 'required',
            'institution' => 'required',
            'grade' => 'required',
            'subject' => 'required',
        ]);
        $insert=TutorEducation::insertGetId([
            'name_of_degree'=>'A Level',
            'institution'=>$request->institution,
            'grade'=>$request->grade,
            'subject'=>$request->subject,
            'user_id'=>Auth::user()->id,
            'date'=>Carbon::now(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('alevel_image')) {
            $image = $request->file('alevel_image');
            $ImageName = 'GCSe' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            TutorEducation::where('id', $insert)->update([
                'image' => 'uploads/student/' . $ImageName,
            ]);
        }
        
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }

    }
    public function degreesubmit(Request $request){
        $validated = $request->validate([
            'name_of_degree' => 'required',
            'institution' => 'required',
            'grade' => 'required',
            'subject' => 'required',
        ]);
        $insert=TutorEducation::insertGetId([
            'name_of_degree'=>'Degree',
            'institution'=>$request->institution,
            'grade'=>$request->grade,
            'subject'=>$request->subject,
            'user_id'=>Auth::user()->id,
            'date'=>Carbon::now(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('degree_image')) {
            $image = $request->file('degree_image');
            $ImageName = 'GCSe' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            TutorEducation::where('id', $insert)->update([
                'image' => 'uploads/student/' . $ImageName,
            ]);
        }
        
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }

    }
    public function masterssubmit(Request $request){
        $validated = $request->validate([
            'name_of_degree' => 'required',
            'institution' => 'required',
            'grade' => 'required',
            'subject' => 'required',
        ]);
        $insert=TutorEducation::insertGetId([
            'name_of_degree'=>'Masters',
            'institution'=>$request->institution,
            'grade'=>$request->grade,
            'subject'=>$request->subject,
            'user_id'=>Auth::user()->id,
            'date'=>Carbon::now(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('masters_image')) {
            $image = $request->file('masters_image');
            $ImageName = 'GCSe' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            TutorEducation::where('id', $insert)->update([
                'image' => 'uploads/student/' . $ImageName,
            ]);
        }
        
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }

    // 
    public function moresubmit(Request $request){

        $validated = $request->validate([
            'institution' => 'required',
            'grade' => 'required',
            'subject' => 'required',
        ]);
        $insert=TutorEducation::insertGetId([
            'name_of_degree'=>$request->name_of_degree,
            'institution'=>$request->institution,
            'grade'=>$request->grade,
            'basic_identity'=>1,
            'subject'=>$request->subject,
            'user_id'=>Auth::user()->id,
            'date'=>Carbon::now(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('more_image')) {
            $image = $request->file('more_image');
            $ImageName = 'more_image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            TutorEducation::where('id', $insert)->update([
                'image' => 'uploads/student/' . $ImageName,
            ]);
        }
        
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }
    public function allmessage(){
        
        $alldata=DB::table('smschats')
        ->where('smschats.receiver_id',Auth::user()->id)
        ->get();
        return view('frontend.smschat.index',compact('alldata'));
         
    }

    public function viewmessage($id){

        $allsms=DB::table('smschats')
        ->where('receiver_id',Auth::user()->id)
        ->where('sender_id',$id)
        ->orderby('id','ASC')
        ->get();
        return view('frontend.smschat.viewchat',compact('allsms','id'));

    }

    public function tutormessagesubmit(Request $request){

        $insert=smschat::insert([
            'message'=>$request->message,
            'type'=>'receiver',
            'sender_id'=>$request->sender_id,
            'outgoing_id'=>$request->sender_id,
            'receiver_id'=>Auth::user()->id,
            'incomming_id'=>Auth::user()->id,
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }


    // sms chat
    public function messagechat(Request $request){
        $insert=smschat::insert([
            'message'=>$request->message,
            'type'=>'outgoing',
            'sender_id'=>Auth::user()->id,
            'outgoing_id'=>Auth::user()->id,
            'receiver_id'=>$request->tutor_id,
            'incomming_id'=>$request->tutor_id,
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }


    public function tutorarticals(){
        $allsubject=TutoringSubject::get();
        return view('frontend.tuitor.artical',compact('allsubject'));
    }


    public function tutorarticalssubmit(Request $request){
        $insert=Aricle::insert([
            'title'=>$request->title,
            'user_id'=>Auth::user()->id,
            'subject'=>$request->subject,
            'details'=>$request->editor1,
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }

    public function tutorarticalsindex(){
        $alldata=Aricle::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('frontend.tuitor.articalindex',compact('alldata'));
    }

    public function tutorarticalsedit($id){
        $allsubject=TutoringSubject::get();
        $data=Aricle::where('user_id',Auth::user()->id)->where('id',$id)->first();
        return view('frontend.tuitor.articaleupdate',compact('data','allsubject'));
    }
    // update
    public function tutorarticalsupdate(Request $request){

        $insert=Aricle::where('id',$request->id)->update([
            'title'=>$request->title,
            'user_id'=>Auth::user()->id,
            'subject'=>$request->subject,
            'details'=>$request->editor1,
            'updated_at'=>carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        }else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }

    }


    public function articaledelete($id){
        $delete=Aricle::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        if ($delete) {
            Alert::toast('congratulation ! success', 'success');
            return redirect()->back();
        }else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }

    public function coursePurchase($id){
        $data=DB::table('allexamcources')->where('id',$id)->first();
        $booking_id='course-'.Auth::user()->id.rand(9999,11111);
        $insert=DB::table('course_purchase')->insertGetId([
            'first_name'=>Auth::user()->name,
            'last_name'=>Auth::user()->last_name,
            'phone'=>Auth::user()->phone,
            'email'=>Auth::user()->email,
            'user_id'=>Auth::user()->id,
            'booking_id'=>$booking_id,
            'course_id'=>$data->id,
            'course_name'=>$data->course_title,
            'total_amount'=>$data->fees,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            
             $user=([
                         'name'=>Auth::user()->name,
                         'booking_id'=>$booking_id,
                    ]);
                     
                     Mail::to(Auth::user()->email)->send(new CoursePurchaseMail($user));
            Alert::toast('Course Booking success!', 'success');
              // return redirect()->back();
             return redirect('purchase-course/payment/'.$booking_id);
            
        }else {
            Alert::toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
        
    }
    
    
    
    
    public function coursePayment($booking_id){
        $data=DB::table('course_purchase')->where('booking_id',$booking_id)->first();
        return view('frontend.alltuitioncourses.paymentpage',compact('data'));
        
    }
    
    public function courseOnlinePayment(Request $request){
        
        
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
            'success_url' => url('/coursepayment-mybooked/'.$request->booking_id.'/'.$request->amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'  => route('cancel.payment'),

        ]);

        return redirect()->away($session->url);
    
        
    }
    
    // 
    public function courseOnlinePaymentSuccess(Request $request,$booking_id,$amount){
           try {

                        $update=DB::table('course_purchase')->where('booking_id',$request->booking_id)->update([
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
                        
                        //   $email="admin@merittutors.co.uk";
                        //  $maindata=ExamRequest::where('booking_id',$booking_id)->first();
                        //  Mail::to($email)->send(new ExamBookingDetailsForAdmin($maindata));
                        //  Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
                        return redirect('/student/dashboard');
                        


        } catch (Error $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    
    public function courseOnlinePaymentCancel(){
        return redirect('/courses');
    }
    
    
    // bank payment
     public function coursebankpayment(Request $request){
       
   
      $update=DB::table('course_purchase')->where('booking_id',$request->booking_id)->update([
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
                        DB::table('course_purchase')->where('id', $request->id)->update([
                            'screenshot' => 'uploads/student/'.$name,
                        ]);
                    
                }else{
            
                    $image = $request->file('file');
                    $ImageName = 'file' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->save('uploads/student/' . $ImageName);
                    DB::table('course_purchase')->where('id', $request->id)->update([
                        'screenshot' => 'uploads/student/' . $ImageName,
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
            
                
                 
         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
            return redirect('/student/dashboard');
        }else{
            Session::flash('error', 'Something Went Wrong!Please try Again');
            return back();
        }
    }
    
    
    public function isebBooking(){
        
        return view('frontend.isebpage.create');
        
    }
    
    public function isebStore(Request $request){
        
        $rand_id=rand(11111,99999);
        $booking_id='ISEB-'.Auth::user()->id.$rand_id;
        $validated = $request->validate([
            'ucn_number' => 'required|string|max:255',
            'child_first_name' => 'required|string|max:255',
            'child_last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'school' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gurdian_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'emergency_phone' => 'required|string|max:20',
            'post_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'subject' => 'required|array',
            'subject.*' => 'required|string',
            'exam_date' => 'required|array',
            'exam_date.*' => 'required|date',
            'time' => 'required|array',
            'time.*' => 'required|string',
            'fileUpload' => 'required|file|mimes:jpg,png,jpeg|max:2048'
        ]);
        
        $insert=DB::table('iseb_exams')->insertGetId([
            'ucn_number' => $request->ucn_number,
            'user_id' => Auth::user()->id,
            'child_first_name' => $request->child_first_name,
            'child_last_name' => $request->child_last_name,
            'booking_id' =>$booking_id,
            'gender' => $request->gender,
            'school' => $request->school,
            'date_of_birth' => $request->date_of_birth,
            'gurdian_name' => $request->gurdian_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'emergency_phone' => $request->emergency_phone,
            'address_line_1' => $request->address_line_1,
            'post_code' => $request->post_code,
            'city' => $request->city,
            'created_at'=>Carbon::now()->toDateTimeString(),
            // 'photo_id' => $request->file('fileUpload')->store('uploads', 'public')
        ]);
        
         $exam_information = array();
        if ($request->has('subject')) {
            foreach ($request->subject as $key => $no) {
                
                $item['subject'] = $request->subject[$key];
                $item['exam_date'] = $request->exam_date[$key];
                $item['time'] = $request->time[$key];
                $item['fees'] = $request->fees[$key];
                array_push($exam_information, $item);
            }
            $update=DB::table('iseb_exams')->where('id',$insert)->update([
                'subject_details'=>json_encode($exam_information),
                'paid_amount'=>0,
                'total_amount'=>200,
                'due_amount'=>0,
            ]);
        }
        
        if ($request->hasFile('fileUpload')) {
                $photo =$request->file('fileUpload');
                $name = 'photo_id_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                $newfile =$photo->move(public_path().'/uploads/student/iseb/', $name);
                DB::table('iseb_exams')->where('id',$insert)->update([
                    'photo_id' => 'uploads/student/iseb/'.$name,
                ]);
        }
      
        
        if($insert){
            
            
            
                    $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$booking_id,
                    ]);
                     
                     Mail::to($request->email)->send(new IsebBookingMail($user));
                     
                Alert::toast('Exam booking success! Please Pay', 'success');
                return redirect('iseb-exam/make-payment/'.$booking_id);
            } else {
                Alert::toast('Something Went Wrong', 'error');
                return redirect()->back();
            }
    }
    
    
    public function isebPayment($booking_id){
        
        $data=DB::table('iseb_exams')->where('booking_id',$booking_id)->first();
        return view('frontend.isebpage.payment',compact('data'));
    }
    
    
    // online payment

    
      public function isebexamsOnlinepayment(Request $request){
        
        
        
        
          
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
            'success_url' => url('/proctorexam/booked/'.$request->booking_id.'/'.$request->amount.'/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url'  => route('cancel.checkout'),

        ]);

        return redirect()->away($session->url);
     
        
        
    }
    
    public function success(Request $request,$booking_id,$amount)
    {
       
       try {

                        $update=DB::table('iseb_exams')->where('booking_id',$booking_id)->update([
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
    
    
    
    // cancel ISEB
    public function cancelIseb(){
        return redirect('/');
    }
    
    
    
      public function bankPaymentFS(Request $request){
   
   
      $update=DB::table('iseb_exams')->where('booking_id',$request->booking_id)->update([
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
                        DB::table('iseb_exams')->where('booking_id',$request->booking_id)->update([
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
            return redirect('/');
        }else{
              Alert::toast('Something Went Wrong!Please try Again', 'error');
              return back();
        }
    }
    
    
    // bank payment
    public function bankPaymentProctorexam(Request $request){
        $update=DB::table('iseb_exams')->where('booking_id',$request->booking_id)->update([
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
                        DB::table('iseb_exams')->where('id', $request->id)->update([
                            'screenshot' => 'uploads/student/'.$name,
                        ]);
                    
                }else{
            
                    $image = $request->file('file');
                    $ImageName = 'file' . '_' . time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->save('uploads/student/' . $ImageName);
                    DB::table('iseb_exams')->where('id', $request->id)->update([
                        'screenshot' => 'uploads/student/' . $ImageName,
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
            
                
                 
         Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
            return redirect('/student/dashboard');
        }else{
            Session::flash('error', 'Something Went Wrong!Please try Again');
            return back();
        }
    }
    
    
    
    // Auth::logout();
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
