<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantProduct extends Model
{
    use HasFactory;

    protected $table = 'variant_product';
    public $timestamps = true;
    protected $fillable  = [
        'variant_attribute',
    	'quantity',
    	'price',
    	'discount',
    	'gallery',
    	'status',
    	'product_id'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    public function getProduct(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    // connect get data product by foreign key : 1-n
    // public function product_category()
    // {
    //     return $this->hasOne(Category::class,'id','id_category');
    // }

    // search all product in category choose
    // public function scopeSearchCategory($query)
    // {
    //     if(request()->searchCategory){
    //         $query = $query->where('id_category',request()->searchCategory);
    //     }
    //     return $query;
    // } 

    // check product exits in variant 
    // public function product_variantProduct()
    // {
    //     return $this->hasMany(VariantProduct::class,'id_product','id');
    // }

    // get review (comment, rating star,..)
    // public function product_review()
    // {
    //     return $this->hasMany(Review::class,'id_product','id');
    // }

    // check product exits in order 
    public function product_orderDetail()
    {
        return $this->hasMany(OrderDetail::class,'variant_product_id','id');
    }
}
