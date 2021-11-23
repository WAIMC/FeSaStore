@extends('client.layouts.master')
@section('title','Thanh toán')
@section('main')
<div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                        <li class="active"><a href="#">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
</div>
<div class="coupon-area pt-100 pt-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <h3>Dùng phiếu giảm giá? <span id="showcoupon">Bấm vào đây để nhập mã của bạn</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" class="code" placeholder="Mã giảm giá">
                                            <input type="submit" value="Áp dụng">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coupon-area end -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-100 pt-15 pb-sm-60">
            <div class="container">
                <form action="{{route('cart.postcheckout')}}" method="POST" class="row">
                    @csrf
                    <div class="col-lg-6 col-md-6">
                        <div class="checkbox-form mb-sm-40">
                            <h3>Thông tin chi tiết</h3>
                            <div class="row">
                                {{-- <div class="col-md-12">
                                    <div class="country-select clearfix mb-30">
                                        <label>Quốc gia <span class="required">*</span></label>
                                        <select class="wide">
                                            <option value="volvo">Việt Nam</option>
                                            <option value="volvo">Lào </option>
                                            <option value="volvo">Thái Lan</option>
                                        </select>
                                    </div>
                                </div> --}}
                             
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Họ và tên <span class="required">*</span></label>
                                        <input type="text" value="{{Auth::guard('cus')->user()->name}}" name="name" placeholder="">
                                        @error('name')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-md-12 mb-30">
                                    <div class="checkout-form-list">
                                        <label>Xã / Thị Trấn <span class="required">*</span></label>
                                        <input type="text" name="xa" placeholder="Tên xa">
                                        @error('xa')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Huyện <span class="required">*</span></label>
                                        <input type="text" name="huyen" placeholder="">
                                        @error('huyen')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Tỉnh / Thành phố <span class="required">*</span></label>
                                        <input type="text" name="tinh" placeholder="">
                                        @error('tinh')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" value="{{Auth::guard('cus')->user()->email}}" value="email" name="email" placeholder="">
                                        @error('email')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Số điện thoại  <span class="required">*</span></label>
                                        <input type="text" value="{{Auth::guard('cus')->user()->phonenumber}}" name="phone" placeholder="">
                                        @error('phone')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list create-acc mb-30">
                                        <input id="cbox" type="checkbox">
                                        <label>Tạo tài khoản mới?</label>
                                    </div>
                                    <div id="cbox_info" class="checkout-form-list create-accounts mb-25">
                                        <p class="mb-10">Tạo tài khoản bằng cách nhập thông tin bên dưới. Nếu bạn là khách hàng cũ, vui lòng đăng nhập ở đầu trang.</p>
                                        <label>Mật khẩu tài khoản  <span class="required">*</span></label>
                                        <input type="password" placeholder="password">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="different-address">
                                {{-- <div class="ship-different-title">
                                    <h3>
                                        <label>Gửi đến một địa chỉ khác?</label>
                                        <input id="ship-box" type="checkbox">
                                    </h3>
                                </div>
                                <div id="ship-box-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="country-select clearfix mb-30">
                                                <label>Quốc gia <span class="required">*</span></label>
                                                <select class="wide">
                                                    <option value="volvo">Việt Nam</option>
                                                    <option value="volvo">Lào </option>
                                                    <option value="volvo">Thái Lan</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Họ <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Tên <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list mb-30">
                                                <label>Tên công ty</label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list mb-30">
                                                <label>Địa chỉ <span class="required">*</span></label>
                                                <input type="text" placeholder="Tên đường">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list mb-30">
                                                <input type="text" placeholder="Căn hộ,...">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list mb-30">
                                                <label>Thị trấn / Thành phố <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Huyện / Quận <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Mã bưu điện / Zip <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="email" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <label>Số điện thoại  <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Ghi chú đơn hàng</label>
                                        <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Ghi chú về đơn hàng của bạn."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="your-order">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($cart))
                                            @foreach ($cart->items as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                   {{$item['name']}} <span class="product-quantity"> × {{$item['quantity']}}</span>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{number_format($item['price']*$item['quantity']) }}</span>
                                                </td>
                                            </tr> 
                                            @endforeach
                                        @endif
                                        
                                        
                                    </tbody>
                                    <tfoot>
                                        {{-- <tr class="cart-subtotal">
                                            <th>Tổng giỏ hàng</th>
                                            <td><span class="amount">{{$cart->total_price}}</span></td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>Tổng đơn hàng</th>
                                            <td><span class=" total amount">{{$cart->total_price}} VND</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingone">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Chuyển khoản
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingone" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản của chúng tôi.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingtwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Thanh toán Sec
                                        </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Vui lòng gửi séc của bạn đến Tên cửa hàng, Phố cửa hàng, Thị trấn cửa hàng, Bang / Hạt cửa hàng, Mã bưu điện cửa hàng.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingthree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          PayPal
                                        </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion">
                                            <div class="card-body">
                                                 <p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng của mình nếu bạn không có tài khoản PayPal.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wc-proceed-to-checkout">
                        <button type="submit" class="btn btn-info">Đặt hàng</button>
                    </div>
                </form>
                
            </div>
          
        </div>
        <!-- checkout-area end -->
   
      
@endsection