<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $fillable=
    [
        'name',
        'email',
    	'phone',
    	'address',
    	'note',
    	'status',
    	'customer_id'
    ];
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function getVarriant(){
        return $this->belongsToMany(VariantProduct::class, 'order_detail', 'order_id', 'variant_product_id');
    }
    public function scopeSearch($query){
        if(request()->date_from && request()->date_to){
            $query=$query->whereBetween('created_at',[request()->date_from,request()->date_to]);
        }
        return $query;
    }
    public function getPayment(){
        return $this->hasOne(Payment::class,'order_id','id');
    }
    public function getCoupon(){
        return $this->belongsToMany(Coupon::class,'coupon_order','order_id','coupon_id');
    }
}
