<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Contracts\OrderInterface;
use Illuminate\Http\Request;
use PDF;
class OrderController extends Controller
{
    protected $order;
    protected $orderdetail;

    public function __construct(OrderInterface $orders)
    {
        $this->order = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = $this->order->getAll();
        return view('dashboard.order.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Order  $order
    * @return \Illuminate\Http\Response
    */
    public function show($order)
    {
        $data= $this->order->showOrderDetail($order);
        return view('dashboard.order.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order){
        if ($this->order->updateStatus($order)) {
            return redirect()->back()->with('success','Cập nhật trạng thái thành công!');
        } 
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Order  $order
    * @return \Illuminate\Http\Response
    */
    public function destroy(Order $order)
    {
        if($this->order->destroy($order)){
            return redirect()->route('order.index')->with('success','Xóa dữ liệu thành công!');
        }else{
            return redirect()->route('order.index')->with('error','Xóa dữ liệu thất bại!');
        }
    }
}
