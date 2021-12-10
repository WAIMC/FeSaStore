<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserInterface;
use App\Repositories\Eloquent\BaseRepository;
use DB;
use Carbon\Carbon;
use App\Models\Customer;
use Mail;
use Hash;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserInterface
{

    /**
     *   choose model connect
     *   @return model
     */
    public function getModel()
    {
        return \App\Models\Customer::class;
    }

    public function SendMail($email)
    {
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]); 
            Mail::send('client.email.forgetPassword', ['token' => $token, 'email' => $email], function ($message) use ($email) {
                $message->from('fesastorefpoly@gmail.com');
                $message->to($email);
                $message->subject('Reset Password');
            });
     
      
    }
    public function ResetPassword($email, $token,$password)
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $email,
                'token' => $token
            ])
            ->first();

        if (!$updatePassword) {
            return redirect()->back()->with('error', 'Invalid token!');
        }else{
            $user = $this->getModel()::where('email', $email)
            ->update(['password' => Hash::make($password)]);

        DB::table('password_resets')->where(['email' => $email])->delete();
        }

      
    }
    public  function findOrCreateUser($user, $provider){
        $authUser = $this->getModel()::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return $this->getModel()::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'phone' => '',
            'address'=>'',
            'password'=>'',
            'avatar'=>$user->avatar,
            
        ]);
    }
}
