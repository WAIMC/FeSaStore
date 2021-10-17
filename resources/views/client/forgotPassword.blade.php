@extends('master_layout')
    @section('content')
        <!-- Main Wrapper Start Here -->
        <div class="wrapper">
            <!-- Breadcrumb Start -->
            <div class="breadcrumb-area mt-30">
                <div class="container">
                    <div class="breadcrumb">
                        <ul class="d-flex align-items-center">
                            <li><a href="">Trang Chủ</a></li>
                            <li><a href="">Tài Khoản</a></li>
                            <li class="active"><a href="{{ route('site.forgotPassword') }}">Quyên Mật Khẩu</a></li>
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
                    <form class="password-forgot clearfix" action="mail.php">
                        <fieldset>
                            <legend>Thông tin cá nhân của bạn</legend>
                            <div class="form-group d-md-flex">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Nhập địa chỉ email của bạn vào đây ...</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn vào đây ...">
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
            <!-- Support Area Start Here -->
            <div class="support-area bdr-top">
                <div class="container">
                    <div class="d-flex flex-wrap text-center">
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-gift"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Great Value</h6>
                                <span>Nunc id ante quis tellus faucibus dictum in eget.</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-rocket"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Worlwide Delivery</h6>
                                <span>Quisque posuere enim augue, in rhoncus diam dictum non</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                            <i class="lnr lnr-lock"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Safe Payment</h6>
                                <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                            <i class="lnr lnr-enter-down"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Shop Confidence</h6>
                                <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                            <i class="lnr lnr-users"></i>
                            </div>
                            <div class="support-desc">
                                <h6>24/7 Help Center</h6>
                                <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Support Area End Here -->
        </div>
        <!-- Main Wrapper End Here -->
    @endsection
