<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ExamRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use App\Mail\PaymentReceiptMail;
use App\Mail\BlukMessageMail;
use App\Mail\MainStundentSecondPaymentAlert;
use App\Mail\MainStundentFirstPaymentAlert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function statementdownload(){
        
    }
    
    public function StudentFirstallEmailSend(){
        
    $todayDate = Carbon::now()->subDay()->format('Y-m-d'); // Use 'Y-m-d' format for date comparison

    $allUser = DB::table('users')
        ->leftJoin('exam_requests', 'exam_requests.user_id', '=', 'users.id')
        ->whereNull('exam_requests.user_id') // Find users with no matching record in exam_requests
        ->where('users.is_deleted', 0) // Ensure 'is_deleted' is 0
        ->where('users.first_payment_alert', 0) // Ensure no payment alert has been sent
        ->whereDate('users.created_at', $todayDate) 
        ->whereIn('users.instruction_to_house', ['GCSE', 'IGCSE', 'A Level', 'AS Level'])
        ->select(['users.id','users.email','users.name'])// Compare only the date portion of 'created_at'
        ->get();
    
    foreach($allUser as $user){
            $update=User::where('id',$user->id)->update([
                'first_payment_alert'=>1,
                'first_payment_date'=>Carbon::now()->toDateTimeString(),
                'first_payment_sender'=>Auth::user()->name,
            ]);
                $userd=User::where('id',$user->id)->select(['id','name','email'])->first();
             
              $message = [
                'name' => $userd->name,
                'email' => $userd->email,
                
            ];
            Mail::to($user->email)->send(new MainStundentFirstPaymentAlert($message));

        }
    
        $notification = array(
                'messege' => ' Mail Send Success!',
                    'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
    
        
    }
    
    public function StudentSecondallEmailSend(){
        $todayDate = Carbon::now()->subDay(3)->format('Y-m-d'); // Use 'Y-m-d' format for date comparison

    $allUser = DB::table('users')
        ->leftJoin('exam_requests', 'exam_requests.user_id', '=', 'users.id')
        ->whereNull('exam_requests.user_id') // Find users with no matching record in exam_requests
        ->where('users.is_deleted', 0) // Ensure 'is_deleted' is 0
        ->where('users.second_payment_alert', 0) // Ensure no payment alert has been sent
        ->whereDate('users.created_at', $todayDate) 
        ->whereIn('users.instruction_to_house', ['GCSE', 'IGCSE', 'A Level', 'AS Level'])
        ->select(['users.id','users.email','users.name'])// Compare only the date portion of 'created_at'
        ->get();
    
    foreach($allUser as $user){
            $update=User::where('id',$user->id)->update([
               'second_payment_alert'=>1,
                'second_payment_date'=>Carbon::now()->toDateTimeString(),
                'second_alert_sender'=>Auth::user()->name,
            ]);
                $userd=User::where('id',$user->id)->select(['id','name','email'])->first();
             
              $message = [
                'name' => $userd->name,
                'email' => $userd->email,
                
            ];
            Mail::to($user->email)->send(new MainStundentSecondPaymentAlert($message));

        }
    
        $notification = array(
                'messege' => ' Mail Send Success!',
                    'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
        
    
        
           
        
    
    }
    // 
    public function bulkEmailSend(){
        $allSeries=DB::table('examessuedates')->where('is_deleted',0)->where('is_active',0)->get();
        return view('backend.bulkemail.create',compact('allSeries'));
    }
    
    public function bulkEmailSendStore(Request $request){
       
         $students=ExamRequest::where('main_exam_type',$request->exam_type)->where('exam_series',$request->exam_series)
            ->where('is_completed_from',1)
            ->where('is_confirm_booking',1)
            ->where('is_paid',1)
            ->where('is_refunded',0)
            ->where('is_withdrawn',0)
            ->where('is_deleted',1)
            ->select(['id','email','first_name'])
            ->get();
        
        

    foreach ($students as $student) {
        Mail::to($student['email'])->send(new BlukMessageMail($student['first_name'], $request['message']));
    }

        $notification = array(
                'messege' => 'Bulk Mail Send Success!',
                    'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
        
        
      
    }
    
    public function paymentReceivedIndex(){
        $allData=DB::table('payment_receipt_invoice')->orderBy('id','DESC')->get();
         return view('backend.paymentrecept.create',compact('allData'));
    }
    
    public function paymentReceivedPrint($id){
        
         $data=DB::table('payment_receipt_invoice')->where('id',$id)->first();
         return view('backend.paymentrecept.print',compact('data'));
         
    }
     public function paymentReceivedEdit($id){
        
         $data=DB::table('payment_receipt_invoice')->where('id',$id)->first();
         return view('backend.paymentrecept.update',compact('data'));
         
    }
    
    
    
    public function paymentReceivedCreate(){
        return view('backend.paymentrecept.index');
    }
    
    public function paymentReceivedStore(Request $request){
        $insert=DB::table('payment_receipt_invoice')->insertGetId([
            
                'name'=>$request->name,
                'email'=>$request->email,
                'receipt_for'=>$request->receipt_for,
                'payment_type'=>$request->payment_type,
                'date'=>$request->date,
                'no'=>$request->no,
                'total_amount'=>$request->total_amount_hidden,
                'created_by'=>Auth::user()->id,
                'tuition_fees'=>$request->tuition_fees ?? 0,
                'tuition_fees_amount'=>$request->tuition_fees_amount ?? 0,
                'admission_fees'=>$request->admission_fees ?? 0,
                'admission_fees_amount'=>$request->admission_fees_amount ?? 0,
                'child_care_fees'=>$request->child_care_fees ?? 0,
                'child_care_fees_amount'=>$request->child_care_fees_amount ?? 0,
                'examination_fees'=>$request->examination_fees ?? 0,
                'examination_fees_amount'=>$request->examination_fees_amount ?? 0,
                'refundable_deposite_fees'=>$request->refundable_deposite_fees ?? 0,
                'refundable_deposite_fees_amount'=>$request->refundable_deposite_fees_amount ?? 0,
                'resources'=>$request->resources ?? 0,
                'resources_amount'=>$request->resources_amount ?? 0,
                'created_at'=>Carbon::now()->toDateTimeString(),
            
            ]);
            
             if ($request->signed) {
                           
                        $folderPath = "uploads/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        DB::table('payment_receipt_invoice')->where('id',$insert)->update([
                            
                            'file' => $file,
                        ]);
                      
            }
            
            
             if ($insert) {
                 
                 $recipientEmail = $request->email;
                 
                 $main=DB::table('payment_receipt_invoice')->where('id',$insert)->first();
                    $data = [
                          'name'=>$request->name,
                            'email'=>$request->email,
                            'receipt_for'=>$request->receipt_for,
                            'payment_type'=>$request->payment_type,
                            'date'=>$request->date,
                            'no'=>$request->no,
                            'total_amount'=>$request->total_amount_hidden,
                            'created_by'=>Auth::user()->id,
                            'tuition_fees'=>$request->tuition_fees ?? 0,
                            'tuition_fees_amount'=>$request->tuition_fees_amount ?? 0,
                            'admission_fees'=>$request->admission_fees ?? 0,
                            'admission_fees_amount'=>$request->admission_fees_amount ?? 0,
                            'child_care_fees'=>$request->child_care_fees ?? 0,
                            'child_care_fees_amount'=>$request->child_care_fees_amount ?? 0,
                            'examination_fees'=>$request->examination_fees ?? 0,
                            'examination_fees_amount'=>$request->examination_fees_amount ?? 0,
                            'refundable_deposite_fees'=>$request->refundable_deposite_fees ?? 0,
                            'refundable_deposite_fees_amount'=>$request->refundable_deposite_fees_amount ?? 0,
                            'resources'=>$request->resources ?? 0,
                            'resources_amount'=>$request->resources_amount ?? 0,
                             'user'=>Auth::user()->first_name.' '.Auth::user()->last_name,
                             'file'=>$main->file
                    ];
            
                    // Send the email using the Mailable class
                    Mail::to($recipientEmail)->send(new PaymentReceiptMail($data));
                 
                 
                $notification = array(
                'messege' => 'Create Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Create Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
    }
    
    
    
    public function paymentReceivedUpdate(Request $request){
            $insert=DB::table('payment_receipt_invoice')->where('id',$request->id)->update([
            
                'name'=>$request->name,
                'email'=>$request->email,
                'receipt_for'=>$request->receipt_for,
                'payment_type'=>$request->payment_type,
                'date'=>$request->date,
                'no'=>$request->no,
                'total_amount'=>$request->total_amount_hidden,
                'created_by'=>Auth::user()->id,
                'tuition_fees'=>$request->tuition_fees ?? 0,
                'tuition_fees_amount'=>$request->tuition_fees_amount ?? 0,
                'admission_fees'=>$request->admission_fees ?? 0,
                'admission_fees_amount'=>$request->admission_fees_amount ?? 0,
                'child_care_fees'=>$request->child_care_fees ?? 0,
                'child_care_fees_amount'=>$request->child_care_fees_amount ?? 0,
                'examination_fees'=>$request->examination_fees ?? 0,
                'examination_fees_amount'=>$request->examination_fees_amount ?? 0,
                'refundable_deposite_fees'=>$request->refundable_deposite_fees ?? 0,
                'refundable_deposite_fees_amount'=>$request->refundable_deposite_fees_amount ?? 0,
                'resources'=>$request->resources ?? 0,
                'resources_amount'=>$request->resources_amount ?? 0,
                'created_at'=>Carbon::now()->toDateTimeString(),
            
            ]);
            
             if ($request->signed) {
                           
                        $folderPath = "uploads/";
                        $image_parts = explode(";base64,", $request['signed']); 
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);

                        DB::table('payment_receipt_invoice')->where('id',$request->id)->update([
                            
                            'file' => $file,
                        ]);
                      
            }
            
            
             if ($insert) {
                 
                 $recipientEmail = $request->email;
                 
                 $main=DB::table('payment_receipt_invoice')->where('id',$request->id)->first();
                    $data = [
                          'name'=>$request->name,
                            'email'=>$request->email,
                            'receipt_for'=>$request->receipt_for,
                            'payment_type'=>$request->payment_type,
                            'date'=>$request->date,
                            'no'=>$request->no,
                            'total_amount'=>$request->total_amount_hidden,
                            'created_by'=>Auth::user()->id,
                            'tuition_fees'=>$request->tuition_fees ?? 0,
                            'tuition_fees_amount'=>$request->tuition_fees_amount ?? 0,
                            'admission_fees'=>$request->admission_fees ?? 0,
                            'admission_fees_amount'=>$request->admission_fees_amount ?? 0,
                            'child_care_fees'=>$request->child_care_fees ?? 0,
                            'child_care_fees_amount'=>$request->child_care_fees_amount ?? 0,
                            'examination_fees'=>$request->examination_fees ?? 0,
                            'examination_fees_amount'=>$request->examination_fees_amount ?? 0,
                            'refundable_deposite_fees'=>$request->refundable_deposite_fees ?? 0,
                            'refundable_deposite_fees_amount'=>$request->refundable_deposite_fees_amount ?? 0,
                            'resources'=>$request->resources ?? 0,
                            'resources_amount'=>$request->resources_amount ?? 0,
                             'user'=>Auth::user()->first_name.' '.Auth::user()->last_name,
                             'file'=>$main->file
                    ];
            
                    // Send the email using the Mailable class
                    Mail::to($recipientEmail)->send(new PaymentReceiptMail($data));
                 
                 
                $notification = array(
                'messege' => 'Create Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Create Faild!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
    }
    // Dashboard index
    public function index()
    {
      
        $userCount = User::count();
        $alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->limit(10)->get();
        return view('backend.home.index', compact('userCount','alldata'));
    }
    // 
    public function adminProfile()
    {
        return view('backend.adminSetting.profile');
    }
    // admin profile update
    public function adminProfileUpdate()
    {
        return view('backend.adminSetting.profileUpdate');
    }
    // admin Profile Updatesubmit
    public function adminProfileUpdateSubmit(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'phone' => 'required',
        ]);
        $update = Admin::where('id', Auth::user()->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'company' => $request->company,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'company_site' => $request->company_site,
            'country' => $request->country,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $ImageName = 'admin' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(350, 350)->save('uploads/adminimage/' . $ImageName);
            Admin::where('id', Auth::user()->id)->update([
                'image' => $ImageName,
            ]);
        }
        if ($update) {
            $notification = array(
                'messege' => 'Update Success!',
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
    // email update
    public function adminEmailUpdate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'confirmemail' => 'required_with:email|same:email',
        ]);
        $update = Admin::where('id', Auth::user()->id)->update([
            'email' => $request->email,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Update Success!',
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

    // admin password update
    public function adminUpdatePassword(Request $request)
    {

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
                $user = Admin::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                $notification = array(
                    'messege' => 'Password Changed Successfully ! Now Login with Your New Password',
                    'alert-type' => 'success'
                );
                return Redirect()->route('admin.login')->with($notification);
            } else {
                $notification = array(
                    'messege' => 'New password and Confirm Password not matched!',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Old Password not matched!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // logout
    public function logout()
    {
        Auth::logout();
        $notification = array(
            'messege' => 'Logout success',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.login')->with($notification);
    }
}
