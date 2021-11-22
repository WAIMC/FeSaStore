<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Repositories\Contracts\OrderDetailInterface;
use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Contracts\VariantProductInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cart\CheckoutRequest;
class CartController extends Controller
{
    protected $orders;
    protected $orderdetails;
    protected $pro;
    public function __construct(OrderDetailInterface $orderdetails, OrderInterface $orders,VariantProductInterface $pro)
    {
        $this->orderdetails = $orderdetails;
        $this->orders = $orders;
        $this->pro = $pro;
    }
    public function view()
    {
        return view('client.carts.view');
    }
    public function add(CartHelper $cart, Request $request)
    {
        $cart->add($request->id, $request->quantity);

        return view('client.partials.cart_qickview');
    }
    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return view('client.partials.cart_qickview');
    }
    public function removelistcart(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return view('client.carts.list-cart');
    }
    public function update(CartHelper $cart, Request $request)
    {
        $cart->update($request->id, $request->quantity);
        return view('client.carts.list-cart');
    }
    public function checkout()
    {
        return view('client.carts.checkout');
    }
    public function PostCheckout(CheckoutRequest $request)
    {    
        $id=Auth::guard('cus')->user()->id;  
       $this->orders->checkout($request->first_name ." ".$request->last_name,$request->email,$request->phone,$request->xa.", ".$request->huyen.", ".$request->tinh,$request->note,$id);
           return redirect()->route('cart.view')->with('success','Đặt hàng thành công');
       

    }
}