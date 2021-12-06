<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    // using table comment , if doesn't declare $table default table is directory + s : ex categories
    protected $table = 'product_rating';

    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of table
    protected $fillable = [
        'star_rating',
    	'product_id',
    	'customer_id'	
    ];

    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
