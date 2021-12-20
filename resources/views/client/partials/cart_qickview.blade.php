<li>
                                      
    @foreach ($cart->items as $item)
    <div class="single-cart-box">
      <div class="cart-img">
          <a href="#"><img src="{{url('public/uploads')}}/{{$item['image']}}" alt="{{$item['name']}}"></a>
          <span class="pro-quantity">X{{$item['quantity']}}</span>
      </div>
      <div class="cart-content">
          <h6><a href="{{route('client.index')}}">{{$item['name']}}</a></h6>
          <span class="cart-pricegit">{{ number_format($item['price'])}} VND</span>
          <span>Thuộc tính: {{$item['attr']}}</span>
         
      </div>
      <a class="del-icone" href="#"><i class="ion-close" data-id="{{$item['id']}}"></i></a>
  </div>
    @endforeach  

  <!-- Cart Box Start -->
 
  <!-- Cart Box End -->

  <!-- Cart Footer Inner Start -->
  <div class="cart-footer">
     <ul class="price-content">
         {{-- <li>Subtotal <span>$57.95</span></li>
         <li>Shipping <span>$7.00</span></li>
         <li>Taxes <span>$0.00</span></li> --}}
         <li>Tổng tiền <span>{{number_format($cart->total_price) }} VND</span></li>
     </ul>
      <div class="cart-actions text-center">
        <a class="cart-checkout" href="{{route('cart.view')}}">Giỏ hàng</a>
      </div>
  </div>
  <input type="hidden" id="quantity_cart" value="{{$cart->total_quantity}}">
  <!-- Cart Footer Inner End -->
</li>