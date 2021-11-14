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
                        <p class="mb-10"> @if (Session::has('message'))
                            <div class="alert " role="alert">
                              
                                {{ Session::get('message') }}
                            </div>
                        @endif</p>
                    </div>
                    <form class="password-forgot clearfix" action="{{route('client.forget.password.post')}}" method="POST">
                        @csrf          
                        <fieldset>
                            @if (Session::has('success'))
                            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                            <legend>Nhập địa chỉ email của bạn</legend>
                            <div class="form-group d-md-flex">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Nhập địa chỉ email của bạn vào đây ...</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email của bạn vào đây ...">
                                    @error('email')
                                    <small  class="text-danger">{{$message}}</small> 
                                    @enderror 
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
