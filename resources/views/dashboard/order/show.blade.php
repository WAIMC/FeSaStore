@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
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
            <div class="card-body">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="container123  col-md-6"   style="">
                        <h4></h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-4">Thông tin khách hàng</th>
                                <th class="col-md-6"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Thông tin người đặt hàng</td>
                                <td>{{ $data[0]->name }}</td>
                            </tr>
                            <tr>
                                <td>Ngày đặt hàng</td>
                                <td>{{ $data[0]->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td>{{ $data[0]->phone }}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>{{ $data[0]->address }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $data[0]->email }}</td>
                            </tr>
                            <tr>
                                <td>Ghi chú</td>
                                <td>{{ $data[0]->note }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting col-md-1" >STT</th>
                            <th class="sorting_asc col-md-3">Tên sản phẩm</th>
                            <th class="sorting_asc col-md-2">Tên thuộc tính</th>
                            <th class="sorting col-md-2">Số lượng</th>
                            <th class="sorting col-md-2">Giá tiền</th>
                        </thead>
                        <tbody>
                            @php
                                $total_price=0;
                            @endphp
                        @foreach($data as $key => $bill)

                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $bill->name }}</td>
                                <td>{{ $bill->variant_attribute	 }}</td>
                                <td>{{ $bill->quantity }}</td>
                                <td>{{ number_format($bill->price) }} VNĐ</td>
                            </tr>
                            @php
                            $total_price+=$bill->quantity*$bill->price;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Tổng tiền</b></td>
                            <td colspan="1"><b class="text-red">{{ number_format($total_price) }} VNĐ</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 p-3 ">
            <form action="{{ route('order.update',$data[0]->id)}}" class="row justify-content-end" method="POST">
                @csrf @method('PUT')
                <div class="col-md-4"></div>
                <div class=" col-sm-12 col-md-6 d-flex justify-content-end">
                    <div class="form-inline">
                        <label>Trạng thái giao hàng: </label>                   
                            <select name="status" class="form-control bdata[0]-success">
                                <option @if ($data[0]->status==0) selected @endif value="0">Đang Xử lý</option>
                                <option @if ($data[0]->status==1) selected @endif  value="1">Đã Tiếp nhận-Đang giao</option>
                                <option @if ($data[0]->status==2) selected @endif value="2">Đã Thanh toán</option>
                                <option @if ($data[0]->status==3) selected @endif value="3">Đã Hủy</option>
                            </select>
                        <input type="submit" value="Xử lý" class="btn btn-info">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
@endsection