<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('public/dashboard/login/style.css') }}">
</head>
<body>
    <h2>Chào Mừng Trở Lại Quản Trị Của Tôi!</h2>
    <div class="container" id="container">

        {{-- register --}}
        <div class="form-container sign-up-container">
            <form action="{{ route('admin.register') }}" method="POST" id="formRegister">
                @csrf
                <h1>Tạo Tài Khoản</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                    @if (Session::has('success'))
                        <span style="font-weight: bold; color:rgb(27, 165, 96)">{{ Session::get('success') }}</span>   
                    @elseif (Session::has('error'))
                        <span style="font-weight: bold; color:rgb(187, 54, 49)">{{ Session::get('error') }}</span>   
                    @endif

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Họ Và Tên" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật Khẩu" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Nhập Lại Mật Khẩu">
                
                <button type="button" id="register">Đăng Ký</button>
            </form>
        </div>

        {{-- login --}}
        <div class="form-container sign-in-container">
            <form action="{{ route('admin.login') }}" method="POST" id="formLogin">
                @csrf
                
                <h1>Đăng Nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                @if (Session::has('success'))
                    <span style="font-weight: bold; color:rgb(27, 165, 96)">{{ Session::get('success') }}</span>   
                @elseif (Session::has('error'))
                    <span style="font-weight: bold; color:rgb(187, 54, 49)">{{ Session::get('error') }}</span>   
                @endif

                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"/>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mật Khẩu" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                                
                                
                    <div style="width: 100%;
                    display: flex;
                    justify-content: left;
                    align-items: center;">
                        <input style="width: 15% !important;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span style="   width: 25%;" class="form-check-label" for="remember">
                            <strong>{{ __('Ghi Nhớ') }}</strong>
                        </>
                    </div>

                    <a href="{{ route('admin.password_reset') }}">Quên Mật Khẩu?</a>
                    <button type="submit" id="login">Đăng Nhập</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào Mừng Trở Lại!</h1>
                    <p>Để giữ kết nối hãy đăng nhập thông tin!</p>
                    <button class="ghost" id="signIn">Đăng Nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin Chào, Bạn!</h1>
                    <p>Nhập thông tin để đăng ký!</p>
                    <button class="ghost" id="signUp">Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('public/dashboard/login/style.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ url('public/dashboard') }}/plugins/jquery/jquery.min.js"></script>
    <script>
        $('#login').click(function (e) { 
            e.preventDefault();
            $('form#formLogin').submit();
        });

        $('#register').click(function (e) { 
            e.preventDefault();
            $('form#formRegister').submit();
        });
    </script>
</body>
</html>