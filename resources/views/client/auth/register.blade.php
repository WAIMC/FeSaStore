@extends('client.layouts.master')
@section('title','Đăng ký')
@section('main')
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
            <!-- Breadcrumb End -->
        <!-- Register Account Start -->
            <div class="register-account ptb-100 ptb-sm-60">
                <div class="container">
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
                                        <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Họ và tên</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="f-name" placeholder="Họ và tên">
                                            @error('name')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                        </div>
                                       
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                                        <div class="col-md-10">
                                            <input type="email" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn vào đây ...">
                                            @error('email')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="number"><span class="require">*</span> Điện thoại</label>
                                        <div class="col-md-10">
                                            <input type="text" name="phonenumber"value="{{old('phonenumber')}}"  class="form-control" id="number" placeholder=" Điện thoại">
                                            @error('phonenumber')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
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

    @endsection
