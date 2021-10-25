{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Banner')
@section('action', 'Banner')

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
                            <h4>Danh sách banner</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('banner.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Thêm mới banner</span>
                            </a>
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
                @if (isset($data))
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover text-center">
                        <thead class="">
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên banner</th>
                                <th>Liên kết</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                 @foreach ($data as $banner)
                                <tr>
                                    
                                    <td> <img src="{{url('public/uploads')}}/{{ $banner->image }}" alt="{{ $banner->name }}" height="100" > </td>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->link }}</td>
                                    <td>
                                        <span class="badge badge-{{$banner->status==0 ? 'success' : 'danger'}}">
                                            
                                            {{ $banner->status==0 ? 'Hiển thị' : 'Ẩn' }}
                                        </span>
                                    </td>
                                    <td>{{ $banner->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('banner.destroy', $banner->id) }}"
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
                            {{-- <h6>Showing 1 to 10 of {{ $data->count() }} entries</h6> --}}
                        </div>
                        <div class="col-7">
                            {{ $data->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
                @endif
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
   <style>
       .table td, .table th {
    vertical-align: middle !important;
}
   </style>
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
</script>
@endsection