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
                            <h5>Thông tin thanh toán</h5>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6 ">
                            <div class="item">
                                <div class="info">
                                    <div class="name">{{ Auth::guard('cus')->user()->name }}<span><br>
                                             </div>
                                    <div class="address"><span>Địa chỉ: {{ Auth::guard('cus')->user()->address }}</div>
                                    <div class="phone"><span>Điện thoại: </span>{{ Auth::guard('cus')->user()->phone }}</div>
                                </div>
                                <div class="action"><a class="edit"
                                        href="{{route('client.account.address')}}">Chỉnh sửa</a></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @if (Session::has('success'))
            alertify.success(' {{ Session::get('success') }}');
        @endif
        @if (Session::has('error'))
            alertify.error(' {{ Session::get('error') }}');
        @endif
    </script>
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
