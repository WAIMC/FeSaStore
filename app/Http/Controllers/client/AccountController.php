<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Contracts\UserInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
class AccountController extends Controller
{
      protected $orders;
      protected $cus;
      public function __construct(OrderInterface $orders,UserInterface $cus)
      {
         $this->orders=$orders;
         $this->cus=$cus;
      }
      public function index(){
         return view('client.account.index');
      }
      function showOrder(){
         $id=Auth::guard('cus')->user()->id;
         $data=$this->orders->showCustomerOrder($id);
         return view('client.account.order',compact('data'));
      }
      public function showOrderDetail($id){
         $data=$this->orders->showOrderDetail($id);
         $data_cou=$this->orders->find($id);
         return view('client.account.orderDetail',compact('data','data_cou'));
      }
      public function updateOrder(Order $id){
         $data=$this->orders->updateStatus($id);
         return $data;
      }
      public function Address(){
         return view('client.account.address');
      }
      public function updateAddress(Customer $user_id,UpdateRequest $request){
         $attribute=[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address' => $request->thon.",".$request->xa.",".$request->huyen.",".$request->tinh,
         ];
       //  return $attribute;

         $this->cus->update($user_id,$attribute);
      }

      public function showChangePass(){
         return view('client.account.changePass');
      }

      public function ChangePass(Request $request){
         $request->validate([
            'email' => 'required|email|exists:Customer,email',
        ] ,[
          'email.required'=>'Không để email trống!',
          'email.email'=>'Nhập dữ liệu không phải email!',
          'email.exists'=>'Địa chỉ email bạn nhập không đúng!',
      ]);
     $this->cus->SendMail($request->email,'changePassword');
        return redirect()->back()->with('success','Chúng tôi đã gửi liên kết tới email của bạn ');
     
      }
      public function showResetPasswordForm($token){
         return view('client.account.formchangePass',compact('token'));
      }
      public function submitResetPasswordForm(Request $request){
         $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ],
        [
            
            'password.required'=>'Mật khẩu không được bỏ trống!',
            'password.min'=>'Mật khẩu ít nhất 8 kí tự',
            'password.confirmed'=>'Nhập lại mật khẩu sai!',
        ],);
     //   dd($request->all());
        $this->cus->ResetPassword($request->token,$request->password);
        return redirect()->route('client.account.index')->with('success', 'Cập nhật thành công!');
      }
}