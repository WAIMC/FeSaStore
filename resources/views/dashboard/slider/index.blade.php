{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Slider')
@section('action', 'Danh sách Slider')

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
                            <h4>Danh sách slider</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('slider.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Thêm mới slider</span>
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
                <div class="card-body">
                    <table id="example2" class="table table-striped table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên slider</th>
                                <th>Liên kết</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                 @foreach ($data as $slider)
                                <tr>
                                    <td> <img src="{{url('public/uploads')}}/{{ $slider->image }}" alt="{{ $slider->name }}" height="100" > </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->link }}</td>
                                    <td>
                                        <span class="badge badge-{{$slider->status==0 ?  'danger' : 'success'}}">
                                            {{ $slider->status==0 ? 'Ẩn' : 'Hiển thị'}}
                                        </span>
                                    </td>
                                    <td>
                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('slider.destroy', $slider->id) }}" class="btn btn-danger btnDelete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                         </a>
                                    </td>
                                </tr>
                            @endforeach           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên slider</th>
                                <th>Liên kết</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>  
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- form action --}}
    <form action="" method="post" id="formAction">
        @csrf @method('DELETE')
    </form>
@endsection
@section('js')
    {{-- load sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- load data table js --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-data-table.js"></script>
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>

@endsection

