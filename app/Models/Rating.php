<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'rating';

    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of table
    protected $fillable = [
        'product_id',
        'customer_id',
        'star'
    ];

    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function pro(){
        return $this->hasOne(Product::class,'id','product_id');
    }

}
