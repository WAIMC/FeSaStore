@extends('client.layouts.master')
@section('title', 'Quản lý tài khoản')
@section('main')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                    <li class="active"><a href="#">Tài khoản</a></li>
                    <li class="active"><a href="#">Đổi mật khẩu</a></li>
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
                            <h5>Đổi mật khẩu</h5>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <form action="" method="POST" class="col-lg-12 ">
                           @csrf <div class="form-group">
                                <label >Chúng tôi sẽ gửi mã xác thức về tài khoản email của bạn</label>
                                <input type="text" name="email" value="{{ Auth::guard('cus')->user()->email }}"  id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <button type="submit" id="submit-form" class="buttons-cart btn btn-dark float-right">Gửi</button>
                        </form>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @if (Session::has('success'))
       alertify.success('  {{ Session::get('success') }}');
       @endif
       @if (Session::has('error'))
       alertify.error('  {{ Session::get('error') }}');
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
