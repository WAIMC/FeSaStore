@extends('client.layouts.master')
@section('title', 'Thanh toán')
@section('main')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                    <li class="active"><a href="#">Thanh toán</a></li>
                    <li class="active"><a href="#">Thanh toán online</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <div class="checkout-area pb-100 pt-15 pb-sm-60">
        <div class="container">
        <h3>Thanh toán Online</h3>
        <div class="table-responsive mt-3 p-5">
            <form action="{{route('cart.postcheckoutonline')}}" id="create_form" method="post">       
@csrf
                <div class="form-group">
                    <label for="language">Loại hàng hóa </label>
                    <select name="order_type" id="order_type" class="form-control">
                        <option value="topup">Nạp tiền điện thoại</option>
                        <option value="billpayment">Thanh toán hóa đơn</option>
                        <option value="fashion">Thời trang</option>
                        <option value="other">Khác - Xem thêm tại VNPAY</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order_id">Mã hóa đơn</label>
                    <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>"/>
                </div>
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" id="amount"
                           name="amount" type="text" readonly value="{{$totalMoney}}"/> 
                </div>
                <div class="form-group">
                    <label for="order_desc">Nội dung thanh toán</label>
                    <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                </div>
                <div class="form-group">
                    <label for="bank_code">Ngân hàng</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="">Không chọn</option>
                        <option value="NCB"> Ngan hang NCB</option>
                        <option value="AGRIBANK"> Ngan hang Agribank</option>
                        <option value="SCB"> Ngan hang SCB</option>
                        <option value="SACOMBANK">Ngan hang SacomBank</option>
                        <option value="EXIMBANK"> Ngan hang EximBank</option>
                        <option value="MSBANK"> Ngan hang MSBANK</option>
                        <option value="NAMABANK"> Ngan hang NamABank</option>
                        <option value="VNMART"> Vi dien tu VnMart</option>
                        <option value="VIETINBANK">Ngan hang Vietinbank</option>
                        <option value="VIETCOMBANK"> Ngan hang VCB</option>
                        <option value="HDBANK">Ngan hang HDBank</option>
                        <option value="DONGABANK"> Ngan hang Dong A</option>
                        <option value="TPBANK"> Ngân hàng TPBank</option>
                        <option value="OJB"> Ngân hàng OceanBank</option>
                        <option value="BIDV"> Ngân hàng BIDV</option>
                        <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                        <option value="VPBANK"> Ngan hang VPBank</option>
                        <option value="MBBANK"> Ngan hang MBBank</option>
                        <option value="ACB"> Ngan hang ACB</option>
                        <option value="OCB"> Ngan hang OCB</option>
                        <option value="IVB"> Ngan hang IVB</option>
                        <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" id="language" class="form-control">
                        <option value="vn">Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán </button>
                <button type="submit" class="btn btn-default">Thanh toán Redirect</button>

            </form>
        </div>
        </div>
      
@endsection
@section('js')
    <script>
        $("#amount").val("{{$totalMoney}}");
    </script>
@endsection