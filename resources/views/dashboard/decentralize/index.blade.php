{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh Mục Phân Quyền')
@section('action', 'Danh Sách Phân Quyền')

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
                            <h4>Danh sách phân quyền</h4>
                        </div>
                        {{-- <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('role.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Thêm mới phân quyền</span>
                            </a>
                        </div> --}}
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
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Vai Trò</th>
                                <th>Ngày Tạo</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_decentralize as $decentralize)
                                <tr>
                                    <td scope="row">{{ $decentralize->id }}</td>
                                    <td>{{ $decentralize->name }}</td>
                                    <td>{{ $decentralize->email }}</td>
                                    <td>
                                        @php
                                            $name_role = '';
                                            if($decentralize->getRoles()->count()>0){
                                                foreach ($decentralize->getRoles()->get() as $role) {
                                                    $name_role = "|".$role->name."|";
                                                }
                                            }
                                        @endphp
                                        <span class="text-primary">{{ $name_role }}</span>
                                    </td>
                                    <td>{{ $decentralize->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('decentralize.edit', [$decentralize->id, 'id'=>$decentralize->id]) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <a href="{{ route('decentralize.destroy', $decentralize->id) }}"
                                            class="btn btn-danger btnDelete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-5">
                            <h6>Xem 1 đến 10 của {{ $data_decentralize->count() }} hàng</h6>
                        </div>
                        <div class="col-7">
                            {{ $data_decentralize->appends(request()->all())->links() }}
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

        // show number column role
        // $('#show').change(function (e) { 
        //     e.preventDefault();
        //     var _select = $('select#show').val();
        //     $('form#show_paginate').submit();
        // });
    </script>
@endsection