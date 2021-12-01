{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh Mục Khách Hàng')
@section('action', 'Sửa thông tin Khách Hàng')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Sửa Thông tin Khách Hàng</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('customer.update', $customer->id) }}" id="formEdit" method="POST">
                                @csrf @method('PUT')
                                <div class="row">

                                        <div class="col-6">
                                            
                                                <div class="form-group">
                                                    <label for="name">Họ Và Tên</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="name" placeholder="Tên danh mục" value="{{ $customer->name }}" required>
                                                    @error('name')
                                                        <small id="name" class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $customer->email }}" placeholder="Email" required>
                                                    @error('email')
                                                        <small id="email" class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Mật Khẩu</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $customer->password }}" id="password" placeholder="Mật Khẩu" required>
                                                    @error('password')
                                                        <small id="password" class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="password-confirm">Nhập Lại Mật Khẩu</label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required autocomplete="new-password" placeholder="Nhập Lại Mật Khẩu">
                                                </div>
                                    
                                                <button type="button" class="btn btn-outline-dark btnEdit">Cập Nhật</button>
                                            
                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">
                                                <label for="phone">Điện Thoại</label>
                                                <input type="number" class="form-control  @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $customer->phone }}" placeholder="Điện Thoại">
                                                @error('phone')
                                                    <small id="phone" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="conscious">Tỉnh / Thành Phố</label>
                                                <select class="form-control @error('conscious') is-invalid @enderror" name="conscious" id="conscious">
                                                </select>
                                                @error('conscious')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="district">Quận / Huyện</label>
                                                <select class="form-control @error('district') is-invalid @enderror" name="district" id="district">
                                                </select>
                                                @error('district')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="ward">Phường / Xã</label>
                                                <select class="form-control @error('ward') is-invalid @enderror" name="ward" id="ward">
                                                </select>
                                                @error('ward')
                                                    <small id="ward" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="street">Số Nhà, Tên Đường</label>
                                                <input type="text" class="form-control @error('street') is-invalid @enderror" name="street" id="street" placeholder="Số Nhà, Tên Đường">
                                                @error('street')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>

                                    
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            {{-- Footer --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- form action --}}
    
@endsection


{{-- customize load css for master layout --}}
@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.css">
@endsection

{{-- customize load js for master layout --}}
@section('js')
    <!-- Summernote -->
    <script src="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script>
    {{-- swal --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>
    <script>
        $(document).ready(function () {

            // get api provinces conscious
            $.get(
                "https://provinces.open-api.vn/api/?depth=2",
                function (get_conscious) {
                    conscious = '<option> Chọn Tỉnh / Thành Phố </option>';
                    get_conscious.forEach(cons => {
                        conscious += "<option value='"+ cons['name'] +"' data-id='"+ cons['code'] +"'> "+ cons['name'] +" </option>";
                    });
                    $('#conscious').html(conscious);
                },
            );
            
            // get districts
            $('#conscious').change(function (e) { 
                e.preventDefault();
                $.get(
                    "https://provinces.open-api.vn/api/p/"+ $('#conscious').find(':selected').data('id') +"?depth=2",
                    function (get_district) {
                        district = '<option> Chọn Quận / Huyện </option>';
                        get_district['districts'].forEach(dis => {
                            district += "<option value='"+ dis['name'] +"' data-id='"+ dis['code'] +"'> "+ dis['name'] +" </option>";
                        });
                        $('#district').html(district);
                    },
                );
            });

            // get wards
            $('#district').change(function (e) { 
                e.preventDefault();
                $.get(
                    "https://provinces.open-api.vn/api/d/"+ $('#district').find(':selected').data('id') +"?depth=2",
                    function (get_ward) {
                        ward = '<option> Chọn Phường / Xã </option>';
                        get_ward['wards'].forEach(war => {
                            ward += "<option value='"+ war['name'] +"' data-id='"+ war['code'] +"'> "+ war['name'] +" </option>";
                        });
                        $('#ward').html(ward);
                    },
                );
            });

        });
    </script>
@endsection