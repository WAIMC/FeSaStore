{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh Mục Sản Phẩm')
@section('action', 'Sửa Vai Trò')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Cập Nhật Vai Trò</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 m-auto">
                            <form action="{{ route('role.update', $role->id) }}" id="formEdit" method="POST">
                                @csrf @method('PUT')
                                <div class="form-group">
                                    <label for="name">Tên Vai Trò</label>
                                    <input type="text" class="form-control @error('name')
                                        is-invalid
                                    @enderror" name="name" id="name" aria-describedby="nameRole" placeholder="Tên Vai Trò" value="{{ $role->name }}" required>
                                    @error('name')
                                        <small id="nameRole" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <h3 for="" class="m-auto">Sự Cho Phép</h3>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input checkall" type="checkbox" id="checkall">
                                            <label for="checkall" class="custom-control-label"> <strong> Chọn Tất Cả</strong> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-0 m-0">
                                    @foreach ($routes as $route)
                                        @php
                                            $name_managerment = '';
                                            if($route == 'admin'){
                                                $name_managerment = 'Quản Trị';
                                            }elseif ($route == 'settingLink') {
                                                $name_managerment = 'Đường Dẫn';
                                            }elseif ($route == 'category') {
                                                $name_managerment = 'Danh Mục';
                                            }elseif ($route == 'product') {
                                                $name_managerment = 'Sản Phẩm';
                                            }elseif ($route == 'banner') {
                                                $name_managerment = 'Banner';
                                            }elseif ($route == 'variantProduct') {
                                                $name_managerment = 'Biến Thể';
                                            }elseif ($route == 'brand') {
                                                $name_managerment = 'Thương Hiệu';
                                            }elseif ($route == 'blog') {
                                                $name_managerment = 'Bài Viết';
                                            }elseif ($route == 'categoryblog') {
                                                $name_managerment = 'Danh Mục Bài Viết';
                                            }elseif ($route == 'role') {
                                                $name_managerment = 'Vai Trò';
                                            }elseif ($route == 'decentralize') {
                                                $name_managerment = 'Phân Quyền';
                                            }elseif ($route == 'slider') {
                                                $name_managerment = 'slider';
                                            }elseif ($route == 'comment') {
                                                $name_managerment = 'Bình Luận Sản Phẩm';
                                            }elseif ($route == 'order') {
                                                $name_managerment = 'Đơn Hàng';
                                            }elseif ($route == 'customer') {
                                                $name_managerment = 'Khách Hàng';
                                            }elseif ($route == 'rating') {
                                                $name_managerment = 'Đánh Giá';
                                            }elseif ($route == 'commentblog') {
                                                $name_managerment = 'Bình Luận Bài Viết';
                                            }elseif ($route == 'coupon') {
                                                $name_managerment = 'Mã Giảm Giá';
                                            }
                                        @endphp
                                        <div class="card card-dark col-4 card_{{$route}}">
                                            <div class="card-header">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-wapper {{$route}}" type="checkbox" id="checkAll{{$route}}">
                                                        <label for="checkAll{{$route}}" class="custom-control-label"> <strong> Quản Lý {{$name_managerment}} </strong> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="index{{$route}}" name="routes[]" value="{{$route}}.index">
                                                        <label for="index{{$route}}" class="custom-control-label">Danh Sách {{$name_managerment}} </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="create{{$route}}" name="routes[]" value="{{$route}}.create">
                                                        <label for="create{{$route}}" class="custom-control-label">Thêm Mới {{$name_managerment}} </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="store{{$route}}" name="routes[]" value="{{$route}}.store">
                                                        <label for="store{{$route}}" class="custom-control-label">Thực Hiện Thêm Mới {{$name_managerment}} </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="show{{$route}}" name="routes[]" value="{{$route}}.show">
                                                        <label for="show{{$route}}" class="custom-control-label">Xem {{$name_managerment}} </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="edit{{$route}}" name="routes[]" value="{{$route}}.edit">
                                                        <label for="edit{{$route}}" class="custom-control-label">Sửa {{$name_managerment}} </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="update{{$route}}" name="routes[]" value="{{$route}}.update">
                                                        <label for="update{{$route}}" class="custom-control-label">Thực hiện Sửa {{$name_managerment}} </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="destroy{{$route}}" name="routes[]" value="{{$route}}.destroy">
                                                        <label for="destroy{{$route}}" class="custom-control-label">Xóa {{$name_managerment}} </label>
                                                    </div>
                                                </div>
                                                @if ($route === 'admin')
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="filter_chart_by_date{{$route}}" name="routes[]" value="{{$route}}.filter_chart_by_date">
                                                            <label for="filter_chart_by_date{{$route}}" class="custom-control-label">Lọc Biểu Đồ {{$name_managerment}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="file{{$route}}" name="routes[]" value="{{$route}}.file">
                                                            <label for="file{{$route}}" class="custom-control-label">Quản Lý Ảnh {{$name_managerment}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="login{{$route}}" name="routes[]" value="{{$route}}.login">
                                                            <label for="login{{$route}}" class="custom-control-label">Đăng Nhập {{$name_managerment}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="register{{$route}}" name="routes[]" value="{{$route}}.register">
                                                            <label for="register{{$route}}" class="custom-control-label">Đăng Ký {{$name_managerment}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="logout{{$route}}" name="routes[]" value="{{$route}}.logout">
                                                            <label for="logout{{$route}}" class="custom-control-label">Đăng Xuất {{$name_managerment}}</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-footer text-muted">
                                                {{-- footer --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-outline-dark btnEdit">Cập Nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{-- Footer --}}
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- customize load css for master layout --}}
@section('css')
@endsection

{{-- customize load js for master layout --}}
@section('js')
    {{-- swal --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>
    <script>
        $(document).ready(function () {

            // checked form with data role
            var permission = {!! json_encode(json_decode($role->permission)) !!};
            var rou = {!! json_encode($routes) !!}
            permission.forEach(per => {
                rou.forEach(rou => {
                    if($('.check_'+rou).val()==per){
                        $('.check_'+rou).prop('checked',true);
                    }
                });
            });

            // checked all
            $(".checkall").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            // checked form
            var routes = {!! json_encode($routes) !!}
            routes.forEach(element => {
                $('.'+element).change(function (e) { 
                    e.preventDefault();
                    $(this).parents('.card_'+element).find('.check_'+element).prop('checked', $(this).prop('checked'));
                });
            });

        });

    </script>
@endsection