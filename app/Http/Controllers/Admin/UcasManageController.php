<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UcasRequest;
use App\Models\CandidateConfirmation;
use App\Mail\ucasConfirmationDelete;
use App\Mail\GradeSendMail;
use App\Mail\CandidateMockExamConfirmation;
use Carbon\Carbon;
use Auth;
use App\Models\Wallet;
use PDF;
use Mail;
use DB;


class UcasManageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function indexPredicted($id){
        $data=UcasRequest::where('is_deleted',0)->where('id',$id)->first();
        return view('backend.ucas.predicted',compact('data'));
    }
    
    
    public function indexPredictedDelete($id){
        $delete=DB::table('gradesrecords')->where('id',$id)->update([
                
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
                'messege' => 'Delete success!',
                'alert-type' => 'success'
            );
            
            
            return redirect()->back()->with($notification);
            
            
        }
    }
    
    
public function indexPredictedSend($id)
    {
        // Fetch grade records by UCAS ID where not deleted
        $data = DB::table('gradesrecords')
            ->where('ucas_id', $id)
            ->where('is_deleted', 0)
            ->get();

        if ($data->isEmpty()) {
            return back()->with('error', 'No grade records found.');
        }

        // Assuming all records have the same student email
        $email = $data->first()->email;

        // Send mail
        Mail::to($email)->send(new GradeSendMail($data));

        $update= DB::table('ucas_requests')
            ->where('id', $id)
            ->update([
                'is_predicted_send'=>1
                ]);
        

       $notification = array(
                    'messege' => 'Uploads success!',
                    'alert-type' => 'success'
                );
                
                
                return redirect()->back()->with($notification);
    }
    
    public function indexPredictedConfirmation(Request $request){
        $insert=DB::table('gradesrecords')->insertGetId([
                
                'booking_id'=>$request->booking_id,
                'ucas_id'=>$request->exam_id,
                'email'=>$request->email,
                'papers_name'=>$request->papers_name,
                'grades'=>$request->grades,
                'created_by'=>Auth::user()->id,
                'created_at'=>Carbon::now()->toDateTimeString(),
            
            ]);
        if($insert){
                $notification = array(
                    'messege' => 'Uploads success!',
                    'alert-type' => 'success'
                );
                
                
                return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Uploads Failed!',
                'alert-type' => 'success'
            );
            
            
            return redirect()->back()->with($notification);
            
            
        }
        
    }
    
    
    public function ucasConfirmationDelete($id){
        $delete=CandidateConfirmation::where('id',$id)->delete();
        if($delete){
                $notification = array(
                    'messege' => 'Delete success!',
                    'alert-type' => 'success'
                );
                
                
                return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Delete success!',
                'alert-type' => 'success'
            );
            
            
            return redirect()->back()->with($notification);
            
            
        }
        
    }
    public function ucasDateManage(){
        
        return view('backend.ucas.datemanage');
    }
    public function ucasDateactive($id){
          $update=DB::table('weekday_name')->where('id',$id)->update([
                    'is_active'=>1,
                
              ]);
               if($update){
                            $notification = array(
                                'messege' => 'Update success!',
                                'alert-type' => 'success'
                            );
                            
                            
                            return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
                            'messege' => 'Update success!',
                            'alert-type' => 'success'
                        );
                        
                        
                        return redirect()->back()->with($notification);
                        
                        
                    }
    }
    
    
    public function ucasDatedeactive($id){
        $update=DB::table('weekday_name')->where('id',$id)->update([
                    'is_active'=>0,
                
              ]);
               if($update){
                            $notification = array(
                                'messege' => 'Update success!',
                                'alert-type' => 'success'
                            );
                            
                            
                            return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
                            'messege' => 'Update success!',
                            'alert-type' => 'success'
                        );
                        
                        
                        return redirect()->back()->with($notification);
                        
                        
                    }
    }
    
    
    
    
    public function index(){
        $alldata=UcasRequest::where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.ucas.index',compact('alldata'));
    }
    
    public function iscompleted($id){
            $update=UcasRequest::where('id',$id)->update([
                'is_exam_completed'=>1,
             ]);
             
              if($update){
                            $notification = array(
                                'messege' => 'Update success!',
                                'alert-type' => 'success'
                            );
                            
                            
                            return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
                            'messege' => 'Update success!',
                            'alert-type' => 'success'
                        );
                        
                        
                        return redirect()->back()->with($notification);
                        
                        
                    }
    }
    
    public function iscancel($id){
            $update=UcasRequest::where('id',$id)->update([
                'is_exam_completed'=>2,
             ]);
             
              if($update){
                            $notification = array(
                                'messege' => 'Update success!',
                                'alert-type' => 'success'
                            );
                            
                            
                            return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
                            'messege' => 'Update success!',
                            'alert-type' => 'success'
                        );
                        
                        
                        return redirect()->back()->with($notification);
                        
                        
                    }
    }
    
     public function details($id){
        $data=UcasRequest::where('id',$id)->first();
         $update=UcasRequest::where('id',$id)->update([
                'is_seen'=>1,
             ]);
        
        return view('backend.ucas.details',compact('data'));
    }
    
        public function basicInformationupdate(Request $request){

            $update=UcasRequest::where('id',$request->id)->update([
                'first_name'=>$request->first_name,
                'middle_name'=>$request->middle_name,
                'last_name'=>$request->last_name,
                'city'=>$request->city,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address_line_one'=>$request->address_line_one,
                'address_line_two'=>$request->address_line_two,
                'date_of_birth'=>$request->date_of_birth,
                'post_code'=>$request->post_code,
                'gender'=>$request->gender,
                'emergency_contact_number'=>$request->emergency_contact_number,
                
            ]);
              if($update){
                return response("Update success");
            }else{
                return response("Update Faild");
            }

    }
    
    public function paymentUpdate(Request $request){
              $validated = $request->validate([
                'paid_amount' => 'required',
            ]);
            $check=UcasRequest::where('ucas_booking_id',$request->booking_id)->select(['paid_amount','id','ucas_booking_id','user_id'])->first();
            
            if($check){

                $paid_amount=$check->paid_amount;

                $Walletinsert=Wallet::insert([
                    'order_id'=>$request->booking_id,
                    'user_id'=>$check->user_id,
                    'amount'=>$request->paid_amount,
                    'amount_type'=>'Dabit',
                    'paid_by'=>$request->paid_by,
                    'is_verified'=>1,
                    'transection_id'=>$request->transaction_id,
                    'date'=>Carbon::now(),
                    'created_at'=>Carbon::now()->toDateTimeString(),
                ]);

                $update=UcasRequest::where('ucas_booking_id',$request->booking_id)->update([

                    'paid_amount'=>$paid_amount + $request->paid_amount,
                    'is_paid'=>1,
                    'is_paid_verify'=>1,
                    'payment_option'=>$request->paid_by,
                    'transaction_id'=>$request->transaction_id,
                    
                ]);
                if($update){
                  
                 $maindata=UcasRequest::where('ucas_booking_id',$request->booking_id)->first();
                            $notification = array(
                                'messege' => 'Confirmation send success!',
                                'alert-type' => 'success'
                            );
                            
                            
                            return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
                            'messege' => 'Confirmation send success!',
                            'alert-type' => 'success'
                        );
                        
                        
                        return redirect()->back()->with($notification);
                        
                        
                    }



            }
    }
    
    public function delete($id){
        $delete=UcasRequest::where('id',$id)->update([
            'is_deleted'=>1,    
        ]);
         if($delete){
                   $notification = array(
                                'messege' => 'Delete  success!',
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
    
    
    public function updateapaymentstatus(Request $request){
       
          $update=UcasRequest::where('id',$request->id)->update([
                'is_paid_verify'=>$request->paid_status,
                'notes'=>$request->notes,
            ]);
            if($update){
                if($request->paid_status==1){
                    
                  UcasRequest::where('id',$request->id)->update([
                           
                            'is_paid'=>1,
                           
                        ]);
                     
                }
                return response("Update success");
            }else{
                return response("Update Faild");
            }
    }
    
    public function exportucas($id){
        // $data=UcasRequest::where('id',$id)->first();
        // return view('backend.ucas.export',compact('data'));
        
        
         $data=UcasRequest::where('id', $id)->first();
        $pdf = PDF::loadView('invoice.ucasinvoice',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
        
        return $pdf->stream();
        return $pdf->download('ucasexambooking.pdf');
        
        
        
        
    }
    public function confirmexam($id){
         $data=UcasRequest::where('id', $id)->first();
         return view('backend.ucas.confirmexambooking',compact('data'));
    }
    
    public function confirmexamSubmit(Request $request){
       
            
        $insert=CandidateConfirmation::insertGetId([
            'candidate_id'=>$request->candidate_id,
            'booking_id'=>$request->booking_id,
            'exam_id'=>$request->exam_id,
            'is_mock'=>1,
            
            'subject'=>$request->subject,
            'exam_date'=>$request->exam_date,
            'exam_time'=>$request->exam_time,
            
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            
            'exam_type'=>$request->exam_type,
            'exam_branch'=>$request->exam_branch,
            'details'=>$request->details,
            'requirments'=>$request->requirments,
            'rescheduling'=>$request->rescheduling,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        $myucasupdate=UcasRequest::where('id',$request->exam_id)->update([
                'is_confirmed'=>1
            ]);
        
        //   $exam_information = array();

        //     if ($request->has('subject')) {
               
        //         foreach ($request->subject as $key => $no) {
                  
        //             $item['subject'] = $request->subject[$key];
        //             $item['exam_date'] = $request->exam_date[$key];
        //             $item['exam_time'] = $request->exam_time[$key];
               
        //             array_push($exam_information, $item);
                   
        //                     }
                            
        //     }
        
        //  CandidateConfirmation::where('id',$insert)->update([
        //         'mock_exam_details' => json_encode($exam_information) ?? NULL,
        //     ]);
        
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
            
            Mail::to($request->email)->send(new CandidateMockExamConfirmation($user));
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
        $update=UcasRequest::where('id',$request->id)->update([
            'notes'=>$request->val,
        ]);
        return response("success");
        
    }
}
