@extends('client.layouts.master')
@section('title', 'Quản lý tài khoản')
@section('main')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                    <li class="active"><a href="blog">Tài khoản</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <div class="account ">
        <div class="container">
            <div class="row p-3">
                @include('client.partials.menu_account')
                <div class="col-lg-9 p-3 account_main">
                    <div class="row">
                        <div class="col-12">
                            <h5>Thông tin cá nhân</h5>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" name="" value="{{ Auth::guard('cus')->user()->name }}"  id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Điện thoại</label>
                                <input type="text" name="" value="{{ Auth::guard('cus')->user()->phone }}"  id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="" value="{{ Auth::guard('cus')->user()->address }}"  id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="" value="{{ Auth::guard('cus')->user()->email }}"  id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .account {
            min-height: 400px;
        }

        .account_main {
            background: #f8f8f8;
        }

    </style>
@endsection
