<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Validator;
class UserLoginController extends Controller
{
    
    
    // this my old API Key
    // public function login(Request $request)
    // {
        
    //   return $request;
    //      $validate=Validator::make($request->all(),[
    //         'email' => 'required|email|exists:users',
    //         'password' => 'required',
    //     ]);
    //     if($validate->fails()){
            
    //         return response()->json([
    //                 'errors'=>$validate->errors()
    //             ],422);
    //     }
        
    //     $check=User::where('email',$request->email)->first();
    //     if($check->self_delete==0){
    //     $reqData= request(['email', 'password']);
            
    //     if(Auth::attempt($reqData)){
            
    //         $user=Auth::user();
            
    //         // $data['access_token'] = $user->createToken('userToken');
                
    //         $data['token_type'] = 'Bearer';
            
    //          $data['user'] = [
    //              'access_token'=>$user->createToken('userToken'),
    //              'user_id'=>$user=Auth::user()->id,
    //              'first_name'=>$user=Auth::user()->name,
    //              'middle_name'=>$user=Auth::user()->middle_name,
    //              'last_name'=>$user=Auth::user()->last_name,
    //              'email'=>$user=Auth::user()->email,
    //              'phone'=>$user=Auth::user()->phone,
    //              'is_verified'=>$user=Auth::user()->is_verified,
                 
    //              ];
            
             
    //          return response()->json($data
    //              ,200);
    //     }else{
    //         return response()->json([
    //                 'errors'=>$validate->errors()
    //             ],422);
            
    //     }
    //     }else{
    //          return response()->json("Your account is not found.Please register!");
    //     }
            
        
        
    // }
    
    
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Generate a token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return success response
        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }
 
    
    public function unlogin(){
        return "unauthenticated";
    }
    
     public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ],200);
    }
    
    
    // register
    public function register(Request $request){
        
        
       $check=User::where('email',$request->email)->first();
        if($check){
           
           
            if($check->self_delete==1){
              
                $validate=Validator::make($request->all(),[
                            'name' => 'required',
                            'last_name' => 'required',
                            'phone' => 'required',
                            'password' => 'required',
                            'confirm_password' => 'required|same:password'
                        ]);
                        if($validate->fails()){
                            
                            return response()->json([
                                    'errors'=>$validate->errors()
                                ],422);
                        }
                        
                        
                        $insert=User::where('id',$check->id)->update([
                            'name'=>$request->name,
                            'middle_name'=>$request->middle_name,
                            'last_name'=>$request->last_name,
                            'phone'=>$request->phone,
                            'email'=>$request->email,
                            'user_type'=>1,
                            'is_verified'=>0,
                            'self_delete'=>0,
                            'password'=>Hash::make($request->password),
                            'created_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                       if($insert){
                          $myuser= User::where('id',$check->id)->first();
                           $verification_code=rand(444444,999999);
                                
                            $data['message'] = 'Registration Success';
                            $data['verification_code'] = $verification_code;
                            
                             $data['user'] = [
                                 
                                 'user_id'=>$user=$myuser->id,
                                 'first_name'=>$user=$myuser->name,
                                 'middle_name'=>$user=$myuser->middle_name,
                                 'last_name'=>$user=$myuser->last_name,
                                 'email'=>$user=$myuser->email,
                                 'phone'=>$user=$myuser->phone,
                                 'is_verified'=>$user=$myuser->is_verified,
                                 
                                 ];
                            
                            return response()->json($data
                                 ,200);
                            // Alert::toast('Success', 'Registration Success');
                            // return redirect('/student/dashboard');
                            
                            // $email = md5($request->email);
                            // $code = random_int(100000, 999999);
                    
                            // User::where('id', $insert)->update([
                            //     'code' => $code,
                            // ]);
                
                            // Alert::toast('Please Check Your Email and verify Your Account', 'success');
                            // Mail::to($request->email)->send(new UserRegister($code));
                    
                            // return redirect('/email/verify/' . $email . '/' . $insert);
                           
                        }else{
                            
                             return response()->json('faild',422);
                            // Alert::toast('Faild', 'Message Send Faild');
                            // return redirect()->back();
                        }
            }else{
                 return response()->json('You already registered.Please Login',200);
            }
             
        }else{
            
            
            
              $validate=Validator::make($request->all(),[
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email'=> 'required|email|unique:users',     
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
        
        
        $insert=User::insertGetId([
            'name'=>$request->name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'user_type'=>1,
            'is_verified'=>0,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
       if($insert){
          $myuser= User::where('id',$insert)->first();
           $verification_code=rand(444444,999999);
                
            $data['message'] = 'Registration Success';
            $data['verification_code'] = $verification_code;
            
             $data['user'] = [
                 
                 'user_id'=>$user=$myuser->id,
                 'first_name'=>$user=$myuser->name,
                 'middle_name'=>$user=$myuser->middle_name,
                 'last_name'=>$user=$myuser->last_name,
                 'email'=>$user=$myuser->email,
                 'phone'=>$user=$myuser->phone,
                 'is_verified'=>$user=$myuser->is_verified,
                 
                 ];
            
            return response()->json($data
                 ,200);
            // Alert::toast('Success', 'Registration Success');
            // return redirect('/student/dashboard');
            
            // $email = md5($request->email);
            // $code = random_int(100000, 999999);
    
            // User::where('id', $insert)->update([
            //     'code' => $code,
            // ]);

            // Alert::toast('Please Check Your Email and verify Your Account', 'success');
            // Mail::to($request->email)->send(new UserRegister($code));
    
            // return redirect('/email/verify/' . $email . '/' . $insert);
           
        }else{
            
             return response()->json('faild',422);
            // Alert::toast('Faild', 'Message Send Faild');
            // return redirect()->back();
        }
        }
         
        
        
    }
    
    
      public function forgetpasssubmit(Request $request){
           $validate=Validator::make($request->all(),[
            'email' => 'required|email',
        ]);
        if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
        $check=User::where('email', $request->email)->first();
        if ($check) {
             $code = random_int(100000, 999999);
            User::where('id', $check->id)->update([
                'code' => $code,
            ]);
            $email = md5($request->email);
            
            
            $data = [
              'subject' => 'Exam Centre Forget Password',
              'email' => $request->email,
              'code' => $code,
            ];
    
             Mail::send('mail.forgetpassword', $data, function($message) use ($data) {
              $message->to($data['email'])
              ->subject($data['subject']);
            });
        
              $userdata['user'] = [
                 
                 'email'=>$request->email,
                 'user_id'=>$check->id,
                 'code' => $code,
                
              ];
            return response($userdata);
           
        } else {
           
            return response("Email not found");
        }
        
    }
    
        public function forgetpasssupdatesubmit(Request $request){
          $validate=Validator::make($request->all(),[
            'code' => 'required',
            'password' => 'min:2|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:2'
            
        ]);
        
         if($validate->fails()){
            
            return response()->json([
                    'errors'=>$validate->errors()
                ],422);
        }
        
        
        $check=User::where('id',$request->user_id)->select(['code','id'])->first();
        if($check->code==$request->code){
            
                $update=User::where('id',$check->id)->update([
                    
                    'password'=>Hash::make($request->password), 
                ]);
                 if ($update) {
                    
                    return response('Update Password ! Please login',200);
                } else {
                  
                    return response('Something Went Wrong!Please Try again',422);
                }
                
            
            
        }else{
          return response('Your Code Is Invalid!Please Try again',422);
        }
    }

}
