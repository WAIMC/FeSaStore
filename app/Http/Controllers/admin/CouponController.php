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
    public function store(CreateCouponRequest $request)
    {
        $attributes = [
            'coupon_name' => $request->coupon_name,
            'feature_coupon' => $request->feature_coupon,
            'coupon_code' =>  $request->coupon_code,
            'coupon_number' =>  $request->coupon_number,
            'quantity_coupon' => $request->quantity_coupon,
        ];
        if($this->coupons->create($attributes)){
            return redirect()->route('coupon.create')->with('success', 'Thêm mới thành công!');
        }else{
            return redirect()->route('coupon.create')->with('error', 'Thêm mới thất bại !');
        }
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
        return view('dashboard.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $attributes = [
            'coupon_name' => $request->coupon_name,
            'feature_coupon' => $request->feature_coupon,
            'coupon_code' =>  $request->coupon_code,
            'coupon_number' =>  $request->coupon_number,
            'quantity_coupon' => $request->quantity_coupon,
        ];
        // dd($attributes);

        if($this->coupons->update($coupon, $attributes)){
            return redirect()->route('coupon.edit',$coupon->id)->with('success', 'Cập nhật thành công!');
        }else{
            return redirect()->route('coupon.edit',$coupon->id)->with('error', 'Cập nhật thất bại !');
        }
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
    }
   
 
}
