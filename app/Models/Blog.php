<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected  $table='blog';
    protected $fillable=['title',	'content','description','image','author','slug'	,'category_blog_id'	];
public function getcategoryblog(){
    return $this->hasOne(CategoryBlog::class,'id','category_blog_id');
}
public function getauthor(){
    return $this->hasOne(Admin::class,'id','author');
}
}
