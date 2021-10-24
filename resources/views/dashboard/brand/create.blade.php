{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Thương hiệu ')
@section('action', 'Thương hiệu')

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
                            <h4>Thêm thương hiệu mới</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('brand.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span>Danh sách liên kết</span>
                            </a>
                        </div>
                    </div>
                       
                    {{-- select by choose --}}
                  
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('brand.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="">Tên thương hiệu</label>
                          <input type="text" name="name" value="{{old("name")}}" class="form-control"@error('name')   is-invalid
                        @enderror placeholder="Nhập tên thương hiệu" aria-describedby="helpId">
                              @error('name')
                            <small  class="text-danger">{{$message}}</small> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button type="button" data-toggle="modal" data-target="#model_file" class="btn btn-primary"><i
                                            class="fas fa-folder-open"></i></i></button>
                                </span>
                                <input type="text" readonly name="image" value="{{old("image")}}" id="image" class="form-control">
                              
                            </div>
                            @error('image')
                            <small  class="text-danger">{{$message}}</small> 
                            @enderror
                            <div class="col-4 mt-3">
                                <img class="img w-100" src="" id="show_img" class="mt-2" >
                            </div>
                          </div>
                          <input type="submit" value="Thêm mới" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="model_file" role="dialog" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Trình quản lý file</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <iframe
                    src="{{ url('public/filemanager/dialog.php?field_id=image&akey=2ZIrXI03fit1oFZ3vLuPHQhDYBY1GcVeVZaNFvU') }}"
                    width="100%" height="500" frameborder="0"></iframe>
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