@extends('client.layouts.master')
@section('title','Quên mật khẩu')
@section('main')
            <!-- Breadcrumb Start -->
            <div class="breadcrumb-area mt-30">
                <div class="container">
                    <div class="breadcrumb">
                        <ul class="d-flex align-items-center">
                            <li><a href="{{route('client.index')}}">Trang Chủ</a></li>
                            <li><a href="#">Tài Khoản</a></li>
                            <li class="active"><a href="{{ route('client.forgotPassword') }}">Quên Mật Khẩu</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Breadcrumb End -->
            <!-- Register Account Start -->
            <div class="Lost-pass ptb-100 ptb-sm-60">
                <div class="container">
                    <div class="register-title">
                        <h3 class="mb-10 custom-title">Đăng Ký Tài Khoản</h3>
                        <p class="mb-10">Nếu bạn đã có tài khoản với chúng tôi, vui lòng đăng nhập tại trang đăng nhập.</p>
                    </div>
                    <form class="password-forgot clearfix" action="{{route('password.email')}}" method="POST">
                        @csrf          
                        <fieldset>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <legend>Thông tin cá nhân của bạn</legend>
                            <div class="form-group d-md-flex">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Nhập địa chỉ email của bạn vào đây ...</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email của bạn vào đây ...">
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons newsletter-input">
                            <div class="float-left float-sm-left">
                                <a class="customer-btn mr-20" href="">Trở Lại</a>
                            </div>
                            <div class="float-right float-sm-right">
                                <input type="submit" value="Tiếp Tục" class="return-customer-btn">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Container End -->
            </div>
            <!-- Register Account End -->
       
    @endsection
