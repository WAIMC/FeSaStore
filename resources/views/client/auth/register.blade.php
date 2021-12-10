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
                            <form class="form-register" id="formid" action="" method="POST">
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
                                            <small  id="nameError" class="text-danger"></small>
                                        </div>
                                       
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                                        
                                        <div class="col-md-10">
                                            <input type="email" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn vào đây ...">
                                            @error('email')
                                            <small   class="text-danger">{{$message}}</small> 
                                            @enderror
                                            <small  id="emailError" class="text-danger"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="number"><span class="require">*</span> Điện thoại</label>
                                        <div class="col-md-10">
                                            <input type="text" name="phone"value="{{old('phone')}}"  class="form-control" id="number" placeholder=" Điện thoại">
                                            @error('phone')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                            <small  id="phoneError" class="text-danger"></small>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Địa chỉ nhận hàng</legend>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Tỉnh/thành phố:</label>
                                        <div class="col-md-10">
                                           <div class="country-select clearfix ">
                                            <select class=" form-select tinh" name="tinh"  >
                                            </select>
                                            @error('tinh')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                            <small  id="tinhError" class="text-danger"></small>
                                        </div>
                                        </div>
                                    </div>
                                       <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Quận/huyện:</label>
                                        <div class="col-md-10">
                                            <div class="country-select clearfix ">
                                        <select class=" form-select huyen" name="huyen" >
                                        </select>
                                        @error('huyen')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                        <small  id="huyenError" class="text-danger"></small>
                                    </div>
                                        </div>
                                    </div>
                                       <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Xã/phường:</label>
                                        <div class="col-md-10">
                                           <div class="country-select clearfix " >
                                        <select class=" form-select xa"name="xa">
                                        </select>
                                        @error('xa')
                                        <small  class="text-danger">{{$message}}</small> 
                                        @enderror
                                        <small  id="xaError" class="text-danger"></small>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="thon"><span class="require">*</span>Địa chỉ(số nhà)</label>
                                        <div class="col-md-10">
                                            <input type="text" name="thon" class="form-control" id="thon" placeholder="Địa chỉ(số nhà)">
                                            @error('thon')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                            <small  id="thonError" class="text-danger"></small>
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
                                            <small  id="passwordError" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Xác nhận mật khẩu</label>
                                        <div class="col-md-10">
                                            <input type="password" name="pwd_confirm" class="form-control" id="pwd-confirm" placeholder="Xác nhận mật khẩu">
                                            @error('pwd_confirm')
                                            <small  class="text-danger">{{$message}}</small> 
                                            @enderror
                                            <small  id="pwd_confirmError" class="text-danger"></small>

                                        </div>
                                    </div>
                                </fieldset>
                               
                                <div class="terms">
                                    <div class="float-md-right">
                                        <span>Tôi đã đọc và đồng ý với <a href="#" class="agree"><b>Chính sách quyền riêng tư</b></a></span>
                                        <input type="checkbox" required name="agree" value="1"> &nbsp;
                                        <input type="submit" id="submit-form" value="Tiếp Tục" class="return-customer-btn">
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
    @section('js')
<script>

    $.get(
          ' https://provinces.open-api.vn/api/?depth=2',
                function(res){
                    content=`<option selected>Chọn tỉnh thành phố</option>`;
                res.forEach(item => {
                
                    content+=`
                    <option value="${item.code}">${item.name}</option>
                    `;

                });
            
                $('.tinh').html(content);
                }
            ) ; 
      
    $('.tinh').change(function (e) { 
      e.preventDefault();
        code=$('.tinh').val();
       $.get(
           `https://provinces.open-api.vn/api/p/${code}/?depth=2`,
    
            function(res){
                content=`<option selected>Chọn Quận/huyện</option>`;
             res.districts.forEach(item => {
                 content+=`
                 <option value="${item.code}">${item.name}</option>
                 `;

             });
           
             $('.huyen').html(content);
            }
        ) ;
      
  });
     
  $('.huyen').change(function (e) { 
      e.preventDefault();
     var code=$('.huyen').val();
       $.get(
           `https://provinces.open-api.vn/api/d/${code}?depth=2`,
    
            function(res){
              console.log(res);
                content=`<option selected>Chọn Xã/phường</option>`;
                res.wards.forEach(item => {
                 content+=`
                 <option value="${item.code}">${item.name}</option>
                 `;

             });
           
             $('.xa').html(content);
            }
        ) ;
      
 
  });
  $('#submit-form').click(function(e) {
    $("#formid").validate();
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('client.Postregister') }}",
                method: 'post',
                data: {
                    name: $("input[name=name]").val(),
                    email: $("input[name=email]").val(),
                    phone: $("input[name=phone]").val(),
                    email: $("input[name=email]").val(),
                    thon: $("input[name=thon]").val(),
                    password: $("input[name=password]").val(),
                    pwd_confirm: $("input[name=pwd_confirm]").val(),
                    tinh:$( ".tinh option:selected" ).text(),
                    huyen:$( ".huyen option:selected" ).text(),
                    xa:$( ".xa option:selected" ).text(),
                },
                success: function(result) {
                    alertify.success('Đã đăng ký thành công');
                    window.location="{{ route('client.login') }}";
                }
                ,
                error: function(result) {
                    console.log(result);
                    alertify.error('Đã đăng ký thất bại');
                    $('#nameError').text(result.responseJSON.errors.name);
                    $('#emailError').text(result.responseJSON.errors.email);
                    $('#phoneError').text(result.responseJSON.errors.phone);
                    $('#tinhError').text(result.responseJSON.errors.tinh);
                    $('#huyenError').text(result.responseJSON.errors.huyen);
                    $('#xaError').text(result.responseJSON.errors.xa);
                    $('#thonlError').text(result.responseJSON.errors.email);
                    $('#passwordError').text(result.responseJSON.errors.password);
                    $('#pwd_confirmError').text(result.responseJSON.errors.pwd_confirm);
                //   location.reload();
                }


        })
    });
</script>
@endsection
