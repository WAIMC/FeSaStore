<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    	'email',
    	'password',
    	'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

<<<<<<< HEAD

=======
    // get data from AdminRole table
    public function adminRole()
    {
        return $this->hasMany(AdminRole::class,'admin_id','id');
    }

    // get data role in role table
    public function getRoles()
    {
        return $this->belongsToMany(Role::class,'admin_role','admin_id','role_id');
    }

     // get route permission
     public function routes()
     { 
         $data = [];
         foreach ($this->getRoles as $role) {
             $permission = json_decode($role->permission);
             foreach ($permission as $per) {
                 if(!in_array($per,$data)){
                     array_push($data,$per);
                 }
             }
         }
         return $data;
     }

    // check route permission
    public function hasPermission($route)
    {
        return in_array($route,$this->routes()) ? true : false;
    }
    
>>>>>>> fadf6e64bbee1bd37b25d44d0e5fd3a603a8738e
}
