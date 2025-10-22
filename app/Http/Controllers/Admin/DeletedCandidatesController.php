<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamRequest;
use App\Models\CandidateResult;
use App\Models\GcseExamConfirmation;
use App\Models\CandidateConfirmation;
use App\Models\User;

class DeletedCandidatesController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // all soft deleted Candidates
    public function index(){
        $allData=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',0)->where('is_apps_booking',0)->select(['id','first_payment_alert','first_payment_date','second_payment_alert','second_payment_date','main_exam_type','booking_id','first_name','middle_name','last_name','email','phone','is_seen','is_confirm_booking','is_refunded','Candidate_number','is_withdrawn','created_at','payment_option','is_need_pay_sp_fee','enable_pay','is_paid','exam_series','notes'])->limit(1500)->get();
        return view('backend.deletedcandidate.index',compact('allData'));
    }
// hard Deleted
    public function hardDelete($id){

            // Step 1: Get the main ExamRequest record
            $exam = ExamRequest::find($id);

            if (!$exam) {
                return redirect()->back()->with([
                    'messege' => 'Record not found!',
                    'alert-type' => 'error'
                ]);
            }

            $bookingId = $exam->booking_id;

            // Step 2: Delete uploaded files related to ExamRequest
            $examFilePaths = [
                'photo_id' => 'uploads/student/exambooking/',
                'signed' => 'uploads/student/exambooking/',
                'recent_photo' => 'uploads/student/exambooking/',
                'special_evidents_documents' => 'uploads/student/',
                'proof_of_carring' => 'uploads/student/exambooking/',
            ];

            foreach ($examFilePaths as $field => $path) {
                if (!empty($exam->$field) && file_exists(public_path($path . $exam->$field))) {
                    @unlink(public_path($path . $exam->$field));
                }
            }

            // Step 3: Delete Candidate Result PDF if exists
            $candidateResults = CandidateResult::where('booking_id', $bookingId)->get();

            foreach ($candidateResults as $result) {
                if (!empty($result->result) && file_exists(public_path('uploads/student/results/' . $result->result))) {
                    @unlink(public_path('uploads/student/results/' . $result->result));
                }
                $result->delete();
            }

            // Step 4: Delete GCSE Exam Confirmation (if exists)
            $confirmations = GcseExamConfirmation::where('booking_id', $bookingId)->get();
            foreach ($confirmations as $confirm) {
                $confirm->delete();
            }

            $AATconfirmations = CandidateConfirmation::where('booking_id', $bookingId)->get();
            foreach ($AATconfirmations as $confirms) {
                $confirms->delete();
            }

            // Step 5: Delete the main record
            $exam->delete();

            // Step 6: Return success notification
            return redirect()->back()->with([
                'messege' => 'Record and all linked files deleted successfully!',
                'alert-type' => 'success'
            ]);
        }

        public function unverifiedCandidates(){
            $allData=User::where('is_verified',0)->get();
            return view('backend.studentmanage.unverifiedcandidates',compact('allData'));
        }

        public function verifiedCandidates($id){
               $verified=User::where('id',$id)->update([
                'is_verified'=>1,
               ]);

               if($verified){
                        return redirect()->back()->with([
                        'messege' => 'Verify successfully!',
                        'alert-type' => 'success'
                    ]);
               }else{
                 return redirect()->back()->with([
                        'messege' => 'Verify faild!',
                        'alert-type' => 'error'
                    ]);
               }
        }
    
}
