<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyInformation;
use App\Models\Seo;
use App\Models\Social;
use App\Models\Cupon;
use Carbon\Carbon;
use Auth;
use Image;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // company Information
    public function companyInformation()
    {
        $edit = CompanyInformation::select(['id','company_name','company_motto','email', 'mobile', 'telephone', 'address', 'google_map', 'logo', 'favicon'])->first();
        return view('backend.settings.companyInformation', compact('edit'));
    }
    // company Information Update
    public function companyInformationSubmit(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'email'   => 'required',
            'mobile'   => 'required',
        ]);
        $update = CompanyInformation::where('id', $request->id)->update([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'company_motto' => $request->company_motto,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'google_map' => $request->google_map,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $ImageName = 'logo' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/logo/' . $ImageName);
            CompanyInformation::where('id', $request->id)->update([
                'logo' => $ImageName,
            ]);
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $ImageName = 'favicon' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/logo/' . $ImageName);
            CompanyInformation::where('id', $request->id)->update([
                'favicon' => $ImageName,
            ]);
        }
        if ($update) {
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
    // seo index
    public function seoInformation()
    {
        $edit = Seo::first();
        return view('backend.settings.seo', compact('edit'));
    }
    // 
    public function seoInformationSubmit(Request $request)
    {

        $this->validate($request, [
            'meta_title' => 'required',
            'meta_author' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        $update = Seo::where('id', $request->id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_verification' => $request->google_verification,
            'bing_verification' => $request->bing_verification,
            'google_analytics' => $request->google_analytics,
            'alexa_analytics' => $request->alexa_analytics,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
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
    // social Information
    public function socialInformation()
    {
        $edit = Social::select(['id', 'facebook', 'twitter', 'linkend', 'instagram', 'youtube', 'skype', 'google_plus', 'feed'])->first();
        return view('backend.settings.social', compact('edit'));
    }
    // 
    public function socialInformationSubmit(Request $request)
    {

        $this->validate($request, [
            'facebook' => 'required',
        ]);
        $update = Social::where('id', $request->id)->update([
            'facebook' => $request->facebook,
            'instagram' =>  $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'linkend' => $request->linkend,
            'google_plus' => $request->google_plus,
            'skype' => $request->skype,
            'feed' => $request->feed,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
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




    
    public function cuponindex(){

        return view('backend.cupon.index');
    }
     public function cuponcreate(){
         $data=Cupon::first();
         return view('backend.cupon.create',compact('data'));
    }
     public function cuponstore(Request $request){

        $update=Cupon::where('id',1)->update([

            'custom_cupon_code' => $request->custom_cupon_code,
            'custom_cupon_percent' =>  $request->custom_cupon_percent,
            'custom_cupon_status' => $request->custom_cupon_status,

            'global_cupon_code' => $request->global_cupon_code,
            'global_cupon_percent' =>  $request->global_cupon_percent,
            'global_cupon_status' => $request->global_cupon_status,

        ]);

          if ($update) {
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
    
     public function generateSeatingPlan()
    {
        $studentCount = 100;
        $roomCapacities = [6, 6, 27, 5, 6];
        $seatingPlan = [];

        $roomIndex = 0;

        foreach ($roomCapacities as $roomCapacity) {
            $seatingPlan["Room " . ($roomIndex + 1)] = [];

            $remainingCapacity = $roomCapacity;

            while ($studentCount > 0 && $remainingCapacity > 0) {
                $studentsInRoom = min($studentCount, $remainingCapacity);
                $seatingPlan["Room " . ($roomIndex + 1)][] = $studentsInRoom;
                $studentCount -= $studentsInRoom;
                $remainingCapacity -= $studentsInRoom;
            }

            $roomIndex++;
        }

        return response()->json($seatingPlan);
    }
    
    
    
}
