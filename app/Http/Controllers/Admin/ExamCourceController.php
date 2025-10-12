<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use DB;
use Image;
use Str;



class ExamCourceController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function create(){
        return view('backend.examcourse.create');
    }
    public function index(){
        $allData=DB::table('allexamcources')->where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.examcourse.index',compact('allData'));
    }
    // 
    public function edit($id){
        $edit=DB::table('allexamcources')->where('id',$id)->first();
         return view('backend.examcourse.update',compact('edit'));
    }
    public function active($id){
        $active=DB::table('allexamcources')->where('id',$id)->update([
                'is_active'=>1,
            ]);
            
            if ($active) {
                $notification = array(
                    'messege' => ' success!',
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
       public function deactive($id){
        $active=DB::table('allexamcources')->where('id',$id)->update([
                'is_active'=>0,
            ]);
            
            if ($active) {
                $notification = array(
                    'messege' => ' success!',
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
    public function delete($id){
        $active=DB::table('allexamcources')->where('id',$id)->update([
                'is_deleted'=>1,
            ]);
            
            if ($active) {
                $notification = array(
                    'messege' => ' success!',
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
    // 
    public function store(Request $request){
   
       $insert=DB::table('allexamcources')->insertGetId([
           
           'course_title'=>$request->course_title,
           'exam_type'=>$request->exam_type,
           'slug'=>Str::slug($request->course_title),
           'subject'=>$request->subject,
           'other_include'=>$request->other_include,
           'fees'=>$request->fees,
           'old_fees'=>$request->old_fees,
           'class_size'=>$request->class_size,
           'start_date'=>$request->start_date,
           'end_date'=>$request->end_date,
           'course_overview'=>$request->course_overview,
           
           'why_choose'=>$request->why_choose,
           'requirements'=>$request->requirements,
           'has_mock_test'=>$request->has_mock_test,
           'duration'=>$request->duration,
           
           'mock_details'=>$request->mock_details,
           'meta_tag'=>$request->meta_tag,
           'created_at'=>Carbon::now()->toDateTimeString(),
           
           
        ]);
        
          if ($request->hasFile('thumbnail_image')) {
                $photo =$request->file('thumbnail_image');
                $name = 'course_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                $newfile =$photo->move('uploads/courseimage/', $name);
                DB::table('allexamcources')->where('id',$insert)->update([
                    'thumbnail_image' => 'uploads/courseimage/'.$name,
                ]);
        }
        
        if($request->weeks){
            $exam_information = array();
            if ($request->has('weeks')) {
                foreach ($request->weeks as $key => $no) {
                    $item['weeks'] = $request->weeks[$key];
                    $item['description'] = $request->description[$key];
                    array_push($exam_information, $item);
                   
                    }
                    DB::table('allexamcources')->where('id',$insert)->update([
                        'course_structure'=>json_encode($exam_information),
                       
                    ]);
                }    
        }
        
        
        
            if ($insert) {
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
    
    
    
    // course update
    public function update(Request $request){
         $insert=DB::table('allexamcources')->where('id',$request->id)->update([
           
           'course_title'=>$request->course_title,
           'exam_type'=>$request->exam_type,
           'slug'=>Str::slug($request->course_title),
           'subject'=>$request->subject,
           'other_include'=>$request->other_include,
           'fees'=>$request->fees,
           'old_fees'=>$request->old_fees,
           'class_size'=>$request->class_size,
           'start_date'=>$request->start_date,
           'end_date'=>$request->end_date,
           'course_overview'=>$request->course_overview,
           
           'why_choose'=>$request->why_choose,
           'requirements'=>$request->requirements,
           'has_mock_test'=>$request->has_mock_test,
           'duration'=>$request->duration,
           
           'mock_details'=>$request->mock_details,
           'meta_tag'=>$request->meta_tag,
           'updated_at'=>Carbon::now()->toDateTimeString(),
           
           
        ]);
        
          if ($request->hasFile('thumbnail_image')) {
                $photo =$request->file('thumbnail_image');
                $name = 'course_'.Auth::user()->id.time().'.'.$photo->getClientOriginalExtension();
                $newfile =$photo->move('uploads/courseimage/', $name);
                DB::table('allexamcources')->where('id',$request->id)->update([
                    'thumbnail_image' => 'uploads/courseimage/'.$name,
                ]);
        }
        
        if($request->weeks){
            $exam_information = array();
            if ($request->has('weeks')) {
                foreach ($request->weeks as $key => $no) {
                    $item['weeks'] = $request->weeks[$key];
                    $item['description'] = $request->description[$key];
                    array_push($exam_information, $item);
                   
                    }
                    DB::table('allexamcources')->where('id',$request->id)->update([
                        'course_structure'=>json_encode($exam_information),
                       
                    ]);
                }    
        }
        
        
        
            if ($insert) {
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
    
    
    public function purchaseIndex(){
        $allData=DB::table('course_purchase')->where('is_deleted',0)->orderBy('id','DESC')->get();
          return view('backend.examcourse.candidaterequest',compact('allData'));
    }
    // 
    public function purchaseDetails($id){
        $data=DB::table('course_purchase')->where('id',$id)->first();
        return view('backend.examcourse.view',compact('data'));
    }
    // 
    
    public function purchaseDelete($id){
        $update=DB::table('course_purchase')->where('id',$id)->update([
                
                'is_deleted'=>1
            
            ]);
        if ($update) {
                $notification = array(
                    'messege' => ' success!',
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
    
    public function purchasePaymentUpdate(Request $request){
        return $request;
    }
}