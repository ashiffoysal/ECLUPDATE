<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Subcategory;
use App\Models\Examessuedate;
use Carbon\Carbon;
use DB;

class GetSubjectController extends Controller

{
    public function dayinTime($mydate){
     
      $dayname=Carbon::parse($mydate)->format('l');
      $data=DB::table('branch_exam_time')->where('branch',1)->where('weekday',$dayname)->get();
      return response()->json($data);
    }
    
    public function ilfordayinTime($mydate){
     
      $dayname=Carbon::parse($mydate)->format('l');
      $data=DB::table('branch_exam_time')->where('branch',2)->where('weekday',$dayname)->get();
      return response()->json($data);
    }

    public function gcsegetsubject($type_id,$series_id){

        $examseries=Examessuedate::where('id',$series_id)->first();
        if($examseries->exam_type==1){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_ac',1)->where('is_deleted',0)->where('january_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
        if($examseries->exam_type==2){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_ac',1)->where('is_deleted',0)->where('june_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
         if($examseries->exam_type==3){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_ac',1)->where('is_deleted',0)->where('november_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
        
          if($examseries->exam_type==4){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','GCSE')->where('is_ac',1)->where('is_deleted',0)->where('november_cie_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
    }

    public function igcsegetsubject($type_id,$series_id){

         $examseries=Examessuedate::where('id',$series_id)->first();
        if($examseries->exam_type==1){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_ac',1)->where('is_deleted',0)->where('january_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
        if($examseries->exam_type==2){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_ac',1)->where('is_deleted',0)->where('june_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
         if($examseries->exam_type==3){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_ac',1)->where('is_deleted',0)->where('november_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
          if($examseries->exam_type==4){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','IGCSE')->where('is_ac',1)->where('is_deleted',0)->where('november_cie_availability',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
    }

    public function alevelgetsubject($type_id,$series_id){

        $examseries=Examessuedate::where('id',$series_id)->first();
        if($examseries->exam_type==1){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('january_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
        if($examseries->exam_type==2){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('june_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
         if($examseries->exam_type==3){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('november_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
         if($examseries->exam_type==4){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','A Level')->where('is_deleted',0)->where('november_cie_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
    }
    
    public function aslevelgetsubject($type_id,$series_id){
        $examseries=Examessuedate::where('id',$series_id)->first();
        if($examseries->exam_type==1){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('january_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
        if($examseries->exam_type==2){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('june_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
         if($examseries->exam_type==3){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('november_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
          if($examseries->exam_type==4){
            $data=Subject::where('exam_board',$type_id)->where('exam_type','AS Level')->where('is_deleted',0)->where('november_cie_availability',1)->where('is_ac',1)->orderBy('subject_name', 'asc')->get();
            return response()->json($data);
        }
    }
    
        public function getqualification($program_id){

        $data=Subcategory::where('cate_id',$program_id)->get();
        return response()->json($data);
    }

    public function getaatsubject($qualification_id){
        
        $data=Subject::where('aat_subcate',$qualification_id)->where('is_deleted',0)->get();
        return response()->json($data);
    }

}
