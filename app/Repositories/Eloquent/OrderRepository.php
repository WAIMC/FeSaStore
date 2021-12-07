<?php

    namespace App\Repositories\Eloquent;

    use App\Models\Order;
    use App\Repositories\Contracts\OrderInterface;
    use App\Repositories\Eloquent\BaseRepository;
    use App\Models\VariantProduct;
    class OrderRepository extends BaseRepository implements OrderInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
        public function getModel()
        {
            return \App\Models\Order::class;
        }
  
        public function showOrderDetail($id){
            $data=$this->getModel()::join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('variant_product', 'order_detail.variant_product_id', '=', 'variant_product.id')
            ->join('product', 'variant_product.product_id', '=', 'product.id')
            ->select('order.*', 'order_detail.quantity', 'order_detail.price','variant_product.variant_attribute'
            , 'product.name as sanpham', 'product.image')->where('order_id',$id)
             ->get(); 
             return $data;
        }
        public function updateStatus($order){
            if(request()->status==3){
                     foreach($order->orderDetail as $ord)
                     {
                         $product=VariantProduct::find($ord->variant_product_id);
                         $product->quantity+=$ord->quantity;
                         $product->update(['quantity'=> $product->quantity]);
                     }       
            }
          return $order->update(['status'=>request()->status]);

        }

        public function showCustomerOrder($id){
            return $this->getModel()::orderBy('id','DESC')->where('customer_id',$id)->get();
        }
    }

?>