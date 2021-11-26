{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Đơn hàng')
@section('action', 'Danh Sách đơn hàng')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                {{-- card hearder --}}
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Danh sách bài viết</h4>
                        </div>
                    </div>
                </div>
                {{-- card body --}}
                <div class="card-body">
                    {{-- Start datatable js --}}
                    <table id="example2" class="table table-striped table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Họ tên </th>
                                <th>Email </th>
                                <th>Tổng đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tình trạng</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $total = 0;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td> #{{ $item->id }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td>
                                        <a href="#" class="text-muted">{{ $item->email }}</a>
                                    </td>
                                    <td>
                                        @foreach ($item->orderDetail as $value)
                                            <?php $total += $value->price * $value->quantity; ?>
                                        @endforeach
                                        {{ number_format($total) }} VND
                                        <?php $total = 0; ?>
                                    </td>
                                    <td>{{ $item->created_at->format('d-m-Y') }} </td>
                                    <td>
                                        @if ($item->status === 0)
                                            <span class="badge badge-info badge-pill">Đang xử lý</span>
                                        @elseif ($item->status===1)
                                            <span class="badge badge-warning">Đã tiếp nhận - Đang giao </span>
                                        @elseif ($item->status===2)
                                            <span class="badge badge-success badge-pill">Đã Thanh toán</span>
                                        @elseif ($item->status===3)
                                            <span class="badge badge-danger badge-pill">Đã Hủy</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a title="Xem chi tiết" href="{{route('order.show',$item->id)}}" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('order.destroy',$item->id)}}"   id="btnDelete" class="btnDelete btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Họ tên </th>
                                <th>Email </th>
                                <th>Tổng đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tình trạng</th>
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