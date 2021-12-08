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
    <div class="account ">
        <div class="container">
            <div class="row p-3">
                @include('client.partials.menu_account')
                <div class="col-lg-9 p-3" style="  background: #f8f8f8;">
                    <div class="row">
                        <div class="col-12">
                            <h5>Chi tiết đơn hàng #{{ $data[0]->id }}
                            </h5>
                            <p>
                                @if ($data[0]->status === 0)
                                    Đang xử lý
                                @elseif ($data[0]->status===1)
                                    Đã tiếp nhận - Đang giao
                                @elseif ($data[0]->status===2)
                                    Đã Thanh toán
                                @elseif ($data[0]->status===3)
                                    Đã Hủy
                                @endif
                            </p>
                        </div>

                    </div>
                    <div class="row row-eq-height mt-3">
                        <div class="col-sm-4 invoice-col">
                            ĐỊA CHỈ NGƯỜI NHẬN
                            <address>
                                <p><strong>{{ $data[0]->name }}</strong></p>
                                <p> {{ $data[0]->address }}</p>
                                <p> <b> Điện thoại:</b> {{ $data[0]->phone }}</p>
                                <p><b>Email:</b> {{ $data[0]->email }} </p>
                                <p><b>Ghi chú:</b> {{ $data[0]->note }}</p>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            HÌNH THỨC GIAO HÀNG
                            <address>
                                <p><img src="https://salt.tikicdn.com/ts/upload/2a/47/46/0e038f5927f3af308b4500e5b243bcf6.png"
                                        width="56" alt="TikiFast"> <span> Giao Tiết Kiệm</span></p>
                                {{-- <p>Giao vào Chủ nhật, 05/12</p> --}}
                                <p>Được giao bởi giao hàng nhanh(GHN)</p>
                                <p>Phí vận chuyển: 0đ</p>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            HÌNH THỨC THANH TOÁN
                            <address>
                                @if ($data[0]->getPayment)
                                    <p>
                                    <ul>
                                        <li>Ngân hàng: {{ $data[0]->getPayment->vnp_BankCode }} </li>
                                        <li>Nội dung: {{ $data[0]->getPayment->vnp_OrderInfo }}</li>
                                        <li>Thời gian: {{ $data[0]->getPayment->created_at }}</li>
                                    </ul>
                                    </p>

                                @else
                                    <p>Thanh toán khi nhận hàng</p>
                                @endif
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive voice-table mt-3">
                        <table class="table table borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col" class="col_price">Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($data))
                                    @foreach ($data as $item)

                                        <tr>
                                            <td class="row">
                                                <img src="{{ url('public/uploads') }}/{{ $item->image }}"
                                                    height="100px" alt="">
                                                <p class="pl-2"> {{ $item->sanpham }}</p>
                                            </td>
                                            <td>{{ number_format($item->price) }} ₫</td>
                                            <td> {{ $item->quantity }} </td>
                                            <td>0 ₫</td>
                                            @php
                                                $total_price = 0;
                                                $total_price += $item->quantity * $item->price;
                                            @endphp
                                            <td class="col_price">
                                                {{ number_format($item->quantity * $item->price) }} ₫</td>
                                        </tr>


                                    @endforeach

                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><span>Tạm tính</span></td>
                                    <td>{{ number_format($total_price) }} ₫</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span>Phí vận chuyển</span></td>
                                    <td>0 ₫</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span>Tổng cộng</span></td>
                                    <td><span class="sum">{{ number_format($total_price) }} ₫</span></td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                    @if ($data[0]->status === 0)
                        <div class="row">
                            <div class="col-12 text-right mt-2 p-3"> <a id="changeStatus" class="btn btn-danger">Hủy</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
<script src="{{url('public')}}/client/css/account.css"></script>
    <style>
        .account {
            min-height: 400px;
        }

        .invoice-col {
            margin-top: 20px;
            line-height: 28px;
        }

        tr {
            align-items: middle;
        }

        address {
            padding: 10px;
            border-radius: 4px;
            background: #fff;
            height: 160px;
        }

        .voice-table {
            background: #fff;
            border-radius: 4px;
        }

        .borderless td,
        .borderless th {
            border: none !important;
        }

        .col_price,
        tfoot {
            text-align: right;
        }

        tbody,
        tfoot {
            border-top: 1px #f2e5e5 solid;
            padding-top: 10px;
        }

        .sum {
            color: red
        }

    </style>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#changeStatus').click(function(e) {
            e.preventDefault();
            alertify.confirm("Vui lòng xác nhận", "Bạn có chức chắn muốn hủy đơn hàng này không!",
                function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'get',
                        url: '{{ route('client.account.updateOrder', $data[0]->id) }}',
                        data: {
                            status: '3'
                        },
                        success: function(response) {
                            // location.reload();
                            console.log(response);
                            alertify.success('Bạn đã hủy đơn hàng');
                        },
                        error: (error) => {
                            console.log(JSON.stringify(error));
                        }
                    });
                },
                function() {
                    alertify.error('Cancel');
                });
        });
    </script>
@endsection
