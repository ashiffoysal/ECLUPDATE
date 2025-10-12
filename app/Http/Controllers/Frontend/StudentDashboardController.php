<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\TutoringSubject;
use App\Models\TutorComplatelesson;
use App\Models\StudentTutorRequest;
use App\Models\Studentfeedback;
use App\Models\ExamRequest;
use App\Models\UcasRequest;
use App\Models\StatementsOfEntry;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Alert;
use Image;
use PDF;

class StudentDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){

        $totalwallet=Wallet::where('user_id',Auth::user()->id)->where('is_verified',1)->where('amount_type','Dabit')->sum('amount');

        $totalbooking=ExamRequest::where('user_id',Auth::user()->id)->where('is_deleted',1)->where('is_completed_from',1)->orderBy('id','DESC')->limit(5)->get();
        return view('frontend.student.studentdashboard',compact('totalwallet','totalbooking'));

    }
    public function updatepassword(){

        return view('frontend.student.updatepassword');
        
    }

    // 
    public function updatepasswordStore(Request $request){
        
        $validatedData = $request->validate([
            'current_password' => 'required|min:6',
            'password' => 'required|min:6',
            'password_confirmation' => 'required',
        ]);
        $password = Auth::user()->password;
        $oldpass = $request->current_password;
        $newpass = $request->password;
        $confirm = $request->password_confirmation;
        if (Hash::check($oldpass, $password)) {
            if ($newpass === $confirm) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
               
                Alert::success('Success', 'Success');
                return Redirect()->back();
            } else {
                Alert::error('error', 'Faild ! Please Try Again');
                return Redirect()->back();
            }
        } else {
            Alert::error('error', 'Current Password Is Not Correct');
            return Redirect()->back();
        }
    }

    // 
    public function updateprofile(){

        return view('frontend.student.updateprofile');
        
    }


    public function updateprofileStore(Request $request){
        
        $validatedData = $request->validate([
            'first_name' => 'required',
            'phone' => 'required',
            'address_line_one' => 'required',
            'postcode' => 'required',
        ]);

        $insert=User::where('id',Auth::user()->id)->update([
            'name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'student_year'=>$request->student_year,
            'gender'=>$request->gender,
            'student_school'=>$request->school,
            'date_of_birth'=>$request->date_of_birth,
            'address'=>$request->address_line_one,
            'city'=>$request->city,
            'country'=>$request->country,
            'address_two'=>$request->address_line_two,
            'zip'=>$request->postcode,
        ]);
        // if ($request->hasFile('thumbnail_img')) {
        //     $image = $request->file('thumbnail_img');
        //     $ImageName = 'Student' . '_' . time() . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->save('uploads/student/' . $ImageName);
        //     User::where('id', Auth::user()->id)->update([
        //         'photo' => 'uploads/student/' . $ImageName,
        //     ]);
        // }
        if ($insert) {
            Alert::toast('Update Success!', 'success');
            return Redirect()->back();
        } else {
            Alert::toast('Faild ! Please Try Again','error');
            return Redirect()->back();
        }
    }
    // 
   
    // exam centre
    public function exambookinglist(){
        $alldata=ExamRequest::where('is_visible',0)->where('is_deleted',1)->where('user_id',Auth::user()->id)->where('is_completed_from',1)->orderBy('id','DESC')->paginate(10);
        return view('frontend.student.exambooking',compact('alldata'));
    }


  public function exambookingdelete($id){
        $delete=ExamRequest::where('id', $id)->update([
            'is_deleted'=>0,
        ]);
           if ($delete) {
            Alert::toast('Delete success', 'success');
             return redirect()->back();
        } else {
            Alert::toast('Something Wrong', 'error');
            return redirect()->back();
        }
    }

    public function exambookingdetails($booking_id){
        $data=ExamRequest::where('booking_id', $booking_id)->first();
        return view('frontend.student.exambookingdetails',compact('data'));
    }
    
    public function downloadsinvoice($id){
       
        $data=ExamRequest::where('booking_id', $id)->first();
        $pdf = PDF::loadView('invoice.index',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
        
        return $pdf->stream();
        return $pdf->download('myexambooking.pdf');
    }
    
    public function ucasexambookinglist(){
        $alldata=UcasRequest::where('user_id',Auth::user()->id)->where('is_deleted',0)->orderBy('id','DESC')->paginate(10);
        return view('frontend.student.ucaslist',compact('alldata'));
    }
    
     public function ucasexambookingdetails($ucas_booking_id){
        $data=UcasRequest::where('ucas_booking_id',$ucas_booking_id)->first();
        return view('frontend.student.ucasdetails',compact('data'));
    }
    
    public function ucasexambookingdelete($ucas_booking_id){
        $delete=UcasRequest::where('id',$ucas_booking_id)->update([
            'is_deleted'=>1,
        ]);
          if ($delete) {
            Alert::toast('Delete success', 'success');
             return redirect()->back();
        } else {
            Alert::toast('Something Wrong', 'error');
            return redirect()->back();
        }
    }
    
    public function ucasexambookingInvoice($ucas_booking_id){
       
        $data=UcasRequest::where('ucas_booking_id', $ucas_booking_id)->first();
        $pdf = PDF::loadView('invoice.ucasinvoice',compact('data'))->setOptions(['defaultFont' => 'sans-serif','dpi' => 150,'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,'isPhpEnabled' => true,]);
        
        return $pdf->stream();
        return $pdf->download('ucasexambooking.pdf');
    }
    
    public function statementofentry($booking_id){
        $alldata=StatementsOfEntry::where('candidate_id',Auth::user()->id)->where('booking_id',$booking_id)->get();
        return view('frontend.student.statementsofentries',compact('alldata'));
        
    }
    
    public function recentphotoUpdate(Request $request){
        
        
        if ($request->hasFile('thumbnail_img')) {
               
                        
                         $photo =$request->file('thumbnail_img');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                           $myupdate=ExamRequest::where('id',$request->exam_id)->update([
                            'recent_photo' => 'uploads/student/exambooking/' . $name,
                        ]);
                        
                        
                         if($myupdate){
                                Alert::toast('Update success', 'success');
                                return redirect()->back();
                            }else{
                                 Alert::toast('Something Wrong', 'error');
                                return redirect()->back();
                            }
                    
                }
                
                
                
        
    }
    
       
    public function photoIdUpdate(Request $request){
        
        
                if ($request->hasFile('fileUpload')) {
                            $photo =$request->file('fileUpload');
                            $name = 'photo_id'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                            $newfile =$photo->move(public_path().'/uploads/student/exambooking/', $name);
                            $myupdate=ExamRequest::where('id',$request->exam_id)->update([
                            'photo_id' => 'uploads/student/exambooking/' . $name,
                        ]);
                                
                         if($myupdate){
                                Alert::toast('Update success', 'success');
                                return redirect()->back();
                            }else{
                                 Alert::toast('Something Wrong', 'error');
                                return redirect()->back();
                            }
                     
                    }
                    
             
        
    }
    
    
    public function otheroptionupdate(Request $request){
        
        $update=ExamRequest::where('id',$request->id)->update([
                'uci'=>$request->uci,
                'uci_number'=>$request->uci_number,
                'uln'=>$request->uln,
                'uln_number'=>$request->uln_number,
                'caring_forwad'=>$request->caring_forwad,
                'caring_forwad_details'=>$request->caring_forwad_details,
                'retaking_exams'=>$request->retaking_exams,
                'retaking_exams_name'=>$request->retaking_exams_name,
        ]);
         $photos = array();
            if ($request->hasFile('photos')) {
    
                    foreach ($request->photos as $key => $photo) {
    
                        $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
                        $resizedPhoto = Image::make($photo)->save('uploads/student/exambooking/'.$photoName);
                        array_push($photos, $photoName);
    
                    }
          
                    ExamRequest::where('booking_id',$request->booking_id)->update([
                        'carring_forward_image' => json_encode($photos),
                    ]);
            }
            
            
              if($update){
                    Alert::toast('Update success', 'success');
                    return redirect()->back();
                }else{
                     Alert::toast('Something Wrong', 'error');
                    return redirect()->back();
                }
                            
        
    }



}
