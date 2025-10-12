<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\ContactMesssage;
use App\Models\Examessuedate;
use App\Models\CompanyInformation;
use Carbon\Carbon;
use App\Http\Resources\SubjectCollection;
use Validator;
use DB;
class FrontendController extends Controller
{
    
    
    // public function getSubjectFees($examname){
    //     return $examname;
    // }
     public function gcseSubjectFees(){
         

        $data=Subject::where('exam_type','GCSE')->where('is_deleted',0)->select(['exam_board','exam_type','subject_name','unit_code','exam_fees','late_fees','high_late_fees'])->get();
        return response($data);
    }

    public function igcseSubjectFees(){
         $data=Subject::where('exam_type','IGCSE')->where('is_deleted',0)->select(['exam_board','exam_type','subject_name','unit_code','exam_fees','late_fees','high_late_fees'])->get();
        return response()->json($data);
    }

    public function alevelSubjectFees(){
        $data=Subject::where('exam_type','A Level')->where('is_deleted',0)->select(['exam_board','exam_type','subject_name','unit_code','exam_fees','late_fees','high_late_fees'])->get();
        return response()->json($data);
    }
    
    public function aslevelSubjectFees(){
        $data=Subject::where('exam_type','AS Level')->where('is_deleted',0)->select(['exam_board','exam_type','subject_name','unit_code','exam_fees','late_fees','high_late_fees'])->get();
        return response()->json($data);
    }
    public function aatSubjectFees(){
        $data=Subject::where('exam_type','AAT')->where('is_deleted',0)->select(['exam_board','exam_type','subject_name','unit_code','exam_fees'])->get();
        return response()->json($data);
    }
    public function accaSubjectFees(){
        $data=Subject::where('exam_type','ACCA')->where('is_deleted',0)->select(['exam_board','exam_type','subject_name','unit_code','exam_fees'])->get();
        return response()->json($data);
    }
    
    public function functionalSkillsSubjectFees(){
        $data=Subject::where('exam_type','Functional Skills')->where('is_deleted',0)->select(['exam_board','exam_type','subject_name','unit_code','exam_fees'])->get();
        return response()->json($data);
    }
    
    public function getIndividualSubjectPrice($id){
        $data=Subject::where('id',$id)->select(['id','subject_name','unit_code','exam_fees','late_fees','high_late_fees','option_code_details','exam_type','exam_board'])->first();
        return response()->json($data,200);
    }
    
  
    
    
    public function getAllmenu(){
        
        $data = [
                    [
                        'title' => 'GCSE',
                        'tag' => 'gcse',
                    ],
                    [
                        'title' => 'IGCSE',
                        'tag' => 'igcse',
                    ],
                    
                    [
                        'title' => 'A Level',
                        'tag' => 'alevel',
                    ],
                    
                    [
                        'title' => 'AS Level',
                        'tag' => 'aslevel',
                    ],
                    
                    [
                        'title' => 'Functional Skills',
                        'tag' => 'functionalskills',
                    ],
                    
                    [
                        'title' => 'ACCA',
                        'tag' => 'acca',
                    ],
                    [
                        'title' => 'AAT',
                        'tag' => 'aat',
                    ],
              
            ];
            
            return response()->json($data,200);
    }
    
    
    // entre date
    public function examEntreDate(){
        
        $data=Examessuedate::select(['exam_name','entry_dateline','entry_highlatefees','submission_dead_lines','availability'])->get();
        return response($data);
    }
    
    
    
    public function contactstore(Request $request){
        
        
        
        $validate=Validator::make($request->all(),[
                'email' => 'required|email',
                'name' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
        ]);
        if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
    
           $support_id=rand(11111,99999);
              $insert=DB::table('supports_inquiry')->insert([
                'name'=>$request->name,
                'support_id'=>$support_id,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'subject'=>$request->subject,
                'message'=>$request->message,
                'is_reply'=>0,
                'is_contact'=>1,
                'is_seen'=>0,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            
            if($insert){
               return response()->json('success',200);
            }else{
               return response()->json('faild');
            }
            
       

    }
    
    
    
     
    public function faq(){
        
        $data = [
                    [
                        'faq_ques' => 'What is included in the cost of the exam?',
                        'faq_ans' => 'Exam Centre London has carefully generated the price list in an attempt to make our prices affordable to all candidates. Therefore, our prices only reflect the cost associated with sitting the exam with us without any preparatory sessions. However, we acknowledge that having a tutor to support is highly beneficial, hence we have this option available to all candidates that require it at an additional cost. Speak to a member of our staff today to see if we can help.',
                    ],
                     [
                        'faq_ques' => 'I need some help! Have you got any tutors that could support me?',
                        'faq_ans' => 'Exam Centre London takes pride to support our candidates in their academic journey. We strive to make this experience as simple as we can, lightening the heavy load from the
shoulders of the candidates. Exam Centre London is able to schedule lessons with our
subject experts to support you in this journey!',
                    ],
                    
                     [
                        'faq_ques' => 'Can I do my practical endorsement with Exam Centre London?',
                        'faq_ans' => 'We are delighted to share that our candidates have the opportunity to sit their Science practical endorsement with Exam Centre London. Our practical endorsements are carried
out during the term holidays under the guidance of our highly qualified and experienced
science teachers.',
                    ],
                    
                    [
                        'faq_ques' => 'I need predicted grades for my UCAS application? Can I obtain it from Exam Centre
London?',
                        'faq_ans' => 'Exam Centre London is able to provide private candidates predicted grades to submit on
their UCAS applications. Candidates will be required to sit a mock paper under controlled
conditions at our exam centre. Based on the performance on the mock paper, Exam Centre
London can finalise the predicted grades.',
                    ],
                    
                       [
                        'faq_ques' => 'Have you got free parking?',
                        'faq_ans' => 'Whilst we do not have any private parking for our candidates, we are surrounded by many
roads providing free and/or paid parking throughout the day.',
                    ],
                    
                      [
                        'faq_ques' => 'Can I pay in instalments?',
                        'faq_ans' => 'Exam Centre London appreciates that our prices may be costly for some candidates,
therefore we have an interest free instalment plan for candidates wishing for the extra time to
pay for the exam.',
                    ],
                     [
                        'faq_ques' => 'What if I don’t have a valid ID?',
                        'faq_ans' => 'Photo IDs are a crucial requirement to book any exams. If you do not have a valid photo ID,
then contact our support team who will help to proceed via an alternative route.',
                    ],
                       [
                        'faq_ques' => 'What if I don’t have a valid photo ID?',
                        'faq_ans' => 'If you do not have photo ID, contact us and we will send you more information on how to proceed with your application.',
                    ],
                    [
                        'faq_ques' => 'When can I get my results?',
                        'faq_ans' => 'Functional Skills results are issues between two to four weeks after your assessment.January IGCSE results are issued in March. Summer GCSE and A-Level exam results are issued in August.November GCSE and A-Level exam results are issued in January. We’ll keep you informed of when and how you can access your results and your examination certificates. ',
                    ],
                     [
                        'faq_ques' => 'How can I pay?',
                        'faq_ans' => 'We accept card, bank transfer and cash payment.',
                    ],
                     [
                        'faq_ques' => 'How do I book my exam?',
                        'faq_ans' => '-Step 1: Book Your Exam  Click here to exam booking. -Step 2: Make Payment. -Step 3: We’ll Confirm Your Booking',
                    ],
                      [
                        'faq_ques' => 'Can I practice assessments before the day of the exam?',
                        'faq_ans' => 'Yes.In fact, we actively encourage our learners to build confidence and skills around exams by making use of resources such as past papers as part of the preparation for the assessment. Not only can this help to alleviate anxiety around exams, but it’s also chance to practice the types of assessment tasks used within the exams. When you work with Exam Centre London, we’ll provide you with a range of resources to support you in preparing for assessments.',
                    ],
              
            ];
            
            return response()->json($data,200);
    }
    
    // 
    public function companyInformation(){
        $data=CompanyInformation::select(['company_name','address','company_motto','email','mobile','telephone','logo','favicon'])->first();
        $maindata=[
                'company_name'=>$data->company_name,
                'address'=>$data->address,
                'company_motto'=>$data->company_motto,
                'email'=>$data->email,
                'mobile'=>$data->mobile,
                'telephone'=>$data->telephone,
                'logo'=>$data->logo,
                'favicon'=>$data->favicon,
                'logo'=>$data->logo,
                'account_name'=>"EDU SERVICE LIMITED",
                'account_number'=>"18901601",
                'short_code'=>"04-06-05",
                
            ];
        return response()->json($maindata);
    }
    
    
    
}
