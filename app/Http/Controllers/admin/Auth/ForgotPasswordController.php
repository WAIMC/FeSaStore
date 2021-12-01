<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AdminInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    protected $admin_repo;

    public function __construct(AdminInterface $admin_repo)
    {
        $this->admin_repo = $admin_repo;
    }

    /**
     * Forgot password
     * @param NA
     * @return view
     */
    public function showForm()
    {
        return view('dashboard.auth.passwords.reset');
    }

    /**
    * Send email to the email above with a link to your password reset
    * something like url('password-reset/' . $token)
    * Sending email varies according to your Laravel version. Very easy to implement
    */
    public function sendPasswordResetToken(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:admin'
            ],
            [
                'email.required' => 'Không bỏ trống email',
                'email.email' => 'Không đúng đinh dạng email',
                'email.exists' => 'Không tồn tại email',
            ]
        );

        //create a new token to be sent to the user. 
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

        $token = $tokenData->token;
        $email = $request->email; // or $email = $tokenData->email;

        Mail::send('dashboard.email.resetPassword', ['token' => $token, 'email' => $email], function ($message) use ($email) {
            $message->from('fesastorefpoly@gmail.com');
            $message->to($email);
            $message->subject('Cài Lại Mật Khẩu Quản Trị FeSa ');
        });
        
        if(Mail::failures() != 0) {
            return back()->with('success', 'Thành công ! Đường dẫn cài lại mật khẩu đã được gửi tới email của bạn.');
        }
        return back()->with('failed', 'Thất bại ! Có một số vẫn đề với email được gửi.');
    }

    /**
     * Assuming the URL looks like this 
     * http://localhost/password-reset/random-string-here
     * You check if the user and the token exist and display a page
     */
    public function showPasswordResetForm($token)
    {
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();

        if ( !$tokenData ) abort(404,'Không Tồn Tại Đường Dẫn Này');; //redirect them anywhere you want if the token does not exist.
        return view('dashboard.auth.passwords.confirm');
    }

    public function resetPassword(Request $request, $token)
    {
        $request->validate(
            [
                'password' => 'required|min:8|confirmed',
            ],
            [
                'password.required' => 'Không để trống mật khẩu',
                'password.min' => 'Ít nhất 8 ký tự',
                'password.confirmed' => 'Nhập lại mật khẩu không đúng',
            ]
        );

        $password = $request->password;
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();

        $check_admin = $this->admin_repo->findEmail($tokenData->email);
        if(!$check_admin){
            abort(404, 'Không Tìm Thấy Tài Khoản');
        }
        
        $update_admin = $this->admin_repo->update($check_admin, ['password' => Hash::make($password)]);

        if($update_admin){
            //If the user shouldn't reuse the token later, delete the token 
            DB::table('password_resets')->where('email', $tokenData->email)->delete();
            return redirect()->route('admin.login');
        }else{
            return redirect()->back()->with('error', 'Thay đổi mật khẩu thất bại !');
        }

    }

}
