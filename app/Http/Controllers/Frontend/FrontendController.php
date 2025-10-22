<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Color;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\AboutUs;
use App\Models\Event;
use App\Models\Review;
use App\Models\User;
use App\Models\Gallery;
use App\Models\BlobComment;
use App\Models\SelectedTutorSubject;
use App\Models\Subject;
use App\Models\ContactMesssage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Mail\ContactMessage;
use App\Models\ExamRequest;
use Alert;
use Mail;
use DB;

class FrontendController extends Controller
{
    
    
    public function home()
    {
        // $showPopup = !$request->session()->has('popup_shown');
        // if ($showPopup) {
        //     $request->session()->put('popup_shown', true);
        // }
        $totalBookingCandidate = ExamRequest::query()
        ->where([
            ['is_completed_from', 1],
            ['is_deleted', 1],
            ['is_paid', 1],
            ['is_withdrawn', 0],
            ['is_refunded', 0],
            ['is_paid_verify', 1],
        ])
        ->count('id');
    
      
        $totalExamCandidate=ExamRequest::query()
        ->where([
            ['is_completed_from', 1],
            ['is_deleted', 1],
            ['is_paid', 1],
            ['is_withdrawn', 0],
            ['is_refunded', 0],
            ['is_paid_verify', 1],
            ['is_confirm_booking',1]
        ])
        ->count('id');
        return view('frontend.home.home',compact('totalBookingCandidate','totalExamCandidate'));
    }
    public function reviews(){
        return view('frontend.reviews.index');
    }
    public function vanueHire(){
         return view('frontend.vanuehire.index');
    }
    
    public function candidateVerification(){
        return view('frontend.candidateverify.index');
    }
    
    public function subjectPpaper($id){
        
       return view('frontend.pastpaper.ppaper');
        
    }
    
    public function termsConditionUpdatepage(){
        return view('frontend.termscondition.update');
    }
    
    
    public function ilstallmentrefundpolicy(){
        return view('frontend.ilstallment.ilstalmentprocedure');
    }
    
    // 
    
    
    
    
    public function pastPaper(){
        return view('frontend.pastpaper.index');
    }
    // 
    public function boardwisepastPaper($exam_type,$exam_board){
        
        
        if($exam_type=='gcse'){
            $exam='GCSE';
            if($exam_board=='edexcel'){
                
                $allSubject=Subject::where('exam_type','GCSE')->where('exam_board','Edexcel')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='aqa'){
                
                $allSubject=Subject::where('exam_type','GCSE')->where('exam_board','AQA')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='ocr'){
                
            $allSubject=Subject::where('exam_type','GCSE')->where('exam_board','OCR')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
            return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='wjec'){
                
                $allSubject=Subject::where('exam_type','GCSE')->where('exam_board','WJEC')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
          
        }
        
        if($exam_type=='igcse'){
             $exam='IGCSE';
               if($exam_board=='edexcel'){
                
                $allSubject=Subject::where('exam_type','IGCSE')->where('exam_board','Edexcel')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='cambridge-cie'){
                
                $allSubject=Subject::where('exam_type','IGCSE')->where('exam_board','Cambridge CIE')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            
        }
         if($exam_type=='a-level'){
             $exam='A Level';
            if($exam_board=='edexcel'){
                
                $allSubject=Subject::where('exam_type','A Level')->where('exam_board','Edexcel')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='aqa'){
                
                $allSubject=Subject::where('exam_type','A Level')->where('exam_board','AQA')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='ocr'){
                
            $allSubject=Subject::where('exam_type','A Level')->where('exam_board','OCR')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
            return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='wjec'){
                
                $allSubject=Subject::where('exam_type','A Level')->where('exam_board','WJEC')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
              if($exam_board=='cambridge-cie'){
                
                $allSubject=Subject::where('exam_type','A Level')->where('exam_board','Cambridge CIE')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
        }
         if($exam_type=='as-level'){
              $exam='AS Level';
            if($exam_board=='edexcel'){
                
                $allSubject=Subject::where('exam_type','AS Level')->where('exam_board','Edexcel')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='aqa'){
                
                $allSubject=Subject::where('exam_type','AS Level')->where('exam_board','AQA')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='ocr'){
                
            $allSubject=Subject::where('exam_type','AS Level')->where('exam_board','OCR')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
            return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
            if($exam_board=='wjec'){
                
                $allSubject=Subject::where('exam_type','AS Level')->where('exam_board','WJEC')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
              if($exam_board=='cambridge-cie'){
                
                $allSubject=Subject::where('exam_type','AS Level')->where('exam_board','Cambridge CIE')->where('is_deleted',0)->orderBy('subject_name','ASC')->where('is_past_papers',1)->select(['subject_name','id','unit_code'])->get();
                return view('frontend.pastpaper.subject',compact('allSubject','exam'));
                
            }
        }
        
        
    }
    // 
    public function examSeatingPlan(){
        return view('frontend.examSeatingPlan.index');
    }
    public function carFourTest(){
        return view('frontend.catfour.index');
    }
    // work for examcentrelondon
    public function workforexamcentre(){
        return view('frontend.workforexamcentre.index');
    }
    
    public function categoryBlog($cate_id){
       $category=Category::where('id',$cate_id)->first();
       $alldata=Blog::where('category_id',$cate_id)->where('is_deleted',0)->orderBy('id','DESC')->paginate(9);
       return view('frontend.blog.categoryblog',compact('alldata','category'));
       
    }
    
    
    // 
    public function nonexamassesment(){
        return view('frontend.nonexam.index');
    }
    
    
    
    public function myExamdateService($mydate){
       
        $newdate=date('d-m-Y', strtotime($mydate));
        $myday=Carbon::parse($newdate)->dayName;
        return response()->json($myday);
    }
    
    
    public function appsInformation(){
        return view('appslandingpage');
    }
    
    public function tutoringCentre(){
        return view('frontend.tutoringcentre.index');
    }
    
    // revison course
    public function revisionCourse(){
        
         return view('frontend.revisioncourse.index');
         
    }
    // 
    
    public function alevelRevisionCourse(){
         return view('frontend.revisioncourse.alevel');
    }

    public function contact()
    {
        $rand_one=rand(0,9);
        $rand_two=rand(0,8);
        $val=$rand_one + $rand_two;
        return view('frontend.contact.contact',compact('rand_one','rand_two','val'));
    }
    public function gallary()
    {
        $alldata=Gallery::where('is_deleted',0)->orderBy('id','DESC')->paginate(6);
        return view('frontend.gallary.index',compact('alldata'));
    }

    // 
    public function contactstore(Request $request){

        if($request->number == $request->mynumber){
            
            
            
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);
            
            $support_id=rand(11111,99999);
            $insert=DB::table('supports_inquiry')->insert([
                'name'=>$request->name,
                'support_id'=>$support_id,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'subject'=>$request->subject,
                'message'=>$request->message,
                'is_reply'=>0,
                'is_contact'=>1,
                'is_seen'=>0,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            // $insert=ContactMesssage::insert([
            //     'name'=>$request->name,
            //     'email'=>$request->email,
            //     'phone'=>$request->phone,
            //     'subject'=>$request->subject,
            //     'message'=>$request->message,
            //     'created_at'=>Carbon::now()->toDateTimeString(),
            // ]);
             $message = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' =>$request->subject,
            'messages' =>$request->message,
            ];
            if($insert){
                Mail::to("info@examcentrelondon.co.uk")->send(new ContactMessage($message));
                Alert::success('Success', 'Thank you for contacting Exam Centre London. We can confirm that your query has been sent successfully and will be dealt with as soon as possible.');
                return redirect()->back();
            }else{
                Alert::error('Faild', 'Message Send Faild');
                return redirect()->back();
            }
            
        }else{
             Alert::error('Faild', 'Please Enter Valid Number');
                return redirect()->back();
        }

    }
    // 
    public function blogs(){
        $allblog=Blog::where('is_deleted',0)->orderBy('id','DESC')->paginate(9);
        return view('frontend.blog.allblog',compact('allblog'));
    }
    // blog details
    public function blogsdetails($slug,$id){
         $rand_one=rand(0,9);
        $rand_two=rand(0,8);
        $val=$rand_one + $rand_two;
        
        $popularPost=Blog::where('is_deleted',0)->orderBy('id','DESC')->limit(8)->get();
        $data=Blog::where('slug',$slug)->first();
         $view=Blog::where('id',$data->id)->update([
                'view'=>$data->view + 1,
             ]);
       
        $allcategory=Category::where('is_deleted',0)->get();
        return view('frontend.blog.blogdetails',compact('data','allcategory','popularPost','rand_one','rand_two','val'));
    }
    // about page

    public function productData(){
        return User::where('is_deleted',0)->where('is_verified',1)->where('is_tutor_approve',1)->where('user_type',2)->select(['id','for_home_tutor','for_online_tutor','id','name','photo','headline_for_tutor','expected_hourly_rate','subject','gender']);
    }

    public function filter_shop(Request $request){
     
            $products =$this->productData();
        

        if ($request->subject == null && $request->tutor_type == null && $request->gender == null && $request->price == null && $request->sortingval == null) {
            $products = $products;
        }
        if ($request->subject != null) {
            
           

            $categoryId=$request->subject;
            $products=$products->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });
            
            

            
             
             
            
        }
        if ($request->tutor_type != null) {
            if($request->tutor_type==1){
                $products = $products->where('for_online_tutor',1);
            }elseif($request->tutor_type==2){
                $products = $products->where('for_home_tutor',1);
            }
           
        }
        if ($request->gender != null) {
           
            $products = $products->whereIn('gender',$request->gender);
           
        }
        if ($request->subject != null && $request->tutor_type != null) {

            if($request->tutor_type==1){
                $products = $products->whereRawIn('json_contains(subject, \'["' . $request->subject . '"]\')')->where('for_online_tutor',1);
            }elseif($request->tutor_type==2){
                $products = $products->whereRawIn('json_contains(subject, \'["' . $request->subject . '"]\')')->where('for_home_tutor',1);
            }
           
        }

        if ($request->subject != null && $request->sortingval != null) {



              $categoryId=$request->subject;
          

                if ($request->sortingval == 1) {
                    $products = $products->orderBy('expected_hourly_rate', 'ASC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });
                } elseif ($request->sortingval == 2) {
                    $products = $products->orderBy('expected_hourly_rate', 'DESC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });
                } elseif ($request->sortingval == 3) {
                    $products = $products->orderBy('name', 'ASC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });
                }
                
           
           
        }
        if ($request->price != null) {
            $priceVal = implode(',', $request->price);
            if ($priceVal == 1) {
                $products = $products->where('expected_hourly_rate', '>', '5')->where('expected_hourly_rate', '<=', '10');
            } elseif ($priceVal == 2) {
                $products = $products->where('expected_hourly_rate', '>', '11')->where('expected_hourly_rate', '<=', '20');
            } elseif ($priceVal == 3) {
                $products = $products->where('expected_hourly_rate', '>', '21')->where('expected_hourly_rate', '<=', '30');
            } elseif ($priceVal == 4) {
                $products = $products->where('expected_hourly_rate', '>', '31')->where('expected_hourly_rate', '<=', '40');
            }
            elseif ($priceVal == 5) {
                $products = $products->where('expected_hourly_rate', '>', '41')->where('expected_hourly_rate', '<=', '50');
            }
        }
        // if (isset($request["sortingval"])) {
        if ($request->sortingval != null) {
           
            if ($request->sortingval == 1) {
                $products = $products->orderBy('expected_hourly_rate', 'ASC');
            } elseif ($request->sortingval == 2) {
                $products = $products->orderBy('expected_hourly_rate', 'DESC');
            } elseif ($request->sortingval == 3) {
                $products = $products->orderBy('name', 'ASC');
            }
        }


        if ($request->gender != null && $request->subject != null) {
            $categoryId=$request->subject;
            $products = $products->whereIn('gender', $request->gender)->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });

        }
        if ($request->subject && $request->sortingval != null) {
           
            $sortVal = $request->sortingval;

            $categoryId=$request->subject;

            if ($sortVal == 1) {
                $products = $products->orderBy('expected_hourly_rate', 'ASC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });;
            } elseif ($sortVal == 2) {
                $products = $products->orderBy('expected_hourly_rate', 'DESC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });
            } elseif ($sortVal == 3) {
                $products = $products->orderBy('name', 'ASC')->with('Selectedtutor')
                ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                    $query->where('subject_id', $categoryId);
                });
            }
        }
        if ($request->subject != null && $request->gender != null && $request->sortingval != null) {
           
            $sortVal = $request->sortingval;
            $categoryId=$request->subject;
            if ($sortVal == 1) {
                $products = $products->whereIn('gender', $request->gender)->orderBy('expected_hourly_rate', 'ASC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });;;
            } elseif ($sortVal == 2) {
                $products = $products->whereIn('gender', $request->gender)->orderBy('expected_hourly_rate', 'DESC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });
            } elseif ($sortVal == 3) {
                $products = $products->whereIn('gender', $request->gender)->orderBy('name', 'ASC')->with('Selectedtutor')
            ->whereHas('Selectedtutor', function($query) use ($categoryId)  {
                $query->where('subject_id', $categoryId);
            });
            }
        }


        $products = $products->get();
        return view('frontend.tutorfind.ajax.filter', compact('products'));
   
    }



    public function termsCondition(){
       $data = AboutUs::select(['details', 'id'])->where('keyword', 'terms_condition')->first();
        return view('frontend.termscondition.index',compact('data'));
    }
    // 
    public function faq(){

     return view('frontend.faq.index');
    }
    public function privacyPolicy(){
    $data = AboutUs::select(['details', 'id'])->where('keyword', 'privacy_policy')->first();
     return view('frontend.privacypolicy.index',compact('data'));
    }


    public function examlist(){

        return view('frontend.allexam.index');
    }

    public function supports(){

        return view('frontend.supports.index');
    }

    public function examdates(){

        return view('frontend.examdateslist.index');
    }

    public function ucasregistered(){

        return view('frontend.ucas.index');

    }
    
    public function applicationform(){
        return redirect('/exam-list');
    }
    
    
    public function gcseRevisionCourse(){
        return view('frontend.revisioncourse.gcse');
    }
    
    public function BlogComment(Request $request){
         if($request->number == $request->mynumber){
        $insert=BlobComment::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'comment'=>$request->message,
            'blog_id'=>$request->blog_id,
            'created_at'=>Carbon::now()->toDateTimeString(),  
        ]);
       if($insert){
           
            Alert::success('Success', 'Thank you for Comment Exam Centre London blog. We are review your comments.');
            return redirect()->back();
        }else{
            Alert::error('Faild', 'Message Send Faild');
            return redirect()->back();
        }
        }else{
            Alert::error('Faild', 'Enter Valid Number');
            return redirect()->back();
        }
    }
    
    
    
    
    public function refundpolicy(){
        return view('frontend.refundpolicy.refundpolicy');
    }


   public function getAddress(Request $request){
        
        $postcode = $request->input('post_code');
    
    $url = "https://api.postcodes.io/postcodes/$postcode";
    $response = file_get_contents($url);
    $data = json_decode($response);

    if ($data && $data->status === 200) {
        $address = $data->result;
        return response()->json(['address' => $address]);
    }

    return response()->json(['error' => 'Address not found'], 404);
        
    }
    
    
    
    public function examTimetable(){
        return view('frontend.examtimetable.index');
    }
    
    public function proctoringServices(){
        return view('frontend.proctorexam.details');
    }
    
    // course
    
    public function course(){
        $allCourse=DB::table('allexamcources')->where('is_deleted',0)->where('is_active',1)->get();
        return view('frontend.alltuitioncourses.allcourse',compact('allCourse'));
        
    }
    
    //
    public function courseDetails($slug,$id){
        $data=DB::table('allexamcources')->where('id',$id)->first();
        return view('frontend.alltuitioncourses.details',compact('data'));
    }
    
    public function alevelcourse(){
      $allCourse=DB::table('allexamcources')->where('is_deleted',0)->where('exam_type','A Level')->where('is_active',1)->orderBy('id','DESC')->limit(6)->get();
     return view('frontend.alltuitioncourses.alevelcourse',compact('allCourse'));
    }
    
    public function gcsecourse(){
        $allCourse=DB::table('allexamcources')->where('is_deleted',0)->where('exam_type','GCSE')->where('is_active',1)->orderBy('id','DESC')->limit(6)->get();
     return view('frontend.alltuitioncourses.gcsecourse',compact('allCourse'));
    }
    // special access
    public function specialAccessPage(){
          return view('frontend.specialaccess.index');
    }

    public function supportsInquery($supportid){
        $alldata=DB::table('supports_inquiry')->where('support_id',$supportid)->first();
        if($alldata){
            $allchats=DB::table('support_message')->where('support_id',$supportid)->get();
            return view('frontend.chatpage.index',compact('alldata','allchats'));
        }else{
              Alert::error('Faild', 'Support Not Found');
            return redirect()->back();
        }
        
    }
    
    // 
    public function supportsInqueryStore(Request $request){
    
        $insert=DB::table('support_message')->insert([
            'sender_type'=>2,
            'support_id'=>$request->support_id,
            'message'=>$request->cutomer_reply,
            'is_seen'=>0,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
       if($insert){
            Alert::success('success', 'Query Submited');
            return redirect()->back();
        }else{
              Alert::error('Faild', 'Support Not Found');
            return redirect()->back();
        }
    }
    
    
    // iseb
    public function isebDetails(){
        return view('frontend.isebpage.index');
    }
    
    
    
        // iseb
    public function stepExams(){
        return view('frontend.stepmaths.index');
    }
}
