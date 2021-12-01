{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh Mục Bình luận')
@section('action', 'Bình luận sản phẩm')

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
                            <h4>Danh sách bình luận</h4>
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
                        <thead class="">
                            <tr>
                                <th>ID</th>
                                <th>Sản phẩm</th>
<<<<<<< HEAD
                                <th>Hình ảnh</th>
=======
>>>>>>> 01298ab0a4f3f16bcb5c9918cdfbbffc442fed01
                                <th>Nội dung</th>
                                <th>Khách hàng</th>
                                <th>Tình trạng</th>
                                <th>Ngày bình luận</th>
                                <th>Hành Động</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $comment)
                                <tr>
                                    <td scope="row">{{ $comment->id }}</td>
                                    <td>{{ $comment->pro->name }}</td>
<<<<<<< HEAD
                                    <td>
                                      <img src="{{ url('public/uploads/'. $comment->pro->image) }}" alt="" width="100px" height="100px" >
                                    </td>
=======
>>>>>>> 01298ab0a4f3f16bcb5c9918cdfbbffc442fed01
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->cus->name}}</td>
                                    <td>
                                        <span class="badge badge-{{$comment->status==0 ? 'success' : 'danger'}}">   
                                            {{ $comment->status==0 ? 'Hiển thị' : 'Ẩn' }}
                                        </span>
                                    </td>
                                    <td>{{ $comment->created_at->format('d-m-Y') }}</td>
                                    <td>
<<<<<<< HEAD
                                        <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
=======
>>>>>>> 01298ab0a4f3f16bcb5c9918cdfbbffc442fed01
                                        <a href="{{ route('comment.destroy', $comment->id) }}"
                                            class="btn btn-danger btnDelete">
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
                            <h6>Xem 1 đến 10 của {{ $data->count() }} hàng</h6>
                        </div>
                        <div class="col-7">
                            {{ $data->appends(request()->all())->links() }}
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