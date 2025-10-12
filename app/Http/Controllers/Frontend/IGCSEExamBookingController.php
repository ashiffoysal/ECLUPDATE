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

class IGCSEExamBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exambookingigcse(){
        $subjects = Subject::where([
            ['exam_type', 'IGCSE'],
            ['exam_board', 'Cambridge CIE'],
            ['is_deleted', 0],
            ['is_ac', 1],
            ['november_cie_availability', 1]
        ])->get();
        
        $mainData = ExamRequest::where([
            ['user_id', Auth::user()->id],
            ['main_exam_type', 'IGCSE'],
            ['is_completed_from', 0]
        ])->first();
        
        $examSeries  = Examessuedate::where([
            ['is_igcse', 1],
            ['is_active', 1],
            ['is_deleted', 0]
        ])->get();
        
        $examBoards = ['Cambridge CIE','Edexcel'];
        $bookingId = Auth::id() . rand(11111, 99999);
        
        return view('frontend.exambooking.igcse', compact('subjects', 'mainData', 'examSeries', 'examBoards','bookingId'));
    }

            // alevel Store
    public function exambookingigcsestore(Request $request){

            $insert = ExamRequest::insertGetId([
                'user_id' => Auth::user()->id,
                'booking_id' => $request->booking_id,
                'main_exam_type' => $request->main_exam_type,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'emergency_contact_number' => $request->emergency_contact_number,
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'uci' => $request->uci,
                'uci_number' => $request->uci_number,
                'uln' => $request->uln,
                'uln_number' => $request->uln_number,
                'total_amount' => $request->total_amount,
                'retaking_exams' => $request->retaking_exams,
                'retaking_exams_name' => $request->retaking_exams_name,
                'caring_forwad' => $request->caring_forwad,
                'caring_forwad_details' => $request->caring_forwad_details,
                'special_access_requirements' => json_encode($request->special_access_requirements) ?? '',
                'update_special_acces' => json_encode($request->special_acces) ?? '',
                'special_acces_evidence' => $request->special_acces_evidence,
                'mental_conditions' => $request->mental_conditions ?? '',
                'mental_condition_details' => $request->mental_condition_details ?? '',
                'condition_disability' => $request->condition_disability ?? '',
                'condition_disability_details' => $request->condition_disability_details ?? '',
                'relationship' => $request->relationship,
                'relation_name' => $request->relation_name,
                'todays_date' => $request->todays_date,
                'created_at' => Carbon::now()->toDateTimeString(),
                'has_a_candidate' => $request->has_a_candidate,
                'has_a_candidate_number' => $request->has_a_candidate_number,
                'mock_test' => $request->mock_test,
                'mock_amount' => $request->hidden_mock_price ?? 0,
                'is_completed_from' => 1,
                'status' => 1,
                'exam_series' => $request->exam_series,
            ]);

            if ($request->has('subject')) {
                $exam_information = collect($request->subject)->map(function ($subject, $key) use ($request) {
                    return [
                        'exam_board' => $request->exam_board[$key],
                        'exam_series' => $request->exam_series,
                        'type' => 'IGCSE',
                        'subject' => $subject,
                        'unit_code' => $request->unit_code[$key],
                        'option_code' => $request->option_code[$key],
                        'fees' => $request->fees[$key],
                    ];
                })->toArray();

                $total_amount = array_sum(array_column($exam_information, 'fees'));

                ExamRequest::where('id', $insert)->update([
                    'exam_information' => json_encode($exam_information),
                    'paid_amount' => 0,
                    'total_amount' => $total_amount + ($request->hidden_mock_price ?? 0),
                    'due_amount' => $total_amount + ($request->hidden_mock_price ?? 0),
                ]);
            }

            if ($request->radio10 == 1) {
                ExamRequest::where('id', $insert)->update([
                    'is_need_pay_sp_fee' => 1,
                    'special_access_initial_fees' => 25,
                ]);
            }

            if ($request->mock_test == "mock_test_yes" && $request->has('mock_subject_id')) {
                $mock_exam_information = collect($request->mock_subject_id)->map(function ($id, $key) use ($request) {
                    return [
                        'mock_subject_name' => $request->mock_subject_name[$key],
                        'mock_subject_id' => $id,
                        'mock_test_paper_1' => $request->mock_test_paper_1[$key] ?? '',
                        'mock_test_paper_2' => $request->mock_test_paper_2[$key] ?? '',
                        'mock_test_paper_3' => $request->mock_test_paper_3[$key] ?? '',
                        'mock_test_paper_4' => $request->mock_test_paper_4[$key] ?? '',
                        'mock_exam_date_1' => $request->mock_exam_date_1[$key] ?? '',
                        'mock_exam_date_2' => $request->mock_exam_date_2[$key] ?? '',
                        'mock_exam_date_3' => $request->mock_exam_date_3[$key] ?? '',
                        'mock_exam_date_4' => $request->mock_exam_date_4[$key] ?? '',
                    ];
                })->toArray();

                MockTest::insert([
                    'exam_information' => json_encode($mock_exam_information),
                    'total_amount' => $request->hidden_mock_price ?? 0,
                    'booking_id' => $request->booking_id,
                    'user_id' => Auth::user()->id,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'created_at' => Carbon::now()->toDateTimeString(),
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
