<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    public $timestamps = true;
    protected $fillable  = [
        'name',
        'permission'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // search item with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('name','like','%'.request()->key.'%');
        }
        return $query;
    }

    // get data from table admin
    public function getAdmins()
    {
        return $this->belongsToMany(Admin::class,'admin_role','role_id','admin_id');
    }
}
