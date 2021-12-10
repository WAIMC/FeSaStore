  <!-- Table Content Start -->
  @if (Session::has('error'))
  <div class="alert alert-danger  alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
      {{ Session::get('error') }}
  </div>
  @endif
  <div class="table-content table-responsive mb-45">
    <table >
        <thead>
            <tr>
                <th class="product-thumbnail">Sản phẩm</th>
                <th class="product-name">Tên sản phẩm</th>
                <th class="product-price">Phân loại</th>
                <th class="product-quantity">Giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal">Tổng tiền</th>
                <th class="product-remove"></th>
            </tr>
        </thead>
        <tbody id="change-cart">
           
            @if (isset($cart))
               @foreach ($cart->items as $item)
                <tr>
                    <td class="product-thumbnail">
                        <a href="#"><img src="{{url('public/thumbs')}}/{{$item['image'] }}" alt="cart-image"></a>
                    </td>
                    <td class="product-name"><a href="#">{{$item['name'] }}</a></td>
                    <td class="product-price">{{$item['attr'] }}</td>
                    <td class="product-price"><span class="amount">{{ number_format($item['price'] )  }} VND</span></td>
                    <td class="product-quantity"><input type="number" value="{{$item['quantity'] }}" onchange="updateCart(this.value,'{{$item['id']}}')" ></td>
                    <td class="product-subtotal"> {{ number_format($item['price'] * $item['quantity']) }} VND</td>
                    <td class="product-remove"> 
                        <a href="" ><i class="fa fa-times"  onclick="deleteCartitem({{$item['id'] }})" aria-hidden="true"></i>
                        </a>
                    </td>
                    </td>
                </tr> 
               @endforeach 
            @endif
         
        </tbody>
    </table>
</div>
<!-- Table Content Start -->
<div class="row">
   <!-- Cart Button Start -->
    <div class="col-md-8 col-sm-12">
        <div class="buttons-cart">
          
            <a href="#">Tiếp tục mua sắm</a>
        </div>
    </div>
    <!-- Cart Button Start -->
    <!-- Cart Totals Start -->
    <div class="col-md-4 col-sm-12">
        <div class="cart_totals float-md-right text-md-right">
            <h4>Tổng đơn hàng</h4>
            <br>
            <table class="float-md-right">
                <tbody>
                    {{-- <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td><span class="amount">{{ number_format($cart->total_price) }}</span></td>
                    </tr> --}}
                    <tr class="order-total">
                        <th>Tổng tiền</th>
                        <td>
                            <strong><span class="amount">{{ number_format($cart->total_price) }} VND  
                                       </span></strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="wc-proceed-to-checkout">
                @if (Auth::guard('cus')->user()) 
                <a href="{{route('cart.checkout')}}">Tiến hành thanh toán</a>
                @else
                <a href="{{route('client.login')}}" >Vui lòng đăng nhập để thanh toán</a>
                @endif
            </div>
        </div>
    </div>
    <!-- Cart Totals End -->
</div>
<!-- Row End -->
<input type="hidden" value="{{ number_format($cart->total_price) }}" id="amount_price">