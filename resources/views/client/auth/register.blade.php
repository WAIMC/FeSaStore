@extends('client.layouts.master')
@section('title','Đăng ký')
@section('main')
        <!-- Main Wrapper Start Here -->
        <div class="wrapper">
            <!-- Breadcrumb Start -->
            <div class="breadcrumb-area mt-30">
                <div class="container">
                    <div class="breadcrumb">
                        <ul class="d-flex align-items-center">
                            <li><a href="">Trang Chủ</a></li>
                            <li class="active"><a href="{{ route('client.register') }}">Đăng Ký</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <div class="row">
                <div class="col-12">
                  @if (Session::has('success'))
                      <div class="alert alert-success  alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                          {{ Session::get('success') }}
                      </div>
                  @endif
                  @if (Session::has('error'))
                      <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                          {{ Session::get('error') }}
                      </div>
                  @endif
                </div>
              </div>
            <!-- Breadcrumb End -->
        <!-- Register Account Start -->
            <div class="register-account ptb-100 ptb-sm-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="register-title">
                                <h3 class="mb-10">ĐĂNG KÝ TÀI KHOẢN</h3>
                                <p class="mb-10">Nếu bạn đã có tài khoản với chúng tôi, vui lòng đăng nhập tại trang đăng nhập.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-register" action="" method="POST">
                                @csrf
                                <fieldset>
                                    <legend>Thông tin cá nhân của bạn</legend>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Họ</label>
                                        <div class="col-md-10">
                                            <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" id="f-name" placeholder="Họ">
                                            @error('first_name')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                        </div>
                                       
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="l-name"><span class="require">*</span>Tên</label>
                                        <div class="col-md-10">
                                            <input type="text" value="{{old('last_name')}}" name="last_name" class="form-control" id="l-name" placeholder="Tên">
                                            @error('last_name')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                                        <div class="col-md-10">
                                            <input type="email" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn vào đây ...">
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="number"><span class="require">*</span> Điện thoại</label>
                                        <div class="col-md-10">
                                            <input type="text" name="phonenumber"value="{{old('phonenumber')}}"  class="form-control" id="number" placeholder=" Điện thoại">
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="number"><span class="require">*</span> Địa chỉ</label>
                                        <div class="col-md-10">
                                            <input type="text" name="address"value="{{old('address')}}"  class="form-control" id="number" placeholder=" Địa chỉ">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Mật khẩu của bạn</legend>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Mật khẩu:</label>
                                        <div class="col-md-10">
                                            <input type="password"name="password" class="form-control" id="pwd" placeholder="Mật khẩu">
                                            @error('password')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Xác nhận mật khẩu</label>
                                        <div class="col-md-10">
                                            <input type="password" name="pwd_confirm" class="form-control" id="pwd-confirm" placeholder="Xác nhận mật khẩu">
                                            @error('pwd_confirm')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                {{-- <fieldset class="newsletter-input">
                                    <legend>Bản tin</legend>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="col-md-2 control-label">Đặt mua</label>
                                        <div class="col-md-10 radio-button">
                                            <label class="radio-inline"><input type="radio" name="optradio">Có</label>
                                            <label class="radio-inline"><input type="radio" name="optradio">Không</label>
                                        </div>
                                    </div>
                                </fieldset> --}}
                                <div class="terms">
                                    <div class="float-md-right">
                                        <span>Tôi đã đọc và đồng ý với <a href="#" class="agree"><b>Chính sách quyền riêng tư</b></a></span>
                                        <input type="checkbox" required name="agree" value="1"> &nbsp;
                                        <input type="submit" value="Tiếp Tục" class="return-customer-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Row End -->
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
                                <h6>Giá Trị Lớn</h6>
                                <span>Bây Giờ Đó Là Trước Khi Trái Đất Được Nói Trong Cổ Họng Của Bất Kỳ Người Đàn Ông Cần.</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                                <i class="lnr lnr-rocket"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Giao Hàng Trên Toàn Quốc</h6>
                                <span>Đối Với Mỗi Bộ Tuyên Truyền, Trong Sân Sau Của Zen</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                            <i class="lnr lnr-lock"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Thanh Toán An Toàn</h6>
                                <span>Bộ Phim Có Rất Nhiều Niềm Vui, Nhưng Rất Nhiều Tầng Lớp Trái Đất.</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                            <i class="lnr lnr-enter-down"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Sự Tự Tin Mua Sắm</h6>
                                <span>Cổ Họng Được Cho Là Làm Tăng Nhu Cầu Sợ Hãi. Bộ Phim Rất Thú Vị, Nhưng</span>
                            </div>
                        </div>
                        <div class="single-support">
                            <div class="support-icon">
                            <i class="lnr lnr-users"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Trung Tâm Trợ Giúp 24/7</h6>
                                <span>Đối Với Mỗi Người Nằm Xuống Lửa, Không Ở Sân Sau Của Thiền.</span>
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
