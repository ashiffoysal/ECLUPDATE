<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\ExamRequest;
use App\Jobs\GenerateAndSendPDFJob;
use Carbon\Carbon;
use Auth;
use Image;
use Alert;
use Stripe;
use Mail;
use App\Mail\ExamBookingMail;
use App\Mail\CandidateInvoiceMail;
use App\Mail\ExamBookingDetailsForAdmin;
use App\Mail\ExamBooking;
use App\Models\User;
use App\Models\AatCategory;
use App\Models\Subcategory;
use App\Models\Examessuedate;
use App\Models\MockTest;
use PDF;
use DB;


class ExambookingController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }
    
    
      public function examtypeUpdateByuser(Request $request){

        $update=User::where('id',$request->student_id)->update([
            'instruction_to_house'=>$request->main_exam,
        ]);
        if($update){
            return response('success') ;
        
        }else{
            return response('faild') ;
        }
        
        
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
            'date_of_birth' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'emergency_number' => 'required',
            'address_line_1' => 'required',
            'post_code' => 'required',
            'fileUpload' => 'required',
            'thumbnail_img' => 'required',
        ]);
        $insert=DB::table('functional_skill_tuition')->insertGetId([
            'booking_id'=>$booking_id,
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
        ]);
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
               Alert::toast('Exam Booking success! Please Pay', 'success');
                return redirect('/make-payment/functional-skils-tuition/'.$booking_id);
            } else {
                Alert::toast('Something Went Wrong', 'error');
                return redirect()->back();
            }
        
        

        
        
        
    }

    public function getMockSubject(Request $request){
       
        $subject=$request->subject;
        $options = array();
       
        array_push($options,$subject);
        
        return view('frontend.exambooking.mockexamdubject',compact('options'));
    }
    
    
    
    public function getGcseMockSubject(Request $request){
       
        $subject=$request->subject;
        $options = array();
       
        array_push($options,$subject);
       
         return view('frontend.exambooking.gcsemocksubject',compact('options'));
    }







    
    public function exambooking(){
    	return view('frontend.exambooking.exam');
    }

    public function getsubject($type_id){
        $data=Subject::where('exam_board',$type_id)->where('is_deleted',0)->get();
        return response()->json($data);

    }

    public function fssubjectdetails($subject_id)
    {
        // Retrieve the subject by its ID
        $data = Subject::where('id', $subject_id)->first();
    
        // Check if the subject exists
        if ($data) {
            // Return the exam_fees attribute as a JSON response
            return response()->json([
                'exam_fees' => $data->exam_fees
            ]);
        } else {
            // Return a 404 response if the subject is not found
            return response()->json([
                'error' => 'Subject not found'
            ], 404);
        }
    }



    public function subjectdetails($subject_id){



        $data=Subject::where('id',$subject_id)->first();
        return response()->json($data);



    }

    public function subjectdetailsindividual(Request $request){

        

        $today_date=Carbon::now()->format('Y-m-d');

        if($request->exam_booking_type=='GCSE'){
         
          $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                      
                       //   high late fees
                      
                        $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                               
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                             
                            
                            ];
                        return response($maindata);
                      
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                   'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
             
          }

           
         
           
            
        }
        
        
       if($request->exam_booking_type=='IGCSE'){
         
          $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                      
                       //   high late fees
                            $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                            
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                               
                            
                            ];
                        return response()->json($maindata,200);
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                     'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                     'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
             
          }

           
         
           
            
        }
        
        if($request->exam_booking_type=='A Level'){
         
          $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                      
                       //   high late fees
                      
                        $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                            
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                               
                            
                            ];
                        return response()->json($maindata,200);
                      
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                               
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                     'option_code_details'=>json_decode($data->option_code_details),
                               
                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                             
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                               
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                               
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                     'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
             
          }

           
         
           
            
        }
        
        
        if($request->exam_booking_type=='AS Level'){
         
          $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                      
                       //   high late fees
                      
                        $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
                      
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                                
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                     'option_code_details'=>json_decode($data->option_code_details),
                                                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                               
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                     'option_code_details'=>json_decode($data->option_code_details),
                                
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                            
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                     'option_code_details'=>json_decode($data->option_code_details),
                              
                            ];
                        return response()->json($maindata,200);
             
          }

           
         
           
            
        }
        
        



    }



    public function exambookingfuctionalskills(){
        $allsub=Subject::where('exam_type','Functional Skills')->where('is_deleted',0)->get();
        $allbranch=DB::table('branch')->select(['id','name'])->get();
        $maindata=ExamRequest::where('user_id',Auth::user()->id)->where('main_exam_type','Functional Skills')->where('is_completed_from',0)->first();
        return view('frontend.exambooking.fuctionalskills',compact('allsub','maindata','allbranch'));
    }


    public function exambookingfuctionalskillssubmit(Request $request){

        if($request->subject !=null){

         $insert=ExamRequest::insertGetId([
                'user_id'=>Auth::user()->id,
                'booking_id'=>$request->booking_id,
                'first_name'=>$request->first_name,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'emergency_contact_number'=>$request->emergency_contact_number,
                'address_line_1'=>$request->address_line_1,
                'address_line_2'=>$request->address_line_2,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'date_of_birth'=>$request->date_of_birth,
                'photo_id'=>'',
                'gender'=>$request->gender,
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'total_amount'=>$request->total_amount,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                   
                
                
                'special_acces'=>$request->special_acces,
                'special_acces_evidence'=>$request->special_acces_evidence,
                'mental_conditions'=>$request->mental_conditions,
                'mental_condition_details'=>$request->mental_condition_details,
                'condition_disability'=>$request->condition_disability,
                'condition_disability_details'=>$request->condition_disability_details,
                
                'relationship'=>$request->relationship,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'main_exam_type'=>'Functional Skills',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
                'mock_test'=>$request->mock_test,
            
                'is_completed_from'=>1,
                'status'=>1,



        ]);
        if($request->exam_series=="Forest Gate"){
            $exam_information = array();
            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['exam_board'] = $request->exam_board[$key];
                    $item['exam_series'] = $request->exam_series;
                    $item['type'] = $request->type[$key];
                    $item['subject'] = $request->subject[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    $item['exam_date'] = $request->fg_exam_date[$key];
                    $item['start_exam_time'] = $request->start_exam_time[$key];

                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                            }
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                 'total_amount'=>$total_amount,
                                'due_amount'=>$total_amount,
                            ]);
                    }
                     
        }  
        if($request->exam_series=="Ilford Lane"){
            $exam_information = array();
            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['exam_board'] = $request->exam_board[$key];
                    $item['exam_series'] = $request->exam_series;
                    $item['type'] = $request->type[$key];
                    $item['subject'] = $request->subject[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    $item['exam_date'] = $request->il_exam_date[$key];
                    $item['start_exam_time'] = $request->start_exam_time[$key];

                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                            }
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                 'total_amount'=>$total_amount,
                                'due_amount'=>$total_amount,
                            ]);
                    }
                     
        }
                     
                if ($request->hasFile('fileUpload')) {
                    $extension = $request->fileUpload->getClientOriginalExtension();
                    if($extension !='pdf'){
                        
                                
                            $photo =$request->file('fileUpload');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                            ExamRequest::where('id',$insert)->update([
                                'photo_id' => 'uploads/student/exambooking/'.$name,
                            ]);
                            
                           
                            
                          
                        }else{
                        
                            $photo =$request->file('fileUpload');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/', $name);
                            ExamRequest::where('id',$insert)->update([
                                'photo_id' => 'uploads/student/'.$name,
                            ]);
                            
                        }
                    }

                    if ($request->signed) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        ExamRequest::where('id',$insert)->update([
                            
                            'signed' => $file,
                        ]);
                      
                    }
                    
                    
                if ($request->hasFile('thumbnail_img')) {
                $extensiontwo = $request->thumbnail_img->getClientOriginalExtension();
                    if($extensiontwo !='pdf'){
                    
                       
                            $photos =$request->file('thumbnail_img');
                            $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfiles =$photos->move(public_path().'/uploads/student/exambooking/', $names);
                            ExamRequest::where('id',$insert)->update([
                                'recent_photo' => 'uploads/student/exambooking/'.$names,
                            ]);
                            
                        
                    }else{
                            $photos =$request->file('thumbnail_img');
                            $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfiles =$photos->move(public_path().'/uploads/student/', $names);
                            ExamRequest::where('id',$insert)->update([
                                'recent_photo' => 'uploads/student/'.$names,
                            ]);
                    }
                } 
                
                    if ($request->hasFile('evidence_documents')) {
                        $photoss =$request->file('evidence_documents');
                            $namess = 'special_evidents_documents'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                            $newfiless =$photoss->move(public_path().'/uploads/student/exambooking/', $namess);
                            ExamRequest::where('id',$insert)->update([
                                'special_evidents_documents' => 'uploads/student/exambooking/'.$namess,
                            ]);
                    }

                 Mail::to($request->email)->send(new ExamBookingMail());
                 if ($insert) {
                   
                    $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$request->booking_id,
                    ]);
                   
                     $email="admin@merittutors.co.uk";
                     Mail::to($email)->send(new ExamBooking($user));
                    $data=ExamRequest::where('id',$insert)->first();
                    Alert::toast('Exam booking success!please pay now', 'success');
                    return redirect('/make-payment/exambooking/'.$data->booking_id);
                } else {
                    Alert::toast('Something Went Wrong', 'error');
                    return redirect()->back();
                }

        } else {
            Alert::toast('Please enter your subject', 'error');
            return redirect()->back();
        }

     
    }


 


     public function accaexamsubmit(Request $request){

            if($request->subject !=null){ 

           
             $insert=ExamRequest::insertGetId([
                'acca_registration_num'=>$request->acca_registration,
                'user_id'=>Auth::user()->id,
                'booking_id'=>$request->booking_id,
                'first_name'=>$request->first_name,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'emergency_contact_number'=>$request->emergency_contact_number,
                'address_line_1'=>$request->address_line_1,
                'address_line_2'=>$request->address_line_2,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'date_of_birth'=>$request->date_of_birth,
                'photo_id'=>'',
                'gender'=>$request->gender,
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'total_amount'=>$request->total_amount,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                
               
                'special_acces'=>$request->special_acces,
                'special_acces_evidence'=>$request->special_acces_evidence,
                'mental_conditions'=>$request->mental_conditions,
                'mental_condition_details'=>$request->mental_condition_details,
                'condition_disability'=>$request->condition_disability,
                'condition_disability_details'=>$request->condition_disability_details,
                
                
                
                'relationship'=>$request->relationship,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'payment_option'=>$request->payment_option,
                'main_exam_type'=>'ACCA',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
                'is_completed_from'=>1,
                'status'=>1,


        ]);

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
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                 'total_amount'=>$total_amount,
                                'due_amount'=>$total_amount,
                            ]);
            }
          if ($request->hasFile('fileUpload')) {
                   
                                $photo =$request->file('fileUpload');
                            $name = 'photo_id_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                            ExamRequest::where('id',$insert)->update([
                                'photo_id' => 'uploads/student/exambooking/'.$name,
                            ]);
                                
                                
                          
                        
                    }

                    if ($request->signed) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        ExamRequest::where('id',$insert)->update([
                            
                            'signed' => $file,
                        ]);
                      
                    }
                    
                    
                if ($request->hasFile('thumbnail_img')) {
              
                    
                        $photos =$request->file('thumbnail_img');
                            $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfiles =$photos->move(public_path().'/uploads/student/exambooking/', $names);
                            ExamRequest::where('id',$insert)->update([
                                'recent_photo' => 'uploads/student/exambooking/'.$names,
                            ]);
                  
                }
                
                if ($request->hasFile('evidence_documents')) {
                        $photoss =$request->file('evidence_documents');
                        $namess = 'special_evidents_documents'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                        $newfiless =$photoss->move(public_path().'/uploads/student/exambooking/', $namess);
                        ExamRequest::where('id',$insert)->update([
                            'special_evidents_documents' => 'uploads/student/exambooking/'.$namess,
                        ]);
                }


            Mail::to($request->email)->send(new ExamBookingMail());
            if ($insert) {
                 $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$request->booking_id,
                    ]);
                   
                     $email="admin@merittutors.co.uk";
                     Mail::to($email)->send(new ExamBooking($user));
                     
                  
                    $data=ExamRequest::where('id',$insert)->first();
                    
                Alert::toast('Exam Booking Success! Please Pay Now', 'success');
                return redirect('/make-payment/exambooking/'.$data->booking_id);
            } else {
                Alert::toast('Something Went Wrong', 'error');
                return redirect()->back();
            }
        }
        else {
            Alert::toast('Please Enter subject', 'error');
            return redirect()->back();
        }
        
    }


    public function exambookingatt(){

         $allsub=Subject::where('exam_type','AAT')->where('is_deleted',0)->get();
         $allaatcate=AatCategory::get();
         $allaatsubcate=Subcategory::get();
         $allbranch=DB::table('branch')->select(['id','name'])->get();
         $maindata=ExamRequest::where('user_id',Auth::user()->id)->where('main_exam_type','AAT')->where('is_completed_from',0)->first();
        return view('frontend.exambooking.attexam',compact('allsub','maindata','allaatcate','allbranch'));
    }

    public function exambookingattsubmit(Request $request){

       
        if($request->subject !=null){ 
             $insert=ExamRequest::insertGetId([
                'acca_registration_num'=>$request->acca_registration,
                'user_id'=>Auth::user()->id,
                'booking_id'=>$request->booking_id,
                'first_name'=>$request->first_name,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'emergency_contact_number'=>$request->emergency_contact_number,
                'address_line_1'=>$request->address_line_1,
                'address_line_2'=>$request->address_line_2,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'date_of_birth'=>$request->date_of_birth,
                'photo_id'=>'',
                'gender'=>$request->gender,
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'total_amount'=>$request->total_amount,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                 
                
                'special_acces'=>$request->special_acces,
                'special_acces_evidence'=>$request->special_acces_evidence,
                'mental_conditions'=>$request->mental_conditions,
                'mental_condition_details'=>$request->mental_condition_details,
                'condition_disability'=>$request->condition_disability,
                'condition_disability_details'=>$request->condition_disability_details,
                
                
                'relationship'=>$request->relationship,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'payment_option'=>$request->payment_option,
                'main_exam_type'=>'AAT',
                'created_at'=>Carbon::now()->toDateTimeString(),
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
               
                'is_completed_from'=>1,
                'status'=>1,

        ]);
        


        if($request->exam_series=="Ilford Lane"){
             $exam_information = array();

            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['exam_board'] = 'AAT';
                    $item['exam_series'] = $request->exam_series;
                    $item['type'] = $request->type[$key] ?? '';
                    $item['subject'] = $request->subject[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    $item['exam_date'] = $request->il_exam_date[$key];
                    $item['start_exam_time'] = $request->start_exam_time[$key];
                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                            }
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                 'total_amount'=>$total_amount,
                                'due_amount'=>$total_amount,
                            ]);
            }
        }
        
         if($request->exam_series=="Forest Gate"){
             $exam_information = array();

            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['exam_board'] = 'AAT';
                    $item['exam_series'] = $request->exam_series;
                    $item['type'] = $request->type[$key] ?? '';
                    $item['subject'] = $request->subject[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    $item['exam_date'] = $request->fg_exam_date[$key];
                    $item['start_exam_time'] = $request->start_exam_time[$key];
                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                            }
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                 'total_amount'=>$total_amount,
                                'due_amount'=>$total_amount,
                            ]);
            }
        }
        
            
            
            

                    if ($request->hasFile('fileUpload')) {
                            $photo =$request->file('fileUpload');
                            $name = 'photo_id_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                            ExamRequest::where('id',$insert)->update([
                                'photo_id' => 'uploads/student/exambooking/'.$name,
                            ]);
                    }

                    if ($request->signed) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        ExamRequest::where('id',$insert)->update([
                            
                            'signed' => $file,
                        ]);
                      
                    }
                    
                    
                if ($request->hasFile('thumbnail_img')) {
                    
                    $photos =$request->file('thumbnail_img');
                    $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                    $newfiles =$photos->move(public_path().'/uploads/student/exambooking/', $names);
                    ExamRequest::where('id',$insert)->update([
                        'recent_photo' => 'uploads/student/exambooking/'.$names,
                    ]);
                  
                }
                
                if ($request->hasFile('evidence_documents')) {
                    $photoss =$request->file('evidence_documents');
                    $namess = 'special_evidents_documents'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                    $newfiless =$photoss->move(public_path().'/uploads/student/exambooking/', $namess);
                    ExamRequest::where('id',$insert)->update([
                        'special_evidents_documents' => 'uploads/student/exambooking/'.$namess,
                    ]);
                }

             Mail::to($request->email)->send(new ExamBookingMail());
            if ($insert) {
                    $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$request->booking_id,
                    ]);
                   
                     $email="admin@merittutors.co.uk";
                     Mail::to($email)->send(new ExamBooking($user));
                    $data=ExamRequest::where('id',$insert)->first();
                    $job = new GenerateAndSendPDFJob($data);
            
                    
                     
                     
                     
                 Alert::toast('Exam Booking success! Please Pay', 'success');
                return redirect('/make-payment/exambooking/'.$data->booking_id);
            } else {
                Alert::toast('Something Went Wrong', 'error');
                return redirect()->back();
            }
        }else{

            Alert::toast('Please Enter Subjects', 'error');
            return redirect()->back();
        }

    }

    public function exambookingmain(){
        $allsub=Subject::where('is_deleted',0)->get();
        return view('frontend.exambooking.allexam',compact('allsub'));
    }

    public function exambookinggcse(){

        $allsub=Subject::where('exam_type','GCSE')->where('exam_board','Edexcel')->where('is_deleted',0)->where('june_availability',1)->where('is_ac',1)->get();
        $maindata=ExamRequest::where('user_id',Auth::user()->id)->where('main_exam_type','GCSE')->where('is_completed_from',0)->first();
        $allseries=Examessuedate::where('is_deleted',0)->where('is_active',1)->where('is_gcse',1)->get();
        
        $allexamboard=['Edexcel','OCR','AQA','WJEC'];
        return view('frontend.exambooking.gcse',compact('allsub','maindata','allseries','allexamboard'));
    }


    public function makepayment($order_id){
        

        $data=ExamRequest::where('booking_id',$order_id)->first();
        return view('frontend.exambooking.makepayment',compact('data'));
    }


    public function exambookingstoregcse(Request $request){
      
            $validated = $request->validate([
                'first_name' => 'required',
                'email' => 'required',
                'thumbnail_img'=>'required',
                'fileUpload'=>'required',
                'subject'=>'required',
            ]);
 
        $insert=ExamRequest::insertGetId([
                'user_id'=>Auth::user()->id,
                'booking_id'=>$request->booking_id,
                'main_exam_type'=>$request->main_exam_type,
                'first_name'=>$request->first_name,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'emergency_contact_number'=>$request->emergency_contact_number,
                'address_line_1'=>$request->address_line_1,
                'address_line_2'=>$request->address_line_2,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'date_of_birth'=>$request->date_of_birth,
                'gender'=>$request->gender,
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'total_amount'=>$request->total_amount,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                'special_access_requirements'=>json_encode($request->special_access_requirements) ?? '',
                'update_special_acces'=>json_encode($request->special_acces) ?? '',
                'special_acces_evidence'=>$request->special_acces_evidence,
                'mental_conditions'=>$request->mental_conditions ?? '',
                'mental_condition_details'=>$request->mental_condition_details ?? '',
                'condition_disability'=>$request->condition_disability ?? '',
                'condition_disability_details'=>$request->condition_disability_details ?? '',
                'relationship'=>$request->relationship,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
                'mock_test'=>$request->mock_test,
                'mock_amount'=>$request->hidden_mock_price ?? 0,
                'is_completed_from'=>1,
                'status'=>1,
                'exam_series'=>$request->exam_series,

        ]);
          $exam_information = array();

            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['exam_board'] = $request->exam_board[$key];
                    $item['exam_series'] = $request->exam_series;
                    $item['type'] = 'GCSE';
                    $item['subject'] = $request->subject[$key];
                    $item['unit_code'] = $request->unit_code[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                            }
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                'total_amount'=>$total_amount + $request->hidden_mock_price ?? 0,
                                'due_amount'=>$total_amount + $request->hidden_mock_price ?? 0,
                            ]);
            }
            
            if($request->need_special_access==1){
                $update=ExamRequest::where('id',$insert)->update([
                   'is_need_pay_sp_fee'=>1,  
                   'special_access_initial_fees'=>25,  
                ]);
            }
        

          
             if($request->mock_test=="mock_test_yes"){
                
                    $mock_exam_information = array();

                    if ($request->has('mock_subject_id')) {
                        
                        $mock_amount=$request->hidden_mock_price ?? 0;
                        
                        foreach ($request->mock_subject_id as $skey => $sno) {
                          
                            $myitem['mock_subject_name'] = $request->mock_subject_name[$skey];
                            $myitem['mock_subject_id'] = $request->mock_subject_id[$skey];
                            $myitem['mock_test_paper_1'] = $request->mock_test_paper_1[$skey] ?? '';
                            $myitem['mock_test_paper_2'] = $request->mock_test_paper_2[$skey] ?? '';
                            $myitem['mock_test_paper_3'] = $request->mock_test_paper_3[$skey] ?? '';
                            $myitem['mock_test_paper_4'] = $request->mock_test_paper_4[$skey] ?? '';
                            $myitem['mock_exam_date_1'] = $request->mock_exam_date_1[$skey] ?? '';
                            $myitem['mock_exam_date_2'] = $request->mock_exam_date_2[$skey] ?? '';
                            $myitem['mock_exam_date_3'] = $request->mock_exam_date_3[$skey] ?? '';
                            $myitem['mock_exam_date_4'] = $request->mock_exam_date_4[$skey] ?? '';
                            
                            array_push($mock_exam_information, $myitem);
                        
                            }
                                    $update=MockTest::insert([
                                        
                                        'exam_information'=>json_encode($mock_exam_information),
                                        'total_amount'=>$mock_amount ?? 0,
                                        'booking_id'=>$request->booking_id,
                                        'user_id'=>Auth::user()->id,
                                        'first_name'=>$request->first_name,
                                        'middle_name'=>$request->middle_name,
                                        'last_name'=>$request->last_name,
                                        'email'=>$request->email,
                                        'phone'=>$request->phone,
                                        'created_at'=>Carbon::now()->toDateTimeString(),
                                        
                                       
                                    ]);
                    }   
                    
                    
            }
            
                 
                    
                    
              if ($request->hasFile('fileUpload')) {
                  
                            $photo =$request->file('fileUpload');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                            ExamRequest::where('id', $insert)->update([
                                'photo_id' => 'uploads/student/exambooking/'.$name,
                            ]);
                          
                       
                    }

                    if ($request->signed) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        ExamRequest::where('id',$insert)->update([
                            
                            'signed' => $file,
                        ]);
                      
                    }
                    
                    
                if ($request->hasFile('thumbnail_img')) {
              
                    
                       
                        $photos =$request->file('thumbnail_img');
                            $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfiles =$photos->move(public_path().'/uploads/student/exambooking/', $names);
                            ExamRequest::where('id',$insert)->update([
                                'recent_photo' => 'uploads/student/exambooking/'.$names,
                            ]);
                  
                }
                
                  if ($request->hasFile('evidence_documents')) {
                
                            $photoss =$request->file('evidence_documents');
                            $namess = 'special_evidents_documents'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                            $newfiless =$photoss->move(public_path().'/uploads/student/', $namess);
                            ExamRequest::where('id',$insert)->update([
                                'special_evidents_documents' => 'uploads/student/'.$namess,
                            ]);
                    
                }
                
                
                 if ($request->hasFile('proof_of_evidence')) {
                
                        
                            $photoss =$request->file('proof_of_evidence');
                                $namesss = 'proof_of_carring'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                                $newfiless =$photoss->move(public_path().'/uploads/student/exambooking/', $namesss);
                                ExamRequest::where('id',$insert)->update([
                                    'proof_of_carring' => 'uploads/student/exambooking/'.$namesss,
                                ]);
                    
                    }
                
                
         
             Mail::to($request->email)->send(new ExamBookingMail());
            if ($insert) {
                   $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$request->booking_id,
                    ]);
                   
                    // $email="admin@merittutors.co.uk";
                    // Mail::to($email)->send(new ExamBooking($user));
                    $data=ExamRequest::where('id',$insert)->first();
                Alert::toast('Exam Booking success! Please Pay', 'success');
                return redirect('/make-payment/exambooking/'.$data->booking_id);
       
        }else{
             Alert::toast('Please Enter Subjects', 'error');
             return redirect()->back();
        }
        
      

    }
// a level
    public function exambookingalevel(){
             // Calculate the minimum date of birth for eligibility (11 years ago from today)
    $dateOfBirthThreshold = Carbon::now()->subYears(11)->format('Y-m-d');

    // Fetch subjects for A Level exams with specific criteria
    $subjects = Subject::where([
        ['exam_type', 'A Level'],
        ['exam_board', 'Edexcel'],
        ['is_deleted', 0],
        ['june_availability', 1],
        ['is_ac', 1],
    ])->get();
    // Fetch all active series for A Level exams
    $examSeries = Examessuedate::where([
        ['is_alevel', 1],
        ['is_active', 1],
        ['is_deleted', 0],
    ])->get();

    // Generate a unique booking ID for the current user
    $bookingId = Auth::id() . rand(11111, 99999);

    // Define available exam boards
    $examBoards = ['Edexcel', 'AQA', 'OCR', 'WJEC', 'Cambridge CIE'];

    // Return the view with the prepared data
    return view('frontend.exambooking.alevel', compact(
        'subjects',
        'examSeries',
        'examBoards',
        'dateOfBirthThreshold',
        'bookingId'
    ));
    }
    public function exambookingalevelstore(Request $request){
        
           return $request;
           $validated = $request->validate([
                'first_name' => 'required',
                'email' => 'required',
                'thumbnail_img'=>'required',
                'fileUpload'=>'required',
                'subject'=>'required',
            ]);
       
        
        $insert=ExamRequest::insertGetId([
                'user_id'=>Auth::user()->id,
                'booking_id'=>$request->booking_id,
                'main_exam_type'=>$request->main_exam_type,
                'first_name'=>$request->first_name,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'emergency_contact_number'=>$request->emergency_contact_number,
                'address_line_1'=>$request->address_line_1,
                'address_line_2'=>$request->address_line_2,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'date_of_birth'=>$request->date_of_birth,
                'gender'=>$request->gender,
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'total_amount'=>$request->total_amount,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                'special_access_requirements'=>json_encode($request->special_access_requirements) ?? '',
                'update_special_acces'=>json_encode($request->special_acces) ?? '',
                'special_acces_evidence'=>$request->special_acces_evidence,
                'mental_conditions'=>$request->mental_conditions ?? '',
                'mental_condition_details'=>$request->mental_condition_details ?? '',
                'condition_disability'=>$request->condition_disability ?? '',
                'condition_disability_details'=>$request->condition_disability_details ?? '',
                'relationship'=>$request->relationship,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
                'mock_test'=>$request->mock_test,
                'mock_amount'=>$request->hidden_mock_price ?? 0,
                'is_completed_from'=>1,
                'status'=>1,
                'exam_series'=>$request->exam_series,

        ]);
          $exam_information = array();

            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['exam_board'] = $request->exam_board[$key];
                    $item['exam_series'] = $request->exam_series;
                    $item['type'] = 'A Level';
                    $item['subject'] = $request->subject[$key];
                    $item['unit_code'] = $request->unit_code[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                            }
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                'total_amount'=>$total_amount + $request->hidden_mock_price ?? 0,
                                'due_amount'=>$total_amount + $request->hidden_mock_price ?? 0,
                            ]);
            }
            
            if($request->need_special_access==1){
                $update=ExamRequest::where('id',$insert)->update([
                   'is_need_pay_sp_fee'=>1,  
                   'special_access_initial_fees'=>25,  
                ]);
            }
        

          
             if($request->mock_test=="mock_test_yes"){
                
                    $mock_exam_information = array();

                    if ($request->has('mock_subject_id')) {
                        
                        $mock_amount=$request->hidden_mock_price ?? 0;
                        
                        foreach ($request->mock_subject_id as $skey => $sno) {
                          
                            $myitem['mock_subject_name'] = $request->mock_subject_name[$skey];
                            $myitem['mock_subject_id'] = $request->mock_subject_id[$skey];
                            $myitem['mock_test_paper_1'] = $request->mock_test_paper_1[$skey] ?? '';
                            $myitem['mock_test_paper_2'] = $request->mock_test_paper_2[$skey] ?? '';
                            $myitem['mock_test_paper_3'] = $request->mock_test_paper_3[$skey] ?? '';
                            $myitem['mock_test_paper_4'] = $request->mock_test_paper_4[$skey] ?? '';
                            $myitem['mock_exam_date_1'] = $request->mock_exam_date_1[$skey] ?? '';
                            $myitem['mock_exam_date_2'] = $request->mock_exam_date_2[$skey] ?? '';
                            $myitem['mock_exam_date_3'] = $request->mock_exam_date_3[$skey] ?? '';
                            $myitem['mock_exam_date_4'] = $request->mock_exam_date_4[$skey] ?? '';
                            
                            array_push($mock_exam_information, $myitem);
                        
                            }
                                    $update=MockTest::insert([
                                        
                                        'exam_information'=>json_encode($mock_exam_information),
                                        'total_amount'=>$mock_amount ?? 0,
                                        'booking_id'=>$request->booking_id,
                                        'user_id'=>Auth::user()->id,
                                        'first_name'=>$request->first_name,
                                        'middle_name'=>$request->middle_name,
                                        'last_name'=>$request->last_name,
                                        'email'=>$request->email,
                                        'phone'=>$request->phone,
                                        'created_at'=>Carbon::now()->toDateTimeString(),
                                        
                                       
                                    ]);
                    }   
                    
                    
            }
            
                 
                    
                    
              if ($request->hasFile('fileUpload')) {
                  
                            $photo =$request->file('fileUpload');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                            ExamRequest::where('id', $insert)->update([
                                'photo_id' => 'uploads/student/exambooking/'.$name,
                            ]);
                          
                       
                    }

                    if ($request->signed) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        ExamRequest::where('id',$insert)->update([
                            
                            'signed' => $file,
                        ]);
                      
                    }
                    
                    
                if ($request->hasFile('thumbnail_img')) {
              
                    
                       
                        $photos =$request->file('thumbnail_img');
                            $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfiles =$photos->move(public_path().'/uploads/student/exambooking/', $names);
                            ExamRequest::where('id',$insert)->update([
                                'recent_photo' => 'uploads/student/exambooking/'.$names,
                            ]);
                  
                }
                
                  if ($request->hasFile('evidence_documents')) {
                
                            $photoss =$request->file('evidence_documents');
                            $namess = 'special_evidents_documents'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                            $newfiless =$photoss->move(public_path().'/uploads/student/', $namess);
                            ExamRequest::where('id',$insert)->update([
                                'special_evidents_documents' => 'uploads/student/'.$namess,
                            ]);
                    
                }
                
                
                 if ($request->hasFile('proof_of_evidence')) {
                
                        
                            $photoss =$request->file('proof_of_evidence');
                                $namesss = 'proof_of_carring'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                                $newfiless =$photoss->move(public_path().'/uploads/student/exambooking/', $namesss);
                                ExamRequest::where('id',$insert)->update([
                                    'proof_of_carring' => 'uploads/student/exambooking/'.$namesss,
                                ]);
                    
                    }
                
                
         
             Mail::to($request->email)->send(new ExamBookingMail());
            if ($insert) {
                   $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$request->booking_id,
                    ]);
                   
                    // $email="admin@merittutors.co.uk";
                    // Mail::to($email)->send(new ExamBooking($user));
                    $data=ExamRequest::where('id',$insert)->first();
                Alert::toast('Exam Booking success! Please Pay', 'success');
                return redirect('/make-payment/exambooking/'.$data->booking_id);
       
        }else{
             Alert::toast('Please Enter Subjects', 'error');
             return redirect()->back();
        }
        
       
    }
    

    public function exambookingigcsestore(Request $request){
        
        

             
            $insert=ExamRequest::insertGetId([
                'user_id'=>Auth::user()->id,
                'booking_id'=>$request->booking_id,
                'main_exam_type'=>$request->main_exam_type,
                'first_name'=>$request->first_name,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'emergency_contact_number'=>$request->emergency_contact_number,
                'address_line_1'=>$request->address_line_1,
                'address_line_2'=>$request->address_line_2,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'date_of_birth'=>$request->date_of_birth,
                'gender'=>$request->gender,
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'total_amount'=>$request->total_amount,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                
                'special_access_requirements'=>json_encode($request->special_access_requirements) ?? '',
                'update_special_acces'=>json_encode($request->special_acces) ?? '',
                'special_acces_evidence'=>$request->special_acces_evidence,
                
                
                'relationship'=>$request->relationship,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
                'mock_test'=>$request->mock_test,
                'marked_mocks'=>$request->marked_mocks,
            
                 'is_completed_from'=>1,
                 'status'=>1,
                 'mock_amount'=>$request->hidden_mock_price ?? 0,
                 'exam_series'=>$request->exam_series,

        ]);
        
         if($request->need_special_access==1){
                            $update=ExamRequest::where('id',$insert)->update([
                               'is_need_pay_sp_fee'=>1,  
                               'special_access_initial_fees'=>25,  
                            ]);
                        }

            $exam_information = array();

            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['exam_board'] = $request->exam_board[$key];
                    $item['exam_series'] = $request->exam_series;
                    $item['type'] = 'IGCSE';
                    $item['subject'] = $request->subject[$key];
                    $item['unit_code'] = $request->unit_code[$key];
                    $item['option_code'] = $request->option_code[$key];
                    $item['fees'] = $request->fees[$key];
                    array_push($exam_information, $item);
                     $total_amount=$total_amount + $request->fees[$key];
                }
                            $update=ExamRequest::where('id',$insert)->update([
                                'exam_information'=>json_encode($exam_information),
                                'paid_amount'=>0,
                                'total_amount'=>$total_amount + $request->hidden_mock_price ?? 0,
                                'due_amount'=>$total_amount + $request->hidden_mock_price ?? 0,
                            ]);
            }
             if($request->mock_test=="mock_test_yes"){
                
                    $mock_exam_information = array();

                    if ($request->has('mock_subject_id')) {
                        
                        $mock_amount=$request->hidden_mock_price ?? 0;
                        
                        foreach ($request->mock_subject_id as $skey => $sno) {
                          
                            $myitem['mock_subject_name'] = $request->mock_subject_name[$skey];
                            $myitem['mock_subject_id'] = $request->mock_subject_id[$skey];
                            $myitem['mock_test_paper_1'] = $request->mock_test_paper_1[$skey] ?? '';
                            $myitem['mock_test_paper_2'] = $request->mock_test_paper_2[$skey] ?? '';
                            $myitem['mock_test_paper_3'] = $request->mock_test_paper_3[$skey] ?? '';
                            $myitem['mock_test_paper_4'] = $request->mock_test_paper_4[$skey] ?? '';
                                        $myitem['mock_exam_date_1'] = $request->mock_exam_date_1[$skey] ?? '';
                            $myitem['mock_exam_date_2'] = $request->mock_exam_date_2[$skey] ?? '';
                            $myitem['mock_exam_date_3'] = $request->mock_exam_date_3[$skey] ?? '';
                            $myitem['mock_exam_date_4'] = $request->mock_exam_date_4[$skey] ?? '';
                            array_push($mock_exam_information, $myitem);
                        
                            }
                                    $update=MockTest::insert([
                                        
                                        'exam_information'=>json_encode($mock_exam_information),
                                        'total_amount'=>$mock_amount ?? 0,
                                        'booking_id'=>$request->booking_id,
                                        'user_id'=>Auth::user()->id,
                                        'first_name'=>$request->first_name,
                                        'middle_name'=>$request->middle_name,
                                        'last_name'=>$request->last_name,
                                        'email'=>$request->email,
                                        'phone'=>$request->phone,
                                        'created_at'=>Carbon::now()->toDateTimeString(),
                                        
                                       
                                    ]);
                    }   
                    
                    
            }
            
                    if ($request->hasFile('fileUpload')) {
                   
                               
                                
                                $photo =$request->file('fileUpload');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                            ExamRequest::where('id',$insert)->update([
                                'photo_id' => 'uploads/student/exambooking/'.$name,
                            ]);
                          
                       
                    }

                    if ($request->signed) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        ExamRequest::where('id',$insert)->update([
                            
                            'signed' => $file,
                        ]);
                      
                    }
                    
                    
                if ($request->hasFile('thumbnail_img')) {
              
                       
                         $photos =$request->file('thumbnail_img');
                            $names = 'recent_photo'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfiles =$photos->move(public_path().'/uploads/student/exambooking/', $names);
                            ExamRequest::where('id',$insert)->update([
                                'recent_photo' => 'uploads/student/exambooking/'.$names,
                            ]);
                
                }
                
                
                  if ($request->hasFile('evidence_documents')) {
           
                    
                        
                         $photoss =$request->file('evidence_documents');
                            $namess = 'special_evidents_documents'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                            $newfiless =$photoss->move(public_path().'/uploads/student/exambooking/', $namess);
                            ExamRequest::where('id',$insert)->update([
                                'special_evidents_documents' => 'uploads/student/exambooking/'.$namess,
                            ]);
                    
                }
                
                
                 if ($request->hasFile('proof_of_evidence')) {
                 
                        
                            $photoss =$request->file('proof_of_evidence');
                                $namess = 'proof_of_carring'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                                $newfiless =$photoss->move(public_path().'/uploads/student/exambooking/', $namess);
                                ExamRequest::where('id',$insert)->update([
                                    'proof_of_carring' => 'uploads/student/exambooking/'.$namess,
                                ]);
                       
                    }
      
        
      
         

               Mail::to($request->email)->send(new ExamBookingMail());
            if ($insert) {
                   $user=([
                         'name'=>$request->first_name,
                         'booking_id'=>$request->booking_id,
                    ]);
                   
                     $email="admin@merittutors.co.uk";
                     Mail::to($email)->send(new ExamBooking($user));
                     
                     
                    $data=ExamRequest::where('id',$insert)->first();
                    
                    // $pdf = PDF::loadView('invoice.index',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
                    // 'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
                    
                    // $datas["email"] = $data->email;
                    // $datas["title"] = "Welcome to ECL";
                    // $datas["body"] = "This is the email body.";
                    
                    //   Mail::send("mail.invoicesendmail", $datas, function ($message) use ($datas, $pdf) {
                     
                    //      $message->to($datas["email"])
                    //         ->subject("ECL Invoice")
                    //         ->attachData($pdf->output(), "Invoice.pdf");
                    // });
                     
                     
                     
                Alert::toast('Exam Booking success! Please Pay', 'success');
                return redirect('/make-payment/exambooking/'.$data->booking_id);
            } else {
                Alert::toast('Something Went Wrong', 'error');
                return redirect()->back();
            }
     

       
    } 



    public function insertexambookingajax(Request $request){
        
       
          $check=ExamRequest::where('booking_id',$request->booking_id)->where('is_completed_from',0)->first();
          if($check){
                    $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                        'user_id'=>Auth::user()->id,
                        'main_exam_type'=>$request->main_exam_type,
                        'first_name'=>$request->first_name,
                        'middle_name'=>$request->middle_name,
                        'last_name'=>$request->last_name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'emergency_contact_number'=>$request->emergency_contact_number,
                        'address_line_1'=>$request->address_line_1,
                        'address_line_2'=>$request->address_line_2,
                        'city'=>$request->city,
                        'postcode'=>$request->postcode,
                        'date_of_birth'=>$request->date_of_birth,
                        'gender'=>$request->gender,
                        'uci'=>$request->uci,
                        'uci_number'=>$request->uci_number,
                        'uln'=>$request->uln,
                        'uln_number'=>$request->uln_number,
                        'type_of_learner'=>$request->type_of_learner,
                        'retaking_exams'=>$request->retaking_exams,
                        'retaking_exams_name'=>$request->retaking_exams_name,
                        'caring_forwad'=>$request->caring_forwad,
                        'caring_forwad_details'=>$request->caring_forwad_details,
                        'special_acces'=>$request->special_acces,
                        'special_acces_evidence'=>$request->special_acces_evidence,
                        'mental_conditions'=>$request->mental_conditions,
                        'mental_condition_details'=>$request->mental_condition_details,
                        'condition_disability'=>$request->condition_disability,
                        'condition_disability_details'=>$request->condition_disability_details,
                        'relationship'=>$request->relationship,
                        'relation_name'=>$request->relation_name,
                        'todays_date'=>$request->todays_date,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                        'has_a_candidate'=>$request->candidatebefore,
                        'has_a_candidate_number'=>$request->has_a_candidate_number,
                    ]);
                    
                    
                     $userupdate=User::where('id',Auth::user()->id)->update([
                        
                        'emergency_contact_number'=>$request->emergency_contact_number,
                        'address_line_two'=>$request->address_line_2,
                        'city'=>$request->city,
                        'zip'=>$request->postcode,
                        'date_of_birth'=>$request->date_of_birth,
                        'name'=>$request->first_name,
                        'middle_name'=>$request->middle_name,
                        'last_name'=>$request->last_name,
                    ]);


            if($update){
                if($request->main_exam_type=='AAT'){
                     $kkkupdate=User::where('id',Auth::user()->id)->update([
                        'aat_number'=>$request->acca_registration,
                    ]);
                    if($kkkupdate){
                            return response("aat number ok");
                        }else{
                            return response("faildAA");
                        }
                }
                 if($request->main_exam_type=='ACCA'){
                     $kkskupdate=User::where('id',Auth::user()->id)->update([
                        'acca_number'=>$request->acca_registration,
                    ]);
                    if($kkskupdate){
                            return response("acca number ok");
                        }else{
                            return response("faildaca");
                        }
                }
                return response("ok");
            }else{
                return response("faild");
            }
          }else{
                  $insert=ExamRequest::insertGetId([
                        'user_id'=>Auth::user()->id,
                        'booking_id'=>$request->booking_id,
                        'main_exam_type'=>$request->main_exam_type,
                        'first_name'=>$request->first_name,
                        'middle_name'=>$request->middle_name,
                        'last_name'=>$request->last_name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'emergency_contact_number'=>$request->emergency_contact_number,
                        'address_line_1'=>$request->address_line_1,
                        'address_line_2'=>$request->address_line_2,
                        'city'=>$request->city, 
                        'type_of_learner'=>$request->type_of_learner,
                        'postcode'=>$request->postcode,
                        'date_of_birth'=>$request->date_of_birth,
                        'gender'=>$request->gender,
                        'uci'=>$request->uci,
                        'uci_number'=>$request->uci_number,
                        'uln'=>$request->uln,
                        'uln_number'=>$request->uln_number,
                        'total_amount'=>$request->total_amount,
                        'retaking_exams'=>$request->retaking_exams,
                        'retaking_exams_name'=>$request->retaking_exams_name,
                        'caring_forwad'=>$request->caring_forwad,
                        'caring_forwad_details'=>$request->caring_forwad_details,
                        'special_acces'=>$request->special_acces,
                        'special_acces_evidence'=>$request->special_acces_evidence,
                        'mental_conditions'=>$request->mental_conditions,
                        'mental_condition_details'=>$request->mental_condition_details,
                        'condition_disability'=>$request->condition_disability,
                        'condition_disability_details'=>$request->condition_disability_details,
                        'relationship'=>$request->relationship,
                        'relation_name'=>$request->relation_name,
                        'todays_date'=>$request->todays_date,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                        'has_a_candidate'=>$request->has_a_candidate,
                        'has_a_candidate_number'=>$request->has_a_candidate_number,
                    ]);
                    
                       $userupdate=User::where('id',Auth::user()->id)->update([
                        
                        'emergency_contact_number'=>$request->emergency_contact_number,
                        'address_line_two'=>$request->address_line_2,
                        'city'=>$request->city,
                        'zip'=>$request->postcode,
                        'date_of_birth'=>$request->date_of_birth,
                        'name'=>$request->first_name,
                        'middle_name'=>$request->middle_name,
                        'last_name'=>$request->last_name,
                    ]);

                if($insert){
                     if($request->main_exam_type=='AAT'){
                         
                         $kkkupdate=User::where('id',Auth::user()->id)->update([
                            'aat_number'=>$request->acca_registration,
                        ]);
                        
                      if($kkkupdate){
                            return response("aat number ok");
                        }else{
                            return response("faild");
                        }
                    }
                    if($request->main_exam_type=='ACCA'){
                     $kkskupdate=User::where('id',Auth::user()->id)->update([
                        'acca_number'=>$request->acca_registration,
                        ]);
                        if($kkskupdate){
                            return response("acca number ok");
                        }else{
                            return response("faild");
                        }
                     
                    }
                    return response("ok");
                }else{
                    return response("faild");
                }
          }
    }



    public function photouploads(Request $request){
            $image = $request->file('thumbnail_img');
            $ImageName = 'file' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/exambooking/' . $ImageName);
            ExamRequest::where('booking_id', $request->name)->update([
                'recent_photo' => 'uploads/student/exambooking/' . $ImageName,
            ]);
            return response("ok");
    }

    public function getPrice(Request $request){
       
        $paper1=0;
        $paper2=0;
        $paper3=0;
        $paper4=0;
        
          if($request->has('mock_test_paper_1')) {
              
                foreach ($request->mock_test_paper_1 as $key => $no) {
                 
                     $paper1=$paper1 + 80;
                     
                 }
                        
            }
             if($request->has('mock_test_paper_2')) {
              
                foreach ($request->mock_test_paper_2 as $key => $no) {
                 
                     $paper2=$paper2 + 80;
                     
                 }
                        
            }
             if($request->has('mock_test_paper_3')) {
              
                foreach ($request->mock_test_paper_3 as $key => $no) {
                 
                     $paper3=$paper3 + 80;
                     
                 }
                        
            }
             if($request->has('mock_test_paper_4')) {
              
                foreach ($request->mock_test_paper_4 as $key => $no) {
                 
                     $paper4=$paper4 + 80;
                     
                 }
                        
            }
            $total_price=$paper1 + $paper2 + $paper3 + $paper4;
            
             return response($total_price);
            
        
        
    }
    
    public function getGCSEPrice(Request $request){
        
        $paper1=0;
        $paper2=0;
        $paper3=0;
        $paper4=0;
        
          if($request->has('mock_test_paper_1')) {
              
                foreach ($request->mock_test_paper_1 as $key => $no) {
                 
                     $paper1=$paper1 + 70;
                     
                 }
                        
            }
             if($request->has('mock_test_paper_2')) {
              
                foreach ($request->mock_test_paper_2 as $key => $no) {
                 
                     $paper2=$paper2 + 70;
                     
                 }
                        
            }
             if($request->has('mock_test_paper_3')) {
              
                foreach ($request->mock_test_paper_3 as $key => $no) {
                 
                     $paper3=$paper3 + 70;
                     
                 }
                        
            }
             if($request->has('mock_test_paper_4')) {
              
                foreach ($request->mock_test_paper_4 as $key => $no) {
                 
                     $paper4=$paper4 + 70;
                     
                 }
                        
            }
            $total_price=$paper1 + $paper2 + $paper3 + $paper4;
            
             return response($total_price);
    }
    
    public function stepMathsApplication(){
        return view('frontend.stepmaths.application');
    }
    
    public function stepMathsApplicationSubmit(Request $request){
        Alert::toast('The developer is updating this form. Please try again later.', 'error');
                return redirect()->back();
    }
    
}
