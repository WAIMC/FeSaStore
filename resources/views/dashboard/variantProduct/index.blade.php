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
                </div>
                {{-- card body --}}
                <div class="card-body">
                    {{-- Start datatable js --}}
                    <table id="example2" class="table table-striped table-bordered table-hover text-center">
                        <thead>
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
                            @foreach ($data_var as $item_var)
                                <tr>
                                    <td> {{ $item_var->variant_attribute }} </td>
                                    <td> {{ $item_var->quantity }} </td>
                                    <td> <span class="badge badge-primary">{{ number_format($item_var->price) }} VNĐ</span> | <span class="badge badge-danger">{{ number_format($item_var->discount) }} VNĐ</span> </td>
                                    <td>
                                        @if ( $item_var->status==0)
                                            <span class='badge badge-danger'>Không Đại Diện</span>
                                        @else
                                            <span class='badge badge-primary'>Đại Diện</span>
                                        @endif
                                    </td>
                                    <td> {{ $item_var->product_id }} </td>
                                    <td> {{ $item_var->created_at->format('d-m-Y') }} </td>
                                    <td>
                                        <a href="{{ route('variantProduct.edit', $item_var->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('variantProduct.destroy', $item_var->id) }}" class="btn btn-danger btnDelete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Thuộc Tính Biến Thể</th>
                                <th>Số Lượng</th>
                                <th>Giá \ Giảm Giá</th>
                                <th>Trạng Thái</th>
                                <th>ID Sản Phẩm</th>
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