<?php

    namespace App\Repositories\Eloquent;

    use App\Models\OrderDetail;
    use App\Repositories\Contracts\CartInterface;
    use App\Repositories\Eloquent\BaseRepository;
    use App\Models\VariantProduct;
    use App\Helper\CartHelper;
    use Illuminate\Support\Facades\Mail;
    class CartRepository extends BaseRepository implements CartInterface{
        
        /**
        *   choose model connect
        *   @return model
        */ 
   
        public function getModel()
        {
            return \App\Models\Order::class;
        }
  
        public function checkout($name,$email,$phone,$address,$note,$customer_id)
        {
            $dataOrder = [
                'name' =>$name,
                'email'=>$email,
                'phone'=>$phone,
                'address'=>$address,
                'note'=>$note,
                'customer_id'=>$customer_id
            ];
            $order=$this->getModel()::create($dataOrder);
            if($order){
                $order_id=$order->id;
                $cart=new CartHelper();
                foreach ($cart->items as $product_id => $item) {
                 $prod=VariantProduct::find($product_id);
                 $dataOrderDetail=[
                     'name'=>$item['name'],
                     'quantity'=>$item['quantity'],
                     'price'=>$item['price'],
                     'variant_product_id'=>$item['id'],
                     'order_id'=>$order->id
                 ];
                 OrderDetail::create($dataOrderDetail);
                 $quantity=$item['quantity'];
                 $prod->quantity-= $quantity;
                 $prod->update(['quantity'=> $prod->quantity]);
                }
                Mail::send('client.email.checkout',
                [
                    'name'=> $name,
                    'address' => $address,
                    'order'=> $order,
                    'carts'=>$cart->items
                ]
                ,function ($mail) use($order_id,$email,$name) {
                     $mail->from('Tan874979@gmail.com');
                     $mail->to($email, $name);
                     $mail->subject('Đơn hàng #'.$order_id);
                 });
                session(['cart'=>'']);
            }
            
        }
    }
