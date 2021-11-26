<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='order_detail';
    protected $fillable=
    [
        'name',
        'quantity',
        'price',
        'variant_product_id',
        'order_id'
    ];
    
    public function getVariant(){
        return $this->hasOne(VariantProduct::class,'id','variant_product_id');
    }

}
