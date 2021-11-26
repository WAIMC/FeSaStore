{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh mục bài viết ')
@section('action', 'Thêm mới danh mục')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                {{-- card hearder --}}
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Thêm mới danh mục </h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('categoryblog.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span>Danh sách danh mục</span>
                            </a>
                        </div>
                    </div>
                  </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('categoryblog.store')}}" method="post" id="formInsert" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="">Tên danh mục</label>
                                    <input type="text" name="name" value="{{old("name")}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên categoryblog" aria-describedby="helpId">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small> 
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea class="form-control" name="description" id="" rows="3"> {{ old("description") }} </textarea>
                                    @error('description')
                                        <small  class="text-danger">{{$message}}</small> 
                                    @enderror
                                </div>
                                <input type="submit" value="Thêm mới" class="btn btn-primary btnInsert">
                            </form>
                        </div>
                    </div>
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
         $('#model_file').on('hide.bs.modal', event => {
            var _link = $('input#image').val();
            var _img = "{{ url('public/uploads') }}" + '/' + _link;
            if (_img && _link) {
                $('img#show_img').attr('src', _img);
                $('img#show_img').attr('height', 200);
            }else{
                $('img#show_img').attr('display', 'none');
            }
        });
    </script>
@endsection