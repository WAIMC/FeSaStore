<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingLink extends Model
{
    use HasFactory;

    protected $table = 'setting_link';

    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of table
    protected $fillable = [
        'config_key',
        'config_value'
    ];

    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
