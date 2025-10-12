<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationCenter;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\MainStundentSecondPaymentAlert;
use App\Mail\MainStundentFirstPaymentAlert;
use Mail;
use Image;
use Auth;

class StudentManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        //  $data=User::where('phone','07402528498')->first();
        //  dd($data);
        $alldata=User::where('is_deleted',0)->where('user_type',1)->select(['first_payment_alert','first_payment_date','second_payment_alert','second_payment_date','name','middle_name','last_name','email','phone','id','created_at','notes','instruction_to_house'])->orderBy('id','DESC')->limit(1000)->get();
        return view('backend.studentmanage.index',compact('alldata'));
    }
    public function details($id){
        $data=User::where('id',$id)->first();
        $studentdbs=VerificationCenter::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('backend.studentmanage.view',compact('data','studentdbs'));
    }

    public function detailsverified(Request $request){
       
        $update=VerificationCenter::where('id',$request->v_id)->update([
            'is_verify'=>$request->input('is_vefiried'),
            'more'=>$request->input('query'),
        ]);
        if($update) {
            if($request->input('is_vefiried')==1){
                 $profile=VerificationCenter::where('id',$request->v_id)->first();
                    if($profile->item_name=='Profile Image'){
                        $update=User::where('id',$profile->user_id)->update([
                            'photo'=>$profile->image,
                        ]);
                    }
            }
           
            
            $notification = array(
                'messege' => 'success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }



      public function agentindex(){
        $alldata=User::where('is_deleted',0)->where('user_type',2)->orderBy('id','DESC')->get();
        return view('backend.studentmanage.agentindex',compact('alldata'));
    }
    public function agentadd(){
         return view('backend.studentmanage.agentcreate');
    }
    public function agentdetails($id){
        $data=User::where('id',$id)->first();
        $studentdbs=VerificationCenter::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('backend.studentmanage.agentview',compact('data','studentdbs'));
    }

    public function agentstore(Request $request){

         $validated = $request->validate([
            'first_name' => 'required',
            'phone' => 'required',
            'email'=> 'required|email|unique:users',     
            'password' => 'required',
            'password_confirmation' => 'required|same:password' 
        ]);
        $insert=User::insertGetId([
            'name'=>$request->first_name,            
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'user_type'=>2,
            'is_verified'=>1,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', $insert)->update([
                'photo' => 'uploads/student/' . $ImageName,
            ]);
        }
          if($insert){

            $notification = array(
                'messege' => 'success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{

            $notification = array(
                'messege' => 'Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }
    }
    public function agentedit($id){
         $edit=User::where('id',$id)->first();
         return view('backend.studentmanage.agentedit',compact('edit'));
    }

      public function agentupdate(Request $request){

         $validated = $request->validate([
            'first_name' => 'required',
            'phone' => 'required',
        ]);
        $insert=User::where('id',$request->id)->update([
            'name'=>$request->first_name,            
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
           
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = 'image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/student/' . $ImageName);
            User::where('id', $request->id)->update([
                'photo' => 'uploads/student/' . $ImageName,
            ]);
        }
          if($insert){

            $notification = array(
                'messege' => 'success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{

            $notification = array(
                'messege' => 'Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }
    }

    public function agentupdatePassword(Request $request){
         $validated = $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password' 
        ]);

           $insert=User::where('id',$request->id)->update([
    
                'password'=>Hash::make($request->password),
            ]);
           if($insert){

                $notification = array(
                    'messege' => 'success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

            }else{

            $notification = array(
                'messege' => 'Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }
    }
    
    
    public function userFristBookingAlert($id){
        
        $update=User::where('id',$id)->update([
                'first_payment_alert'=>1,
                'first_payment_date'=>Carbon::now()->toDateTimeString(),
                'first_payment_sender'=>Auth::user()->name,
            ]);
         if($update){
             $user=User::where('id',$id)->select(['id','name','email'])->first();
             
              $message = [
                'name' => $user->name,
                'email' => $user->email,
                
            ];
          
                Mail::to($user->email)->send(new MainStundentFirstPaymentAlert($message));

                $notification = array(
                    'messege' => 'success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

            }else{

            $notification = array(
                'messege' => 'Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }
    

    // 
    
     public function userSecondBookingAlert($id){
         
       $update=User::where('id',$id)->update([
                'second_payment_alert'=>1,
                'second_payment_date'=>Carbon::now()->toDateTimeString(),
                'second_alert_sender'=>Auth::user()->name,
            ]);
         if($update){
        $user=User::where('id',$id)->select(['id','name','email'])->first();
             
              $message = [
                'name' => $user->name,
                'email' => $user->email,
                
            ];
          
                Mail::to($user->email)->send(new MainStundentSecondPaymentAlert($message));
                $notification = array(
                    'messege' => 'success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

            }else{

            $notification = array(
                'messege' => 'Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


  
}
