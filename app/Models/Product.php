<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    public $timestamps = true;
    protected $fillable  = [
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'status',
        'variant',
        'category_id',
        'brand_id'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // get a category
    public function product_category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    // get a brand
    public function product_brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    // get all variant product
    public function product_variantProduct()
    {
        return $this->hasMany(VariantProduct::class, 'product_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

    // search name with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('name','like',"%".request()->key."%");
        }
        return $query;
    }

    // search all product in category choose
    public function scopeSearchCategory($query)
    {
        if(request()->searchCategory){
            $query = $query->where('category_id',request()->searchCategory);
        }
        return $query;
    }

    // search all product in brand choose
    public function scopeSearchBrand($query)
    {
        if(request()->SearchBrand){
            $query = $query->where('brand_id',request()->SearchBrand);
        }
        return $query;
    }
}
