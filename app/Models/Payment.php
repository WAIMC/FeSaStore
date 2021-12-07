<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='payment';
    protected $fillalbe=[
        'vnp_Amount',
        'vnp_BankCode',
        'order_code',
        'vnp_CardType',
        'vnp_OrderInfo',
        'order_id'
    ];
}