<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CreateCouponRequest as CouponCreateCouponRequest;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\CouponInterface;
use Illuminate\Support\Str;
use App\Http\Requests\Coupon\CreateCouponRequest;
use App\Http\Requests\Coupon\UpdateCouponRequest;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $coupons;
    public function __construct(CouponInterface $coupons)
    {
        $this->coupons=$coupons;
    }
    public function index()
    {
        $coupon = coupon::orderby('id','DESC')->get();
        return view('dashboard.coupon.index')->with(compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();
        $coupon = new coupon;
        $coupon -> coupon_name = $data['coupon_name'];
        $coupon -> feature_coupon = $data['feature_coupon'];
        $coupon -> coupon_code = $data['coupon_code'];
        $coupon -> coupon_number = $data['coupon_number'];
        $coupon -> quantity_coupon = $data['quantity_coupon'];
        $coupon ->save();
        return redirect()->route('coupon.create')->with('success', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $this->coupons->destroy($coupon);
        return redirect()->route('coupon.index')->with('success', 'Xóa Thành Công!');
        return view('dashboard.coupon.index');
    }
    public function check_coupon(Request $request){
        $data = $request ->all();
        $coupon =Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'feature_coupon' => $coupon -> feature_coupon,
                            'coupon_code' => $coupon -> coupon_code,
                            'coupon_number' => $coupon -> coupon_number,
                            
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'feature_coupon' => $coupon -> feature_coupon,
                        'coupon_code' => $coupon -> coupon_code,
                        'coupon_number' => $coupon -> coupon_number,

                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('massage','Đã thêm mã giảm giá!');
            }
        }
        else{
            return redirect()->back()->with('massage','Mã giảm giá không tồn tại!');
        }
    }
    public function delete_coupon(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
        }
        return redirect()->back()->with('massage','Đã xóa mã giảm giá');
    }
}
