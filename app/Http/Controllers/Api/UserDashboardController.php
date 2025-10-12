<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\ExamRequest;
use App\Models\UcasRequest;
use App\Models\Wallet;
use App\Models\User;
use App\Models\StatementsOfEntry;
use App\Http\Resources\statementofentry;
use Validator;
use Image;
use Hash;

class UserDashboardController extends Controller
{
    public function newlogin(){
        return response()->json('ok');
    }
    public function myProfile(){
        $data=User::where('id',Auth::user()->id)->select(['id','name','middle_name','last_name','gender','date_of_birth','email','user_type','phone','emergency_contact_number','address','address_line_two','city','zip','photo'])->first();
        $maindata=[
            
            'id'=>$data->id,
            'first_name'=>$data->name,
            'middle_name'=>$data->middle_name,
            'last_name'=>$data->last_name,
            'gender'=>$data->gender,
            'date_of_birth'=>$data->date_of_birth,
            'email'=>$data->email,
            'user_type'=>$data->user_type,
            'phone'=>$data->phone,
            'emergency_contact_number'=>$data->emergency_contact_number,
            'address'=>$data->address,
            'city'=>$data->city,
            'post_code'=>$data->zip,
            'photo'=>$data->photo,
            
            ];
         return response()->json($maindata,200);
    }
    public function profileUpdate(Request $request){
        
          $validate=Validator::make($request->all(),[
                
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                
        ]);
        if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
    
        $insert=User::where('id',Auth::user()->id)->update([
            'name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'date_of_birth'=>$request->date_of_birth,
            'address'=>$request->address,
            'city'=>$request->city,
            'country'=>$request->country,
            'address_two'=>$request->address_line_two,
            'zip'=>$request->zip,
        ]);
        
          if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $ImageName = 'Student' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', Auth::user()->id)->update([
                'photo' => 'uploads/student/' . $ImageName,
            ]);
        }
            
            if($insert){
               return response()->json('Update success',200);
            }else{
               return response()->json('Update faild',422);
            }
        
    }
    
// password update
    public function passwordUpdate(Request $request){
        
        $validate=Validator::make($request->all(),[
            
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            
        ]);
        if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
        
        
        $password = Auth::user()->password;
        $oldpass = $request->current_password;
        $newpass = $request->password;
        $confirm = $request->password_confirmation;
        if (Hash::check($oldpass, $password)) {
            if ($newpass === $confirm) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
               
                
                return response()->json('Update success',200);
            } else {
               return response()->json('New password and confirm password does not match',422);
            }
        } else {
           
            return response()->json('Current Password Is Not Correct');
        }
        
    }


// password update end
// user exam booking list 
    public function exambookingList(){
        
          $id=Auth::user()->id;
         $data=ExamRequest::where('user_id',$id)->where('is_deleted',1)->orderBy('id','DESC')->where('is_completed_from',1)->select(['id','email','total_amount','booking_id','user_id','main_exam_type','is_paid_verify','created_at'])->get();
         return response()->json($data,200);
    }
    
    public function examBookingDetails($booking_id){
        $id=Auth::user()->id;
        $data=ExamRequest::where('user_id',$id)->where('is_deleted',1)->where('is_completed_from',1)
        ->where('booking_id',$booking_id)
        ->select(['id','main_exam_type','user_id','booking_id','first_name','middle_name','last_name','email','phone','emergency_contact_number','address_line_1','address_line_2','city','postcode','date_of_birth','photo_id',
        'recent_photo','gender','uci','uci_number','uln','uln_number','exam_information','retaking_exams','retaking_exams_name','type_of_learner','caring_forwad','caring_forwad_details','carring_forward_image',
        'special_acces','special_acces_evidence','special_evidents_documents','mental_conditions','mental_condition_details','condition_disability','condition_disability_details','relationship','relation_name','signed','has_a_candidate',
        'has_a_candidate_number','is_paid','is_paid_verify','acca_registration_num','status','total_amount','paid_amount','due_amount'])
        ->first();
        if($data){
            
            return response()->json($data,200);
            
        }else{
            return response()->json("Data Not Found");
        }
        
    }
    
    public function examBookingDelete($booking_id){
        $id=Auth::user()->id;
        $data=ExamRequest::where('user_id',$id)->where('booking_id',$booking_id)->where('status',1)->where('is_paid',1)->where('is_paid_verify',1)->first();
        
        if($data){
            return response()->json("You cannot delete this data");
        }else{
            $update=ExamRequest::where('user_id',$id)->where('booking_id',$booking_id)->update([
                'is_deleted'=>0,
            ]);
             if($update){
            
                    return response()->json('Delete Success',200);
                    
                }else{
                    return response()->json("Delete faild",422);
                }
        }
        
        
        
    }
    
    
    // user statementof entry
    public function statementOfEntry(){
        $id=Auth::user()->id;
       
        $data=StatementsOfEntry::where('candidate_id',$id)->orderBy('id','DESC')->select(['booking_id','candidate_email','exam_board_name','file','uploads_date'])->get();
        if($data->count() > 0){
           return new statementofentry($data,200);
        }else{
             return response()->json("Data not found",200);
        }
        
    }
    
    
// user payment history
    public function userPaymentHistory(){
   
        $data=Wallet::where('user_id',Auth::user()->id)->orderBy('id','DESC')->where('is_verified',1)->select(['user_id','amount','paid_by','order_id','transection_id','created_at','is_verified'])->where('amount_type','Dabit')->get();
        return response()->json($data,200);
    }
    
    // user ucas list
    public function ucasExambookingList(){
        $id=Auth::user()->id;
        $data=UcasRequest::where('user_id',$id)->where('is_deleted',0)
        ->select(['user_id','first_name','middle_name','last_name','gender','phone','email','emergency_contact_number','address_line_one','address_line_two',
        'city','country','post_code','date_of_birth','mock_exam_type','exam_subject_details','review_personal_statement','application_support','application_support_details','ucas_booking_id',
        'total_subject_amount','review_statement_amount','doucment_check_amount','recent_photo','photo_id','signature','paid_amount','is_paid_verify','is_paid','created_at'])
        ->orderBy('id','DESC')->get();
        return response()->json($data,200);
    }
    
    //details
    public function ucasExambookingDetails($booking_id){
          $id=Auth::user()->id;
        $data=UcasRequest::where('user_id',$id)->where('ucas_booking_id',$booking_id)->first();
         return response()->json($data,200);
    }
    
    
    public function deleteCandidateData(Request $request){
    
        
          $validate=Validator::make($request->all(),[
            
            'password' => 'required',
           
            
        ]);
        if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
       
         $realemail=Auth::user()->email;
        $password = Auth::user()->password;
        $oldpass = $request->password;
       
        if (Hash::check($oldpass, $password)) {
         
               $alldata=ExamRequest::where('user_id',Auth::user()->id)->where('is_completed_from',1)->where('is_deleted',1)->get();
               $paymentHistory=Wallet::where('user_id',Auth::user()->id)->where('is_deleted',0)->get();
               $StatementsOfEntry=StatementsOfEntry::where('candidate_id',Auth::user()->id)->get();
                
                foreach($alldata as $data){
                    $update=ExamRequest::where('user_id',Auth::user()->id)->where('id',$data->id)->update([
                        'is_deleted'=>0,
                    ]);
                }
                foreach($paymentHistory as $pdata){
                    $updatepayment=Wallet::where('user_id',Auth::user()->id)->where('id',$pdata->id)->update([
                        'is_deleted'=>1,
                    ]);
                }
                  foreach($StatementsOfEntry as $sdata){
                      $deletstatement=StatementsOfEntry::where('candidate_id',Auth::user()->id)->where('id',$sdata->id)->delete();
                }
                
                //return response()->json($alldata);
                return response()->json('Deleted success',200);
            
        } else {
           
            return response()->json('Password Is Not Correct',400);
        }
        
        
    }
    
    
    public function deleteAccount(Request $request){
        
        if(Auth::user()){
             $validate=Validator::make($request->all(),[
            'password' => 'required',
        ]);
        if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
        
        $password = Auth::user()->password;
        $oldpass = $request->password;
        if (Hash::check($oldpass, $password)) {
         
            //   $alldata=ExamRequest::where('user_id',Auth::user()->id)->where('is_completed_from',1)->where('is_deleted',1)->get();
            //   $paymentHistory=Wallet::where('user_id',Auth::user()->id)->where('is_deleted',0)->get();
            //   $StatementsOfEntry=StatementsOfEntry::where('candidate_id',Auth::user()->id)->get();
                
            //     foreach($alldata as $data){
            //         $update=ExamRequest::where('user_id',Auth::user()->id)->where('id',$data->id)->update([
            //             'is_deleted'=>0,
            //         ]);
            //     }
            //     foreach($paymentHistory as $pdata){
            //         $updatepayment=Wallet::where('user_id',Auth::user()->id)->where('id',$pdata->id)->update([
            //             'is_deleted'=>1,
            //         ]);
            //     }
            //       foreach($StatementsOfEntry as $sdata){
            //           $deletstatement=StatementsOfEntry::where('candidate_id',Auth::user()->id)->where('id',$sdata->id)->delete();
            //     }
                $deleteUser=User::where('id',Auth::user()->id)->update([
                    'self_delete'=>1,
                ]);
                
                $request->user()->currentAccessToken()->delete();
                return response()->json([
                    'message' => 'Successfully deleted your account'
                ],200);
                //return response()->json($alldata);
                // return response()->json('Deleted success',200);
            
        } else {
           
            return response()->json([
                    'message' => 'password is incorrect'
                ],400);
        }
        }else{
             return response()->json([
                    'message' => 'your are logout.Please login'
                ],400);
        }
        
       
    }
    
    
    
}
