<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponOrder extends Model
{
    use HasFactory;
    protected $table='coupon_order';
    protected $fillable=[
        'order_id'	,
        'coupon_id'	
    ];
    public $timestamps = false;
}