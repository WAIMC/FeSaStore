{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title', 'Bảng Điều Khiển Quản Trị')
@section('directory', 'Mã giảm giá')
@section('action', 'Danh Sách Mã Giảm Giá')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                {{-- card hearder --}}
                <div class="card-header">

                    {{-- header Setting Link --}}
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Danh sách mã giảm giá</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('coupon.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Thêm mới mã giảm giá</span>
                            </a>
                        </div>
                    </div>


                    {{-- select by choose --}}
                    <div class="row mt-4 justify-content-between">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group col-sm-6">
                                <form id="show_paginate">
                                    <select class="form-control form-control-sm" name="show" id="show">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                            <form>
                                <div class="row">
                                    <div class="col-8 m-0 p-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm border-right-0 rounded-0"
                                                name="key" id="key" aria-describedby="helpId"
                                                placeholder="Tìm kiếm theo tên">
                                        </div>
                                    </div>
                                    <div class="col-4 m-0 p-0">
                                        <button type="submit" class="btn btn-sm btn-primary border-left-0 rounded-0">
                                            <i class="fa fa-sm fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- card body --}}
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover text-center">
                        <thead class="">
                            <tr>
                                <th>ID</th>
                                <th>Tên mã giảm giá</th>
                                <th>Tính năng</th>
                                <th>Mã giảm giá</th>
                                <th>Số % hoặc số tiền</th>
                                <th>Số lượng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupon as $key => $show_coupon)
                                <tr>
                                    <td scope="row">{{ $show_coupon->id }}</td>
                                    <td>{{ $show_coupon->coupon_name }}</td>
                                    <td>
                                        @if ($show_coupon->feature_coupon == 1)
                                            Giảm theo phần trăm
                                        @else
                                            Giảm theo số tiền
                                        @endif
                                    </td>
                                    <td>{{ $show_coupon->coupon_code }}</td>
                                    <td>
                                        @if ($show_coupon->feature_coupon == 1)
                                            {{ $show_coupon->coupon_number }}%
                                        @else
                                            {{ $show_coupon->coupon_number }}k
                                        @endif
                                    </td>
                                    <td>{{ $show_coupon->quantity_coupon }}</td>
                                    <td>
                                        <a href="{{ route('coupon.edit', $show_coupon->id) }}" 
                                            class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('coupon.destroy', $show_coupon->id) }}" 
                                            class="btn btn-danger btnDelete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-5">
                            <h6>Xem 1 đến 10 của hàng</h6>
                        </div>
                        <div class="col-7">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- form action --}}
    <form action="" method="post" id="formAction">
        @csrf @method('DELETE')
    </form>
@endsection


{{-- customize load css for master layout --}}
@section('css')

@endsection

{{-- customize load js for master layout --}}
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.btnDelete').click(function(e) {
            e.preventDefault();
            var _href = $(this).attr('href');
            $('form#formAction').attr('action', _href);

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn sẽ không thể hoàn tác lại!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa nó!',
                cancelButtonText: "Không, hủy nó!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formAction').submit();
                    Swal.fire(
                        'Đang xóa',
                        'Đã được xóa!',
                        'info'
                    );
                };
            });
        });

        // show number column category
        // $('#show').change(function (e) { 
        //     e.preventDefault();
        //     var _select = $('select#show').val();
        //     $('form#show_paginate').submit();
        // });
    </script>
@endsection
