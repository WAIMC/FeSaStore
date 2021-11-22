<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;
    protected  $table='category_blog';
    protected $fillable=['name','description','slug','status'];
    public function getblog(){
        return $this->hasMany(Blog::class,'category_blog_id','id');
    }
}
