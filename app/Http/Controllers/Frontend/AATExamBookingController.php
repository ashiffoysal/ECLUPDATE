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

class AATExamBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function exambookingatt(){
        $bookingId = Auth::id() . rand(11111, 99999);
         $subjects =Subject::where('exam_type','AAT')->where('is_deleted',0)->get();
         $allaatcate=AatCategory::get();
         $allaatsubcate=Subcategory::get();
         $allbranch=DB::table('branch')->select(['id','name'])->get();
         $maindata=ExamRequest::where('user_id',Auth::user()->id)->where('main_exam_type','AAT')->where('is_completed_from',0)->first();
        return view('frontend.exambooking.attexam',compact('subjects','maindata','allaatcate','allbranch','bookingId'));
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
                'special_access_requirements' => json_encode($request->special_access_requirements) ?? '',
                'total_amount'=>$request->total_amount,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                'update_special_acces' => json_encode($request->special_acces) ?? '',
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
                
            
            
                if ($request->radio10 == 1) {
                    ExamRequest::where('id', $insert)->update([
                        'is_need_pay_sp_fee' => 1,
                        'special_access_initial_fees' => 25,
                    ]);
                }

                if ($request->hasFile('fileUpload')) {
                    $this->uploadFile($request->file('fileUpload'), 'uploads/student/exambooking/', 'photo_id', $insert);
                }
                
                if ($request->signed) {
                    $this->saveBase64Image($request->signed, 'uploads/student/exambooking/', 'signed', $insert);
                }
                
                if ($request->hasFile('thumbnail_img')) {
                    $this->uploadFile($request->file('thumbnail_img'), 'uploads/student/exambooking/', 'recent_photo', $insert);
                }
                
                if ($request->hasFile('evidence_documents')) {
                    $this->uploadFile($request->file('evidence_documents'), 'uploads/student/', 'special_evidents_documents', $insert);
                }
                
                if ($request->hasFile('proof_of_evidence')) {
                    $this->uploadFile($request->file('proof_of_evidence'), 'uploads/student/exambooking/', 'proof_of_carring', $insert);
                }
                
                Mail::to($request->email)->send(new ExamBookingMail());
                
                if ($insert) {
                    Alert::toast('Exam Booking success! Please Pay', 'success');
                    return redirect('/make-payment/exambooking/' . $request->booking_id);
                } else {
                    Alert::toast('Please Enter Subjects', 'error');
                    return redirect()->back();
                }



            
        }

    }

    private function uploadFile($file, $path, $column, $insertId)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);
        ExamRequest::where('id', $insertId)->update([
            $column => $path . $fileName,
        ]);
    }
    private function saveBase64Image($base64, $path, $column, $insertId)
    {
        $imageParts = explode(';base64,', $base64);
        $imageTypeAux = explode('image/', $imageParts[0]);
        $imageType = $imageTypeAux[1];
        $imageBase64 = base64_decode($imageParts[1]);
        $file = $path . uniqid() . '.' . $imageType;
        file_put_contents(public_path($file), $imageBase64);
        ExamRequest::where('id', $insertId)->update([
            $column => $file,
        ]);
    }


}
