@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title', 'Bảng Điều Khiển Quản Trị')
@section('directory', 'Đơn hàng')
@section('action', 'Đơn hàng chi tiết')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">

                    {{-- header Setting Link --}}
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Chi tiết đơn hàng</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('order.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Danh sách đơn hàng</span>
                            </a>
                        </div>
                    </div>


                    {{-- select by choose --}}

                </div>
                <div class="card-body" id="invoice">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    {{-- <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Chú ý:</h5>
                            .
                          </div> --}}


                                    <!-- Main content -->
                                    <div class="invoice p-3 mb-3">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-globe"></i> FESA Store.
                                                    <small class="float-right">Ngày:
                                                        {{ $data[0]->created_at->format('d-m-Y') }}</small>
                                                </h4>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                From
                                                <address>
                                                    <strong>Admin, FESA Store.</strong><br>
                                                    127 Nguyễn Thị Thập,<br>
                                                    Liên Chiểu, Đà Nẵng<br>

                                                    <b> Điện thoại:</b> (84) 123-5432<br>
                                                    <b>Email:</b> Fesastore@gmail.com
                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                To
                                                <address>
                                                    <strong>{{ $data[0]->name }}</strong><br>
                                                    {{ $data[0]->address }} <br>
                                                    <b> Điện thoại:</b> {{ $data[0]->phone }}<br>
                                                    <b>Email: </b> {{ $data[0]->email }}
                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                <b>Hóa đơn </b><br>
                                                <br>
                                                <b>Mã hóa đơn:</b>#{{ $data[0]->id }}<br>
                                                {{-- <b>Ngày thanh toán:</b> <br> --}}
                                                <form id="formEdit" action="{{ route('order.update', $data[0]->id) }}"
                                                    class="" method="POST">
                                                    @csrf @method('PUT')
                                                    <label>Trạng thái đơn hàng: </label>
                                                    <select name="status" class="form-control bdata[0]-success status">
                                                        @if ($data[0]->status == 0)
                                                        <option @if ($data[0]->status == 0) selected  @endif disabled  value="0">Đang Xử lý</option>
                                                        <option @if ($data[0]->status == 1) selected  @endif  value="1">Đã Tiếp nhận-Đang giao</option>
                                                        <option @if ($data[0]->status == 2) selected @endif value="2">Đã Thanh toán</option>
                                                        <option @if ($data[0]->status == 3) selected @endif value="3">Đã Hủy</option>
                                                        @elseif ($data[0]->status == 1) 
                                                        <option @if ($data[0]->status == 0) selected  @endif disabled  value="0">Đang Xử lý</option>
                                                        <option @if ($data[0]->status == 1) selected  @endif  value="1">Đã Tiếp nhận-Đang giao</option>
                                                        <option @if ($data[0]->status == 2) selected @endif value="2">Đã Thanh toán</option>
                                                        <option @if ($data[0]->status == 3) selected @endif disabled value="3">Đã Hủy</option>
                                                        @elseif ($data[0]->status == 2 ||$data[0]->status == 3 ) 
                                                        <option @if ($data[0]->status == 0) selected  @endif disabled  value="0">Đang Xử lý</option>
                                                        <option @if ($data[0]->status == 1) selected  @endif disabled  value="1">Đã Tiếp nhận-Đang giao</option>
                                                        <option @if ($data[0]->status == 2) selected @endif disabled value="2">Đã Thanh toán</option>
                                                        <option @if ($data[0]->status == 3) selected @endif disabled value="3">Đã Hủy</option>
                                                        @endif
                                                        
                                                    </select>
                                                </form> <br>
                                                {{-- <b>Account:</b> 968-34567 --}}
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Sản phẩm</th>
                                                            <th>Thuộc tính #</th>
                                                            <th>Giá</th>
                                                            <th>Số lượng</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total_price = 0;
                                                            $cou_price=0;
                                                        @endphp
                                                        @foreach ($data as $key => $bill)

                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $bill->sanpham }}</td>
                                                                <td>{{ $bill->variant_attribute }}</td>
                                                                <td>{{ $bill->price }}</td>
                                                                <td>{{ $bill->quantity }}</td>
                                                                <td>{{ number_format($bill->price) }} VNĐ</td>
                                                            </tr>
                                                           
                                                            @php
                                                                $total_price += $bill->quantity * $bill->price;
                                                            @endphp

                                                        @endforeach
                                                        @php
                                                        if (count($data_cou->getCoupon) > 0) {
                                                            $cou_code=$data_cou->getCoupon[0]->coupon_name;
                                                            if ($data_cou->getCoupon[0]->feature_coupon == 1) {
                                                                $cou_price = ($total_price * $data_cou->getCoupon[0]->coupon_number) / 100;
                                                                $total_price -= $cou_price;
                                                            } else {
                                                                $cou_price = $data_cou->getCoupon[0]->coupon_number;
                                                                $total_price -= $cou_price;
                                                            }
                                                        }
                                                        @endphp

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-6">
                                                <p class="lead">Phương thức thanh toán:</p>
                                                @if ($data[0]->getPayment)
                                                    <p class="text-muted well well-sm shadow-none"
                                                        style="margin-top: 10px;">
                                                    <ul>
                                                        <li>Ngân hàng: {{ $data[0]->getPayment->vnp_BankCode }} </li>
                                                        <li>Nội dung: {{ $data[0]->getPayment->vnp_OrderInfo }}</li>
                                                        <li>Thời gian: {{ $data[0]->getPayment->created_at }}</li>
                                                    </ul>
                                                    </p>

                                                @else
                                                    <p>Thanh toán khi nhận hàng</p>
                                                @endif


                                            </div>
                                            <!-- /.col -->
                                            <div class="col-6">
                                                <p class="lead">Ngày thanh toán
                                                    {{ $data[0]->updated_at->format('d-m-Y') }}</p>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width:50%">Tổng đơn hàng:</th>
                                                                <td>{{ number_format($total_price) }} VNĐ</td>
                                                            </tr>
                                                            <tr>
                                                                @if (isset($cou_code))
                                                                <th>Giảm giá: ({{$cou_code}})</th>
                                                                <td>{{number_format($cou_price)}} VND</td>
                                                                @endif
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th>Tổng thanh toán:</th>
                                                                <td> {{ number_format($total_price) }} VNĐ</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <a href="#" rel="noopener" class="btn btn-default"
                                                    onclick="printContent('invoice');"><i class="fas fa-print"></i>
                                                    Print</a>
                                                {{-- <button type="button" class="btn btn-success float-right"><i
                                                        class="far fa-credit-card"></i> Submit
                                                    Payment
                                                </button>
                                                <button type="button" class="btn btn-primary float-right"
                                                    style="margin-right: 5px;">
                                                    <i class="fas fa-download"></i> Generate PDF
                                                </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function printContent(el) {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
        $('.status').change(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn Có Chắc Chắn ?',
                text: "Bạn Không Thể Hoàn Tác Chức Năng!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tiếp tục!',
                cancelButtonText: "Hủy!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formEdit').submit();
                    Swal.fire(
                        'Đang Cập Nhật!',
                        'Dữ Liệu Đang Được Cập Nhật.',
                        'success'
                    );
                }
            });
        });
    </script>
@endsection
