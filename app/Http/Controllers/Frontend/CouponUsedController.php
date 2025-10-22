<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;
use App\Models\ExamRequest;
use Carbon\Carbon;
use Alert;

class CouponUsedController extends Controller
{




    public function couponCancel($id){

            $update=ExamRequest::where('id',$id)->update([
                    'coupon_used'=>0,
                    'coupon_code'=>'',
                    'discount_amount'=>0,
            ]);
            if($update){
                Alert::success('Success', 'Coupon cancel');
                return redirect()->back();
            }else{
                Alert::error('error', 'Coupon cancel Faild');
                return redirect()->back();
            }
    }
    public function couponInsert(Request $request){

        $main_amount=ExamRequest::where('booking_id',$request->booking_id)->select(['user_id','id','total_amount','coupon_used','coupon_code','discount_amount'])->first();
        if($main_amount->coupon_used==1){

            return response()->json("already_used");

        }else{

            $coupon=Cupon::first();

            if($coupon->custom_cupon_code==$request->cupon_code){

                if($coupon->custom_cupon_status==1){

                    $main_amount = ExamRequest::where('booking_id', $request->booking_id)
                            ->select(['user_id', 'id', 'exam_information', 'coupon_used', 'coupon_code', 'discount_amount'])
                            ->first();

                        $total_fees = 0;

                        if ($main_amount && $main_amount->exam_information) {
                            $exam_info = json_decode($main_amount->exam_information, true);

                            if (is_array($exam_info)) {
                                foreach ($exam_info as $info) {
                                    $total_fees += isset($info['fees']) ? (float)$info['fees'] : 0;
                                }
                            }
                        }

                        // return $total_fees;


                    $discount_amount=$total_fees * ($coupon->custom_cupon_percent/100);

                 
                    $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                        'coupon_used'=>1,
                        'coupon_code'=>$request->cupon_code,
                        'discount_amount'=>$discount_amount,
                    ]);
                    return response()->json("success");

                }else{
                    return response()->json("cupon_not_found");
                }

            }elseif($coupon->global_cupon_code==$request->cupon_code){

                 if($coupon->global_cupon_status==1){

                    $discount_amount=$main_amount->total_amount * ($coupon->global_cupon_percent/100);
                    $update=ExamRequest::where('booking_id',$request->booking_id)->update([
                        'coupon_used'=>1,
                        'coupon_code'=>$request->cupon_code,
                        'discount_amount'=>$discount_amount,
                    ]);
                    return response()->json("success");

                }else{
                    return response()->json("cupon_not_found");
                }
            }else{
                 return response()->json("cupon_not_found");
            }
     
        }
        
    }
}
