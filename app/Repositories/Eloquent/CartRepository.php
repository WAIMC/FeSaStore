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

        public function vnpayCheckout(){
            $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
            $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('cart.vnpayReturn');
            $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = request()->amount * 100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();
    
            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );
    
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
    
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
               // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            return redirect($vnp_Url); 
        }
    }
