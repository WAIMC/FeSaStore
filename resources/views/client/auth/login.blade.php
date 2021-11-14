@extends('client.layouts.master')
@section('title','Đăng nhập')
@section('main')
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="">Trang Chủ</a></li>
                        <li><a href="">Tài Khoản</a></li>
                        <li class="active"><a href="{{ route('client.login') }}">Liên Hệ Với Chúng Tôi</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- LogIn Page Start -->
        <div class="log-in ptb-100 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <!-- New Customer Start -->
                    <div class="col-md-6">
                        <div class="well mb-sm-30">
                            <div class="new-customer">
                                <h3 class="custom-title">Khách Hàng Mới</h3>
                                <p class="mtb-10"><strong>Đăng ký</strong></p>
                                <p>Bằng cách tạo tài khoản, bạn sẽ có thể mua sắm nhanh hơn, cập nhật trạng thái đơn hàng và theo dõi các đơn hàng bạn đã thực hiện trước đó</p>
                                <a class="customer-btn" href="{{route('client.register')}}">Tiếp Tục</a>
                            </div>
                        </div>
                    </div>
                    <!-- New Customer End -->
                    <!-- Returning Customer Start -->
                    <div class="col-md-6">
                        <div class="well">
                            <div class="return-customer">
                                <h3 class="mb-10 custom-title">Khách Hàng Trở Lại</h3>
                                <p class="mb-10"><strong>Tôi là một khách hàng cũ</strong></p>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="Nhập địa chỉ email của bạn..." id="input-email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="text" name="password" placeholder="Mật khẩu" id="input-password" class="form-control">
                                    </div>
                                    <p class="lost-password"><a href="{{route('client.forgotPassword')}}">Quên mật khẩu?</a></p>
                                    <span>Ghi nhớ</span>
                                    <input type="checkbox"  name="remember" value="1"> &nbsp;
                                    <input type="submit" value="Đăng Nhập" class="return-customer-btn">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Returning Customer End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- LogIn Page End -->



    @endsection
