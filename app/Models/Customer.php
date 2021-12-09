<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Customer   extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
protected $table='customer';

    protected $fillable = [
        'name',
        'password',
        'address',
        'phone',
        'email',
        'status',
        'provider',
        'provider_id',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get one product rating
     * 
     * @return Object
     */
    public function customer_product_rating()
    {
        return $this->hasOne(ProductRating::class, 'id', 'customer_id');
    } 
    
    /**
     * Get many product comment
     * 
     * @return Object
     */
    public function customer_product_comment()
    {
        return $this->hasMany(Comment::class, 'customer_id', 'id');
    } 

    /**
     * Get many order
     * 
     * @return Object
     */
    public function customer_order()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    } 

    /**
     * Get many comment blog
     * 
     * @return Object
     */
    public function customer_blog_comment()
    {
        return $this->hasMany(BlogComment::class, 'customer_id', 'id');
    } 

}

