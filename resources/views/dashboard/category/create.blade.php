{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Danh Mục Sản Phẩm')
@section('action', 'Thêm Danh Mục')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Thêm Danh Mục</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 m-auto">
                                    <form action="{{ route('category.store') }}" id="formInsert" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Tên Danh Mục</label>
                                            <input type="text" class="form-control @error('name')
                                                  is-invalid
                                                @enderror" name="name" id="name" aria-describedby="nameCategory" placeholder="Tên danh mục" value="{{ old('name')}}" required>
                                            @error('name')
                                                <small id="nameCategory" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                          <label for="parent_id">Thuộc Danh Mục</label>
                                          <select class="form-control" name="parent_id" id="parent_id">
                                              <option value="0">Chọn danh mục hiện tại</option>
                                                {!! $option !!}
                                          </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Mô Tả</label>
                                            <textarea name="description" id="description" aria-describedby="description" class="form-control 
                                                @error('description')
                                                      is-invalid
                                                @enderror">{{ old('description') }}</textarea>
                                            @error('description')
                                                <small id="description"
                                                    class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <button type="button" class="btn btn-outline-dark btnInsert">Add</button>
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
        </div>
    </div>

    {{-- form action --}}
    
@endsection


{{-- customize load css for master layout --}}
@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.css">
@endsection

{{-- customize load js for master layout --}}
@section('js')
    <!-- Summernote -->
    <script src="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script>
    {{-- swal --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // using ckeditor
        $(function () {
            // Summernote
            $('#description').summernote({
                height: 250,
                placeholder: 'Nhập Mô Tả'
            })
        })

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

</script>
@endsection