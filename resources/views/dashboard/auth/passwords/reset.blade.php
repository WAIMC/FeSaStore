<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FeSa Quản Trị | Cài Lại Mật Khẩu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('admin.index') }}"><b>FeSa</b>Quản Trị</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bạn quyên mật khẩu ? Ở đây bạn dễ dàng có mật khẩu mới.</p>
                @if (Session::has('success'))
                    <h5 class="text-success">{{ Session::get('success') }}</h5>
                @endif
                @if (Session::has('failed'))
                    <h5 class="text-danger">{{ Session::get('failed') }}</h5>
                @endif
                <form method="post">
                    @csrf

                    {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Yêu Cầu Mật Khẩu Mới</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('admin.login') }}">Đăng Nhập</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('admin.register') }}" class="text-center">Đăng Ký Thành Viên Mới</a>
                </p>
            </div>
        <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('public/dashboard') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/dashboard') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/dashboard') }}/dist/js/adminlte.min.js"></script>

</body>
</html>
