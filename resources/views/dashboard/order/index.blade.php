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

                    {{-- header Setting Link --}}
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Danh sách bài viết</h4>
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
                        <thead>
                            <tr>
                                <th style="min-width: 60px;"> STT </th>
                                <th>Mã đơn hàng</th>
                                <th>Họ tên </th>
                                <th>Email </th>
                                <th>Tổng đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tình trạng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data))
                            <?php $i = 1;
                            $total = 0;
                            ?>
                            @foreach ($data as $item)
                            <tr>

                                <td> {{ $i }} </td>

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
                            <?php $i++; ?>
                        @endforeach 
                            @endif
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-5">
                            {{-- <h6>Xem 1 đến 10 của {{ $data->count() }} hàng</h6> --}}
                        </div>
                        <div class="col-7">
                            <div class="mt-3 float-left">
                                {{ $data->appends(request()->all())->links() }}
                            </div>     
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
                title: 'Bạn có chắc chắn muốn xóa đơn hàng này ?',
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