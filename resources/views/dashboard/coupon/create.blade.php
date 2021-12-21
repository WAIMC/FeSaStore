{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển Quản Trị')
@section('directory', 'Mã giảm giá')
@section('action', 'Thêm mã giảm giá')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Thêm mã giảm giá</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 m-auto">
                                    <form action="{{ route('coupon.store') }}" id="formInsert" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Tên mã giảm giá</label>
                                            <input type="text" class="form-control @error('name')
                                                  is-invalid
                                                @enderror" name="coupon_name" id="name" aria-describedby="namecoupon" placeholder="Tên mã giảm giá" value="{{ old('name')}}" required>
                                        </div>

                                        <div class="form-group">
                                          <label for="parent_id">Tính năng</label>
                                          <select class="form-control" name="feature_coupon" id="parent_id">
                                            <option value="0">-----chọn-----</option>
                                              <option value="1">Giảm theo phần trăm </option>
                                              <option value="2"> Giảm theo số tiền</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Mã giảm giá</label>
                                            <input type="text" class="form-control" name="coupon_code" id="name" placeholder="Mã giảm giá" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Nhập số % hoặc số tiền</label>
                                            <input type="text" class="form-control" name="coupon_number" id="name" placeholder="Số % hoặc tiền" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Số lượng</label>
                                            <input type="number" class="form-control" name="quantity_coupon" id="name" placeholder="Số lượng mã giảm giá" value="" required>
                                        </div>
                                        <button type="button" name="add_coupon" class="btn btn-outline-dark btnInsert">Thêm</button>
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