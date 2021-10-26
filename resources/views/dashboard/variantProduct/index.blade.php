{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển')
@section('directory', 'Danh Mục Biến Thể')
@section('action', 'Danh Sách Biến Thể')

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
                            <h4>Danh sách biến thể</h4>
                        </div>
                        {{-- <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('variantProduct.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Thêm mới biến thể</span>
                            </a>
                        </div> --}}
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
                                                name="key" id="key" aria-describedby="helpId" placeholder="Tìm kiếm theo tên">
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
                                <th>Thuộc Tính Biến Thể</th>
                                <th>Số Lượng</th>
                                <th>Giá \ Giảm Giá</th>
                                <th>Trạng Thái</th>
                                <th>ID Sản Phẩm</th>
                                <th>Ngày Tạo</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_var as $var)
                                <tr>
                                    <td scope="row">{{ $var->variant_attribute }}</td>
                                    <td>{{ $var->quantity }}</td>
                                    <td> <span class="badge badge-primary">{{ $var->price }}đ</span> | <span class="badge badge-danger">{{ $var->discount }}đ</span> </td>
                                    <td>
                                        @if ( $var->status==0)
                                            <span class='badge badge-danger'>Không Đại Diện</span>
                                        @else
                                            <span class='badge badge-primary'>Đại Diện</span>
                                        @endif
                                    </td>
                                    <td>{{ $var->product_id }}</td>
                                    <td>{{ $var->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('variantProduct.edit', $var->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('variantProduct.destroy', $var->id) }}" class="btn btn-danger btnDelete">
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
                            <h6>Xem 1 đến 10 của {{ $data_var->count() }} hàng</h6>
                        </div>
                        <div class="col-7">
                            {{ $data_var->appends(request()->all())->links() }}
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
    <style>
        .table td, .table th {
            vertical-align: middle !important;
        }
    </style>
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