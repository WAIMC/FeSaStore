{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển')
@section('directory', 'Danh Mục Sản Phẩm')
@section('action', 'Danh Sách Sản Phẩm')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                {{-- card hearder --}}
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Danh sách sản phẩm</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('product.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Thêm mới sản phẩm</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- card body --}}
                <div class="card-body">
                    {{-- Start datatable js --}}
                    <table id="example2" class="table table-striped table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Thể Loại</th>
                                <th>Thương Hiệu</th>
                                <th>Biến Thể</th>
                                <th>Trạng Thái</th>
                                <th>Ngày Tạo</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pro as $pro)
                                <tr>
                                    <td scope="row"><img src="{{ url('public/uploads/'. $pro->image) }}" alt="" width="100px" height="100px" ></td>
                                    <td>{{ $pro->name }}</td>
                                    <td>{{ $pro->product_category->name }}</td>
                                    <td><img src="{{ url('public/uploads/'. $pro->product_brand->logo) }}" alt="" width="100px" height="100px" ></td>
                                    <td>{{ $pro->variant }}</td>
                                    <td>
                                        @if ($pro->status == 0)
                                            <span class="badge badge-primary">Hiện</span>
                                        @else
                                            <span class="badge badge-dark">Ẩn</span>
                                        @endif
                                    </td>
                                    <td>{{ $pro->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $pro->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('product.destroy', $pro->id) }}"
                                            class="btn btn-danger btnDelete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Thể Loại</th>
                                <th>Thương Hiệu</th>
                                <th>Biến Thể</th>
                                <th>Trạng Thái</th>
                                <th>Ngày Tạo</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{-- End datatable js --}}
                </div>
                <div class="card-footer text-muted">
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
    {{-- load sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- load data table js --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-data-table.js"></script>
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>
@endsection