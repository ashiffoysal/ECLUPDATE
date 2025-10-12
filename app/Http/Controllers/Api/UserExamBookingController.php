<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Examessuedate;
use Carbon\Carbon;
use App\Models\ExamRequest;
use Auth;
use Image;
use Alert;
use Stripe;
use Illuminate\Support\Str;
use Mail;
use App\Mail\ExamBookingMail;
use App\Mail\ExamBookingDetailsForAdmin;
use App\Mail\ExamBooking;
use App\Models\User;
use App\Models\AatCategory;
use App\Models\Subcategory;
use PDF;
use App\Models\UcasRequest;
use App\Models\MockTest;
use App\Mail\UcasBooking;
use App\Models\Wallet;
use Validator;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\HighlatefeesCollection;
use App\Http\Resources\LatefeesCollection;

class UserExamBookingController extends Controller
{
    
    
    public function getSubjectIndividual(Request $request){
        
        $today_date=Carbon::now()->format('Y-m-d');
        
        
    
        
        if($request->exam_booking_type=='AAT'){
            
           $data=Subject::where('exam_type','AAT')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->first();
           return response()->json($data,200);
            
        }
        if($request->exam_booking_type=='ACCA'){
            
           $data=Subject::where('exam_type','ACCA')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->first();
           return response()->json($data,200);
           
        }
        
        if($request->exam_booking_type=='Functional Skills'){
            
           $data=Subject::where('exam_type','Functional Skills')->where('id',$request->subject_id)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->first();
           return response()->json($data,200);
            
        }
        if($request->exam_booking_type=='GCSE'){
         
          $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                      
                       //   high late fees
                      
                        $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1' => $data->paper_1 ? "true" : "false", // Convert true to "1", false to "0"
                                    'paper_2' => $data->paper_2 ? "true" : "false",
                                    'paper_3' => $data->paper_3 ? "true" : "false",
                                    'paper_4'=>$data->paper_4 ? "true" : "false",
                                    
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                      
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                     'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','GCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                     'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
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
                      
                        $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                      
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','IGCSE')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
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
                      
                        $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                      
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','A Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
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
                      
                        $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                        $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->high_late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                      
                      
                      
                      
                      
                  }else{
                      
                    //   only late fees
                        $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                        
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  }
                  
                  
                  
              }else{
                //   late fees
                  $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->late_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
                  
              }
              
              
          }else{
            //   normal fees
                        $data=Subject::where('exam_type','AS Level')->where('id',$request->subject_id)->select(['has_mock_test','paper_1','paper_2','paper_3','paper_4','subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->first();
                         $maindata=[
                            
                                [
                                    'id'=>$data->id,
                                    'subject_name'=>$data->subject_name,
                                    'exam_type'=>$data->exam_type,
                                    'fees'=>$data->exam_fees,
                                    'unit_code'=>$data->unit_code,
                                    'exam_board'=>$data->exam_board,
                                    'has_option_code'=>$data->has_option_code,
                                    'option_code_details'=>$data->option_code_details,
                                    'mock_test'=>$data->has_mock_test,
                                    'paper_1'=>$data->paper_1,
                                    'paper_2'=>$data->paper_2,
                                    'paper_3'=>$data->paper_3,
                                    'paper_4'=>$data->paper_4,
                                ]
                            
                            ];
                        return response()->json($maindata,200);
             
          }

           
         
           
            
        }
        
        
        
        
         
    }

    public function getExamBoardList(){
            $data = [
                
                    [
                        'title' => 'AQA',
                        'tag' => 'AQA',
                    ],
                    [
                        'title' => 'Edexcel',
                        'tag' => 'Edexcel',
                    ],
                    
                    [
                        'title' => 'WJEC',
                        'tag' => 'WJEC',
                    ],
                    
                    [
                        'title' => 'OCR',
                        'tag' => 'OCR',
                    ],
                    
                    [
                        'title' => 'Cambridge CIE',
                        'tag' => 'Cambridge CIE',
                    ],
                    [
                        'title' => 'Other',
                        'tag' => 'Other',
                    ],
                    
            ];
            
            return response()->json($data);
    }
    // exam series getExamSeriesList
    public function getExamSeriesList(){
        $data=Examessuedate::select(['id','exam_name','entry_dateline','entry_highlatefees','entry_highlatefees','submission_dead_lines'])->get();
        return response()->json($data,200);
    }
    
    
    
    
    public function getSubjectList(Request $request){
       $today_date=Carbon::now()->format('Y-m-d');
        
        if($request->exam_booking_type=='AAT'){
            
        //   $data=Subject::where('exam_type','AAT')->where('is_deleted',0)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->get();
        //   return response()->json($data,200);
       return new SubjectCollection(Subject::where('exam_type','AAT')->where('is_deleted',0)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->get());
            
        }
        if($request->exam_booking_type=='ACCA'){
            
        //   $data=Subject::where('exam_type','ACCA')->where('is_deleted',0)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->get();
        //   return response()->json($data,200);
            return new SubjectCollection(Subject::where('exam_type','ACCA')->where('is_deleted',0)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->get());
        }
        
        if($request->exam_booking_type=='Functional Skills'){
            
        //   $data=Subject::where('exam_type','Functional Skills')->where('is_deleted',0)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->get();
        //   return response()->json($data,200);
              return new SubjectCollection(Subject::where('exam_type','Functional Skills')->where('is_deleted',0)->select(['subject_name','id','exam_board','exam_type','exam_fees','unit_code'])->get());
            
        }
  if ($request->exam_booking_type == 'GCSE') {
    $exam_series = Examessuedate::where('id', $request->exam_booking_series)->first();

    if ($exam_series->entry_dateline < $today_date) {
        if ($exam_series->entry_latefees < $today_date) {
            if ($exam_series->entry_highlatefees < $today_date) {
                // high late fees
                if($exam_series->exam_type==1){
                   $collectionData = Subject::where('exam_type', 'GCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('january_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                } 
                if($exam_series->exam_type==2){
                   $collectionData = Subject::where('exam_type', 'GCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('june_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                }
               if($exam_series->exam_type==3){
                   $collectionData = Subject::where('exam_type', 'GCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('november_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                }
                
                
                
                
                
                
            } else {
                // only late fees
                
                 if($exam_series->exam_type==1){
                       $collectionData = Subject::where('exam_type', 'GCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('january_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                      return new LatefeesCollection($collectionData);
                 }
                if($exam_series->exam_type==2){
                       $collectionData = Subject::where('exam_type', 'GCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('june_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                      return new LatefeesCollection($collectionData);
                 }
                if($exam_series->exam_type==3){
                       $collectionData = Subject::where('exam_type', 'GCSE')
                        ->where('exam_board', $request->november_availability)
                        ->where('november_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                      return new LatefeesCollection($collectionData);
                 }
                 
                 
            }
        } else {
            // late fees
            if($exam_series->exam_type==1){
               $collectionData = Subject::where('exam_type', 'GCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('january_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                    return new LatefeesCollection($collectionData);
            }
                   if($exam_series->exam_type==2){
               $collectionData = Subject::where('exam_type', 'GCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('june_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                    return new LatefeesCollection($collectionData);
            }
            if($exam_series->exam_type==3){
               $collectionData = Subject::where('exam_type', 'GCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('november_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                    return new LatefeesCollection($collectionData);
            }
        }
    } else {
        // normal fees
        if($exam_series->exam_type==1){
        
                $collectionData = Subject::where('exam_type', 'GCSE')
                    ->where('exam_board', $request->exam_booking_board)
                    ->where('january_availability',1)
                    ->select([
                        'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                        'subject_name',
                        'id',
                        'exam_board',
                        'exam_type',
                        'exam_fees',
                        'late_fees',
                        'high_late_fees',
                        'unit_code',
                        'has_option_code',
                        'option_code_details'
                    ])
                    ->get()
                    ->map(function ($subject) use ($exam_series) {
                        $subject->exam_booking_series = $exam_series->exam_name;
                        return $subject;
                    });
                    return new SubjectCollection($collectionData);
        }
         if($exam_series->exam_type==2){
        
                $collectionData = Subject::where('exam_type', 'GCSE')
                    ->where('exam_board', $request->exam_booking_board)
                    ->where('june_availability',1)
                    ->select([
                        'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                        'subject_name',
                        'id',
                        'exam_board',
                        'exam_type',
                        'exam_fees',
                        'late_fees',
                        'high_late_fees',
                        'unit_code',
                        'has_option_code',
                        'option_code_details'
                    ])
                    ->get()
                    ->map(function ($subject) use ($exam_series) {
                        $subject->exam_booking_series = $exam_series->exam_name;
                        return $subject;
                    });
                    return new SubjectCollection($collectionData);
        }
         if($exam_series->exam_type==3){
        
                $collectionData = Subject::where('exam_type', 'GCSE')
                    ->where('exam_board', $request->exam_booking_board)
                    ->where('november_availability',1)
                    ->select([
                        'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                        'subject_name',
                        'id',
                        'exam_board',
                        'exam_type',
                        'exam_fees',
                        'late_fees',
                        'high_late_fees',
                        'unit_code',
                        'has_option_code',
                        'option_code_details'
                    ])
                    ->get()
                    ->map(function ($subject) use ($exam_series) {
                        $subject->exam_booking_series = $exam_series->exam_name;
                        return $subject;
                    });
                    return new SubjectCollection($collectionData);
        }
    }
}
          if($request->exam_booking_type=='IGCSE'){
            
         
         $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                       //   high late fees
                     if($exam_series->exam_type==1){
                       $collectionData = Subject::where('exam_type', 'IGCSE')
                            ->where('exam_board', $request->exam_booking_board)->where('january_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                     }
                     
                     
                    if($exam_series->exam_type==2){
                       $collectionData = Subject::where('exam_type', 'IGCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('june_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                     }
                   if($exam_series->exam_type==3){
                       $collectionData = Subject::where('exam_type', 'IGCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('november_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                     }
                      
                  }else{
                      
                    //   only late fees
                        if($exam_series->exam_type==1){
                        $collectionData = Subject::where('exam_type', 'IGCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('january_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new LatefeesCollection($collectionData);
                        }
                          if($exam_series->exam_type==2){
                        $collectionData = Subject::where('exam_type', 'IGCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('june_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new LatefeesCollection($collectionData);
                        }
                    if($exam_series->exam_type==3){
                        $collectionData = Subject::where('exam_type', 'IGCSE')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('november_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new LatefeesCollection($collectionData);
                        }
                        
                        
                        
                  }
                  
                  
                  
              }else{
                    if($exam_series->exam_type==1){
                      $collectionData = Subject::where('exam_type', 'IGCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('january_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new LatefeesCollection($collectionData);
                        
                    }
                    
                if($exam_series->exam_type==2){
                      $collectionData = Subject::where('exam_type', 'IGCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('june_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new LatefeesCollection($collectionData);
                        
                    }
                    
                     if($exam_series->exam_type==3){
                      $collectionData = Subject::where('exam_type', 'IGCSE')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('november_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new LatefeesCollection($collectionData);
                        
                    }
                    
                    
                    
                    
              }
              
              
          }else{
              
            if($exam_series->exam_type==1){
                 $collectionData = Subject::where('exam_type', 'IGCSE')
                    ->where('exam_board', $request->exam_booking_board)
                    ->where('january_availability',1)
                    ->select([
                        'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                        'subject_name',
                        'id',
                        'exam_board',
                        'exam_type',
                        'exam_fees',
                        'late_fees',
                        'high_late_fees',
                        'unit_code',
                        'has_option_code',
                        'option_code_details'
                    ])
                    ->get()
                    ->map(function ($subject) use ($exam_series) {
                        $subject->exam_booking_series = $exam_series->exam_name;
                        return $subject;
                    });
                    return new SubjectCollection($collectionData);     
            }
            
              if($exam_series->exam_type==2){
                 $collectionData = Subject::where('exam_type', 'IGCSE')
                    ->where('exam_board', $request->exam_booking_board)
                    ->where('june_availability',1)
                    ->select([
                        'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                        'subject_name',
                        'id',
                        'exam_board',
                        'exam_type',
                        'exam_fees',
                        'late_fees',
                        'high_late_fees',
                        'unit_code',
                        'has_option_code',
                        'option_code_details'
                    ])
                    ->get()
                    ->map(function ($subject) use ($exam_series) {
                        $subject->exam_booking_series = $exam_series->exam_name;
                        return $subject;
                    });
                    return new SubjectCollection($collectionData);     
            }
              if($exam_series->exam_type==3){
                 $collectionData = Subject::where('exam_type', 'IGCSE')
                    ->where('exam_board', $request->exam_booking_board)
                    ->where('november_availability',1)
                    ->select([
                        'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                        'subject_name',
                        'id',
                        'exam_board',
                        'exam_type',
                        'exam_fees',
                        'late_fees',
                        'high_late_fees',
                        'unit_code',
                        'has_option_code',
                        'option_code_details'
                    ])
                    ->get()
                    ->map(function ($subject) use ($exam_series) {
                        $subject->exam_booking_series = $exam_series->exam_name;
                        return $subject;
                    });
                    return new SubjectCollection($collectionData);     
            }
             
             
             
          }
           
            
        }
          if($request->exam_booking_type=='A Level'){
            
         
              $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                      
                       //   high late fees
                       
                       if($exam_series->exam_type==1){
                             $collectionData = Subject::where('exam_type', 'A Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('january_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                      
                       }
                    if($exam_series->exam_type==2){
                             $collectionData = Subject::where('exam_type', 'A Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('june_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                      
                       }
                     if($exam_series->exam_type==3){
                             $collectionData = Subject::where('exam_type', 'A Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('november_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                        return new HighlatefeesCollection($collectionData);
                      
                       }
                        
                      
                      
                  }else{
                      
                    //   only late fees
                       if($exam_series->exam_type==1){  
                            $collectionData = Subject::where('exam_type', 'A Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('january_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                       }
                    if($exam_series->exam_type==2){  
                            $collectionData = Subject::where('exam_type', 'A Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('june_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                       }
                    if($exam_series->exam_type==3){  
                            $collectionData = Subject::where('exam_type', 'A Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('november_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                       }
                    
                    
                        
                  }
                  
                  
                  
              }else{
                //   late fees
                if($exam_series->exam_type==1){  
                  $collectionData = Subject::where('exam_type', 'A Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('january_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new LatefeesCollection($collectionData);
                }
                   if($exam_series->exam_type==2){  
                  $collectionData = Subject::where('exam_type', 'A Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('june_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new LatefeesCollection($collectionData);
                }
                   if($exam_series->exam_type==3){  
                  $collectionData = Subject::where('exam_type', 'A Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('november_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new LatefeesCollection($collectionData);
                }
            }
              
              
          }else{
            //   normal fees
            if($exam_series->exam_type==1){  
                      $collectionData = Subject::where('exam_type', 'A Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('january_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new SubjectCollection($collectionData);
                        
            }
            if($exam_series->exam_type==2){  
                      $collectionData = Subject::where('exam_type', 'A Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('june_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new SubjectCollection($collectionData);
                        
            }
             if($exam_series->exam_type==3){  
                      $collectionData = Subject::where('exam_type', 'A Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('november_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new SubjectCollection($collectionData);
                        
                }
          }
           
           
            
        }
          if($request->exam_booking_type=='AS Level'){
            
         
       $exam_series=Examessuedate::where('id',$request->exam_booking_series)->first();
          
          if($exam_series->entry_dateline < $today_date){
              
              if($exam_series->entry_latefees < $today_date){
                  
                  if($exam_series->entry_highlatefees < $today_date){
                      
                       //   high late fees
                  if($exam_series->exam_type==1){  
                        
                        $collectionData = Subject::where('exam_type', 'AS Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('january_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new HighlatefeesCollection($collectionData);
                      
                    } 
                     if($exam_series->exam_type==2){  
                        
                        $collectionData = Subject::where('exam_type', 'AS Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('june_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new HighlatefeesCollection($collectionData);
                      
                    }
                     if($exam_series->exam_type==3){  
                        
                        $collectionData = Subject::where('exam_type', 'AS Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('november_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new HighlatefeesCollection($collectionData);
                      
                    }
                  }else{
                      
                    //   only late fees
                     if($exam_series->exam_type==1){  
                          $collectionData = Subject::where('exam_type', 'AS Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('january_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                    } 
                     if($exam_series->exam_type==2){  
                          $collectionData = Subject::where('exam_type', 'AS Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('june_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                    } 
                     if($exam_series->exam_type==3){  
                          $collectionData = Subject::where('exam_type', 'AS Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('november_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                    } 
                    
                    
                    
                  }
                  
                  
                  
              }else{
                //   late fees
                // return new LatefeesCollection(Subject::where('exam_type','AS Level')->where('exam_board',$request->exam_booking_board)->select(['subject_name','id','exam_board','exam_type','exam_fees','late_fees','high_late_fees','unit_code','has_option_code','option_code_details'])->get());
                      
                      
                      if($exam_series->exam_type==1){  
                      
                           $collectionData = Subject::where('exam_type', 'AS Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('january_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                        
                      }
                        if($exam_series->exam_type==2){  
                      
                           $collectionData = Subject::where('exam_type', 'AS Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('june_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                        
                      }
                          if($exam_series->exam_type==3){  
                      
                           $collectionData = Subject::where('exam_type', 'AS Level')
                            ->where('exam_board', $request->exam_booking_board)
                            ->where('november_availability',1)
                            ->select([
                                'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                                'subject_name',
                                'id',
                                'exam_board',
                                'exam_type',
                                'exam_fees',
                                'late_fees',
                                'high_late_fees',
                                'unit_code',
                                'has_option_code',
                                'option_code_details'
                            ])
                            ->get()
                            ->map(function ($subject) use ($exam_series) {
                                $subject->exam_booking_series = $exam_series->exam_name;
                                return $subject;
                            });
                            return new LatefeesCollection($collectionData);
                        
                      }
              }
              
              
          }else{
            
            
             if($exam_series->exam_type==1){  
                  $collectionData = Subject::where('exam_type', 'AS Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('january_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new SubjectCollection($collectionData);
                }
                
                  if($exam_series->exam_type==2){  
                  $collectionData = Subject::where('exam_type', 'AS Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('june_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new SubjectCollection($collectionData);
                }
                
                  if($exam_series->exam_type==3){  
                  $collectionData = Subject::where('exam_type', 'AS Level')
                        ->where('exam_board', $request->exam_booking_board)
                        ->where('november_availability',1)
                        ->select([
                            'has_mock_test','paper_1','paper_2','paper_3','paper_4',
                            'subject_name',
                            'id',
                            'exam_board',
                            'exam_type',
                            'exam_fees',
                            'late_fees',
                            'high_late_fees',
                            'unit_code',
                            'has_option_code',
                            'option_code_details'
                        ])
                        ->get()
                        ->map(function ($subject) use ($exam_series) {
                            $subject->exam_booking_series = $exam_series->exam_name;
                            return $subject;
                        });
                        return new SubjectCollection($collectionData);
                }
          
          }
           
            
        }
      
        
    }
    
    
    
    public function examBooking(Request $request){
                
      return $request;
            
    
        try {
           
            
           $booking_id=Auth::user()->id.rand(1111,9999);
          
            $insert=ExamRequest::insertGetId([
                
                'user_id'=>Auth::user()->id,
                'booking_id'=>$booking_id,
                'main_exam_type'=>$request->main_exam_type,
                
                'first_name'=>$request->first_name?? '',
                'middle_name'=>$request->middle_name ?? '',
                'last_name'=>$request->last_name ?? '',
                'email'=>$request->email ?? '',
                'phone'=>$request->phone ?? '',
                'emergency_contact_number'=>$request->emergency_contact_number ?? '',
                'address_line_1'=>$request->address_line_1 ?? '',
                'address_line_2'=>$request->address_line_2 ?? '',
                
                'exam_series'=>$request->exam_series_id,
                
                'city'=>$request->city ?? '',
                'postcode'=>$request->postcode ?? '',
                'date_of_birth'=>$request->date_of_birth ?? '',
                'gender'=>$request->gender ?? '',
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                'special_access_requirements'=>json_encode($request->special_access_requirements) ?? '',
                'update_special_acces'=>json_encode($request->update_special_access) ?? '',
                'special_acces_evidence'=>$request->special_acces_evidence_details,
                
                'mock_test'=>$request->mock_test,
                'mock_amount'=>$request->hidden_mock_price ?? 0,
                
                'relationship'=>$request->relationship_identification,
                'relation_name'=>$request->relation_name,
                'todays_date'=>$request->todays_date,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'has_a_candidate'=>$request->has_a_candidate,
                'has_a_candidate_number'=>$request->has_a_candidate_number,
                'is_completed_from'=>1,
                'status'=>1,
                'exam_information'=>$request->subjectList,
                'is_apps_booking'=>1,
                'paid_amount'=>0,
                'total_amount'=>$request->total_amount,
                'due_amount'=>$request->total_amount,
            ]);
            
            
            if($request->mock_test=="Yes"){
                
                $mock_amount=$request->hidden_mock_price ?? 0;
                $update=MockTest::insert([
                    'exam_information'=>json_encode($request->subjectList),
                    'total_amount'=>$mock_amount ?? 0,
                    'booking_id'=>$booking_id,
                    'user_id'=>Auth::user()->id,
                    'first_name'=>$request->first_name ?? '',
                    'middle_name'=>$request->middle_name ?? '',
                    'last_name'=>$request->last_name ?? '',
                    'email'=>$request->email ?? '',
                    'phone'=>$request->phone ?? '',
                    'is_apps_booking'=>1,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                ]);
           
              ExamRequest::where('id',$insert)->update([
                    'total_amount'=>$request->total_amount + $request->hidden_mock_price ?? 0,
                    'due_amount'=>$request->total_amount + $request->hidden_mock_price ?? 0,
                ]);
                    
                    
            }

                 if ($request->hasFile('special_evidents_documents')) {
                  
                            $photoe =$request->file('special_evidents_documents');
                            $namee = 'evidence_'.Auth::user()->id.time().'.'.$photoe->getClientOriginalExtension();
                            $newfile =$photoe->move(public_path().'/uploads/student/exambooking/apps/', $namee);
                            ExamRequest::where('id',$insert)->update([
                                'special_evidents_documents' => 'uploads/student/exambooking/apps/'.$namee,
                            ]);
                  
                
                }
                if($request->hasFile('recent_photo')) {
                    
                           $photos =$request->file('recent_photo');
                            $names = 'recent_photo_'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfiles =$photos->move(public_path().'/uploads/student/exambooking/apps/', $names);
                            ExamRequest::where('id',$insert)->update([
                                'recent_photo' => 'uploads/student/exambooking/apps/'.$names,
                            ]);
                        
                        
                        
                        
                        
        
                }
                
            if ($request->hasFile('photo_id')) {
          
                        
                           $photo =$request->file('photo_id');
                            $name = 'photo_id_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/apps/', $name);
                            ExamRequest::where('id',$insert)->update([
                                'photo_id' => 'uploads/student/exambooking/apps/'.$name,
                            ]);
                        
                }
            if ($request->signature) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signature']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        ExamRequest::where('id',$insert)->update([
                            
                            'signed' => $file,
                        ]);
                      
                    }
                    
                    
         
            if ($insert) {
                    $user=([
                         'status'=>"true",
                         'message'=>"Booking Success",
                         'user_id'=>Auth::user()->id,
                        //  'name'=>$request->first_name,
                        //  'email'=>$request->email,
                         'booking_id'=>$booking_id,
                        //  'total_amount'=>$request->total_amount,
                        
                    ]);
                    //  $email="admin@merittutors.co.uk";
                    //  Mail::to($email)->send(new ExamBooking($user));
                    // $data=ExamRequest::where('id',$insert)->first();
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
                     
                return response()->json($user,200);
            } else {
               
                return response()->json('Faild',422);
            }
            
    } catch (Throwable $e) {
        
        return($e->getMessage() );
 
        // return false;
        
    }
         
                          
        
    }
    
    
    public function ucasBooking(Request $request){
        
     
        
        
        $ucas_booking_id='ucas-'.Auth::user()->id.rand(1111,9999);
        $insert=UcasRequest::insertGetId([
            'user_id'=>Auth::user()->id, 
            'first_name'=>$request->first_name, 
            'middle_name'=>$request->middle_name,  
            'last_name'=>$request->last_name, 
            'is_apps_booking'=>1, 
            'phone'=>$request->phone,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'emergency_contact_number'=>$request->emergency_contact_number,
            'address_line_one'=>$request->address_line_one,
            'address_line_two'=>$request->address_line_two,
            'city'=>$request->city,
            
            'application_support_details_text' =>$request->documents_details,
            'country'=>$request->country,
            'post_code'=>$request->post_code,
            'date_of_birth'=>$request->date_of_birth,
            'mock_exam_type'=>$request->mock_exam_type,
            'review_personal_statement'=>$request->review_personal_statement,
            'application_support'=>$request->application_support,
            'payment_option'=>$request->payment_option,
            'ucas_booking_id'=>$ucas_booking_id,
            'total_subject_amount'=>$request->total_subject_amount,
            'exam_subject_details'=>$request->exam_subject_details,
            'created_at'=>Carbon::now()->todateTimeString(),
        ]);
            
        
        if($request->review_personal_statement=='yes'){
            UcasRequest::where('id',$insert)->update([
                'review_statement_amount'=>50,
            ]); 
        }
        
        if($request->application_support=='yes'){
            UcasRequest::where('id',$insert)->update([
                'doucment_check_amount'=>100,
            ]); 
        }
        
            $exam_information = array();
            if ($request->has('subject')) {
                $total_amount=0;
                foreach ($request->subject as $key => $no) {
                  
                    $item['subject'] = $request->subject[$key];
                    $item['paper'] = $request->paper[$key];
                    $item['fees'] = $request->fees[$key];
                    array_push($exam_information, $item);
                    $total_amount=$total_amount + $request->fees[$key];
                }
                
                $update=UcasRequest::where('id',$insert)->update([
                    'exam_subject_details'=>json_encode($exam_information),
                    'total_subject_amount'=>$total_amount,
                ]); 
                
            }
            
           
              if ($request->hasFile('document')) {
               
                            $photoss =$request->file('document');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                            $newfile =$photoss->move(public_path().'/uploads/student/ucas/', $name);
                            UcasRequest::where('id', $insert)->update([
                                'application_support_details' => 'uploads/student/ucas/'.$name,
                            ]);
                            
                        
                }
       
          
             if ($request->hasFile('photo_id')) {
               
                            $photos =$request->file('photo_id');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photos->getClientOriginalExtension();
                            $newfile =$photos->move(public_path().'/uploads/student/ucas/', $name);
                            UcasRequest::where('id', $insert)->update([
                                'photo_id' => 'uploads/student/ucas/'.$name,
                            ]);
                            
                        
                }

                    if ($request->signature) {
                           
                        $folderPath = "uploads/student/exambooking/";
                        $image_parts = explode(";base64,", $request['signature']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        UcasRequest::where('id',$insert)->update([
                            
                            'signature' => $file,
                        ]);
                      
                    }
                if ($request->hasFile('recent_photo')) {
                  
                      
                        
                                $photoss =$request->file('recent_photo');
                                $name = 'recent_photo'.Auth::user()->id.time().'.'.$photoss->getClientOriginalExtension();
                                $newfile =$photoss->move(public_path().'/uploads/student/ucas/', $name);
                                UcasRequest::where('id', $insert)->update([
                                    'recent_photo' => 'uploads/student/ucas/'.$name,
                                ]);
                                
                       
                    }
            if($insert){
                
                 $check=UcasRequest::where('id',$insert)->first();
                
                $booking_details=[
                    'status'=>"true",
                    'message'=>"Booking Success",
                    'user_id'=>Auth::user()->id,
                    'ucas_booking_id'=>$ucas_booking_id,
                    'total_amount'=>$check->total_subject_amount + $check->doucment_check_amount + $check->review_statement_amount,
                    ];
         
                return response()->json($booking_details);
            }else{
                
                
                 return response('faild');
            }
    }
    
    // 
    public function getExamBoardType(){
        
        $examTypewithBoard = [
            'AAT' => ['Other'],
            'ACCA' => ['Other'],
            'FUNCTIONALSKILLS' => ['Edexcel'],
            'GCSE' => ['Edexcel','AQA','OCR','WJEC','Cambridge CIE'],
            'IGCSE' => ['Edexcel','Cambridge CIE'],
            'ALEVEL' => ['Edexcel','AQA','OCR','WJEC','Cambridge CIE'],
            'ASLEVEL' => ['Edexcel','AQA','OCR','Cambridge CIE'],
        ];
        
        return response()->json($examTypewithBoard);
    }
    
    
    public function imageUploads(Request $request){
        
        return $request;
        
    }
    // ucas end
    

    
        public function ucasPaymentSubmit(Request $request){
                
                
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
              $intent =  $stripe->paymentIntents->create(
                  [
                      'amount' => $request->amount*100, 'currency' => $request->currency, 'payment_method_types' => ['card'], 'statement_descriptor' => 'Apps Payment','metadata' => ['booking_id' => 'ECL Booking ID-'.$request->booking_id,'email' => $request->email],
                  
                  ]
                );
          
                  
                return response([
                      'clientSecret' => $intent->client_secret,
                    ]);
             
        }
        
        
            public function ucasSuccessSubmit(Request $request){
     
        $check = UcasRequest::where('ucas_booking_id',$request->booking_id)->first();
                if($check){

                        $update=UcasRequest::where('ucas_booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transaction_id'=>$request->transection_id,
                            'paid_amount'=>$request->amount,
                           
                        ]);
         
                        $insert=Wallet::insert([
                            'order_id'=>$request->booking_id,
                            'user_id'=>Auth::user()->id,
                            'amount_type'=>'Dabit',
                            'amount'=>$request->amount,
                            'paid_by'=>'Card',
                            'is_verified'=>1,
                            'transection_id'=>$request->transection_id,
                            'date'=>Carbon::now(),
                            'created_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                        
                        
                         
                         return response()->json( [ 'status' => "success", 'message'=> "payment successful",'transaction_id'=>$request->transection_id ]);
                        
        }else{
             return response()->json("Faild! Please Try Again");
        }

    }
    
    
    
    // 
    
    public function paymentSubmit(Request $request){
        
        
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $intent =  $stripe->paymentIntents->create(
          [
              'amount' => $request->amount*100, 'currency' => $request->currency, 'payment_method_types' => ['card'], 'statement_descriptor' => 'Apps Payment','metadata' => ['booking_id' => 'ECL Booking ID-'.$request->booking_id,'email' => $request->email],
          
          ]
        );
  
          
        return response([
              'clientSecret' => $intent->client_secret,
            ]);
     
        
        
    //        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //   try {
    //         $intent = \Stripe\PaymentIntent::create([
    //           'amount' => 1099,
    //           'currency' => 'gbp',
    //           'payment_method_types' => ['card'],
    //           'confirm' => true,
    //         ]);
    //         $client_secret = $intent->client_secret;
    //         return response()->json($client_secret);
            
    //     } 
    //          catch(\Stripe\Exception\CardException $e) {
    //             return response('Card Is not Supported','error');
              
    //         } catch (\Stripe\Exception\RateLimitException $e) {
             
    //             return response('Please Try Again','error');
            
    //         } catch (\Stripe\Exception\InvalidRequestException $e) {
              
    //           return response('Card Is Invalid','error');
              
    //         } catch (\Stripe\Exception\AuthenticationException $e) {
              
    //         return response('Stripe failed! Try Again','error');
                
    //         } catch (\Stripe\Exception\ApiConnectionException $e) {
              
    //           return response('Stripe failed! Try Again','error');
                
    //         } catch (\Stripe\Exception\ApiErrorException $e) {
              
    //           return response('Email Not Found','error');
               
    //         } catch (Exception $e) {
    //              return response('completely unrelated to Stripe!Try Again','error');
               
    //         }
                    
    }
    
    public function successSubmit(Request $request){
        
       $check= ExamRequest::where('booking_id',$request->booking_id)->first();
         if($check){

                        $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                            'is_paid'=>1,
                            'is_paid_verify'=>1,
                            'payment_option'=>'Card',
                            'transection_id'=>$request->transection_id,
                            'paid_amount'=>$request->amount,
                            'due_amount'=>0,
                        ]);
         
                        $insert=Wallet::insert([
                            'order_id'=>$request->booking_id,
                            'user_id'=>Auth::user()->id,
                            'amount_type'=>'Dabit',
                            'amount'=>$request->amount,
                            'paid_by'=>'Card',
                            'is_verified'=>1,
                            'transection_id'=>$request->transection_id,
                            'date'=>Carbon::now(),
                            'created_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                        
                        //   $email="admin@merittutors.co.uk";
                        //  $maindata=ExamRequest::where('booking_id',$booking_id)->first();
                        //  Mail::to($email)->send(new ExamBookingDetailsForAdmin($maindata));
                        //  Mail::to($maindata->email)->send(new PaymentInvoice($maindata));
                         
                         return response()->json( [ 'status' => "success", 'message'=> "payment successful"  ]);
                        
        }else{
             return response()->json("Faild! Please Try Again");
        }

    }
    
    
    public function bankPayment(Request $request){
      
       
               $validate=Validator::make($request->all(),[
                  
                 'reference' => 'required',
                
                
            ]);
            if($validate->fails()){
                
                return response()->json([
                        'errors'=>$validate->errors()
                    ],422);
            }
            
        
        
        $myExamPayment=ExamRequest::where('booking_id',$request->booking_id)->first();
        if($myExamPayment){
          $update=ExamRequest::where('booking_id',$request->booking_id)->update([
            'is_paid'=>1,
            'is_paid_verify'=>2,
            'payment_option'=>'Bank',
            'paid_amount'=>$request->amount,
            'due_amount'=>0,
            'transection_id'=>$request->reference,
        ]);

     
      if($update){
             $insert=Wallet::insert([
                'order_id'=>$request->booking_id,
                'user_id'=>Auth::user()->id,
                'amount'=>$request->amount,
                'amount_type'=>'Dabit',
                'paid_by'=>'Bank Transfer',
                'transection_id'=>$request->reference,
                'date'=>Carbon::now(),
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            
                //  $maindata=ExamRequest::where('booking_id',$request->booking_id)->first();
                //  Mail::to($maindata->email)->send(new BankPayment());
                 
        //  Alert::toast('Payment Success!Please Wait For Confirmation', 'success');
            return response()->json([ 'status' => "success", 'message'=> "Payment Success ! Please Wait For Confirmation"]);
        }else{
           
       
              return response()->json([ 'message' => "success", 'message'=> "Something Went Wrong!Please try Again"]);
        }
        }else{
             
            return response()->json([ 'message' => "success", 'message'=> "your Booking form not found!Please Try Again"]);
        }
    }
    
    
    
     public function specialAccessRequirements(){
            $data=["Anxiety or Mental Health","Learning Difficulties","Medical Condition","None"];
            return response()->json($data); 
    }
    
    
    public function specialAccessDetails(){
        $data=["Anxiety","Extra Time 25%","Extra Time 50%","Fidget Toys","Practical Assistant","Laptop","SRB","special_acces","Smaller Room","Reader","Scribe","Prompt","Modified Paper","Reading Pen","Ear Defenders","Home Invigilation","Alternative Site"];
        return response()->json($data); 
    }
    
    
    
    public function getMockSubject(Request $request){
       
       $data=Subject::where('id',$request->subject)->first();
       
       $maindata=[
            'subject'=>$data->id,
            'subject_name'=>$data->subject_name,
            'unit_code'=>$data->unit_code,
            'paper_1'=>"paper_1",
            'paper_2'=>"paper_2",
            'paper_3'=>"paper_3",
            'paper_4'=>"paper_4",
            
            ];
            
        return response()->json($maindata);
        
        
       
        
    }
    
    
    
    public function mockPrice(Request $request){
        
        
        
        if($request->exam_type=="GCSE" || $request->exam_type=="IGCSE"){
        $paper1=0;
        $paper2=0;
        $paper3=0;
        $paper4=0;
        
          if($request->has('mock_test_paper_1')) {
              
                
                 
                     $paper1=$paper1 + 70;
                     
               
                        
            }
             if($request->has('mock_test_paper_2')) {
              
               
                 
                     $paper2=$paper2 + 70;
                     
                 
                        
            }
             if($request->has('mock_test_paper_3')) {
              
               
                 
                     $paper3=$paper3 + 70;
                     
                
                        
            }
             if($request->has('mock_test_paper_4')) {
              
                
                 
                     $paper4=$paper4 + 70;
                     
                
                        
            }
            $total_price=$paper1 + $paper2 + $paper3 + $paper4;
            
            $paper_price=[
                'total_price'=>$total_price,
                ];
            
             return response()->json($paper_price);
        }
       if($request->exam_type=="A Level" || $request->exam_type=="AS Level"){
        $paper1=0;
        $paper2=0;
        $paper3=0;
        $paper4=0;
        
          if($request->has('mock_test_paper_1')) {
              
                
                 
                     $paper1=$paper1 + 80;
                     
               
                        
            }
             if($request->has('mock_test_paper_2')) {
              
               
                 
                     $paper2=$paper2 + 80;
                     
                 
                        
            }
             if($request->has('mock_test_paper_3')) {
              
               
                 
                     $paper3=$paper3 + 80;
                     
                
                        
            }
             if($request->has('mock_test_paper_4')) {
              
                
                 
                     $paper4=$paper4 + 80;
                     
                
                        
            }
            $total_price=$paper1 + $paper2 + $paper3 + $paper4;
            
              $paper_price=[
                'total_price'=>$total_price,
                ];
            
             return response()->json($paper_price);
       }
        
            
    }
    
    
    
    
    
    
}
