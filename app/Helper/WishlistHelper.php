<?php

namespace App\Helper;
use App\Models\VariantProduct;

class WishlistHelper
{

    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('wishlist') ? session('wishlist') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    public function add($id_variant, $quantity )
    {
       
        $product=VariantProduct::find($id_variant);
         
        if($product->quantity < $quantity){
            return redirect()->back()->with('error','Vui lòng đặt sô lượng nhỏ hơn '.$product->quantity);
        }else{
          
               $item = [
            'id' => $product->id,
            'name' => $product->getProduct->name,
            'attr' => $product->variant_attribute,
            'image' => $product->getProduct->image,
            'price' => $product->discount > 0 ? $product->discount : $product->price,
            'quantity' => $quantity
                        ];
         if (isset($this->items[$product->id])) {
             $this->items[$product->id]['quantity'] += $quantity;
         } else {
            $this->items[$product->id] = $item;
            
         }

         session(['wishlist' => $this->items]);
        }
       
  
    }

    public function remove($id)
    {
        if (isset($this->items[$id])) {
          
           
           unset($this->items[$id]) ;
        }
        session(['wishlist' => $this->items]);
    }

    public function update($id, $quantity)
    {
        $product=VariantProduct::find($id);
        if($product->quantity < $quantity){
            if($product->quantity>0){ 
                return redirect()->back()->with('error','Vui lòng đặt sô lượng nhỏ hơn '.$product->quantity);}
            else{
                return redirect()->back()->with('error','Chỉ còn 1 sản phẩm trong kho! ');
            }
           
        }else{
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['wishlist' => $this->items]);
    }
}

    public function clear()
    {

        session(['wishlist' =>'']);
    }

    private function get_total_price()
    {
        $t = 0;
        foreach ($this->items as $item) {
            $t += $item['price'] * $item['quantity'];
        }
        return $t;
    }

    private function get_total_quantity()
    {
        $q = 0;
        foreach ($this->items as $item) {
            $q += $item['quantity'];
        }
        return $q;
    }
}
