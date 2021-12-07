@extends('client.layouts.master')
@section('title', 'Quản lý tài khoản')
@section('main')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                    <li class="active"><a href="blog">Tài khoản</a></li>
                    <li class="active"><a href="blog">Đơn hàng</a></li>
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
                <div class="col-lg-9 p-3 account_main" >
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày mua</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($data))
                                    @foreach ($data as $item)

                                        <tr>
                                            <td scope="row">
                                                <a
                                                    href="{{ route('client.account.orderDetail', $item->id) }}">#{{ $item->id }}</a>
                                            </td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td> {{ $item->orderDetail[0]->name . ' | ' . $item->orderDetail[0]->getVariant->variant_attribute }}
                                                @if (count($item->orderDetail) > 1)
                                                    {{ ' và ' . (count($item->orderDetail) - 1) . ' sản phẩm khác' }}
                                                @endif
                                            </td>
                                            @php
                                                $total_price = 0;
                                                foreach ($item->orderDetail as $bill):
                                                    $total_price += $bill->quantity * $bill->price;
                                                endforeach;
                                            @endphp
                                            <td>{{ number_format($total_price) }} VNĐ</td>

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
                                        </tr>


                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .account {
            min-height: 400px;
        }
.account_main{
    background:#f8f8f8;
}
.borderless td,
        .borderless th {
            border: none !important;
        }
    </style>
@endsection
