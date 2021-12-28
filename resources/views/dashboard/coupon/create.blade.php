{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Mã giảm giá')
@section('action', 'Thêm mã giảm giá')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Thêm mã giảm giá</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 m-auto">
                                    <form action="{{ route('coupon.store') }}" id="formInsert" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Tên mã giảm giá</label>
                                            <input type="text" class="form-control 
                                                @error('coupon_name')
                                                    is-invalid
                                                @enderror" 
                                                name="coupon_name" id="name" aria-describedby="namecoupon" placeholder="Tên mã giảm giá" value="{{ old('coupon_name')}}" required>
                                                @error('coupon_name')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="parent_id">Tính năng</label>
                                        <select class="form-control" name="feature_coupon" id="parent_id">
                                            <option value="0">-----chọn-----</option>
                                            <option value="1">Giảm theo phần trăm </option>
                                            <option value="2"> Giảm theo số tiền</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Mã giảm giá</label>
                                            <input type="text" name="coupon_code" id="name" placeholder="Mã giảm giá" value="{{ old('coupon_code')}}" required class="form-control  
                                                @error('coupon_code')
                                                    is-invalid
                                                @enderror">
                                                @error('coupon_code')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Nhập số % hoặc số tiền</label>
                                            <input type="text" name="coupon_number" id="name" placeholder="Số % hoặc tiền" value="{{ old('coupon_number')}}" required  class="form-control
                                                @error('coupon_number')
                                                    is-invalid
                                                @enderror">
                                            @error('coupon_number')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Số lượng</label>
                                            <input type="number" name="quantity_coupon" id="name" placeholder="Số lượng mã giảm giá" value="{{ old('quantity_coupon')}}" required  class="form-control
                                                @error('quantity_coupon')
                                                    is-invalid
                                                @enderror">
                                            @error('quantity_coupon')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="button" name="add_coupon" class="btn btn-outline-dark btnInsert">Thêm</button>
                                    </form>
                                </div>
                            </div>
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
    {{-- swal --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>
@endsection