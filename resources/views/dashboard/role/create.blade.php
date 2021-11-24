{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh Mục Vai Trò')
@section('action', 'Thêm Vai Trò')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Thêm Vai Trò</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 m-auto">
                            <form action="{{ route('role.store') }}" id="formInsert" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="name">Tên Vai Trò</label>
                                    <input type="text" class="form-control @error('name')
                                          is-invalid
                                    @enderror" name="name" id="name" aria-describedby="nameRole" placeholder="Tên Vai Trò" value="{{ old('name')}}" required>
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
                                            $name_managerment = 'Slider';
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
    
                                <button type="button" class="btn btn-outline-dark btnInsert">Thêm</button>
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
    <script>
        $(document).ready(function () {
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
           // show alert insert
            $('.btnInsert').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn không thể hoàn tác chức năng này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, Thêm mới nó!',
                    cancelButtonText: "Không, hủy nó!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('form#formInsert').submit();
                        Swal.fire(
                            'Đã Thêm!',
                            'Dữ liệu của bạn đã được thêm.',
                            'success'
                        );
                    }
                });
            }); 

        });

</script>
@endsection