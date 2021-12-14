@extends('client.layouts.master')
@section('title', 'Quản lý tài khoản')
@section('main')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                    <li class="active"><a href="#">Tài khoản</a></li>
                    <li class="active"><a href="#">Địa chỉ thanh toán</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <div class="account mt-3">
        <div class="container">
            <div class="row p-3">
                @include('client.partials.menu_account')
                <form id="formid" method="post" action="{{ url('account/address/') }}/{{ Auth::guard('cus')->user()->id }}" class="col-lg-9 p-3 account_main">
                   @csrf 
                    <div class="row">
                        <div class="col-12">
                            <h5>Cập nhật địa chỉ nhận hàng</h5>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" name="name" value="{{ Auth::guard('cus')->user()->name }}" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="nameError" class="text-danger"></small>
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="" value="{{ Auth::guard('cus')->user()->address }}"  id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                    
                            </div> --}}
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" readonly value="{{ Auth::guard('cus')->user()->email }}"
                                    id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="emailError" class="text-danger"></small>
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Điện thoại</label>
                                <input type="text" name="phone" value="{{ Auth::guard('cus')->user()->phone }}" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                    <small id="phoneError" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="">Điạ chỉ</label>
                                <input type="text" id="btn_add" onclick="show_add()" readonly name="address" value="{{ Auth::guard('cus')->user()->address }}" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                    <small id="addressError" class="text-danger"></small>
                            </div>
                        </div>
                        <fieldset class="col-12" style="display:none" id="box_add">
                            <h5>Thay đổi địa chỉ</h5>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd"><span
                                        class="require">*</span>Tỉnh/thành phố:</label>
                                <div class="col-md-10">
                                    <div class="country-select clearfix ">
                                        <select class=" form-select tinh" name="tinh">
                                           
                                        </select>
                                        @error('tinh')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <small id="tinhError" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd"><span
                                        class="require">*</span>Quận/huyện:</label>
                                <div class="col-md-10">
                                    <div class="country-select clearfix ">
                                        <select required class=" form-select huyen" name="huyen">
                                        </select>
                                        @error('huyen')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <small id="huyenError" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd"><span
                                        class="require">*</span>Xã/phường:</label>
                                <div class="col-md-10">
                                    <div class="country-select clearfix ">
                                        <select required class=" form-select xa" name="xa">
                                        </select>
                                        @error('xa')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <small id="xaError" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="thon"><span class="require">*</span>Địa
                                    chỉ(số nhà)</label>
                                <div class="col-md-10">
                                    <input type="text" name="thon" class="form-control" id="thon"
                                        placeholder="Địa chỉ(số nhà)">
                                    @error('thon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <small id="thonError" class="text-danger"></small>
                                </div>
                            </div>
                           
                        </fieldset>
                        <div class=" col-12 p-4">
                            <button type="submit" id="submit-form" class="buttons-cart btn btn-dark float-right">Cập
                                nhật</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

<script src="{{ url('public/client') }}/js/getapi.js"></script>
    <script>
       
    // $('#btn_add').click(function () {
    //    alert('roi')
    //     // $('#box_add').css('display': 'inline-block');
    //     $('#box_add').css({'display' : 'inline-block'});
    // })


       $('#submit-form').click(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ url('account/address/') }}/{{ Auth::guard('cus')->user()->id }}",
        method: 'post',
        data: {
            name: $("input[name=name]").val(),
            phone: $("input[name=phone]").val(),
            thon: $("input[name=thon]").val(),
            tinh: $(".tinh option:selected").text(),
            huyen: $(".huyen option:selected").text(),
            xa: $(".xa option:selected").text(),
        },
        success: function(result) {
            location.reload();
            alertify.success('Cập nhật thành công');
          
            console.log(result);
        },
        error: function(result) {
            console.log(result);
            $('#nameError').text(result.responseJSON.errors.name);
            $('#phoneError').text(result.responseJSON.errors.phone);
            $('#tinhError').text(result.responseJSON.errors.tinh);
            $('#huyenError').text(result.responseJSON.errors.huyen);
            $('#xaError').text(result.responseJSON.errors.xa);
            $('#thonlError').text(result.responseJSON.errors.thon);
            alertify.error('Cập nhật thất bại');
            location.reload();
        }


    })
});
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

        .borderless td,
        .borderless th {
            border: none !important;
        }

        .voice-table {
            background: #fff;
            border-radius: 4px;
        }

    </style>
@endsection
