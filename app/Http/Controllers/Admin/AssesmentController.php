<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assesment;
use DB;

class AssesmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $alldata=Assesment::where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('backend.assesmentlist.index',compact('alldata'));
    }

    // 
    public function details($id){
        $data=Assesment::where('id',$id)->first();
        return view('backend.assesmentlist.view',compact('data'));
    }
    
    
     public function ExamtopicDelete($id){
       
        $delete=DB::table('supportTopics')->where('id',$id)->delete();
        if($delete) {
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
    
    
    public function topicEdit($id){
        $edit=DB::table('supportTopics')->where('id',$id)->first();
        return view('backend.supports.topicupdate',compact('edit'));
    }
      
    public function topicUpdate(Request $request){
       
        $update=DB::table('supportTopics')->where('id',$request->id)->update([
            'title'=>$request->title,
            'notes'=>$request->notes,
        ]);
        if($update) {
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
        // return view('backend.supports.topicupdate',compact('edit'));
    }
}
