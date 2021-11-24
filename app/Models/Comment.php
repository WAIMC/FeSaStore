<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // using table comment , if doesn't declare $table default table is directory + s : ex categories
    protected $table = 'comment';

    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of table
    protected $fillable = [
        'parent_id',
    	'comment',
    	'status',
    	'product_id',
    	'customer_id'
    ];

    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
