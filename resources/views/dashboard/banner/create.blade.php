{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Banner ')
@section('action', 'Thêm mới Banner')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                {{-- card hearder --}}
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Thêm mới banner</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('banner.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span>Danh sách banner</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('banner.store')}}" method="post"  id="formInsert" novalidate="novalidate">
                                @csrf
                            <div class="form-group">
                                <label for="">Tiêu đề</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror"placeholder="Nhập tên banner" aria-describedby="helpId">
                                @error('title')
                                    <small  class="text-danger">{{$message}}</small> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Liên kết</label>
                                <input type="text" name="link" value="{{old('link')}}" class="form-control @error('link') is-invalid @enderror" placeholder="Nhập đường dẫn trỏ đến" aria-describedby="helpId">
                                @error('link')
                              <small  class="text-danger">{{$message}}</small> 
                              @enderror
                          </div>
                          <div class="form-group">
                            <label for="">vị trí</label>
                            <input type="" name="position" value="{{old('position')}}" class="form-control @error('position')   is-invalid  @enderror" placeholder="Nhập đường dẫn trỏ đến" aria-describedby="helpId" >
                              @error('position')
                              <small  class="text-danger">{{$message}}</small> 
                              @enderror
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                xem chỉ dẫn thêm vị trí
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg" role="document">
                                    <div class="modal-content" >
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hướng dẫn thêm position banner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p>brand_banner: là vị trí banner dưới chân slider</p>
                                    <img src="{{url('public/uploads')}}/chỉ dẫn thêm vị trí banner\a.PNG" alt="slider-banner" width="400px" height="200px" style="margin-left: 200px;">
                                    <hr>
                                    <p>big_banner: là vị trí banner trên danh mục tiêu biểu vd:big_banner1 -> big_banner8</p>
                                    <img src="{{url('public/uploads')}}/chỉ dẫn thêm vị trí banner\b.PNG" alt="slider-banner" width="400px" height="200px" style="margin-left: 200px;">
                                    <hr>
                                    <p>tab_content: là vị trí banner danh mục tiêu biểu</p>
                                    <img src="{{url('public/uploads')}}/chỉ dẫn thêm vị trí banner\c.PNG" alt="slider-banner" width="400px" height="200px" style="margin-left: 200px;">
                                    <hr>
                                    <p>hot_brand: là vị trí banner hot brand</p>
                                    <img src="{{url('public/uploads')}}/chỉ dẫn thêm vị trí banner\d.PNG" alt="slider-banner" width="400px" height="200px" style="margin-left: 200px;">
                                    <hr>
                                    <p>brand_banner: là vị trí banner dưới hot brand</p>
                                    <img src="{{url('public/uploads')}}/chỉ dẫn thêm vị trí banner\e.PNG" alt="slider-banner" width="400px" height="200px" style="margin-left: 200px;">
                                    <hr>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                          </div>
                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button" data-toggle="modal" data-target="#model_file" class="btn btn-primary">
                                            <i class="fas fa-folder-open"></i>
                                        </button>
                                    </span>
                                    <input type="text" readonly name="image" value="{{old('image')}}" id="image" class="form-control @error('image') is-invalid @enderror" >
                                </div>
                                @error('image')
                                    <small  class="text-danger">{{$message}}</small> 
                                @enderror
                                <div class="col-4 mt-3">
                                    <img class="img w-100" src="" id="show_img" class="mt-2" >
                                </div>
                            </div>
                            <input type="submit" value="Thêm mới" class="btn btn-primary btnInsert">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="model_file" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
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