<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;
    protected $table = 'admin_role';
    public $timestamps = true;
    protected $fillable  = [
        'admin_id',
        'role_id'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];
}
