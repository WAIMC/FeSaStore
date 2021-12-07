{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Bảng Điêu Khiển')
@section('action', 'Setting')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                {{-- card hearder --}}
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Danh sách liên kết</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('settingLink.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Thêm mới liên kết</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- card body --}}
                <div class="card-body">
                     {{-- Start datatable js --}}
                    <table id="example2" class="table table-striped table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Đường Đẫn</th>
                                <th>Đường Dẫn</th>
                                <th>Icon</th>
                                <th>Ngày Tạo</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $st_link)
                                <tr>
                                    <td scope="row">{{ $st_link->id }}</td>
                                    <td>{{ $st_link->config_key }}</td>
                                    <td>{{ $st_link->config_value }}</td>
                                    <td>{{ $st_link->icon}}</td>
                                    <td>{{ $st_link->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('settingLink.edit', $st_link->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('settingLink.destroy', $st_link->id) }}" class="btn btn-danger btnDelete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên Đường Đẫn</th>
                                <th>Đường Dẫn</th>
                                <th>Ngày Tạo</th>
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