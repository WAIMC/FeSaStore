{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển')
@section('directory', 'Thuộc Tính Biến Thể')
@section('action', 'Sửa Biến Thể')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-header">
                    <h4 class="text-center">Sửa Biến Thể</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('variantProduct.update', $variantProduct->id) }}" method="POST" enctype="multipart/form-data" id="formEdit">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-6">
    
                                <div class="form-group">
                                    <label for="variant_attribute">Thuộc Tính Biến Thể</label>
                                    <input type="text" name="variant_attribute" id="variant_attribute" placeholder="Thuộc Tính Biến Thể" value="{{ $variantProduct->variant_attribute }}" class="form-control 
                                        @error('variant_attribute')
                                            is-invalid
                                        @enderror">
                                    @error('variant_attribute')
                                        <small id="variant_attribute" class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Số Lượng</label>
                                    <input type="number" name="quantity" id="quantity" placeholder="Số Lượng" value="{{ $variantProduct->quantity }}" class="form-control 
                                        @error('quantity')
                                            is-invalid
                                        @enderror">
                                    @error('quantity')
                                        <small id="quantity" class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                            </div>
                            <div class="col-6">
    
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input type="number" name="price" id="price" placeholder="Giá" value="{{ $variantProduct->price }}" class="form-control 
                                        @error('price')
                                            is-invalid
                                        @enderror">
                                    @error('price')
                                        <small id="price" class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="discount">Giảm Giá</label>
                                    <input type="text" name="discount" id="discount" placeholder="Giảm Giá" value="{{ $variantProduct->discount }}" class="form-control 
                                        @error('discount')
                                            is-invalid
                                        @enderror">
                                    @error('discount')
                                        <small id="discount" class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <div class="mt-2"><label for="">Trạng Thái</label></div>
                                <div class="form-inline">
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="show" name="status" value="0">
                                        <label for="show" class="custom-control-label">Hiển</label>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="hide" name="status" value="1">
                                        <label for="hide" class="custom-control-label">Ẩn</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_id">ID Sản Phẩm</label>
                                    <input type="text" name="product_id" id="product_id" readonly value="{{ $variantProduct->product_id }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-group mt-2">
                                    <label for="gallery">Gallery</label>
                                    <div class="row">
                                        <div class="col-9 m-0 p-0">
                                            <div class="form-group">
                                                <input type="text" name="gallery" id="gallery" value="{{ $variantProduct->gallery }}" required placeholder="Nhập Ảnh"
                                                 class="form-control @error('gallery')
                                                          is-invalid
                                                    @enderror">
                                                @error('gallery')
                                                    <small id="gallery"
                                                        class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3 m-0 p-0">
                                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                                data-target="#upload_gallery">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row" id='show_gallery'></div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-5">
                            <button type="button" class="btn btn-primary" id="btnEdit">Cập Nhật</button>
                        </div>
                        
                    </form>
                </div>
                <div class="card-footer text-muted">
                    {{-- Footer --}}
                </div>
                
            </div>
        </div>
    </div>

    {{-- model image --}}
    <!-- Button trigger modal -->
    <div class="modal fade" id="upload_gallery" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Hình Ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('public/fileManager/dialog.php?field_id=gallery') }}"
                        style="width:100%;height:500px;overflow-y:auto;border:none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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

        // checked status
        var variant = {!! json_encode($variantProduct) !!};
        $('input[name=status]').each(function () {  
            if($(this).val() == variant['status']){
                $(this).attr('checked','checked')
            }
        });

        var _links = variant['gallery'];
        var _html = '';
        if (/^[\],:{}\s]*$/.test(_links.replace(/\\["\\\/bfnrtu]/g, '@').replace(
            /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(
            /(?:^|:|,)(?:\s*\[)+/g, ''))) {
            var _args = $.parseJSON(_links);
            for (let img = 0; img < _args.length; img++) {
                let _url = "{{ url('public/uploads') }}" + "/" + _args[img];
                _html += "<div class='col-4 m-0 p-0'>";
                _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";
                _html += "</div>";
            };
        } else {
            let _url = "{{ url('public/uploads') }}" + "/" + _links;
            _html += "<div class='col-4 m-0 p-0'>";
            _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";
            _html += "</div>";
        }
        $('#show_gallery').html(_html);

        $('#upload_gallery').on('hide.bs.modal', function(e) {  
            var _links = $('input#gallery').val();
            var _html = '';
            if (/^[\],:{}\s]*$/.test(_links.replace(/\\["\\\/bfnrtu]/g, '@').replace(
                /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(
                /(?:^|:|,)(?:\s*\[)+/g, ''))) {
                var _args = $.parseJSON(_links);
                for (let img = 0; img < _args.length; img++) {
                    let _url = "{{ url('public/uploads') }}" + "/" + _args[img];
                    _html += "<div class='col-4 m-0 p-0'>";
                    _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";
                    _html += "</div>";
                };
            } else {
                let _url = "{{ url('public/uploads') }}" + "/" + _links;
                _html += "<div class='col-4 m-0 p-0'>";
                _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";
                _html += "</div>";
            }
            $('#show_gallery').html(_html);
        });

        // insert conformation
        $('#btnEdit').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn Có Chắc Chắn?',
                text: "Bạn Không Thể Hoàn Tác Chức Năng!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, Thêm nó!',
                cancelButtonText: "Không, hủy nó!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formEdit').submit();
                    Swal.fire(
                        'Đang Cập Nhật!',
                        'Dữ Liệu Đang Được Cập Nhật.',
                        'success'
                    );
                }
            });
        });

    </script>
@endsection