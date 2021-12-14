<?php 
  
namespace App\Http\Controllers\client\Auth; 
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Repositories\Contracts\UserInterface;
  
class ForgotPasswordController extends Controller
{

    protected $users;
    public function __construct(UserInterface $users)
    {
        $this->users=$users;
    }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('client.auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:Customer,email',
          ] ,[
            'email.required'=>'Không để email trống!',
            'email.email'=>'Nhập dữ liệu không phải email!',
            'email.exists'=>'Địa chỉ email bạn nhập không đúng!',
        ]);
  
 $this->users->SendMail($request->email,'forgetPassword');
        return redirect()->route('client.forgotPassword')->with('message', 'Chúng tôi đã gửi xác nhận đến email của bạn,vui lòng kiểm tra lại!');
   
          
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('client.auth.forgetPasswordLink', compact('token'));
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'password' => 'required|string|min:8|confirmed',
          ],
          [
              'password.required'=>'Mật khẩu không được bỏ trống!',
              'password.min'=>'Mật khẩu ít nhất 8 kí tự',
              'password.confirmed'=>'Nhập lại mật khẩu sai!',
          ],);
  
  $this->users->ResetPassword($request->token,$request->password);
          return redirect()->route('client.login')->with('success', 'Cập nhật thành công!');
        }
    }