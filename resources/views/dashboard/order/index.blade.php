{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title', 'Bảng Điều Khiển Quản Trị')
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
                            <h4>Danh sách đơn hàng</h4>
                        </div>
                    </div>
                </div>
                {{-- card body --}}
                <div class="card-body">
                    {{-- Start datatable js --}}
                    <table id="example2" class=" table table-striped table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thông tin </th>
                                {{-- <th>Email </th> --}}
                                <th>Tổng đơn hàng</th>
                                <th>Phương thức thanh toán</th>
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
                                    <td>
                                        <ul style="text-align: left">
                                            <li>Họ tên: {{ $item->name }} </li>
                                            <li>Email: {{ $item->email }}</li>
                                            <li>Điện thoại: {{ $item->phone }}</li>
                                            <li>Địac chỉ: {{ $item->address }}</li>
                                        </ul>

                                    </td>
                                    {{-- <td>
                                        <a href="#" class="text-muted">{{ $item->email }}</a>
                                    </td> --}}
                                    <td>
                                        @foreach ($item->orderDetail as $value)
                                            <?php
                                            $total += $value->price * $value->quantity;
                                            ?>
                                        @endforeach
                                        @php
                                              if(count($item->getCoupon)>0){
                                         if($item->getCoupon[0]->feature_coupon==1){
                                             $total-= $total*$item->getCoupon[0]->coupon_number/100;
                               
                                         }else{
                                             $total-=$item->getCoupon[0]->coupon_number;
                                           
                                         }
                                     }
                                        @endphp

                                        {{ number_format($total) }} VND
                                        <?php $total = 0; ?>
                                        {{-- @php
                                              if(count($item->getCoupon)>0){
                                         if($item->getCoupon[0]->feature_coupon==1){
                                             $tong= $total- $total*$item->getCoupon[0]->coupon_number/100;
                                           echo  number_format($tong);
                                         }else{
                                             $tong=$total-$item->getCoupon[0]->coupon_number;
                                             echo  number_format($tong);
                                         }
                                     }else{
                                            echo  number_format($total);
                                         }
                                        @endphp --}}
                                    </td>
                                    <td>
                                        @if ($item->getPayment)
                                            <ul style="text-align: left">
                                                <li>Ngân hàng: {{ $item->getPayment->vnp_BankCode }} </li>
                                                <li>Nội dung: {{ $item->getPayment->vnp_OrderInfo }}</li>
                                                <li>Thời gian: {{ $item->getPayment->created_at }}</li>
                                            </ul>
                                        @else
                                            Thanh toán khi nhận hàng
                                        @endif

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
                                        <a title="Xem chi tiết" href="{{ route('order.show', $item->id) }}"
                                            class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('order.destroy', $item->id) }}" id="btnDelete"
                                            class="btnDelete btn btn-sm btn-danger">
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
                                <th>Tổng đơn hàng</th>
                                <th>Phương thức thanh toán</th>
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
