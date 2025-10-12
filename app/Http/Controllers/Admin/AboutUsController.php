<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\AboutUs;
use App\Models\CandidateResult;
use App\Models\CandidateConfirmation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Auth;
use App\Mail\CandidateExamConfirmation;
use App\Mail\FunctionalSkillMathPassMail;
use App\Mail\SuuportReplyMessageMail;
use App\Mail\FunctionalSkillsMathFail;
use App\Mail\SupportMail;
use App\Mail\CandidateIESBExamConfirmation;
use Mail;
use DB;
use App\Models\GcseExamConfirmation;
use App\Models\ExamRequest;
use App\Models\Examessuedate;
use App\Models\Wallet;
use App\Models\Subject;
use App\Models\Cupon;
use App\Mail\MainStundentSecondPaymentAlert;
use App\Mail\MainStundentFirstPaymentAlert;


class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function GetSeriesdate($series_id){
        
        // return $series_id;
        $data=Examessuedate::where('exam_name',$series_id)->first();
        $maindata=[
                'Exam_series'=>$data->exam_name,
                'EntryDeadLine'=>Carbon::parse($data->entry_dateline)->format('d/m/Y'),
                'EntryLate'=>Carbon::parse($data->entry_latefees)->format('d/m/Y'),
                'EntryHighlate'=>Carbon::parse($data->entry_highlatefees)->format('d/m/Y'),
            ];
        return response($maindata);
    }
    
    public function unvisibleUpdate(Request $request){
         	$deleteid = $request['delid'];
         
            if($deleteid) {
                $deletpost = ExamRequest::whereIn('id', $deleteid)->update([
                	'is_visible'=>'1',
                	'updated_at'=>Carbon::now()->toDateTimeString(),
                ]);

                if ($deletpost) {
                    $notification = array(
                        'messege' => 'success',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'messege' => ' Faild',
                        'alert-type' => 'errors'
                    );
                    return Redirect()->back()->with($notification);
                }
            } else {
                $notification = array(
                    'messege' => 'Nothing To Delete',
                    'alert-type' => 'info'
                );
                return Redirect()->back()->with($notification);
            }
    }
    
    public function forchecking(){
          $alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',1)->where('main_exam_type','A Level')->orwhere('main_exam_type','GCSE')->where('is_deleted',1)->where('is_paid',1)->orwhere('main_exam_type','IGCSE')->where('is_deleted',1)->where('is_paid',1)->orwhere('main_exam_type','AS Level')->where('is_deleted',1)->where('is_paid',1)->get();
    return view('backend.forcheck.index',compact('alldata'));
    }
    
    
     public function dateWiseCandidates(){
        //   $alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',1)->where('main_exam_type','A Level')->orwhere('main_exam_type','GCSE')->where('is_deleted',1)->where('is_paid',1)->orwhere('main_exam_type','IGCSE')->where('is_deleted',1)->where('is_paid',1)->orwhere('main_exam_type','AS Level')->where('is_deleted',1)->where('is_paid',1)->get();
    return view('backend.datewisecandidates.index');
    }
    
    
    
        public function dateWiseCandidatessubmit(Request $request)
    {
     
    //     $searchDate = $request->input('exam_date'); 
    //     $examResults = GcseExamConfirmation::whereRaw(
    //         "JSON_CONTAINS(exam_details, JSON_OBJECT('exam_date', ?))",
    //         [$searchDate]
    //     )->get();
    //   dd($examResults);
       
       
    //     $searchDate = $request->input('exam_date'); 
    // $searchTime = $request->input('exam_time'); 

    // $alldata = GcseExamConfirmation::where('is_deleted',0)->where(function($query) use ($searchDate, $searchTime) {

        
    //     if(!empty($searchTime)) {
    //         $query->whereRaw(
    //             "JSON_CONTAINS(exam_details, JSON_OBJECT('exam_date', ?, 'exam_time', ?))",
    //             [$searchDate, $searchTime]
    //         );
    //     } else {
            
    //         $query->whereRaw(
    //             "JSON_CONTAINS(exam_details, JSON_OBJECT('exam_date', ?))",
    //             [$searchDate]
    //         );
    //     }
    // })->get();
  
    // return view('backend.datewisecandidates.index',compact('alldata'));
    
    
  
    $searchDate = $request->input('exam_date'); // required
    $searchTime = $request->input('exam_time'); // optional

    // Eager load examRequest to avoid N+1 query
    $alldata = GcseExamConfirmation::where('is_deleted',0)->get();

    // Filter exam_details to only include the searched date/time
    $alldata = $alldata->filter(function($data) use ($searchDate, $searchTime) {
        $filteredExams = collect(json_decode($data->exam_details))->filter(function($details) use ($searchDate, $searchTime) {
            if(!empty($searchTime)) {
                return $details->exam_date == $searchDate && $details->exam_time == $searchTime;
            }
            return $details->exam_date == $searchDate;
        });

        // Attach filtered exams to the model for Blade
        $data->filteredExams = $filteredExams;

        return $filteredExams->isNotEmpty();
    });


    return view('backend.datewisecandidates.index', compact('alldata', 'searchDate', 'searchTime'));
       
        
    }
    
    public function iscompleteddemo($id){
        
        $update=ExamRequest::where('id',$id)->update([
                    'is_confirm_booking'=>1,
                ]);
                
         if ($update) {
                $notification = array(
                    'messege' => 'Update success!',
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
    public function seatingPlanGlobal(){
        
        return view('backend.seatingPlanGlobal.index');
    }
    public function ucinumberInformation(Request $request){
        
                $update=ExamRequest::where('id',$request->id)->update([
                    'uci'=>$request->uci,
                    'uci_number'=>$request->uci_number,
                    'uln'=>$request->uln,
                    'uln_number'=>$request->uln_number,
                    'retaking_exams'=>$request->retaking_exams,
                    'retaking_exams_name'=>$request->retaking_exams_name,
                    'caring_forwad'=>$request->caring_forwad,
                    'caring_forwad_details'=>$request->caring_forwad_details,
                ]);
              if ($update) {
                $notification = array(
                    'messege' => 'Update success!',
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
    
    public function isbookabled($id){
        $update=ExamRequest::where('id',$id)->update([
                'is_bookabled'=>1,
            ]);
        if ($update) {
                $notification = array(
                    'messege' => 'Update success!',
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
    
    
     public function isrefunded($id){
        $update=ExamRequest::where('id',$id)->update([
                'is_refunded'=>1,
            ]);
        if ($update) {
                $notification = array(
                    'messege' => 'Update success!',
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
    public function iswithdrawn($id){
        $update=ExamRequest::where('id',$id)->update([
                'is_withdrawn'=>1,
            ]);
        if ($update) {
                $notification = array(
                    'messege' => 'Update success!',
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
    
    	
    
    public function Allisbookabled(){
        $alldata=ExamRequest::where('is_bookabled',1)->where('is_deleted',1)->orderBy('id','DESC')->get();
        return view('backend.examrequest.isbookabled',compact('alldata'));
    }
    
    public function SendcandidateResult($id){
        
            $sendresult=CandidateResult::where('booking_id',$id)->get();
            $candidate=CandidateResult::where('booking_id',$id)->first();
            $myfilesarray=array();
            foreach($sendresult as $myresult){
                $newfile=$myresult->result_file;
                array_push($myfilesarray,'updatecore/public/'.$newfile);
            }
            $details = [
                'title' => 'Candidate Exam Result',
                'body' => 'Please find attached your results. We will notify you once we receive your certificate.',
                'files' => $myfilesarray
            ];
            
            if($candidate->passorfail=='pass'){
                if($candidate->mathorenglish=='MATHS'){
                    $sendmail=Mail::to($candidate->email)->send(new FunctionalSkillMathPassMail($details));
                }
                if($candidate->mathorenglish=='ENGLISH'){
                    
                    $sendmail=Mail::to($candidate->email)->send(new FunctionalSkillMathPassMail($details));
                }
            }
            
            if($candidate->passorfail=='fail'){
                if($candidate->mathorenglish=='MATHS'){
                    $sendmail=Mail::to($candidate->email)->send(new FunctionalSkillsMathFail($details));
                }
                if($candidate->mathorenglish=='ENGLISH'){
                    
                    $sendmail=Mail::to($candidate->email)->send(new FunctionalSkillMathPassMail($details));
                }
            }
            
            
            $sendmail=Mail::to($candidate->email)->send(new FunctionalSkillMathPassMail($details));
            $update=ExamRequest::where('booking_id',$id)->update([
                'is_result_published'=>1
            ]);
            if($update){
                 $notification = array(
                    'messege' => 'Result Send!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                 $notification = array(
                    'messege' => 'Result Send Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
               
    }
    
    
    public function candidateResult(Request $request){
        
      
        $insert=CandidateResult::insertGetId([
            'heading_test'=>$request->title,
            'booking_id'=>$request->booking_id,
            'user_id'=>$request->user_id,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            
            'passorfail'=>$request->usage,
            'mathorenglish'=>$request->subject,
            'reading'=>$request->reading,
            'wrinting'=>$request->wrinting,
            'speaking'=>$request->speaking,
            
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
            
    }
    
    
    
   // special access list
    public function specialAccess(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('is_admin_special_acc',1)->where('is_deleted',1)->where('is_completed_from',1)->get();
        return view('backend.specialAccess.index',compact('alldata'));
    }
    // invoice
      public function meritinvoiceDelete($id){
        
         $delete=DB::table('custom_invoice')->where('id',$id)->update([
                'is_deleted'=>1,
             ]);
             
        if($delete){
             $notification = array(
                    'messege' => 'Delete success!',
                    'alert-type' => 'success'
                );
         return redirect()->back()->with($notification);
        }else{
            $notification = array(
                    'messege' => 'Delete Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
        }
        
    }
    public function meritinvoiceIndex(){
         $alldata=DB::table('custom_invoice')->where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.customInvoice.allinvoice',compact('alldata'));
    }
      public function meritinvoiceCreate(){
          $receipt_number=rand(99999,1111);
        return view('backend.customInvoice.meritindex',compact('receipt_number'));
    }
    
    
    // merit Tutors
    public function meritinvoiceCreateSubmit(Request $request){

        $insert= DB::table('custom_invoice')->insertGetId([
            'branch' => $request->branch,
            'receiptNumber' => $request->receiptNumber,
            'email' => $request->email,
            'date' => $request->date,
            'yearId' => $request->yearId,
            'childcareFromdate' => $request->fromdate,
            'childcareTodate' => $request->todate,
            'student_name' => $request->student_name,
            'paymentType' => $request->paymentType,
            'tuitionFees' => $request->tuitionFees,
            'tuitionFeesAmount' => $request->tuitionFeesAmount,
            'admissionFees' =>$request->admissionFees,
            'admissionFeesAmount' => $request->admissionFeesAmount,
            'childCareFees' => $request->childCareFees,
            'childCareFeesAmount' => $request->childCareFeesAmount,
            'examFees' =>$request->examFees,
            'examFeesAmount' => $request->examFeesAmount,
            'deposit' => $request->deposit,
            'depositAmount' => $request->depositAmount,
            'resources' => $request->resources,
            'resourcesAmount' =>$request->resourcesAmount,
            'resourcesAmount' => $request->resourcesAmount,
            'receivedBy' => $request->receivedBy,
            'signature' => $request->signature,
            'remarks' => $request->remarks,
            'totalAmount' => $request->totalAmount,
            'tuitionfeeDetails' => $request->tuitionfeeDetails,
            'resourcesFeesDetails' => $request->resourcesFeesDetails,
            'created_at' => now(),
        ]);

        if($insert){
             $notification = array(
                    'messege' => 'Upload success!',
                    'alert-type' => 'success'
                );
         return redirect('admin/merit-custom-invoice/print/'.$insert)->with($notification);
        }else{
            $notification = array(
                    'messege' => 'Upload Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
        }
    }
    
    // 
    public function meritinvoicePrint($id){
        // return $id;
        $data=DB::table('custom_invoice')->where('id',$id)->first();
        // dd($data);
        return view('backend.customInvoice.print',compact('data'));
    }
    
    // 
    
    public function invoiceCreate(){
        return view('backend.customInvoice.index');
    }
    public function invoiceCreateSubmit(Request $request){
    
        $data=$request;
        $invoice_information=array();
        $total_price=0;
         if ($request->has('name')) {
            foreach ($request->name as $skey => $sno) {
              
                $myitem['name'] = $request->name[$skey];
                $myitem['description'] = $request->description[$skey];
                $myitem['quantity'] = $request->quantity[$skey] ?? '';
                $myitem['price'] = $request->price[$skey] ?? '';
                $myitem['quantity'] = $request->quantity[$skey] ?? '';
                $total_price= $total_price + floatval($request->price[$skey] ?? 0) * floatval($request->quantity[$skey] ?? 0);
                array_push($invoice_information, $myitem);
            
                }
         }
         $information=json_encode($invoice_information);
        return view('invoice.custominvoice',compact('data','information','total_price'));
    }
    
    // aat acca FS seating plan
    public function seatingPlanIndex(){
        
        return view('backend.seatingplan.index');
        
    }
    
    public function seatingPlanSearch(Request $request){
        
        
        $mydate=date('d-M-Y', strtotime($request->date));
        $searcData=DB::table('skillexam_seat_plan')->where('date',$mydate)->first();
        if($searcData){
            return view('backend.seatingplan.index',compact('searcData'));
        }else{
            $notification = array(
                'messege' => 'Exam Not Found!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
        
    }
    
    
    
    
    
    public function supportsIndex(){
        

    
  $alldata = DB::table('supports_inquiry')
    ->leftJoin('exam_requests', function($join) {
        $join->on('supports_inquiry.email', '=', 'exam_requests.email')
            ->where('exam_requests.is_completed_from', 1)
            ->where('exam_requests.is_deleted', 1)
            ->where('exam_requests.is_apps_booking', 0);
    })
    ->leftJoin('support_message', function($join) {
        $join->on('supports_inquiry.support_id', '=', 'support_message.support_id')
            ->where('support_message.is_seen', 0);
    })
    ->select([
        'supports_inquiry.*', // Select all columns from supports_inquiry
        DB::raw('COUNT(exam_requests.id) as exam_request_count'), // Count the related ExamRequest entries
        DB::raw('COUNT(support_message.id) as unseen_message_count') // Count the related SupportMessage entries where is_seen is 0
    ])
    ->where('supports_inquiry.is_deleted', 0)
    ->where('supports_inquiry.is_save_draft', 0)
    ->groupBy('supports_inquiry.id') // Group by supports_inquiry id to ensure accurate counting
    ->orderBy('supports_inquiry.id', 'DESC')
    ->get();
   
        return view('backend.supports.index',compact('alldata'));
    }
       public function supportsSaveDraftIndex(){
        $alldata=DB::table('supports_inquiry')->where('is_save_draft',1)->where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.supports.savedraft',compact('alldata'));
    }
    public function supportscreate(){
         return view('backend.supports.create');
    }
    public function supportsStore(Request $request){
        if ($request->input('action') == 'draft') {
        $support_id=rand(11111,99999);
        $insert=DB::table('supports_inquiry')->insertGetId([
            'support_id'=>$support_id,
            'name'=>$request->name,
            'is_save_draft'=>1,
          'email'=>$request->email,
            'phone'=>$request->phone,
            'contact_type'=>$request->contact_type,
            'notes'=>$request->notes,
            'series'=>$request->series,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'createdby'=>Auth::user()->first_name.''.Auth::user()->last_name,
            
            'mock'=>$request->mock ?? 0,
            'course'=>$request->course ?? 0,
            
            'oninetuition'=>$request->oninetuition ?? 0,
            'grouptution'=>$request->grouptuition ?? 0,
            'inperson'=>$request->inperson ?? 0,
            
            'fscorse'=>$request->fscorse ?? 0,
           
            
            'coupon'=>$request->coupon ?? 0,
            'email_sent'=>$request->email_sent,
            
            'asifalevelcourse'=>$request->asifalevelcourse ?? 0,
            'gcsecoursenov'=>$request->gcsecourse ?? 0,
            'gcsecoursejune'=>$request->gcsecoursejune ?? 0,
        ]);
        // 
        
                     
        if($request->coupon){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'coupon'=>1,
      
            ]);

        }
             
        if($request->mock){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'mock'=>1,
      
            ]);

        }
        
                 
        if($request->course){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'course'=>1,
      
            ]);

        }
        
        if($request->oninetuition){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'oninetuition'=>1,
      
            ]);

        }
        
        if($request->grouptuition){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'grouptution'=>1,
      
            ]);

        }
        
        if($request->inperson){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'inperson'=>1,
      
            ]);

        }
        
        
        if($request->fscorse){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'fscorse'=>1,
      
            ]);

        }
        // 
      if($request->alvelcourse){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'alvelcourse'=>1,
      
            ]);

        }
        
        
        
        
     if($request->gcsecourse){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'gcsecourse'=>1,
      
            ]);

        }
        // 

        if($request->special_access){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
                'special_access'=>json_encode($request->special_access_name) ?? '',
                'inquery_supports'=>1,
      
            ]);

        }
        
        if($request->tuition){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'tuition'=>1,
      
            ]);

        }
        
          if($request->ucas){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'ucas'=>1,
      
            ]);

        }
        if($request->Exams){

            

            if ($request->has('subject')) {
                $exam_information = array();
               
                foreach ($request->subject as $key => $no) {
                     $data=Subject::where('id',$request->subject[$key])->select(['subject_name'])->first();
                  
                        $item['exam_board'] = $request->exam_board[$key];
                        $item['exam_type'] = $request->exam_type[$key];
                        $item['subject'] = $request->subject[$key];
                        $item['subject_name'] = $data->subject_name ?? '';
                        $item['fees'] = $request->fees[$key];
                        array_push($exam_information, $item);
                 
                    }
                    $update=DB::table('supports_inquiry')->where('id',$insert)->update([
                        'subject_details'=>json_encode($exam_information),
                        'inquery_exams'=>1,
                        
                    ]);
            }
         }
         $message = DB::table('supports_inquiry')->where('id',$insert)->first();
          if ($insert) {
            //   if($request->email_sent=='yes'){
            //       Mail::to($request->email)->send(new SupportMail($message));
            //   }
            
            $notification = array(
                'messege' => 'Support Draft Created!',
                'alert-type' => 'success'
            );
            return redirect('admin/supports/mail/export/'.$insert)->with($notification);
        } else {
            $notification = array(
                'messege' => ' Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } else {
        $support_id=rand(11111,99999);
        $insert=DB::table('supports_inquiry')->insertGetId([
            'support_id'=>$support_id,
            'name'=>$request->name,
       'email'=>$request->email,
            'phone'=>$request->phone,
            'contact_type'=>$request->contact_type,
            'notes'=>$request->notes,
            'series'=>$request->series,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'createdby'=>Auth::user()->first_name.''.Auth::user()->last_name,
            
            'mock'=>$request->mock ?? 0,
            'course'=>$request->course ?? 0,
            
            'oninetuition'=>$request->oninetuition ?? 0,
            'grouptution'=>$request->grouptuition ?? 0,
            'inperson'=>$request->inperson ?? 0,
            
            'fscorse'=>$request->fscorse ?? 0,
           
            
            'coupon'=>$request->coupon ?? 0,
            'email_sent'=>$request->email_sent,
            
            'asifalevelcourse'=>$request->asifalevelcourse ?? 0,
            'gcsecoursenov'=>$request->gcsecourse ?? 0,
            'gcsecoursejune'=>$request->gcsecoursejune ?? 0,
           
        ]);

        if($request->special_access){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
                'special_access'=>json_encode($request->special_access_name) ?? '',
                'inquery_supports'=>1,
      
            ]);

        }
        
        if($request->tuition){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'tuition'=>1,
      
            ]);

        }
        
          if($request->ucas){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'ucas'=>1,
      
            ]);

        }
        if($request->Exams){

            

            if ($request->has('subject')) {
                $exam_information = array();
               
                foreach ($request->subject as $key => $no) {
                     $data=Subject::where('id',$request->subject[$key])->select(['subject_name'])->first();
                  
                        $item['exam_board'] = $request->exam_board[$key];
                        $item['exam_type'] = $request->exam_type[$key];
                        $item['subject'] = $request->subject[$key];
                        $item['subject_name'] = $data->subject_name ?? '';
                        $item['fees'] = $request->fees[$key];
                        array_push($exam_information, $item);
                 
                    }
                    $update=DB::table('supports_inquiry')->where('id',$insert)->update([
                        'subject_details'=>json_encode($exam_information),
                        'inquery_exams'=>1,
                        
                    ]);
            }
         }
         $message = DB::table('supports_inquiry')->where('id',$insert)->first();
          if ($insert) {
              if($request->email_sent=='yes'){
                  Mail::to($request->email)->send(new SupportMail($message));
              }
            
            $notification = array(
                'messege' => 'Support Created!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => ' Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
        
        $support_id=rand(11111,99999);
        $insert=DB::table('supports_inquiry')->insertGetId([
            'support_id'=>$support_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'contact_type'=>$request->contact_type,
            'notes'=>$request->notes,
            'series'=>$request->series,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'createdby'=>Auth::user()->first_name.''.Auth::user()->last_name
        ]);

        if($request->special_access){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
                'special_access'=>json_encode($request->special_access_name) ?? '',
                'inquery_supports'=>1,
      
            ]);

        }
        
        if($request->tuition){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'tuition'=>1,
      
            ]);

        }
        
          if($request->ucas){

            $supdate=DB::table('supports_inquiry')->where('id',$insert)->update([
              
                
                'ucas'=>1,
      
            ]);

        }
        if($request->Exams){

            

            if ($request->has('subject')) {
                $exam_information = array();
               
                foreach ($request->subject as $key => $no) {
                     $data=Subject::where('id',$request->subject[$key])->select(['subject_name'])->first();
                  
                        $item['exam_board'] = $request->exam_board[$key];
                        $item['exam_type'] = $request->exam_type[$key];
                        $item['subject'] = $request->subject[$key];
                        $item['subject_name'] = $data->subject_name ?? '';
                        $item['fees'] = $request->fees[$key];
                        array_push($exam_information, $item);
                 
                    }
                    $update=DB::table('supports_inquiry')->where('id',$insert)->update([
                        'subject_details'=>json_encode($exam_information),
                        'inquery_exams'=>1,
                        
                    ]);
            }
         }
         $message = DB::table('supports_inquiry')->where('id',$insert)->first();
          if ($insert) {
              if($request->email_sent=='yes'){
                  Mail::to($request->email)->send(new SupportMail($message));
              }
            
            $notification = array(
                'messege' => 'Support Created!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => ' Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
      
    }
    public function supportsEdit($id){
        $data=DB::table('supports_inquiry')->where('id',$id)->first();
         return view('backend.supports.update',compact('data'));
    }
    public function supportsUpdate(Request $request){
           $Update=DB::table('supports_inquiry')->where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'contact_type'=>$request->contact_type,
            'notes'=>$request->notes,
            'is_save_draft'=>0,
            'series'=>$request->series,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'createdby'=>Auth::user()->first_name.''.Auth::user()->last_name
        ]);
       if($request->special_access){

            $supdate=DB::table('supports_inquiry')->where('id',$request->id)->update([
                'special_access'=>json_encode($request->special_access_name) ?? '',
                'inquery_supports'=>1,
      
            ]);

        }
        
        if($request->tuition){

            $supdate=DB::table('supports_inquiry')->where('id',$request->id)->update([
              
                
                'tuition'=>1,
      
            ]);

        }
        if($request->Exams){

            $exam_information = array();

            if ($request->has('subject')) {
               
                foreach ($request->subject as $key => $no) {
                     $data=Subject::where('id',$request->subject[$key])->select(['subject_name'])->first();
                  
                        $item['exam_board'] = $request->exam_board[$key];
                        $item['exam_type'] = $request->exam_type[$key];
                        $item['subject'] = $request->subject[$key];
                        $item['subject_name'] = $data->subject_name;
                        $item['fees'] = $request->fees[$key];
                        array_push($exam_information, $item);
                 
                    }
                    $update=DB::table('supports_inquiry')->where('id',$request->id)->update([
                        'subject_details'=>json_encode($exam_information),
                        'inquery_exams'=>1,
                        
                    ]);
            }
         }
         $message = DB::table('supports_inquiry')->where('id',$request->id)->first();
          if ($Update) {
              if($request->email_sent=='yes'){
                  Mail::to($request->email)->send(new SupportMail($message));
              }
            
            $notification = array(
                'messege' => 'Support Updated!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => ' Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function supportsDelete($id){
        $Update=DB::table('supports_inquiry')->where('id',$id)->delete();
          if ($Update) {
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
    // export
    public function supportsExport($id){
        $data=DB::table('supports_inquiry')->where('id',$id)->first();
        return view('backend.supports.exportfile',compact('data'));
    }
    
    
    
    
    
    
    public function branchIndex(){
        
        
        $branch=DB::table('branch')->get();
        $allforestgatedate=DB::table('branch_day_off')->where('branch',1)->orderBy('id','DESC')->get();
        $allIlfordlanedate=DB::table('branch_day_off')->where('branch',2)->orderBy('id','DESC')->get();
        
        $exam_information=array();
        
            foreach ($allforestgatedate as $mydata) {
                array_push($exam_information, $mydata->date);
              }
              
        return view('backend.branch.index',compact('branch','allforestgatedate','allIlfordlanedate'));
        
        
    }
    
    public function branchTimeDeactive($id){
        $update = DB::table('branch_exam_time')->where('id',$id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
          if ($update) {
            $notification = array(
                'messege' => 'Update success!',
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
    
    public function branchTimeCreate(Request $request){
        $update = DB::table('branch_exam_time')->insert([
            'branch' => $request->branch,
            'time' => $request->time,
            'weekday' => $request->weekday,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
          if ($update) {
            $notification = array(
                'messege' => 'insert success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'insert Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function branchTimeDelete($id){
        $delete=DB::table('branch_exam_time')->where('id',$id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'delete success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    
    public function ForestgatebranchDayoff(Request $request){
        
        $mydate=Carbon::parse($request->date)->format('d-m-Y');
        
        $insert=DB::table('branch_day_off')->insert([
                'date'=>$mydate,
                'branch'=>$request->branch,
                'reason'=>$request->reason,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Insert Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    
    public function IlfordLanebranchDayoff(Request $request){
        $mydate=Carbon::parse($request->date)->format('d-m-Y');
             $insert=DB::table('branch_day_off')->insert([
                 'date'=>$mydate,
                'branch'=>$request->branch,
                'reason'=>$request->reason,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Insert Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    
    public function IlfordLanebranchDelete($id){
        $insert=DB::table('branch_day_off')->where('id',$id)->delete();
        if ($insert) {
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
    
    public function branchTimeactive($id){
        $update = DB::table('branch_exam_time')->where('id',$id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
          if ($update) {
            $notification = array(
                'messege' => 'Update success!',
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
    
    
    // update
    public function update()
    {
        $data = AboutUs::where('keyword', 'about_us')->select(['details', 'id', 'title', 'image'])->first();
        return view('backend.about-us.update', compact('data'));
    }
    // update Store
    public function updateSubmit(Request $request)
    {
        $this->validate($request, [
            'details' => 'required',
        ]);
        $update = AboutUs::where('id', $request->id)->update([
            'title' => $request->title,
            'details' => $request->details,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'About' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/aboutus/' . $ImageName);
            AboutUs::where('id', $update)->update([
                'image' => $ImageName,
            ]);
        }
        if ($update) {
            $notification = array(
                'messege' => 'Update success!',
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

    public function privacyPolicy()
    {
        $data = AboutUs::select(['details', 'id'])->where('keyword', 'privacy_policy')->first();
        return view('backend.about-us.privacy_policy', compact('data'));
    }

    public function termsCondition()
    {
        $data = AboutUs::select(['details', 'id'])->where('keyword', 'terms_condition')->first();
        return view('backend.about-us.terms_conditions', compact('data'));
    }
    
    public function allconfirmation(){
        
         return view('backend.confirmationpage.index');
    }
    public function searchallconfirmation(Request $request){
        
        $mydate=$request->search_date;
 
        $searchdate=Carbon::createFromFormat('Y-m-d', $mydate)->format('d-M-Y');
                                    
        $searchdata=CandidateConfirmation::where('exam_date',$searchdate)->orderBy('id','DESC')->get();
        return view('backend.confirmationpage.index',compact('searchdata'));
    }
    
    public function fileUploadsconfirmation(Request $request){
      
        
                if ($request->hasFile('fileUpload')) {
                    $extension = $request->fileUpload->getClientOriginalExtension();
                    if($extension !='pdf'){
                               $image = $request->file('fileUpload');
                                $ImageName = $request->exam_type.'.'.Auth::user()->id. '_' . time() . '.' . $image->getClientOriginalExtension();
                                Image::make($image)->save('uploads/student/exambooking/' . $ImageName);
                                $update=CandidateConfirmation::where('id',$request->id)->update([
                                    'files' => 'uploads/student/exambooking/' . $ImageName,
                                ]);
                                    if ($update) {
                                    $notification = array(
                                        'messege' => 'Update success!',
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
                          
                        }else{
                        
                            $photo =$request->file('fileUpload');
                            $name = Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/', $name);
                            $update=CandidateConfirmation::where('id',$request->id)->update([
                                'files' => 'uploads/student/'.$name,
                            ]);
                                if ($update) {
            $notification = array(
                'messege' => 'Update success!',
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
                    }
    }
    
    
  public function addConfirmation(Request $request){
      
       
        $myexamdate=Carbon::parse($request->exam_date)->format('d-M-Y');
            
         $insert=CandidateConfirmation::insertGetId([
            'candidate_id'=>$request->candidate_id ?? 'null',
            'booking_id'=>$request->booking_id ?? 'null',
            'exam_id'=>$request->exam_id ?? 'null',
            'subject'=>$request->subject,
            'exam_type'=>$request->exam_type,
            'exam_date'=>$myexamdate,
            'exam_time'=>$request->exam_time,
            'exam_branch'=>$request->exam_branch,
            'details'=>$request->details,
            'requirments'=>$request->requirments,
            'rescheduling'=>$request->rescheduling,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'phone'=>$request->name,
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
              
             $user=([
                
                'exam_type'=>$request->exam_type,
                'subject'=>$request->subject,
                'exam_date'=>$request->exam_date,
                'exam_time'=>$request->exam_time,
                'exam_branch'=>$request->exam_branch,
                'details'=>$request->details,
                'requirments'=>$request->requirments,
                'rescheduling'=>$request->rescheduling,
                ]);
            
            Mail::to($request->email)->send(new CandidateExamConfirmation($user));
   
           
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
   
   
   
   public function fsIndex(){
       $alldata=DB::table('functional_skill_tuition')->where('is_deleted',0)->orderBy('id','DESC')->get();
       return view('backend.FunctionalSkillTuiton.index',compact('alldata'));
   } 
   
   
    public function fsdetails($id){
       $data=DB::table('functional_skill_tuition')->where('id',$id)->first();
       return view('backend.FunctionalSkillTuiton.details',compact('data'));
   } 
   
   public function fsNotes(Request $request){
       $update=DB::table('functional_skill_tuition')->where('id',$request->id)->update([
            'notes'=>$request->notes
           ]);
        return response('update success');
   }
   
    public function fsdexport($id){
       $data=DB::table('functional_skill_tuition')->where('id',$id)->first();
       return view('backend.FunctionalSkillTuiton.exportfile',compact('data'));
   } 
   
   
   
    public function fsdelete($id){
       $data=DB::table('functional_skill_tuition')->where('id',$id)->update([
           'is_deleted'=>1,
        ]);
        if($data){
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
    
    
    
    
    
    public function SeriesAllBooking($id){
        
        $series=DB::table('examessuedates')->where('id',$id)->select(['exam_name','id'])->first();
        $alldata=ExamRequest::where('exam_series',$id)->where('is_deleted',1)->orderBy('id','DESC')->where('is_completed_from',1)->get();
        return view('backend.seriesExam.index',compact('alldata','series'));
        
    }
    
    
    public function  Installments(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('is_Installment',1)->where('is_completed_from',1)->where('is_deleted',1)->where('is_apps_booking',0)->get();
        return view('backend.InstallmentCandidate.index',compact('alldata'));
    }
    
    public function paymentDetails($id){
          $data=ExamRequest::where('id',$id)->first();
         return view('backend.InstallmentCandidate.payment',compact('data'));
    }
    
    public function UpdatePaymentDetails(Request $request){
       $update=ExamRequest::where('id',$request->id)->update([
           'Installment_fee'=>$request->Installment_fee,
           'is_Installment'=>$request->is_Installment,
           'first_installment_date'=>$request->first_installment_date,
           'second_installment_date'=>$request->second_installment_date,
           'paid_amount'=>$request->paid_amount,
           'due_amount'=>$request->due_amount,
           'discount_amount'=>$request->discount_amount,
           'admin_specialaccess_amount'=>$request->admin_specialaccess_amount,
        ]);
          if($update){
        $notification = array(
                'messege' => 'Update success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function paymentVerified($id){
        $update=Wallet::where('id',$id)->update([
                'is_verified'=>1
            ]);
        if($update){
        $notification = array(
                'messege' => 'Update success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
     public function paymentUnverified($id){
         $update=Wallet::where('id',$id)->update([
                'is_verified'=>0
            ]);
        if($update){
        $notification = array(
                'messege' => 'Update success!',
                'alert-type' => 'success'
            );
            
            
            return redirect()->back()->with($notification);
            
            
            
            
        } else {
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
     public function paymentDelete($id){
         $update=Wallet::where('id',$id)->update([
                'is_deleted'=>1
            ]);
        if($update){
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
    public function fsresult($id){
        $data=ExamRequest::where('id',$id)->first();
        return view('backend.functionalskillResult.index',compact('data'));
    }
    public function printableseatingPlanGlobal(){
        return view('backend.seatingPlanGlobal.printtable');
    }
    public function certificateIndex(){
         return view('backend.certificate.certificate_issue');
    }
    
    
     public function examboard($type_id){

        
        if($type_id=='GCSE'){
            $data = [

                [
                    'id' => 'Edexcel',
                    'name' => 'Edexcel',
                ],
                [
                    'id' => 'AQA',
                    'name' => 'AQA',
                ],
                [
                    'id' => 'OCR',
                    'name' => 'OCR',
                ],
                [
                    'id' => 'Cambridge CIE',
                    'name' => 'Cambridge CIE',
                ],
                [
                    'id' => 'WJEC',
                    'name' => 'WJEC',
                ],

                
            ];
            return response()->json($data);
        }

        if($type_id=='IGCSE'){
            $data = [

                [
                    'id' => 'Edexcel',
                    'name' => 'Edexcel',
                ],
              
                [
                    'id' => 'Cambridge CIE',
                    'name' => 'Cambridge CIE',
                ],
              

                
            ];
            return response()->json($data);
        }
        if($type_id=='A Level'){
            $data = [

                [
                    'id' => 'Edexcel',
                    'name' => 'Edexcel',
                ],
                [
                    'id' => 'AQA',
                    'name' => 'AQA',
                ],
                [
                    'id' => 'OCR',
                    'name' => 'OCR',
                ],
                [
                    'id' => 'Cambridge CIE',
                    'name' => 'Cambridge CIE',
                ],
                [
                    'id' => 'WJEC',
                    'name' => 'WJEC',
                ],

                
            ];
            return response()->json($data);
        }
        if($type_id=='AS Level'){
            $data = [

                [
                    'id' => 'Edexcel',
                    'name' => 'Edexcel',
                ],
                  [
                    'id' => 'OCR',
                    'name' => 'OCR',
                ],
                [
                    'id' => 'AQA',
                    'name' => 'AQA',
                ],
                [
                    'id' => 'Cambridge CIE',
                    'name' => 'Cambridge CIE',
                ],
                [
                    'id' => 'WJEC',
                    'name' => 'WJEC',
                ],

                
            ];
            return response()->json($data);
        }
        if($type_id=='ACCA'){
            $data = [

                [
                    'id' => 'ACCA',
                    'name' => 'ACCA',
                ],
                
            ];
            return response()->json($data);
        }
        if($type_id=='AAT'){
            $data = [
                
                [
                    'id' => 'AAT',
                    'name' => 'AAT',
                ],
            ];
            return response()->json($data);
        }
        if($type_id=='Functional Skills'){
            $data = [
            [
                'id' => 'Functional Skills',
                'name' => 'Functional Skills',
            ],
            ];
            return response()->json($data);
        }
    }



    public function getSubjectexamboard($type_id,$series_id,$series_main){
        
        

        if($series_id=='GCSE'){
            
            $examseries=Examessuedate::where('exam_name',$series_main)->first();
            if($examseries->exam_type==1){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_deleted',0)->where('january_availability',1)->get();
                return response()->json($data);
            }
            if($examseries->exam_type==2){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_deleted',0)->where('june_availability',1)->get();
                return response()->json($data);
            }
             if($examseries->exam_type==3){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_deleted',0)->where('november_availability',1)->get();
                return response()->json($data);
            }
            
              if($examseries->exam_type==4){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_deleted',0)->where('november_cie_availability',1)->get();
                return response()->json($data);
            }
             
                // $data=Subject::where('exam_type','GCSE')->where('exam_board',$type_id)->where('is_deleted',0)->get();
                // return response()->json($data);
            
            
        }
        if($series_id=='IGCSE'){
            $examseries=Examessuedate::where('exam_name',$series_main)->first();
                if($examseries->exam_type==1){
                    $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_deleted',0)->where('january_availability',1)->get();
                    return response()->json($data);
                }
                if($examseries->exam_type==2){
                    $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_deleted',0)->where('june_availability',1)->get();
                    return response()->json($data);
                }
                 if($examseries->exam_type==3){
                    $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_deleted',0)->where('november_availability',1)->get();
                    return response()->json($data);
                }
                  if($examseries->exam_type==4){
                    $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_deleted',0)->where('november_cie_availability',1)->get();
                    return response()->json($data);
                }
            
            // $data=Subject::where('exam_type','IGCSE')->where('exam_board',$type_id)->where('is_deleted',0)->get();
            // return response()->json($data);
        }
        if($series_id=='A Level'){
            $examseries=Examessuedate::where('exam_name',$series_main)->first();
            if($examseries->exam_type==1){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('january_availability',1)->get();
                return response()->json($data);
            }
            if($examseries->exam_type==2){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('june_availability',1)->get();
                return response()->json($data);
            }
             if($examseries->exam_type==3){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('november_availability',1)->get();
                return response()->json($data);
            }
             if($examseries->exam_type==4){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('november_cie_availability',1)->get();
                return response()->json($data);
            }
            // $data=Subject::where('exam_type','A Level')->where('exam_board',$type_id)->where('is_deleted',0)->get();
            // return response()->json($data);
        }
        if($series_id=='AS Level'){
            // $data=Subject::where('exam_type','AS Level')->where('exam_board',$type_id)->where('is_deleted',0)->get();
            // return response()->json($data);
             $examseries=Examessuedate::where('exam_name',$series_main)->first();
            if($examseries->exam_type==1){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('january_availability',1)->get();
                return response()->json($data);
            }
            if($examseries->exam_type==2){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('june_availability',1)->get();
                return response()->json($data);
            }
             if($examseries->exam_type==3){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('november_availability',1)->get();
                return response()->json($data);
            }
              if($examseries->exam_type==4){
                $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('november_cie_availability',1)->get();
                return response()->json($data);
            }
        }
        if($series_id=='ACCA'){
            $data=Subject::where('exam_type','ACCA')->where('is_deleted',0)->get();
            return response()->json($data);
        }
        if($series_id=='AAT'){
            $data=Subject::where('exam_type','AAT')->where('is_deleted',0)->get();
            return response()->json($data);
        }
        if($series_id=='Functional Skills'){
            $data=Subject::where('exam_type','Functional Skills')->where('is_deleted',0)->get();
            return response()->json($data);
        }

    }


    public function getIndividualSubjectexamboard($type_id,$series_main){
     
        
        // if($series_main=='AAT'){
        //     $data=Subject::where('id',$type_id)->where('is_deleted',0)->first();
        //     return response()->json($data);
        // }
        // elseif($series_main=='ACCA'){
        //     $data=Subject::where('id',$type_id)->where('is_deleted',0)->first();
        //     return response()->json($data);
        // }
        // elseif($series_main=='Functional Skills'){
        //     $data=Subject::where('id',$type_id)->where('is_deleted',0)->first();
        //     return response()->json($data);
        // }else{
        //       $examseries=DB::table('examessuedates')->where('name',$series_main)->first();
               
        // }
        


if (in_array($series_main, ['AAT', 'ACCA', 'Functional Skills'])) {
    // Directly return subject data for these series
    $data = Subject::where('id', $type_id)
        ->where('is_deleted', 0)
        ->first();

       return response()->json([
 
        'applicable_fee' => $data.exam_fees,
    
    ]);
        
} else {
    // Fetch exam series and subject data
    $examseries = DB::table('examessuedates')
        ->where('exam_name', $series_main)
        ->first();

    $subject = Subject::where('id', $type_id)
        ->where('is_deleted', 0)
        ->first();

    if (!$examseries || !$subject) {
        return response()->json(['error' => 'Data not found'], 404);
    }

    // আজকের তারিখ
    $today = Carbon::today();

    // --- Parse deadlines safely ---
    try {
        // Change the format if your DB stores dates differently (e.g., 'd/m/Y')
        $entryDateline = Carbon::parse($examseries->entry_dateline);
        $lateFeesDeadline = Carbon::parse($examseries->entry_latefees);
        $highLateFeesDeadline = Carbon::parse($examseries->entry_highlatefees);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Invalid date format in database',
            'details' => $e->getMessage(),
            'raw_dates' => [
                'entry_dateline' => $examseries->entry_dateline,
                'late_fees_deadline' => $examseries->entry_latefees,
                'high_late_fees_deadline' => $examseries->entry_highlatefees,
            ]
        ], 400);
    }

    // --- Debug values (remove after testing) ---
    // return response()->json([
    //     'today' => $today->toDateString(),
    //     'entry_dateline' => $entryDateline->toDateString(),
    //     'late_fees_deadline' => $lateFeesDeadline->toDateString(),
    //     'high_late_fees_deadline' => $highLateFeesDeadline->toDateString(),
    // ]);

    // --- Fee calculation ---
    if ($today->lessThanOrEqualTo($entryDateline) || $today->isSameDay($entryDateline)) {
        $fee = $subject->exam_fees; // স্বাভাবিক ফি
    } elseif ($today->lessThanOrEqualTo($lateFeesDeadline) || $today->isSameDay($lateFeesDeadline)) {
        $fee = $subject->late_fees; // লেট ফি
    } elseif ($today->greaterThanOrEqualTo($highLateFeesDeadline) || $today->isSameDay($highLateFeesDeadline)) {
        $fee = $subject->high_late_fees; // হাই লেট ফি
    } else {
        $fee = null; // ডেডলাইন পেরিয়ে গেলে
    }

    return response()->json([
        'subject' => $subject,
        'examseries' => $examseries,
        'applicable_fee' => $fee,
        'debug_dates' => [ // helpful during testing—remove later
            'today' => $today->toDateString(),
            'entry' => $entryDateline->toDateString(),
            'late' => $lateFeesDeadline->toDateString(),
            'high_late' => $highLateFeesDeadline->toDateString(),
        ]
    ]);
}
 
        
   
    
    }
    
    
    

    public function couponInsert(Request $request){

        $main_amount=ExamRequest::where('booking_id',$request->booking_id)->select(['user_id','id','total_amount','coupon_used','coupon_code','discount_amount'])->first();
        if($main_amount->coupon_used==1){

            // return response()->json("already_used");

            $notification = array(
                'messege' => 'Already Used this Coupon!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        

        }else{



            $coupon=Cupon::first();

            if($coupon->custom_cupon_code==$request->cupon_code){

                if($coupon->custom_cupon_status==1){

                    $discount_amount=$main_amount->total_amount * ($coupon->custom_cupon_percent/100);
                    $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                        'coupon_used'=>1,
                        'coupon_code'=>$request->cupon_code,
                        'discount_amount'=>$discount_amount,
                    ]);
                    $notification = array(
                        'messege' => 'Add success!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);

                }else{
                    $notification = array(
                        'messege' => 'Coupon Not Found!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                    // return response()->json("cupon_not_found");

                }


            }elseif($coupon->global_cupon_code==$request->cupon_code){

                 if($coupon->global_cupon_status==1){

                    $discount_amount=$main_amount->total_amount * ($coupon->global_cupon_percent/100);
                    $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                        'coupon_used'=>1,
                        'coupon_code'=>$request->cupon_code,
                        'discount_amount'=>$discount_amount,
                    ]);
                    // return response()->json("success");
                    $notification = array(
                        'messege' => 'Add success!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);

                }else{

                    $notification = array(
                        'messege' => 'Coupon Not Found!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);

                }
            }else{
                $notification = array(
                    'messege' => 'Coupon Not Found!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

                    
        }
        


    }


    public function discountUpdate(Request $request){

        $update=ExamRequest::where('id',$request->id)->update([
            
            'discount_amount'=>$request->discount_amount,
        ]);
        if($update){
            $notification = array(
                'messege' => 'Update success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{

            $notification = array(
                'messege' => 'Update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }

    public function photoIdUpdate(Request $request){

            
                if ($request->hasFile('photo_id')) {
                    $photo =$request->file('photo_id');
                    $name = 'photo_id'.time().'.'.$photo->getClientOriginalExtension();
                    $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                    $update=ExamRequest::where('id', $request->id)->update([
                        'photo_id' => 'uploads/student/exambooking/'.$name,
                    ]);
                    if($update){
                        $notification = array(
                            'messege' => 'Update success!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
            
                    }else{
            
                        $notification = array(
                            'messege' => 'Update Faild!',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
            
                    }
                }else{
            
                    $notification = array(
                        'messege' => 'Faild!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
        
                }

    }
    public function recentPhotoUpdate(Request $request){

        if ($request->hasFile('recent_photo')) {
            $photo =$request->file('recent_photo');
            $name = 'recent_photo'.time().'.'.$photo->getClientOriginalExtension();
            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
            $update=ExamRequest::where('id', $request->id)->update([
                'recent_photo' => 'uploads/student/exambooking/'.$name,
            ]);
            if($update){
                $notification = array(
                    'messege' => 'Update success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    
            }else{
    
                $notification = array(
                    'messege' => 'Update Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
    
            }
        }else{
    
            $notification = array(
                'messege' => 'Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }
    
    
    public function examtimetablesCreate(){
        $examseries=DB::table('examessuedates')->where('is_active',1)->where('is_deleted',0)->get();
        return view('backend.examtimetable.create',compact('examseries'));
    }
    
    public function examtimetablesSubmit(Request $request){
        
        $insert=DB::table('examtimetables')->insertGetId([
                'exam_series'=>$request->exam_series,
                'exam_type'=>$request->exam_type,
                'exam_board'=>$request->exam_board,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            
            
            if ($request->hasFile('filepdf')) {
                $photo =$request->file('filepdf');
                $name = 'Exam_timetables_'.time().'.'.$photo->getClientOriginalExtension();
                $newfile =$photo->move('uploads/', $name);
                $update=DB::table('examtimetables')->where('id', $insert)->update([
                    'filepdf' => 'uploads/'.$name,
                ]);
                
            }
              if($insert){
                $notification = array(
                    'messege' => 'Insert success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    
            }else{
    
                $notification = array(
                    'messege' => 'Insert Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
    
            }
    }
    
    
    
    public function examtimetablesIndex(){
        $alldata=DB::table('examtimetables')->get();
        return view('backend.examtimetable.index',compact('alldata'));
    }
    
    public function examtimetablesActive($id){
        $insert=DB::table('examtimetables')->where('id',$id)->update([
                'is_active'=>1,
            ]);
           
              if($insert){
                $notification = array(
                    'messege' => 'Update success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    
            }else{
    
                $notification = array(
                    'messege' => 'Update Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
    
            }
    }
    
    
      public function examtimetablesDeactive($id){
        $insert=DB::table('examtimetables')->where('id',$id)->update([
                'is_active'=>0,
            ]);
           
              if($insert){
                $notification = array(
                    'messege' => 'Update success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    
            }else{
    
                $notification = array(
                    'messege' => 'Update Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
    
            }
    }
    
     public function examtimetablesDelete($id){
        $insert=DB::table('examtimetables')->where('id',$id)->delete();
           
              if($insert){
                $notification = array(
                    'messege' => 'Delete success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    
            }else{
    
                $notification = array(
                    'messege' => 'Delete Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
    
            }
    }
    
    
    
    public function examtimetablesEdit($id){
        $data=DB::table('examtimetables')->where('id',$id)->first();
        $examseries=DB::table('examessuedates')->where('is_active',1)->where('is_deleted',0)->get();
            return view('backend.examtimetable.update',compact('data','examseries'));
           
    }
    
    
    public function examtimetablesUpdate(Request $request){
        $insert=DB::table('examtimetables')->where('id',$request->id)->update([
                'exam_series'=>$request->exam_series,
                'exam_type'=>$request->exam_type,
                'exam_board'=>$request->exam_board,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
            
            
            if ($request->hasFile('filepdf')) {
                $photo =$request->file('filepdf');
                $name = 'Exam_timetables_'.time().'.'.$photo->getClientOriginalExtension();
                $newfile =$photo->move('uploads/', $name);
                $update=DB::table('examtimetables')->where('id', $insert)->update([
                    'filepdf' => 'uploads/'.$name,
                ]);
                
            }
              if($insert){
                $notification = array(
                    'messege' => 'Update success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
    
            }else{
    
                $notification = array(
                    'messege' => 'Update Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
    
            }
    }
    
    // exam equipment  index
    
    public function equipmentIndex(){
        $alldata=DB::table('examequipment')->get();
        return view('backend.examequipment.index',compact('alldata'));
    }
    
    // exam equipment create
    public function equipmentCreate(){
       $allsubject=Subject::where('exam_type','GCSE')->where('exam_board','Edexcel')->where('is_deleted',0)->select(['id','subject_name','unit_code'])->get();
        return view('backend.examequipment.create',compact('allsubject'));
    }
     // exam equipment Store
    public function equipmentStore(Request $request){
        
        $insert=DB::table('examequipment')->insertGetId([
            'exam_type'=>$request->exam_type,
            'exam_board'=>$request->exam_board,
            'subject_id'=>$request->subject_name,
            'paper'=>$request->paper,
            'option_code'=>$request->option_code,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
            $option_code = array();
        if ($request->has('description')) {
            foreach ($request->description as $key => $no) {
                
                $item['description'] = $request->description[$key];
                array_push($option_code, $item);
            }
            $update=DB::table('examequipment')->where('id',$insert)->update([
                'equipment_details'=>json_encode($option_code),
            ]);
        }
       if($insert) {
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Insert Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function equipmentUpdate(Request $request){
        $insert=DB::table('examequipment')->where('id',$request->id)->update([
            'exam_type'=>$request->exam_type,
            'exam_board'=>$request->exam_board,
            'subject_id'=>$request->subject_name,
            'paper'=>$request->paper,
            'option_code'=>$request->option_code,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
            $option_code = array();
        if ($request->has('description')) {
            foreach ($request->description as $key => $no) {
                
                $item['description'] = $request->description[$key];
                array_push($option_code, $item);
            }
            $update=DB::table('examequipment')->where('id',$request->id)->update([
                'equipment_details'=>json_encode($option_code),
            ]);
        }
       if($insert) {
            $notification = array(
                'messege' => 'update success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'update Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    
    public function equipmentGetSubject($type_id,$exam_board){
       
           $data=Subject::where('exam_type',$type_id)->where('exam_board',$exam_board)->where('is_deleted',0)->select(['id','subject_name','unit_code'])->get();
           return response()->json($data);
    }
    
    public function equipmentEdit($id){
     $edit=DB::table('examequipment')->where('id',$id)->first();
      return view('backend.examequipment.update',compact('edit'));
    }
    public function equipmentDelete($id){
     $Delete=DB::table('examequipment')->where('id',$id)->Delete();
      if($Delete) {
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
    
    public function topicCreate(){
        return view('backend.supports.topiccreate');
    }
    
    public function topicStore(Request $request){
        $insert=DB::table('supportTopics')->insert([
            'title'=>$request->title,
            'notes'=>$request->notes,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert) {
            $notification = array(
                'messege' => 'Insert success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Insert Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function topicIndex(){
        $allData=DB::table('supportTopics')->get();
        return view('backend.supports.topicIndex',compact('allData'));
    }
    
    public function mailExport($id){
        $message=DB::table('supports_inquiry')->where('id',$id)->first();
        return view('backend.supports.supportmailexpoert',compact('message'));
    }
    
    // 
 
       public function supportsTopicSearch(Request $request)
    {
        $query = $request->input('query'); // Get the search query
    
        $results = DB::table('supportTopics')->where('title', 'LIKE', "%{$query}%")->get();

        return view('backend.supports.ajaxSearch',compact('results')); 
    }
   
   public function messageList($id){
       $support=DB::table('supports_inquiry')->where('support_id',$id)->first();
       $alldata=DB::table('support_message')->where('support_id',$id)->get();
       $update=DB::table('supports_inquiry')->where('support_id',$id)->update([
                'is_seen'=>1
           ]);
    return view('backend.supports.supportmessage',compact('alldata','support'));
   }
   
   public function examBookingList($id){
     $message=DB::table('supports_inquiry')->where('id',$id)->first();
  
    //  $alldata=ExamRequest::orderBy('id','DESC')->where('email',$message->email)->where('is_completed_from',1)->where('is_deleted',1)->where('is_apps_booking',0)->select(['id','first_payment_alert','first_payment_date','second_payment_alert','second_payment_date','main_exam_type','booking_id','first_name','middle_name','last_name','email','phone','is_seen','is_confirm_booking','is_refunded','Candidate_number','is_withdrawn','created_at','payment_option','is_need_pay_sp_fee','enable_pay','is_paid','exam_series','notes'])->limit(1500)->get();
    	
       $alldata = DB::table('exam_requests')
    ->join('supports_inquiry', 'exam_requests.email', '=', 'supports_inquiry.email')
    ->where('supports_inquiry.id', $id)
    ->where('exam_requests.is_completed_from', 1)
    ->where('exam_requests.is_deleted', 1)
    ->where('exam_requests.is_apps_booking', 0)
    ->select([
        'exam_requests.id',
        'exam_requests.first_payment_alert',
        'exam_requests.first_payment_date',
        'exam_requests.second_payment_alert',
        'exam_requests.second_payment_date',
        'exam_requests.main_exam_type',
        'exam_requests.booking_id',
        'exam_requests.first_name',
        'exam_requests.middle_name',
        'exam_requests.last_name',
        'exam_requests.email',
        'exam_requests.phone',
        'exam_requests.is_seen',
        'exam_requests.is_confirm_booking',
        'exam_requests.is_refunded',
        'exam_requests.Candidate_number',
        'exam_requests.is_withdrawn',
        'exam_requests.created_at',
        'exam_requests.payment_option',
        'exam_requests.is_need_pay_sp_fee',
        'exam_requests.enable_pay',
        'exam_requests.is_paid',
        'exam_requests.exam_series',
        'exam_requests.notes'
    ])
    ->orderBy('exam_requests.id', 'DESC')
    ->limit(1500)
    ->get();
      return view('backend.supports.supportexambooking',compact('alldata'));
   }
   
   
   public function messageListSubmit(Request $request){
   

        $insert=DB::table('support_message')->insert([
            'sender_type'=>1,
            'support_id'=>$request->support_id,
            'message'=>$request->cutomer_reply,
            'is_seen'=>1,
            'reply_admin'=>Auth::user()->first_name,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        $allsupports=DB::table('support_message')->where('support_id',$request->support_id)->get();
        foreach($allsupports as $supports){
            DB::table('support_message')->where('id',$supports->id)->update([
                    'is_seen'=>1
               ]);
        }
        
       if($insert){
           $update=DB::table('supports_inquiry')->where('support_id',$request->support_id)->update([
                    'is_reply'=>1
               ]);
              $message = [
                  
                'name' => $request->name,
                'email' => $request->email,
                'support_id' => $request->support_id,
            ];
            
            Mail::to($request->email)->send(new SuuportReplyMessageMail($message));
            $notification = array(
                'messege' => 'success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            
        }else{
             $notification = array(
                'messege' => 'success!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          
        }
   }
   
   //
   
   public function isebPayments($id){
      // return $request;
       $upadte=DB::table('iseb_exams')->where('id',$id)->update([
            'is_paid_verify'=>1,
           ]);
         if($upadte){
       $notification = array(
                'messege' => 'success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            
        }else{
             $notification = array(
                'messege' => 'success!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          
        }
   }
   
//   
        public function mainisebPayments(Request $request){
            
        return $request;
            
        }
   
    //  iseb index
    public function isebIndex(){
        $alldata=DB::table('iseb_exams')->where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.isebrequest.index',compact('alldata'));
    }
    
        //  iseb destails
    public function isebDetails($id){
         $data=DB::table('iseb_exams')->where('id',$id)->orderBy('id','DESC')->first();
         $update=DB::table('iseb_exams')->where('id',$id)->update([
                'is_seen'=>1,
                
             ]);
        return view('backend.isebrequest.details',compact('data'));
    }
    
    
       public function isebexport($id){
         $data=DB::table('iseb_exams')->where('id',$id)->orderBy('id','DESC')->first();
        return view('backend.isebrequest.export',compact('data'));
    }
    
    
    public function isebdelete($id){
        $delete=DB::table('iseb_exams')->where('id',$id)->update([
            'is_deleted'=>1,
            ]);
        if($delete){
            $notification = array(
                'messege' => 'success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            
        }else{
             $notification = array(
                'messege' => 'success!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }
    
    public function isebConfirmation($id){
        $data=DB::table('iseb_exams')->where('id',$id)->orderBy('id','DESC')->first();
        return view('backend.isebrequest.confirmation',compact('data'));
    }
    
    // 
    public function isebConfirmationSubmit(Request $request){
                  
       
        $insert=CandidateConfirmation::insertGetId([
            'candidate_id'=>$request->candidate_id,
            'booking_id'=>$request->booking_id,
            'exam_id'=>$request->exam_id,
            'is_mock'=>1,
            'subject'=>$request->subject,
            'exam_date'=>$request->exam_date,
            'exam_time'=>$request->exam_time,
            'exam_type'=>$request->exam_type,
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
             
             $updaet=DB::table('iseb_exams')->where('id',$request->exam_id)->update([
                    'is_confirmation' =>1,
                    
                 ]);
             
            $insert_id=CandidateConfirmation::where('id',$insert)->first();
             $user=([
                'candidate_id'=>$request->candidate_id,
                'booking_id'=>$request->booking_id,
                'exam_id'=>$request->exam_id,
                'exam_type'=>$request->exam_type,
                'is_mock'=>1,
                'subject'=>$request->subject,
                'exam_date'=>$request->exam_date,
                'exam_time'=>$request->exam_time,
                'exam_branch'=>$request->exam_branch,
                'details'=>$request->details,
                'requirments'=>$request->requirments,
                'rescheduling'=>$request->rescheduling,
                'confirm_id'=>$insert_id->id,
                'mock_exam_details'=>$insert_id->mock_exam_details
                ]);
            
            Mail::to($request->email)->send(new CandidateIESBExamConfirmation($user));
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
    
    public function supportsFirstPaymentalert(){
   $todayDate = Carbon::now()->subDay()->format('Y-m-d');
$allUser = DB::table('supports_inquiry')
    ->leftJoin('exam_requests', function($join) {
        $join->on('supports_inquiry.email', '=', 'exam_requests.email')
            ->where('exam_requests.is_completed_from', 1)
            ->where('exam_requests.is_deleted', 1)
            ->where('exam_requests.is_apps_booking', 0);
    })
    ->select([
        'supports_inquiry.*', 
        DB::raw('COUNT(exam_requests.id) as exam_request_count'),
    ])
    ->where('supports_inquiry.is_deleted', 0)
    ->whereDate('supports_inquiry.created_at', $todayDate)  // Compare only the date
    ->where('supports_inquiry.first_payment_alert', 0)
    ->where('supports_inquiry.is_save_draft', 0)
    ->groupBy('supports_inquiry.id')
    ->orderBy('supports_inquiry.id', 'DESC')
    ->havingRaw('COUNT(exam_requests.id) = 0')  // Ensuring no matching exam_requests
    ->get();



        
     
 
    
    foreach($allUser as $user){
            $update=DB::table('supports_inquiry')->where('id',$user->id)->update([
                'first_payment_alert'=>1,
                'first_payment_date'=>Carbon::now()->toDateTimeString(),
                'first_payment_sender'=>Auth::user()->name,
            ]);
                
             
              $message = [
                'name' => $user->name,
                'email' => $user->email,
                
            ];
            Mail::to($user->email)->send(new MainStundentFirstPaymentAlert($message));

        }
    
        $notification = array(
                'messege' => ' Mail Send Success!',
                    'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
    }
    public function supportsSecondPaymentalert(){
        
$todayDate = Carbon::now()->subDays(5)->format('Y-m-d');
$allUser = DB::table('supports_inquiry')
    ->leftJoin('exam_requests', function($join) {
        $join->on('supports_inquiry.email', '=', 'exam_requests.email')
            ->where('exam_requests.is_completed_from', 1)
            ->where('exam_requests.is_deleted', 1)
            ->where('exam_requests.is_apps_booking', 0);
    })
    ->select([
        'supports_inquiry.*', 
        DB::raw('COUNT(exam_requests.id) as exam_request_count'),
    ])
    ->where('supports_inquiry.is_deleted', 0)
    ->whereDate('supports_inquiry.created_at', $todayDate)  // Compare only the date
    ->where('supports_inquiry.second_payment_alert', 0)
    ->where('supports_inquiry.is_save_draft', 0)
    ->groupBy('supports_inquiry.id')
    ->orderBy('supports_inquiry.id', 'DESC')
    ->havingRaw('COUNT(exam_requests.id) = 0')  // Ensuring no matching exam_requests
    ->get();



    foreach($allUser as $user){
            $update=DB::table('supports_inquiry')->where('id',$user->id)->update([
               'second_payment_alert'=>1,
                'second_payment_date'=>Carbon::now()->toDateTimeString(),
                'second_alert_sender'=>Auth::user()->name,
            ]);
                
             
              $message = [
                'name' => $user->name,
                'email' => $user->email,
                
            ];
            Mail::to($user->email)->send(new MainStundentSecondPaymentAlert($message));

        }
    
        $notification = array(
                'messege' => ' Mail Send Success!',
                    'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
        
    
        
    }
    
    public function recordsConfirmation(Request $request){
            $exam_id = $request->input('exam_id');
            $status = $request->input('status');
        
            $updated = CandidateConfirmation::where('id', $exam_id)->update([
                'attend_records' => $status,
                'records_updated_by' => Auth::user()->id,
                'records_updated_name' => Auth::user()->first_name,
            ]);
        
            return response()->json([
                'success' => $updated ? true : false,  // Check if the update was successful
                'exam_id' => $exam_id,
                'status' => $status
            ]);
    }
    
    
    public function supportsNotesUpdate(Request $request){

        $update=DB::table('supports_inquiry')->where('id',$request->id)->update([
            'admin_notes'=>$request->val,
        ]);
           if($update){
            return response('success');
        }else{
             return response('faild');
        }
        
        
    
    }
    

}
