<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactMesssage;
use Mail;
use DB;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        
          $alldata = DB::table('supports_inquiry')
    ->leftJoin('exam_requests', function($join) {
        $join->on('supports_inquiry.email', '=', 'exam_requests.email')
            ->where('exam_requests.is_completed_from', 1)
            ->where('exam_requests.is_deleted', 1)
            ->where('exam_requests.is_apps_booking', 0);
    })
    ->leftJoin('support_message', function($join) {
        $join->on('supports_inquiry.support_id', '=', 'support_message.support_id')
            ->where('support_message.is_seen', 0);
    })
    ->select([
        'supports_inquiry.*', // Select all columns from supports_inquiry
        DB::raw('COUNT(exam_requests.id) as exam_request_count'), // Count the related ExamRequest entries
        DB::raw('COUNT(support_message.id) as unseen_message_count') // Count the related SupportMessage entries where is_seen is 0
    ])
    ->where('supports_inquiry.is_deleted', 0)
    ->where('supports_inquiry.is_save_draft', 0)
     ->where('supports_inquiry.is_contact', 1)
    ->groupBy('supports_inquiry.id') // Group by supports_inquiry id to ensure accurate counting
    ->orderBy('supports_inquiry.id', 'DESC')
    ->get();
   
        return view('backend.contactmessage.index',compact('alldata'));
        
        // $alldata=ContactMesssage::orderBy('id','DESC')->get();
        // return view('backend.contactmessage.index',compact('alldata'));
    }
    public function delete($id){

        $delete=ContactMesssage::where('id',$id)->delete();
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


    public function videmessage($id){
        $data=ContactMesssage::where('id',$id)->first();
        $update=ContactMesssage::where('id',$id)->update([
            'is_seen'=>1,
        ]);
        return view('backend.contactmessage.view',compact('data'));
    }
    
    public function sendreply(Request $request,$id){
           $validated = $request->validate([
            'reply' => 'required',
        ]);
         $info=ContactMesssage::where('id',$id)->first();
        
      
         $update=ContactMesssage::where('id',$id)->update([
            'reply'=>$request->reply,
        ]);
        
          $message = [
          
            'reply' =>$request->reply,
            
            ];
         if ($update) {
           $data = [
              'subject' => 'Message Reply',
              'email' => $info->email,
              'reply' => $request->reply,
            ];
    
            Mail::send('mail.contactmessagereply', $data, function($message) use ($data) {
              $message->to($data['email'])
              ->subject($data['subject']);
            });
            
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
}
