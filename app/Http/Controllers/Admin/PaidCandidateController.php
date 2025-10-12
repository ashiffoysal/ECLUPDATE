<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamRequest;
use App\Models\User;

class PaidCandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // create
    public function index(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',1)->where('main_exam_type','A Level')->orwhere('main_exam_type','GCSE')->where('is_deleted',1)->where('is_paid',1)->orwhere('main_exam_type','IGCSE')->where('is_deleted',1)->where('is_paid',1)->orwhere('main_exam_type','AS Level')->where('is_deleted',1)->where('is_paid',1)->get();
        return view('backend.paidcandidate.index',compact('alldata'));
    }
    //
    public function unpaid(){
        
        $alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',0)->get();
        return view('backend.unpaidcandidate.index',compact('alldata'));
        
    }

    public function deletedexambooking(){
        $alldata=ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',0)->get();
        return view('backend.unpaidcandidate.deletedcadidate',compact('alldata'));
    }


    public function deletedexambookingPermanetly($id){
        return $id;
        // photo_id
        // recent_photo
        // carring_forward_image
        // special_acces_evidence
        // special_evidents_documents
        // transection_image
    }


    // un booked user list
    public function unverifiedcandidate(){
        $alldata=User::orderBy('id','DESC')->where('is_verified',0)->get();
        return view('backend.unpaidcandidate.unverifiedcandidate',compact('alldata'));
    }




}
