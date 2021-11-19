@extends('client.layouts.master')
@section('title','Nhập mật khẩu mơis')
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
                </div>
                <!-- Container End -->
            </div>
            <!-- Breadcrumb End -->
            <!-- Register Account Start -->
            <div class="Lost-pass ptb-100 ptb-sm-60">
                <div class="container">
                    <div class="register-title">
                        <h3 class="mb-10 custom-title">Quên mật khẩu</h3>
                    </div>
                    <form class="password-forgot clearfix" action="{{route('client.reset.password.post')}}" method="POST">
                        @csrf   
                        <input type="hidden" name="token" value="{{ $token }}">       
                     
                        <fieldset>
                            @if (Session::has('success'))
                            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                            <legend>Nhập lại mật khẩu mới</legend>
                            <div class="form-group d-md-flex">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Nhập địa chỉ email của bạn ">
                                    @error('email')
                                    <small  class="text-danger">{{$message}}</small> 
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-md-flex mt-2">
                                <label class="control-label col-md-2" for="password"><span class="require">*</span>Mật khẩu</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu ">
                                    @error('password')
                                    <small  class="text-danger">{{$message}}</small> 
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-md-flex mt-2">
                                <label class="control-label col-md-2" for="password"><span class="require">*</span>Nhập lại mật khẩu</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Nhập lại mật khẩu ">
                                    @error('password_confirmation')
                                    <small  class="text-danger">{{$message}}</small> 
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons newsletter-input">
                            <div class="float-left float-sm-left">
                            </div>
                            <div class="float-right float-sm-right">
                                <input type="submit" value="Cập nhật" class="return-customer-btn">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Container End -->
            </div>
            <!-- Register Account End -->
       
    @endsection
