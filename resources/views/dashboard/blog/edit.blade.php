{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh mục bài biết ')
@section('action', 'Chỉnh sửa bài viết')

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
                            <h4>Chỉnh sửa bài viết</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('blog.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span>Danh sách bài viết</span>
                            </a>
                        </div>
                    </div>
                       
                    {{-- select by choose --}}
                  
            </div>
            <div class="card-body">
                <form action="{{route('blog.update',$blog->id)}}" method="post"  id="quickForm" novalidate="novalidate">
                    @csrf @method('PUT')
                <div class="row">
                    <div class="col-9">
                      
                        <div class="form-group">
                          <label for="">Tiêu đề bài viết</label>
                          <input type="text" name="title" value="{{$blog->title}}" class="form-control @error('title')   is-invalid @enderror"placeholder="Nhập tiêu đề blog" aria-describedby="helpId">
                              @error('title')
                            <small  class="text-danger">{{$message}}</small> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả ngắn</label>
                            <input type="text" name="description" value="{{$blog->description}}" class="form-control @error('description')   is-invalid @enderror"placeholder="Nhập mô tả ngắn " aria-describedby="helpId">
                                @error('description')
                              <small  class="text-danger">{{$message}}</small> 
                              @enderror
                        </div>
                        <div class=" form-group">
                            <label for="content">Nội dung</label>
                            <textarea name="content" id="content" aria-describedby="content" class="form-control 
                                @error('content')
                                      is-invalid
                                @enderror">{{$blog->content }}</textarea>
                            @error('content')
                                <small id="content"
                                    class="invalid-feedback form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    
                          
                        
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="categoryblog">Danh mục</label>
                            <select class="form-control" name="category_blog_id" id="categoryblog">
                                @foreach ($modelcategoryblog as $item)
                                    <option @if ($item->id==$blog->category_blog_id)
                                        {{'selected'}}
                                    @endif  value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button type="button" data-toggle="modal" data-target="#model_file" class="btn btn-primary"><i
                                            class="fas fa-folder-open"></i></i></button>
                                </span>
                                <input type="text" readonly name="image" value="{{$blog->image}}" id="image" class="form-control @error('image')   is-invalid   @enderror">
                              
                            </div>
                            @error('image')
                            <small  class="text-danger">{{$message}}</small> 
                            @enderror
                            <div class="col-12 mt-3">
                                <img class="img w-100" src="{{ url('public/uploads/') }}/{{$blog->image}}" id="show_img" class="mt-2" >
                            </div>
                          </div>
                    </div>
                    <input type="hidden" name="author" value="{{ Auth::guard('adminAuth')->user()->id }}">
                   <input type="hidden" name="id" value="{{$blog->id}}">
                    <input type="submit" value="Cập nhật" class="btn btn-primary">
                </div>
            </form>
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
        $('#content').summernote({
                height: 300,
              
            });
    </script>
@endsection