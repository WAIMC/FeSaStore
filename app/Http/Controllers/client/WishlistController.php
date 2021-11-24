<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\WishlistHelper;
use App\Repositories\Contracts\OrderDetailInterface;
use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Contracts\VariantProductInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cart\CheckoutRequest;
class WishlistController extends Controller
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
        return view('client.wishlist.view');
    }
    public function add(WishlistHelper $wishlist, Request $request)
    {
        $wishlist->add($request->id, $request->quantity);

        return view('client.partials.wishlist_qickview');
    }
    public function remove(WishlistHelper $wishlist, $id)
    {
        $wishlist->remove($id);
        return view('client.partials.wishlist_qickview');
    }
    public function removelistwishlist(WishlistHelper $wishlist, $id)
    {
        $wishlist->remove($id);
        return view('client.wishlist.view');
    }
    public function update(WishlistHelper $wishlist, Request $request)
    {
        $wishlist->update($request->id, $request->quantity);
        return view('client.wishlist.list-wishlist');
    }
    public function checkout()
    {
        return view('client.wishlist.checkout');
    }
    public function PostCheckout(CheckoutRequest $request)
    { 
        $id=Auth::guard('cus')->user()->id;  
       $this->orders->checkout($request->name ,$request->email,$request->phone,$request->xa.", ".$request->huyen.", ".$request->tinh,$request->note,$id);
           return redirect()->route('cart.view')->with('success','Đặt hàng thành công');
       

    }
}
