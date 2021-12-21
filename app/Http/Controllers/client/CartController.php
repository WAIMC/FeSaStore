<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Repositories\Contracts\OrderDetailInterface;
use App\Repositories\Contracts\CartInterface;
use App\Repositories\Contracts\VariantProductInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cart\CheckoutRequest;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use App\Repositories\Contracts\CouponInterface;
class CartController extends Controller
{
    protected $orders;

    public function __construct(CartInterface $orders)
    {
       
        $this->orders = $orders;
        
    }
    public function view()
    {
        return view('client.carts.view');
    }
    public function add(CartHelper $cart, Request $request)
    {
        $cart->add($request->id, $request->quantity);

        return view('client.partials.cart_qickview');
    }
    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return view('client.partials.cart_qickview');
    }
    public function removelistcart(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return view('client.carts.list-cart');
    }
    public function update(CartHelper $cart, Request $request)
    {
        $cart->update($request->id, $request->quantity);
        return view('client.carts.list-cart');
    }
    public function checkout()
    {
        return view('client.carts.checkout');
    }
    public function PostCheckout(CheckoutRequest $request)
    { 
       
        $id=Auth::guard('cus')->user()->id;
        if ($request->payment==2) {
            $data=[
                'name' =>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'note'=>$request->note,
                'customer_id'=>$id,
             ];
             session(['cus_info' => $data]);
         return  $this->orders->vnpayCheckout();
        }else{
        $this->orders->checkout($request->name ,$request->email,$request->phone,$request->address,$request->note,$id);
           return redirect()->route('cart.view')->with('success','Đặt hàng thành công'); 
        }
      
    }

    public function vnpayReturn(Request $request){
      
        if($request->vnp_ResponseCode == "00") {
        $data=  [
            'vnp_Amount'=>$request->vnp_Amount,
            'vnp_BankCode'=>$request->vnp_BankCode,
            'order_code'=>$request->vnp_TxnRef,
            'vnp_CardType'=>$request->vnp_CardType,
            'vnp_OrderInfo'=>$request->vnp_OrderInfo,
        ]  ;
     //   dd($request->all());
        $this->orders->vnpayPost(session('cus_info'),$data);
            return redirect()->route('cart.view')->with('success' ,'Đã thanh toán phí dịch vụ');
        }else{
            return redirect()->route('cart.view')->with('error' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
        }
    }

    public function check_coupon(Request $request){
        $data = $request ->all();
        $coupon =Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon -> quantity_coupon>0){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'feature_coupon' => $coupon -> feature_coupon,
                            'id' => $coupon -> id,
                            'coupon_code' => $coupon -> coupon_code,
                            'coupon_number' => $coupon -> coupon_number,
                            'quantity_coupon' => $coupon -> quantity_coupon,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'feature_coupon' => $coupon -> feature_coupon,
                        'id' => $coupon -> id,
                        'coupon_code' => $coupon -> coupon_code,
                        'coupon_number' => $coupon -> coupon_number,
                        'quantity_coupon' => $coupon -> quantity_coupon,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('success','Đã thêm mã giảm giá!');
            }
        }
        else{
            return redirect()->back()->with('error','Mã giảm giá không tồn tại!');
        }
    }

    public function delete_coupon(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
        }
        return redirect()->back()->with('success','Đã xóa mã giảm giá');
    }

}