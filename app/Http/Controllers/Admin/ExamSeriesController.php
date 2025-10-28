<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Examessuedate;
use Carbon\Carbon;

class ExamSeriesController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function index()
    {
        $alldata=Examessuedate::orderBy('id','DESC')->where('is_deleted',0)->get();
        return view('backend.examseries.index',compact('alldata'));
    }
    // create
    public function create(){
        return view('backend.examseries.create');
    }
    // 
    public function store(Request $request){
        $insert=Examessuedate::insert([
            'exam_name'=>$request->exam_name,
            'entry_dateline'=>$request->entry_dateline,
            'entry_latefees'=>$request->entry_latefees,
            'entry_highlatefees'=>$request->entry_highlatefees,
            'availability'=>$request->availability,
            'is_gcse'=>$request->is_gcse ?? 0,
            'is_igcse'=>$request->is_igcse ?? 0,
            'is_alevel'=>$request->is_alevel ?? 0,
            'is_aslevel'=>$request->is_aslevel ?? 0,
            'is_active'=>$request->is_active,
            'board_details'=>json_encode($request->board_details),
            'created_at'=>Carbon::now()->todateTimeString(),
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Create success!',
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
    // edit
    public function edit($id){
        $data=Examessuedate::where('id',$id)->first();
        return view('backend.examseries.update',compact('data'));
    }
    
    public function update(Request $request){
        
        $update=Examessuedate::where('id',$request->id)->update([
            'exam_name'=>$request->exam_name,
            'entry_dateline'=>$request->entry_dateline,
            'entry_latefees'=>$request->entry_latefees,
            'entry_highlatefees'=>$request->entry_highlatefees,
            'availability'=>$request->availability,
             'is_gcse'=>$request->is_gcse ?? 0,
            'is_igcse'=>$request->is_igcse ?? 0,
            'is_alevel'=>$request->is_alevel ?? 0,
            'is_aslevel'=>$request->is_aslevel ?? 0,
            
            'updated_at'=>Carbon::now()->todateTimeString(),
        ]);
        if ($update) {
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
    // delete
    
    
    public function delete($id){
        
        $update=Examessuedate::where('id',$id)->update([
            'is_deleted'=>1,
            'updated_at'=>Carbon::now()->todateTimeString(),
        ]);
        if ($update) {
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
     // active
    public function active($id){
        
        $update=Examessuedate::where('id',$id)->update([
            'is_active'=>1,
            'updated_at'=>Carbon::now()->todateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Active success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Active Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // deactive
    public function deactive($id){
        
        $update=Examessuedate::where('id',$id)->update([
            'is_active'=>0,
            'updated_at'=>Carbon::now()->todateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Dective success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Dective Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
