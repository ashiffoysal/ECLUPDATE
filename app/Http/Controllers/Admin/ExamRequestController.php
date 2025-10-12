<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamRequest;
use App\Models\Subject;
use App\Models\Wallet;
use App\Models\User;
use App\Models\GcseExamConfirmation;
use App\Models\CandidateConfirmation;
use App\Models\StatementsOfEntry;
use App\Models\CandidateResult;
use App\Models\Examessuedate;
use Auth;
use Session;
use App\Mail\ExamBookingApproveMail;
use App\Mail\CandidateResultMail;
use App\Mail\PaymentInvoice;
use App\Mail\FunctionalSkillMail;
use App\Mail\PaymentApprove;
use App\Mail\CandidateExamConfirmation;
use App\Mail\CandidateExam;
use App\Mail\DuePayment;
use App\Mail\BoardStatementSend;
use App\Mail\firstPaymentalert;
use App\Mail\secondPaymentAlert;
use App\Mail\CertificateMail;
use Mail;
use PDF;
use Carbon\Carbon;
use Image;
use DB;

class ExamRequestController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    
    
    public function isboardstatementSend($id){
    
      
    $myuser=ExamRequest::where('id',$id)->select(['email','booking_id','id','isboardstatement_send'])->first();
    
     $sendresult=StatementsOfEntry::where('booking_id',$myuser->booking_id)->get();
       
        
        
        $myfilesarray=array();
        foreach($sendresult as $myresult){
            $newfile=$myresult->file;
            array_push($myfilesarray,$newfile);
        }
         
        $details = [
            'title' => 'Candidate Board Statement Of Entry',
            'files' => $myfilesarray
        ];
         
        $sendmail=Mail::to($myuser->email)->send(new BoardStatementSend($details));
         
          $update=ExamRequest::where('id',$id)->update([
                                'isboardstatement_send'=>1,
                            ]);
                $notification = array(
                    'messege' => ' send Success!',
                    'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
        

     
        
        
        
        
    }
    
    
    
    
    
    // apps booking list
    public function appsBooking(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_apps_booking',1)->get();
        return view("backend.examrequest.appsbooking",compact('alldata'));
    }
    
    public function candidateResultUploads($id){
        $data=ExamRequest::orderBy('id','DESC')->where('id',$id)->first();
        return view('backend.candidateresult.index',compact('data'));
    }
    
    
      public function candidateResultsend($id){
          
        $sendresult=CandidateResult::where('booking_id',$id)->get();
        $candidate=CandidateResult::where('booking_id',$id)->first();
        $myfilesarray=array();
        foreach($sendresult as $myresult){
            $newfile=$myresult->result_file;
            array_push($myfilesarray,'updatecore/public/'.$newfile);
        }
         
        $details = [
            'title' => 'Candidate Exam Result June 2023',
            'body' => 'Please find attached your results.We will notify you once we receive your certificate.',
            'files' => $myfilesarray
        ];
         
        $sendmail=Mail::to($candidate->email)->send(new CandidateResultMail($details));
         
         $update=ExamRequest::where('booking_id',$id)->update([
                'is_result_published'=>1
            ]);
                $notification = array(
                    'messege' => 'Mail send Success!',
                    'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
            
    }
    
    
    public function candidateResultDelete($id){
        $delete=CandidateResult::where('id',$id)->delete();
           if ($delete) {
                $notification = array(
                    'messege' => 'Delete success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Delete Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
    }
    
    public function candidateResultUploadSubmit(Request $request){
       
        $insert=CandidateResult::insertGetId([
            'heading_test'=>$request->title,
            'booking_id'=>$request->booking_id,
            'user_id'=>$request->user_id,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        
        if ($request->hasFile('result_file')) {
             $extension = $request->result_file->getClientOriginalExtension();
                if($extension =='pdf'){
                    
                     $photo =$request->file('result_file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move(public_path().'/uploads/candidateresult/', $name);
                        CandidateResult::where('id',$insert)->update([
                            'result_file' => 'uploads/candidateresult/'.$name,
                        ]);
                    
                }
            }
            
        if ($insert) {
                $notification = array(
                    'messege' => 'Upload success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Upload Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            
        // result_file
    }
    
    
    public function deleteunUseddata(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','IGCSE')->where('is_deleted',0)->where('is_completed_from',1)->get();
        dd($alldata);
    }
    
    public function allexambooking(){
    	
    	$alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_apps_booking',0)->select(['id','first_payment_alert','first_payment_date','second_payment_alert','second_payment_date','main_exam_type','booking_id','first_name','middle_name','last_name','email','phone','is_seen','is_confirm_booking','is_refunded','Candidate_number','is_withdrawn','created_at','payment_option','is_need_pay_sp_fee','enable_pay','is_paid','exam_series','notes'])->limit(1500)->get();
    	
       
        return view('backend.examrequest.allexambooking',compact('alldata'));
    }

     public function gcsemain(){
        
        $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','GCSE')->where('is_completed_from',1)->where('is_deleted',1)->get();
        $allsub=Subject::get();
        return view('backend.examrequest.gcse',compact('alldata','allsub'));
    }


    public function aLevel(){
       
        $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','A Level')->where('is_completed_from',1)->where('is_deleted',1)->get();
        return view('backend.examrequest.alevel',compact('alldata'));
    }

    public function igcse(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','IGCSE')->where('is_deleted',1)->where('is_completed_from',1)->get();
        return view('backend.examrequest.igcse',compact('alldata'));
    }

    public function aat(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','AAT')->where('is_deleted',1)->where('is_completed_from',1)->get();
        return view('backend.examrequest.aatexam',compact('alldata'));
    }

    public function acca(){
        
        $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','ACCA')->where('is_deleted',1)->where('is_completed_from',1)->get();
        return view('backend.examrequest.acca',compact('alldata'));
    }
     public function functionalskill(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','Functional Skills')->where('is_deleted',1)->where('is_completed_from',1)->get();
        return view('backend.examrequest.functionalskills',compact('alldata'));
    }




    public function bookingdetails($id){
    	$data=ExamRequest::where('id',$id)->first();
    
        return view('backend.examrequest.examdetails',compact('data'));
    }
    public function mainbookingdetails($id){
         $exam_series=Examessuedate::select(['id','exam_name','entry_dateline','entry_highlatefees','entry_highlatefees','submission_dead_lines'])->get();
        
        $data=ExamRequest::where('id',$id)->first();
        $update=ExamRequest::where('id',$id)->update([
    	    'is_seen'=>1,
    	 ]);
        $aatsub=Subject::where('exam_type','AAT')->get();
        $allbranch=DB::table('branch')->get();

        return view('backend.examrequest.maindetails',compact('data','aatsub','allbranch','exam_series'));
    }

    public function mainbookingapprove($id){
         $user=ExamRequest::where('id',$id)->first();
         $data=ExamRequest::where('id',$id)->update([
            'status'=>1,
         ]);
         
          if ($data){

            Mail::to($user->email)->send(new ExamBookingApproveMail($user));
            $notification = array(
                'messege' => 'approve success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } else {
            $notification = array(
                'messege' => 'approve Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

     public function mainbookingreject($id){

         $data=ExamRequest::where('id',$id)->update([
            'status'=>1,
         ]);
        if ($data) {
            $notification = array(
                'messege' => 'Reject success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Reject Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    // 
    public function insertCandidateNumbers(Request $request){
       
       $check=ExamRequest::where('Candidate_number',$request->main_candidate_number)->first();

        if($check){
          $notification = array(
                'messege' => 'Already used this Candidate Number!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
       
        }else{

            $update=ExamRequest::where('id',$request->id)->update([
                'Candidate_number'=>$request->main_candidate_number,
            ]);
            if($update){
                 $notification = array(
                'messege' => 'candidate number insert success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
                
            }else{
                   $notification = array(
                'messege' => 'candidate number insert Faild',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
                
            }
        }
    }


    public function basicInformationupdate(Request $request){

                $update=ExamRequest::where('id',$request->id)->update([
                'first_name'=>$request->first_name,
                'Candidate_number'=>$request->Candidate_number,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'city'=>$request->city,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address_line_1'=>$request->address_line_1,
                'address_line_2'=>$request->address_line_2,
                'date_of_birth'=>$request->date_of_birth,
                'postcode'=>$request->postcode,
                'emergency_contact_number'=>$request->emergency_contact_number,
                'gender'=>$request->gender,
                'updated_by'=>Auth::user()->id,
            ]);
           if ($update) {
            $notification = array(
                'messege' => 'Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function other_formation_update(Request $request){

               $update=ExamRequest::where('id',$request->id)->update([
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'type_of_learner'=>$request->type_of_learner,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                'updated_by'=>Auth::user()->id,
            ]);
              if($update){
                return response("Update success");
            }else{
                return response("Update Faild");
            }
    }


    public function special_arrangements_update(Request $request){

         $update=ExamRequest::where('id',$request->id)->update([
                'special_acces'=>$request->special_acces,
                'special_acces_evidence'=>$request->special_acces_evidence,
                'mental_conditions'=>$request->mental_conditions,
                'mental_condition_details'=>$request->mental_condition_details,
                'condition_disability'=>$request->condition_disability,
                'condition_disability_details'=>$request->condition_disability_details,
                'updated_by'=>Auth::user()->id,
            ]);
              if($update){
                return response("Update success");
            }else{
                return response("Update Faild");
            }
    }


    public function terms_and_conditon_update(Request $request){

        $update=ExamRequest::where('id',$request->id)->update([
                'relationship'=>$request->relationship,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'updated_by'=>Auth::user()->id,
            ]);
              if($update){
                return response("Update success");
            }else{
                return response("Update Faild");
            }

    }

    public function paid_status_update(Request $request){

         $update=ExamRequest::where('id',$request->id)->update([
                'id'=>$request->id,
                'is_paid_verify'=>$request->paid_status,
                'updated_by'=>Auth::user()->id,
            ]);
            if($update){
                 
                return response("Payment Status Update success");
            }else{
                return response("Update Faild");
            }

    }

    public function getupdatesubject(Request $request){
            $id=$request->id;
            $check=ExamRequest::where('id',$id)->first();
            $exam_type=$check->main_exam_type;

            if($exam_type=='GCSE'){

                        $exam_information = array();
                        if ($request->has('exam_board')) {
                            $total_amount=0;
                            foreach ($request->exam_board as $key => $no) {
                              
                                $item['exam_board'] = $request->exam_board[$key];
                                $item['exam_series'] = $request->exam_series[$key];
                                $item['type'] = $request->type[$key];
                                $item['subject'] = $request->subject[$key];
                                $item['unit_code'] = $request->unit_code[$key];
                                $item['option_code'] = $request->option_code[$key];
                                $item['fees'] = $request->fees[$key];
                                array_push($exam_information, $item);
                                $total_amount=$total_amount + $request->fees[$key];

                            }
                            $update=ExamRequest::where('id',$id)->update([
                                'exam_information'=>json_encode($exam_information),
                                'total_amount'=>$total_amount,
                                'is_due'=>1,
                                'due_amount'=>$total_amount - $check->paid_amount,
                            ]);
                            if($update){
                                Session::flash('success','success');
                                return redirect()->back();
                            }else{
                                Session::flash('errors','errors');
                                return redirect()->back();
                            }
                        }


            }

            if($exam_type=='A Level'){
                        $exam_information = array();
                        if ($request->has('exam_board')) {
                            $total_amount=0;
                            foreach ($request->exam_board as $key => $no) {
                              
                                $item['exam_board'] = $request->exam_board[$key];
                                $item['exam_series'] = $request->exam_series[$key];
                                $item['type'] = $request->type[$key];
                                $item['subject'] = $request->subject[$key];
                                $item['unit_code'] = $request->unit_code[$key];
                                $item['option_code'] = $request->option_code[$key];
                                $item['fees'] = $request->fees[$key];
                                array_push($exam_information, $item);
                                $total_amount=$total_amount + $request->fees[$key];
                            }
                             $update=ExamRequest::where('id',$id)->update([
                                'exam_information'=>json_encode($exam_information),
                                'total_amount'=>$total_amount,
                                'is_due'=>1,
                                'due_amount'=>$total_amount - $check->paid_amount,
                            ]);
                            if($update){
                                Session::flash('success','success');
                                return redirect()->back();
                            }else{
                                Session::flash('errors','errors');
                                return redirect()->back();
                            }
                        }
            }
                if($exam_type=='IGCSE'){
                        $exam_information = array();
                        if ($request->has('exam_board')) {
                             $total_amount=0;
                            foreach ($request->exam_board as $key => $no) {
                              
                                $item['exam_board'] = $request->exam_board[$key];
                                $item['exam_series'] = $request->exam_series[$key];
                                $item['type'] = $request->type[$key];
                                $item['subject'] = $request->subject[$key];
                                $item['unit_code'] = $request->unit_code[$key];
                                $item['option_code'] = $request->option_code[$key];
                                $item['fees'] = $request->fees[$key];
                                array_push($exam_information, $item);
                                $total_amount=$total_amount + $request->fees[$key];

                            }
                             $update=ExamRequest::where('id',$id)->update([

                                'exam_information'=>json_encode($exam_information),
                                'total_amount'=>$total_amount,
                                'is_due'=>1,
                                'due_amount'=>$total_amount - $check->paid_amount,

                            ]);
                            if($update){
                                Session::flash('success','success');
                                return redirect()->back();
                            }else{
                                Session::flash('errors','errors');
                                return redirect()->back();
                            }
                        }
            }


           if($exam_type=='Functional Skills'){


                $exam_information = array();
                if ($request->has('exam_board')) {

                    $total_amount=0;
                    foreach ($request->exam_board as $key => $no) {
                        $item['exam_board'] = $request->exam_board[$key];
                        $item['exam_series'] = $request->exam_series[$key];
                        $item['type'] = $request->type[$key];
                        $item['subject'] = $request->subject[$key];
                        $item['option_code'] = $request->option_code[$key];
                        $item['fees'] = $request->fees[$key];
                        $item['exam_date'] = $request->exam_date[$key];
                        $item['start_exam_time'] = $request->start_exam_time[$key];
                        $total_amount=$total_amount + $request->fees[$key];
                        array_push($exam_information, $item);
                        
                    }
                       $update=ExamRequest::where('id',$id)->update([

                                'exam_information'=>json_encode($exam_information),
                                'total_amount'=>$total_amount,
                                'is_due'=>1,
                                'due_amount'=>$total_amount - $check->paid_amount,

                            ]);
                     if($update){
                        Session::flash('success','success');
                        return redirect()->back();
                    }else{
                        Session::flash('errors','errors');
                        return redirect()->back();
                    }

                }

           }

             if($exam_type=='ACCA'){


                $exam_information = array();

                if ($request->has('exam_board')) {
                        $total_amount=0;
                    foreach ($request->exam_board as $key => $no) {
                      
                        $item['exam_board'] = $request->exam_board[$key];
                        $item['type'] = $request->type[$key];
                        $item['subject'] = $request->subject[$key];
                        $item['option_code'] = $request->option_code[$key];
                        $item['fees'] = $request->fees[$key];
                        $item['exam_date'] = $request->exam_date[$key];
                        $item['start_exam_time'] = $request->start_exam_time[$key];
                        array_push($exam_information, $item);
                        $total_amount=$total_amount + $request->fees[$key];
                    }
                       $update=ExamRequest::where('id',$id)->update([

                                'exam_information'=>json_encode($exam_information),
                                'total_amount'=>$total_amount,
                                'is_due'=>1,
                                'due_amount'=>$total_amount - $check->paid_amount,

                            ]);
                     if($update){
                        Session::flash('success','success');
                        return redirect()->back();
                    }else{
                        Session::flash('errors','errors');
                        return redirect()->back();
                    }
                }

           }



         if($exam_type=='AAT'){

            $exam_information = array();

            if ($request->has('exam_board')) {
                $total_amount=0;
                foreach ($request->exam_board as $key => $no) {
                  
                    $item['exam_board'] = $request->exam_board[$key];
                    $item['exam_series'] = $request->exam_series[$key];
                    $item['type'] = $request->type[$key];
                    $item['subject'] = $request->subject[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    $item['exam_date'] = $request->exam_date[$key];
                    $item['start_exam_time'] = $request->start_exam_time[$key];
                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                }
                   $update=ExamRequest::where('id',$id)->update([

                                'exam_information'=>json_encode($exam_information),
                                'total_amount'=>$total_amount,
                                'is_due'=>1,
                                'due_amount'=>$total_amount - $check->paid_amount,

                            ]);
                     if($update){
                        Session::flash('success','success');
                        return redirect()->back();
                    }else{
                        Session::flash('errors','errors');
                        return redirect()->back();
                    }
            }



            

         }
    }

    public function updatedateexmabooking(Request $request){
        
        
        
        
        
                    $user=([
                         'name'=>"asif",
                         'booking_id'=>837,
                    ]);
                   
                  
                     
                      $data=ExamRequest::where('id','837')->first();
                     
                      
                    $pdf = PDF::loadView('invoice.candidateexamconfirmation',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
                    
                    $datas["email"] = $data->email;
                    $datas["title"] = "Welcome to ECL";
                    $datas["body"] = "This is the email body.";
                    
                     Mail::send("mail.gcseexambookingconfirm", $datas, function ($message) use ($datas, $pdf) {
                     
                         $message->to($datas["email"])
                            ->subject("Candidate Exam Booking Information")
                            ->attachData($pdf->output(), "STATEMENT_OF_ENTRY.pdf")
                            ->attach("uploads/exambookingconfirmation/IFC-Written_Examinations_2022_FINAL.pdf")
                            ->attach("uploads/exambookingconfirmation/IFC-Written_Examinations_2022_FINAL.pdf")
                             ->replyTo('info@examcentrelondon.co.uk');
                            
                    });
                    
                    
        
             return "Update succes";
                

        //   $update=ExamRequest::where('id',$request->id)->update([
        //         'exambookingbyadmin_date'=>$request->bookingsubmitdate,
        //         'is_confirm_booking'=>1,
        //         'updated_by'=>Auth::user()->id,
        //     ]);
        //     if($update){
               
                
            //     return "Update succes";
            // }else{
            //      return "Update faild";
            // }

    }

    public function updateapaymentstatus(Request $request){

         $update=ExamRequest::where('id',$request->id)->update([
                'is_paid_verify'=>$request->paid_status,
                'notes'=>$request->notes,
                'updated_by'=>Auth::user()->id,
            ]);
            if($update){
                if($request->paid_status==1){
                    
                  ExamRequest::where('id',$request->id)->update([
                           
                            'is_paid'=>1,
                           
                        ]);
                    $maindata=ExamRequest::where('id',$request->id)->first();
                    Mail::to($maindata->email)->send(new PaymentApprove());
                     Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                     
                     $data=ExamRequest::where('id',$request->id)->first();
                    $pdf = PDF::loadView('invoice.index',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
                    
                    // $datas["email"] = $data->email;
                    $datas["email"] = $data->email;
                    $datas["title"] = "Welcome to ECL";
                    $datas["body"] = "This is the email body.";
                    
                       Mail::send("mail.invoicesendmail", $datas, function ($message) use ($datas, $pdf) {
                     
                         $message->to($datas["email"])
                            ->subject("ECL Invoice")
                            ->replyTo('info@examcentrelondon.co.uk')
                            ->attachData($pdf->output(), "Invoice.pdf");
                    });
                     
                     
                }
                return response("Update success");
            }else{
                return response("Update Faild");
            }

    }


    public function mainpaymentupdate(Request $request){

            $validated = $request->validate([
                'paid_amount' => 'required',
            ]);
            $check=ExamRequest::where('booking_id',$request->booking_id)->select(['paid_amount','due_amount','id','booking_id','user_id'])->first();
            if($check){

                $paid_amount=$check->paid_amount;
                $due_amount=$check->due_amount;


                $Walletinsert=Wallet::insert([
                    'order_id'=>$request->booking_id,
                    'user_id'=>$check->user_id,
                    'amount'=>$request->paid_amount,
                    'amount_type'=>'Dabit',
                    'paid_by'=>$request->paid_by,
                    'is_verified'=>1,
                    'transection_id'=>$request->transection_id,
                    'date'=>Carbon::now(),
                    'created_at'=>Carbon::now()->toDateTimeString(),
                ]);

                $update=ExamRequest::where('booking_id',$request->booking_id)->update([

                    'paid_amount'=>$paid_amount + $request->paid_amount,
                    'due_amount'=>$due_amount - $request->paid_amount,
                    'is_paid'=>1,
                    'is_paid_verify'=>1,
                    'payment_option'=>$request->paid_by,
                    'transection_id'=>$request->transection_id,
                    
                ]);
                if($update){
                  
                 $maindata=ExamRequest::where('booking_id',$request->booking_id)->first();
                 Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                        Session::flash('success','success');
                        return redirect()->back();
                    }else{
                        Session::flash('errors','errors');
                        return redirect()->back();
                    }



            }
    }
    
    
    public function candidateconfirmExam($id){
           $data=ExamRequest::where('id',$id)->first();
           return view('backend.examrequest.confirmexambooking',compact('data'));
    }
    
    public function candidateconfirmExamStore(Request $request){
        
            if($request->exam_branch=='Forest Gate Branch 54 Upton Lane London E7 9LN'){
             $check=DB::table('skillexam_seat_plan')->where('branch',$request->exam_branch)->where('date',$request->exam_date)->where('slot',$request->exam_time)->first();
                if($check){
                    $serial=rand(1,6);
                    $update=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                        'date'=>$request->exam_date,
                        'branch'=>$request->exam_branch,
                        'slot'=>$request->exam_time,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);
                    
                    if($serial==1){
                        if($check->fg_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_1'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_3'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_4'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_5==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_5'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_6==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_6'=>$request->exam_id,
                            ]);
                        }
                        
                    }elseif($serial==2){
                          if($check->fg_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_3'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_4'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_5==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_5'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_6==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_6'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_1'=>$request->exam_id,
                            ]);
                        }
                    }elseif($serial==3){
                        if($check->fg_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_3'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_4'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_5==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_5'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_6==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_6'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_1'=>$request->exam_id,
                            ]);
                        } elseif($check->fg_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_2'=>$request->exam_id,
                            ]);
                        }
                    }
                    elseif($serial==4){
                        
                      if($check->fg_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_4'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_5==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_5'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_6==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_6'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_1'=>$request->exam_id,
                            ]);
                        } elseif($check->fg_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_3'=>$request->exam_id,
                            ]);
                        }
                    }elseif($serial==5){
                        
                        if($check->fg_cpu_5==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_5'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_6==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_6'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_1'=>$request->exam_id,
                            ]);
                        } elseif($check->fg_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_3'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_4'=>$request->exam_id,
                            ]);
                        }
                    }elseif($serial==6){
                        
                        if($check->fg_cpu_6==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_6'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_1'=>$request->exam_id,
                            ]);
                        } elseif($check->fg_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->fg_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_3'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_4'=>$request->exam_id,
                            ]);
                        }elseif($check->fg_cpu_5==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'fg_cpu_5'=>$request->exam_id,
                            ]);
                        }
                    }
                    
                }else{
                    $serial=rand(1,6);
                    $update=DB::table('skillexam_seat_plan')->insertGetId([
                        'date'=>$request->exam_date,
                        'branch'=>$request->exam_branch,
                        'slot'=>$request->exam_time,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);
                    
                    if($serial==1){
                      
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'fg_cpu_1'=>$request->exam_id,
                            ]);
                    
                        
                    }elseif($serial==2){
                      
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'fg_cpu_2'=>$request->exam_id,
                            ]);
                       
                    }elseif($serial==3){
                        
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'fg_cpu_3'=>$request->exam_id,
                            ]);
                       
                    }
                    elseif($serial==4){
                        
                     
                        $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                            'fg_cpu_4'=>$request->exam_id,
                        ]);
                        
                    }elseif($serial==5){
                        
                        
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'fg_cpu_5'=>$request->exam_id,
                            ]);
                       
                    }elseif($serial==6){
                        
                    
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'fg_cpu_6'=>$request->exam_id,
                            ]);
                        
                    }
                }
            }elseif($request->exam_branch=="Ilford Branch 269 Ilford Lane, Ilford IG1 2SD"){
                $check=DB::table('skillexam_seat_plan')->where('branch',$request->exam_branch)->where('date',$request->exam_date)->where('slot',$request->exam_time)->first();
                if($check){
                    $serial=rand(1,4);
                    $update=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                        'date'=>$request->exam_date,
                        'branch'=>$request->exam_branch,
                        'slot'=>$request->exam_time,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);
                    
                    if($serial==1){
                        if($check->il_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_1'=>$request->exam_id,
                            ]);
                        }elseif($check->il_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_3'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_4'=>$request->exam_id,
                            ]);
                        }
                    
                        
                    }elseif($serial==2){
                          if($check->il_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_3'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_4'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_1'=>$request->exam_id,
                            ]);
                        }
                    }elseif($serial==3){
                        if($check->il_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_3'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_4'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_1'=>$request->exam_id,
                            ]);
                        } elseif($check->il_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_2'=>$request->exam_id,
                            ]);
                        }
                    }
                    elseif($serial==4){
                        
                      if($check->il_cpu_4==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_4'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_1==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_1'=>$request->exam_id,
                            ]);
                        } elseif($check->il_cpu_2==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_2'=>$request->exam_id,
                            ]);
                        }
                        elseif($check->il_cpu_3==null){
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$check->id)->update([
                                'il_cpu_3'=>$request->exam_id,
                            ]);
                        }
                    }
                    
                }else{
                     $serial=rand(1,4);
                    $update=DB::table('skillexam_seat_plan')->insertGetId([
                        'date'=>$request->exam_date,
                        'branch'=>$request->exam_branch,
                        'slot'=>$request->exam_time,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);
                    
                    if($serial==1){
                        
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'il_cpu_1'=>$request->exam_id,
                            ]);
                       
                        
                    }elseif($serial==2){
                        
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'il_cpu_2'=>$request->exam_id,
                            ]);
                       
                    }elseif($serial==3){
                        
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'il_cpu_3'=>$request->exam_id,
                            ]);
                       
                    }
                    elseif($serial==4){
                        
                            $seatingupdate=DB::table('skillexam_seat_plan')->where('id',$update)->update([
                                'il_cpu_4'=>$request->exam_id,
                            ]);
                        
                    }
                }
            }
                
                
                
                // 
       $insert=CandidateConfirmation::insertGetId([
            'candidate_id'=>$request->candidate_id,
            'booking_id'=>$request->booking_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'exam_id'=>$request->exam_id,
            'subject'=>$request->subject,
            'exam_type'=>$request->exam_type,
            'exam_date'=>$request->exam_date,
            'exam_time'=>$request->exam_time,
            'exam_branch'=>$request->exam_branch,
            'details'=>$request->details,
            'requirments'=>$request->requirments,
            'rescheduling'=>$request->rescheduling,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        if ($request->hasFile('fileUpload')) {
                    $extension = $request->fileUpload->getClientOriginalExtension();
                    if($extension !='pdf'){
                               $image = $request->file('fileUpload');
                                $ImageName = $request->exam_type.'.'.Auth::user()->id. '_' . time() . '.' . $image->getClientOriginalExtension();
                                Image::make($image)->save('uploads/student/exambooking/' . $ImageName);
                                CandidateConfirmation::where('id',$insert)->update([
                                    'files' => 'uploads/student/exambooking/' . $ImageName,
                                ]);
                          
                        }else{
                        
                            $photo =$request->file('fileUpload');
                            $name = Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/', $name);
                            CandidateConfirmation::where('id',$insert)->update([
                                'files' => 'uploads/student/'.$name,
                            ]);
                            
                        }
                    }
        
        
        
        
         if ($insert) {
                ExamRequest::where('booking_id',$request->booking_id)->update([
                    'is_confirm_booking'=>1,
                ]);
                // seatPlanCode
                
                
            //  seating plan here code place
             $user=([
                'candidate_id'=>$request->candidate_id,
                'booking_id'=>$request->booking_id,
                'exam_id'=>$request->exam_id,
                'exam_type'=>$request->exam_type,
                'subject'=>$request->subject,
                'is_mock'=>0,
                'exam_date'=>$request->exam_date,
                'exam_time'=>$request->exam_time,
                'exam_branch'=>$request->exam_branch,
                'details'=>$request->details,
                'requirments'=>$request->requirments,
                'rescheduling'=>$request->rescheduling,
                ]);
            
            Mail::to($request->email)->send(new CandidateExamConfirmation($user));
            // Mail::to("ashiffoysal8818@gmail.com")->send(new CandidateExamConfirmation($user));
            if($request->exam_type=='Functional Skills'){
                Mail::to($request->email)->send(new FunctionalSkillMail());
            }
            $notification = array(
                'messege' => 'Confirmation send success!',
                'alert-type' => 'success'
            );
            
            
            return redirect()->back()->with($notification);
            
            
            
            
        } else {
            $notification = array(
                'messege' => 'Confirmation send Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function notesUpdate(Request $request){
        $update=User::where('id',$request->id)->update([
            'notes'=>$request->val,
            
        ]);
        if($update){
            return response('success');
        }else{
             return response('faild');
        }
    }
    
    public function examBookingDetailsExport($booking_id){
          $data=ExamRequest::where('booking_id',$booking_id)->first();
        $update=ExamRequest::where('booking_id',$booking_id)->update([
    	    'is_seen'=>1,
    	 ]);
        return view('backend.examrequest.fullexportexam',compact('data'));
    }
    
    public function deleteexambooking($id){
          $update=ExamRequest::where('id',$id)->update([
            'is_deleted'=>0,
            
        ]);
            if ($update) {
            $notification = array(
                'messege' => 'Delete success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function insernotesupdate(Request $request){
        $update=ExamRequest::where('id',$request->id)->update([
            'notes'=>$request->val,
        ]);
           if($update){
            return response('success');
        }else{
             return response('faild');
        }
        
        
    }
    
    public function forcheck(){
        $alldata=ExamRequest::where('booking_id','42559')->get();
        return view('backend.forcheck.index',compact('alldata'));
        }
        
        
        public function examconfirmlistGcse(){
            
          
            
             $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','GCSE')->where('is_completed_from',1)->where('is_deleted',1)->where('is_confirm_booking',1)->get();
             
              return view('backend.confirmexambooking.gcse',compact('alldata'));
        
        }
         public function examconfirmlistigcse(){
             $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','IGCSE')->where('is_completed_from',1)->where('is_deleted',1)->where('is_confirm_booking',1)->get();
             
              return view('backend.confirmexambooking.igcse',compact('alldata'));
        }
         public function examconfirmlistalevels(){
            $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','A Level')->where('is_completed_from',1)->where('is_deleted',1)->where('is_confirm_booking',1)->get();
             
              return view('backend.confirmexambooking.alevel',compact('alldata'));
        }
         public function examconfirmlistfunctionalskills(){
             
             $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','Functional Skills')->where('is_completed_from',1)->where('is_deleted',1)->where('is_confirm_booking',1)->get();
             
              return view('backend.confirmexambooking.functionalskills',compact('alldata'));
              
        }
         public function examconfirmlistaat(){
            $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','AAT')->where('is_completed_from',1)->where('is_deleted',1)->where('is_confirm_booking',1)->get();
             
              return view('backend.confirmexambooking.aat',compact('alldata'));
        }
         public function examconfirmlistacca(){
             
            $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','ACCA')->where('is_completed_from',1)->where('is_deleted',1)->where('is_confirm_booking',1)->get();
             
              return view('backend.confirmexambooking.acca',compact('alldata'));
              
        }
         public function examconfirmlistaslevels(){
             
           $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','AS Level')->where('is_completed_from',1)->where('is_deleted',1)->where('is_confirm_booking',1)->get();
             
              return view('backend.confirmexambooking.aslevels',compact('alldata'));
              
        }
        
    public function aslevelsexambooking(){
             
           $alldata=ExamRequest::orderBy('id','DESC')->where('main_exam_type','AS Level')->where('is_completed_from',1)->where('is_deleted',1)->get();
             
              return view('backend.examrequest.aslevels',compact('alldata'));
              
        }
        
        public function gcseIgcseAlevelExamconfirmation($id){
            $data=ExamRequest::where('id',$id)->first();
            return view('backend.examrequest.gcseexambookingconfirm',compact('data'));
        }
        
        public function gcseIgcseAlevelExamconfirmationStore(Request $request){
            
           $insert=GcseExamConfirmation::insertGetId([
               'exam_id'=>$request->exam_id,
               'booking_id'=>$request->booking_id,
               'candidate_id'=>$request->candidate_id,
               'exam_series'=>8,
               'exam_subject'=>$request->subject,
               'exam_board'=>$request->exam_board,
               'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            
            
               $exam_information = array();

            if ($request->has('syllabus')) {
                foreach ($request->syllabus as $key => $no) {
                    $item['syllabus'] = $request->syllabus[$key];
                    $item['paper_title'] = $request->paper_title[$key];
                    $item['exam_date'] = $request->exam_date[$key] ?? "";
                    $item['exam_time'] = $request->exam_time[$key] ?? "";
                    array_push($exam_information, $item);
                   
                }
                   $update=GcseExamConfirmation::where('id',$insert)->update([
                    'exam_details'=>json_encode($exam_information),
                   ]);
                  
            }
            
             if ($insert) {
                $notification = array(
                    'messege' => 'Add success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Add Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            
            
            
        }
        
        public function gcseIgcseAlevelDeleteOneItem($id){
            $delete=GcseExamConfirmation::where('id',$id)->update([
                'is_deleted'=>1, 
            ]);
            if ($delete) {
                $notification = array(
                    'messege' => 'Delete success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Delete Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        
        public function gcseIgcseAlevelTestingStatements($id){
                    $data=ExamRequest::where('id',$id)->first();
                    $user=([
                         'name'=>$data->first_name.''.$data->last_name,
                         'booking_id'=>$data->booking_id,
                    ]);
                   
                  
                     
                     
                     
                      
                    $pdf = PDF::loadView('invoice.candidateexamconfirmation',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
                    
                    return $pdf->stream();
                    
                    // $datas["email"] = $data->email;
                    // $datas["title"] = "Welcome to ECL";
                    // $datas["body"] = "This is the email body.";
                    
                    //  Mail::send("mail.gcseexambookingconfirm", $datas, function ($message) use ($datas, $pdf) {
                     
                    //      $message->to($datas["email"])
                    //         ->subject("Candidate Exam Booking Information")
                    //         ->attachData($pdf->output(), "STATEMENT_OF_ENTRY.pdf")
                    //         ->attach("uploads/exambookingconfirmation/IFC-Written_Examinations_2022_FINAL.pdf");
                            
                    // });
        }
        
        public function gcseIgcseAlevelFileUploads(Request $request){
           
            $insert=StatementsOfEntry::insertGetId([
                'booking_id'=>$request->booking_id,
                'candidate_email'=>$request->email,
                'exam_id'=>$request->exam_id,
                'candidate_id'=>$request->candidate_id,
                'exam_board_name'=>$request->name_of_board,
                'uploads_by'=>Auth::user()->id,
                'uploads_date'=>Carbon::now(),
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            
             if ($request->hasFile('file')) {
             $extension = $request->file->getClientOriginalExtension();
                if($extension =='pdf'){
                    
                     $photo =$request->file('file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move('uploads/statementsofentries/', $name);
                        StatementsOfEntry::where('id',$insert)->update([
                            'file' => 'uploads/statementsofentries/'.$name,
                        ]);
                    
                }
                
                   if($extension =='Pdf'){
                    
                     $photo =$request->file('file');
                        $name = time().'.'.$photo->getClientOriginalExtension();
                        $newfile =$photo->move('uploads/statementsofentries/', $name);
                        StatementsOfEntry::where('id',$insert)->update([
                            'file' => 'uploads/statementsofentries/'.$name,
                        ]);
                    
                }
            }
            
            if ($insert) {
                $notification = array(
                    'messege' => 'Upload success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Upload Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            
            
        }
        
        
        public function gcseIgcseAlevelFileUploadsDelete($id){
            $delete=StatementsOfEntry::where('id',$id)->delete();
              if ($delete) {
                $notification = array(
                    'messege' => 'Delete success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Delete Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        
        public function gcseIgcseAlevelSendExamEntry($id){
            
            
            
            
                    $data=ExamRequest::where('id',$id)->first();
                    
                    if($data->uci_number !=null){
                        
                        if($data->Candidate_number !=null){
                             $update=ExamRequest::where('id',$id)->update([
                                'is_confirm_booking'=>1,
                            ]);
                            $user=([
                                 'name'=>$data->first_name,
                                 'booking_id'=>$data->booking_id,
                            ]);
                              
                            $pdf = PDF::loadView('invoice.candidateexamconfirmation',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
                            'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
                            
                           
                            
                              $datas["email"] = $data->email;
                           
                            $datas["title"] = "Welcome to ECL";
                            $datas["body"] = "This is the email body.";
                            
                             Mail::send("mail.gcseexambookingconfirm", $datas, function ($message) use ($datas, $pdf) {
                             
                                 $message->to($datas["email"])
                                    ->subject("CANDIDATE EXAM STATEMENT OF ENTRY")
                                    ->replyTo('info@examcentrelondon.co.uk')
                                    ->attachData($pdf->output(), "STATEMENT_OF_ENTRY.pdf")
                                    ->attach("uploads/exambookingconfirmation/IFC-Written_Examinations_2022_FINAL.pdf");
                                    
                                    
                            });
                            
                          $notification = array(
                            'messege' => 'Confirmation Send success!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                        }else{
                            $notification = array(
                            'messege' => 'Please entry Candidate number!',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                        }
                        
                           
                        
                    }else{
                        $notification = array(
                            'messege' => 'Please entry UCI number!',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                    
        }
        
        public function sendDuePaymemt($id){
            $candidate=ExamRequest::where('id',$id)->select(['booking_id','first_name','due_amount','email','id'])->first();
            $user = [
                'booking_id' => $candidate->booking_id,
                'first_name'=>$candidate->first_name,
                'due_amount'=>$candidate->due_amount,
                
            ];
             
            $sendmail=Mail::to($candidate->email)->send(new DuePayment($user));
            $notification = array(
                'messege' => 'Due payment Alert Send!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
        
        public function assesmentUploads($id){
            $data=ExamRequest::where('is_completed_from',1)->where('is_deleted',1)->where('id',$id)->first();
            return view('backend.examrequest.assesment',compact('data'));
        }
        
        public function assesmentUploadsubmit(Request $request){
            
            $insert=ExamRequest::where('id',$request->exam_id)->update([
               
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                
                ]);
                
                
                    $photos = array();
                    if ($request->hasFile('photos')) {
            
                            foreach ($request->photos as $key => $photo) {
            
                                $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
                                $resizedPhoto = Image::make($photo)->save('uploads/student/exambooking/'.$photoName);
                                array_push($photos, $photoName);
            
                            }
                  
                            ExamRequest::where('id',$request->exam_id)->update([
                                'carring_forward_image' => json_encode($photos),
                            ]);
                    }
                    if($insert){     
                          $notification = array(
                            'messege' => ' success!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                        }else{
                            $notification = array(
                            'messege' => 'Faild !Please Try Again',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                        }
        }
        
        
        public function SpecialAccessInvoice(Request $request){
            
            $update=ExamRequest::where('id',$request->id)->update([
                'is_admin_special_acc'=>1, 
            ]);
            
            $special_Access = array();

            if ($request->has('access_name')) {
                $total_amount=0;
                foreach ($request->access_name as $key => $no) {
                    
                    $item['access_name'] = $request->access_name[$key];
                    $item['fees'] = $request->fees[$key];
                    array_push($special_Access, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                }
                $updatesss=ExamRequest::where('id',$request->id)->update([
                    'admin_special_details'=>json_encode($special_Access),
                    'admin_specialaccess_amount'=>$total_amount,
                ]);
            }
             if($update){     
                          $notification = array(
                            'messege' => 'success!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                        }else{
                            $notification = array(
                            'messege' => 'Faild !Please Try Again',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                        }
            
        }
        public function enablePayment($id){
               $update=ExamRequest::where('id',$id)->update([
                'enable_pay'=>1, 
            ]);
                         if($update){     
                          $notification = array(
                            'messege' => 'success!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                        }else{
                            $notification = array(
                            'messege' => 'Faild !Please Try Again',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                        }
        }
        
        
        public function centreresult($id){
            $data=ExamRequest::where('id',$id)->first();
            return view('backend.examrequest.centreresult',compact('data'));
        }
        public function centreresultSubmit(Request $request){
            
            $insert=DB::table('exam_centre_results')->insert([
                'main_exam_type'=>$request->main_exam_type,    
                'name'=>$request->name,    
                'email'=>$request->email,    
                'candidate_id'=>$request->candidate_id,    
                'booking_id'=>$request->booking_id,    
                'uci_number'=>$request->uci_number ?? '',    
                'uln_number'=>$request->uln_number ?? '',    
                'booking_id'=>$request->booking_id,    
                'user_id'=>$request->user_id,    
                'exam_id'=>$request->exam_id,    
                'endrosment'=>$request->endrosment,    
                'exam_series'=>$request->exam_series,    
                'exam_board'=>$request->exam_board,    
                'subject'=>$request->subject,    
                'mark'=>$request->mark,    
                'grade'=>$request->grade,   
                'created_at'=>Carbon::now()->toDateTimeString(),   
                'created_by'=>Auth::user()->id,   
            ]);
             if($insert){     
              $notification = array(
                'messege' => 'success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            }else{
                $notification = array(
                'messege' => 'Faild !Please Try Again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            }
            
        }
        
        // 
        public function sendFirstDuePaymemt($id){
           
             $data=ExamRequest::where('id',$id)->update([
                    'first_payment_alert'=>1,
                    'first_payment_date'=>Carbon::now()->toDateTimeString(),
                ]);
             if($data){ 
                  $users=ExamRequest::where('id',$id)->select(['id','first_name','email'])->first();
              $coupon=DB::table('cupons')->first();
              $user = [
                'name' => $users->first_name,
                'email' => $users->email,
                'coupon'=>$coupon->custom_cupon_code,
                ];
          
                Mail::to($users->email)->send(new firstPaymentalert($user));
                 
                  $notification = array(
                    'messege' => 'success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                    'messege' => 'Faild !Please Try Again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
                }
        }
        //
        public function sendSecondDuePaymemt($id){
            
             $data=ExamRequest::where('id',$id)->update([
                    'second_payment_alert'=>1,
                    'second_payment_date'=>Carbon::now()->toDateTimeString(),
                ]);
             if($data){  
              $users=ExamRequest::where('id',$id)->select(['id','first_name','email'])->first();
              $coupon=DB::table('cupons')->first();
              $user = [
                'name' => $users->first_name,
                'email' => $users->email,
                'coupon'=>$coupon->global_cupon_code,
                ];
          
                Mail::to($users->email)->send(new secondPaymentAlert($user));
                  $notification = array(
                    'messege' => 'success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                    'messege' => 'Faild !Please Try Again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }

    public function realdeleteexambooking($id){
        $delete=ExamRequest::where('id',$id)->delete();
                    if($delete){
                    $notification = array(
                        'messege' => 'Real success!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
                        'messege' => 'RealFaild !Please Try Again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                    }
    }
    
    public function bookingFirstEmailSend(){
        $yesterdayStart = Carbon::now()->subDay()->startOfDay(); // 00:00:00 of yesterday
        $yesterdayEnd = Carbon::now()->subDay()->endOfDay(); // 23:59:59 of yesterday

        $allRequest = ExamRequest::whereBetween('created_at', [$yesterdayStart, $yesterdayEnd])
            ->select(['first_name', 'email', 'id'])
            ->where('is_deleted',1)->where('is_visible',0)->where('first_payment_alert',0)->where('is_paid',0)->where('is_refunded',0)->where('is_withdrawn',0)->where('is_paid_verify',0)
            ->whereIn('main_exam_type', ['GCSE', 'IGCSE', 'A Level', 'AS Level'])
            ->get();
        // dd($allRequest);
         foreach($allRequest as $data){
                     $datas=ExamRequest::where('id',$data->id)->update([
                    'first_payment_alert'=>1,
                    'first_payment_date'=>Carbon::now()->toDateTimeString(),
                ]);
            
              
              $coupon=DB::table('cupons')->first();
              $user = [
                'name' => $data->first_name,
                'email' => $data->email,
                'coupon'=>$coupon->custom_cupon_code,
                ];
          
                Mail::to($data->email)->send(new firstPaymentalert($user));
         }
          $notification = array(
                    'messege' => 'success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
 
    }
    
    public function bookingSecondEmailSend(){
        $yesterdayStart = Carbon::now()->subDay(3)->startOfDay(); // 00:00:00 of yesterday
        $yesterdayEnd = Carbon::now()->subDay(3)->endOfDay(); // 23:59:59 of yesterday

        $allRequest = ExamRequest::whereBetween('created_at', [$yesterdayStart, $yesterdayEnd])
            ->select(['first_name', 'email', 'id'])
            ->where('is_deleted',1)->where('is_visible',0)->where('second_payment_alert',0)->where('is_paid',0)->where('is_refunded',0)->where('is_withdrawn',0)->where('is_paid_verify',0)
            ->whereIn('main_exam_type', ['GCSE', 'IGCSE', 'A Level', 'AS Level'])
            ->get();
        // dd($allRequest);
         foreach($allRequest as $data){
                     $datas=ExamRequest::where('id',$data->id)->update([
                    'second_payment_alert'=>1,
                    'second_payment_date'=>Carbon::now()->toDateTimeString(),
                ]);
            
             
              $coupon=DB::table('cupons')->first();
              $user = [
                'name' => $data->first_name,
                'email' => $data->email,
                'coupon'=>$coupon->global_cupon_code,
                ];
          
                Mail::to($data->email)->send(new secondPaymentAlert($user));
         }
          $notification = array(
                    'messege' => 'success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    }
    public function centreresultPrint($id){
        $data=ExamRequest::where('id',$id)->first();
        $results=DB::table('exam_centre_results')->where('booking_id',$data->booking_id)->get();
        return view('invoice.printcentreresult',compact('data','results'));
    }
    
    public function certificateCollectionMail($id){
      // Retrieve data for the given booking ID
        $data = ExamRequest::where('booking_id', $id)
            ->select(['Candidate_number', 'id', 'email', 'first_name', 'middle_name', 'last_name', 'booking_id','is_ceritficate_open','main_exam_type'])
            ->first();

        if ($data) {
            $update=ExamRequest::where('booking_id',$id)->update([
                    'is_ceritficate_open'=>1,
                ]);
            // Send email
            Mail::to($data->email)->send(new CertificateMail($data));
            
             $notification = array(
                    'messege' => 'Certificate collection email sent successfully!!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            
        } else {
            return response()->json(['message' => 'No data found for the given booking ID.'], 404);
        }
    }
    // 
    
    public function certificateCollectionUpdate($id){
         $data = ExamRequest::where('booking_id', $id)
            ->select(['Candidate_number', 'id', 'email', 'first_name', 'middle_name', 'last_name', 'booking_id','is_ceritficate_open','main_exam_type','exam_information','exam_series','user_id'])
            ->first();
          return view('backend.certificate.create',compact('data'));
    }
    
    // 
    public function certificateCollectionUpdateStore(Request $request,$id){
       
        $insert=DB::table('certificate_collect')->insertGetId([
                
                'booking_id'=>$id,
                'user_id'=>$request->user_id,
                'main_id'=>$request->id,
                'exam_types'=>$request->exam_type,
                'exam_series'=>$request->exam_series,
                'subject_details'=>json_encode($request->subjects),
                'notes'=>$request->notes,
                'collection_by'=>$request->collection_by,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'created_by'=>Auth::user()->id,
            
            ]);
            
            
        if($insert){
            $notification = array(
                    'messege' => 'success',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
        }else{
            $notification = array(
                    'messege' => 'Faild!!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
        }
    }
    
    
}
