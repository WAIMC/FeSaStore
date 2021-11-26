<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Contracts\OrderInterface;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    protected $order;
    protected $orderdetail;
   public function __construct(OrderInterface $orders)
   {
       $this->order = $orders;
   }
   public function index(){
       $data = $this->order->getAll();
       return view('dashboard.order.index', compact('data'));
   }

   public function show($order)
   {
     $data= $this->order->showOrderDetail($order);

     return view('dashboard.order.show', compact('data'));
   }

   public function destroy(Order $order)
   {
       if($this->order->destroy($order)){
           return redirect()->route('order.index')->with('success','Xóa dữ liệu thành công!');
       }else{
           return redirect()->route('order.index')->with('error','Xóa dữ liệu thất bại!');
       }
   }
   public function update(Order $order){
       if ($this->order->updateStatus($order)) {
        return redirect()->back()->with('success','Cập nhật trạng thái thành công!');
       }
       
   }

}
