<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of table
    protected $fillable = [
        'coupon_name',
        'feature_coupon',
        'coupon_code',
        'coupon_number',
        'quantity_coupon',
    ];
    protected $primaryKey ='id';
    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
