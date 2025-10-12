<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MockTest;
use App\Models\CandidateConfirmation;
use Carbon\Carbon;
use App\Mail\CandidateExamConfirmation;
use App\Mail\CandidateMockExamConfirmation;
use Mail;

class MockexamRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function index()
    {
      $alldata=MockTest::where('is_deleted',0)->orderBy('id','DESC')->get();
      return view('backend.examrequest.mocktestrequest',compact('alldata'));
    }
    
    public function delete($id){
        $delete=MockTest::where('id',$id)->update([
            
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
    
    public function details($id){
          $data=MockTest::where('id',$id)->first();
      return view('backend.examrequest.mockdetails',compact('data'));
    }
    
    
    public function addNotes(Request $request){
        $update=MockTest::where('id',$request->id)->update([
             'notes'=>$request->notes,
            
        ]);
        if($update){
            return response("success",201);
        }else{
             return response("faild",404);
        }
    }
    
    public function completed($id){
       $delete=MockTest::where('id',$id)->update([
            
            'is_completed'=>1, 
                
        ]);
        if ($delete) {
            $notification = array(
                'messege' => 'Exam Completed success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Exam Completed Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    public function export($id){
        
        $data=MockTest::where('id',$id)->first();
        return view('backend.examrequest.mockexport',compact('data'));
    }
    
    public function canceled($id){
        
         $delete=MockTest::where('id',$id)->update([
            
            'is_canceled'=>1, 
                
        ]);
        if ($delete) {
            $notification = array(
                'messege' => 'Cancel success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Cancel Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
         
    }
    
    
    public function mockConfirmation($id){
        $data=MockTest::where('id',$id)->first();
        return view('backend.examrequest.mockconfirmationpage',compact('data'));
    }
    
    public function mockConfirmationSubmit(Request $request){
        
      
        
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
                  MockTest::where('id',$request->exam_id)->update([
                'is_confirmed'=>1,
            ]);
           
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
    // 
    public function Mocknotes(Request $request){
        $update=MockTest::where('id',$request->id)->update([
                'notes'=>$request->val,
            ]);
         if($update){
            return response('success');
        }else{
             return response('faild');
        }
    }
}
