<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    use HasFactory;

    // using table comment , if doesn't declare $table default table is directory + s : ex categories
    protected $table = 'comment_blog';

    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of tableC
    protected $fillable = [
        'parent_id',
    	'comment',
    	'status',
    	'blog_id',
    	'customer_id'
    ];

    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function blog(){
        return $this->hasOne(blog::class,'id','blog_id');
    }
}
