@extends('client.layouts.master')
@section('title', 'Thanh toán')
@section('main')

    @if (count($cart->items) == 'null'){
        <script>
            window.location = "{{ route('client.index') }}";
        </script>
    @endif

    <div class="breadcrumb-area mt-30" onload="check()">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
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
                        <h3>Dùng phiếu giảm giá?

                            <span id="showcoupon">Bấm vào đây để nhập mã của bạn</span>
                        </h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form method="POST" action="{{ url('/cart/check-coupon') }}">
                                    @csrf
                                    <p class="checkout-coupon">
                                        <input type="text" name="coupon" class="code" placeholder="Mã giảm giá">
                                        <input type="submit" class="check_coupon" name="check_coupon" value="Áp dụng">
                                        @if (Session::get('coupon'))
                                            <a class="btn btn-default delete-coupon"
                                                style="background:#00483d; border-radius: 0; text-decoration: none; corlor:#fff"
                                                href="{{ url('/cart/delete-coupon') }}">Xóa mã giảm giá</a>
                                        @endif
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
    <div class="checkout-area pb-100 pt-15 pb-sm-60 ">
        <div class="container">
            <form action="{{ route('cart.postcheckout') }}" id="checkout_form" method="POST" class="row">
                @csrf
                <div class="col-lg-6 col-md-6">
                    <div class="checkbox-form mb-sm-40">
                        <h3>Thông tin chi tiết</h3>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Họ và tên <span class="required">*</span></label>
                                    <input type="text" value="{{ Auth::guard('cus')->user()->name }}" name="name"
                                        placeholder="">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" value="{{ Auth::guard('cus')->user()->email }}" value="email"
                                        name="email" placeholder="">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="text" value="{{ Auth::guard('cus')->user()->phone }}" name="phone"
                                        placeholder="">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="different-address ">
                            <div class="order-notes mb-30">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ nhận hàng</label>
                                    <textarea id="checkout-mess" name="address" cols="20" rows="5"
                                        placeholder="Ghi chú về đơn hàng của bạn.">{{ Auth::guard('cus')->user()->address }}</textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi chú đơn hàng</label>
                                    <textarea id="checkout-mess" name="note" cols="30" rows="10"
                                        placeholder="Ghi chú về đơn hàng của bạn."></textarea>
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
                                                    {{ $item['name'] }} <span class="product-quantity"> ×
                                                        {{ $item['quantity'] }}</span>
                                                </td>
                                                <td class="product-total">
                                                    <span
                                                        class="amount">{{ number_format($item['price'] * $item['quantity']) }}
                                                        VNĐ</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>Tổng hóa đơn</th>
                                        <td>
                                            <span class=" total amount">
                                                {{ number_format($cart->total_price) }} VND
                                            </span>
                                        </td>
                                    </tr>
                                    @if (Session::get('coupon'))
                                        <tr class="cart-subtotal order-total">
                                            <th>Giảm giá</th>
                                            <td>
                                                <span>

                                                    @php
                                                        $total_coupon = $cart->total_price;
                                                    @endphp
                                                    @foreach (Session::get('coupon') as $key => $cou)
                                                        @if ($cou['feature_coupon'] == 1)
                                                            @php
                                                                $total_coupon = $total_coupon - ($total_coupon * $cou['coupon_number']) / 100;
                                                            @endphp

                                                            <span class=" total amount">
                                                                {{ number_format($cou['coupon_number'], 0, ',', '.') }} %
                                                            </span>

                                                        @elseif($cou['feature_coupon']==2)
                                                            @php
                                                                $total_coupon = $cart->total_price - $cou['coupon_number'];
                                                            @endphp

                                                            <span class=" total amount">
                                                                {{ number_format($cou['coupon_number']) }} VND
                                                            </span>

                                                        @endif
                                                    @endforeach

                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng thanh toán</th>
                                            <td>
                                                <span class=" total amount">
                                                    {{ number_format($total_coupon) }} VND
                                                </span>
                                            </td>


                                        </tr>
                                        <input type="hidden" name="amount" value="{{ $total_coupon }}">
                                        @php
                                            $data = Session::get('coupon');
                                            //  dd($data[0]['id']);
                                        @endphp
                                        <input type="hidden" name="id_coupon" value="{{ $data[0]['id'] }}">
                                        {{-- {{  dd(Session::get('coupon'))  }} --}}
                                    @else
                                        <input type="hidden" name="amount" value="{{ $cart->total_price }}">
                                    @endif

                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="wc-proceed-to-checkout">
                                <button type="button" class="buttons-cart btn btn-dark" id="off_form">Thanh toán khi nhận
                                    hàng</button>
                                <button type="submit" class="buttons-cart btn btn-dark" id="btnPopup" name="payment"
                                    value="2">Thanh toán online</button>

                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <div id="loader" class="lds-dual-ring hidden overlay"></div>
        </div>
    </div>

    <!-- checkout-area end -->


@endsection

@section('js')
    <script>
        $("#amount").val("{{ $cart->total_price }}");
        $('#off_form').click(function() {
            // On click, execute the ajax call.
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "Post",
                url: "{{ route('cart.postcheckout') }}",
                dataType: 'json',
                data: $('#checkout_form').serialize(),
                beforeSend: function() { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                    $('#loader').removeClass('hidden')
                },
                success: function(data) {
                    // On Success, build our rich list up and append it to the #richList div.
                    alertify.success('Đặt hàng thành công');
                    location.replace('{{ route('client.index') }}')
                },
                complete: function() { // Set our complete callback, adding the .hidden class and hiding the spinner.
                    $('#loader').addClass('hidden')
                    alertify.success('Đặt hàng thành công');
                    location.replace('{{ route('client.index') }}')
                },
            });
        });
    </script>
    <style>
        .lds-dual-ring.hidden {
            display: none;
        }

        /*Add an overlay to the entire page blocking any further presses to buttons or other elements.*/
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, .8);
            z-index: 999;
            opacity: 1;
            transition: all 0.5s;
            display: none
        }

        /*Spinner Styles*/
        .lds-dual-ring {
            display: inline-block;
            width: 100%;
            height: 100%;
        }

        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 5% auto;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

    </style>
@endsection
