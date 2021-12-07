<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Contracts\OrderInterface;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
protected $orders;
public function __construct(OrderInterface $orders)
{
   $this->orders=$orders;
}
public function index(){
   return view('client.account.index');
}
 function showOrder(){
    $id=Auth::guard('cus')->user()->id;
    $data=$this->orders->showCustomerOrder($id);
    return view('client.account.order',compact('data'));
 }
 public function showOrderDetail($id){
    $data=$this->orders->showOrderDetail($id);
    return view('client.account.orderDetail',compact('data'));
 }
 public function updateOrder(Order $id){
   $data=$this->orders->updateStatus($id);
   return $data;
}
}