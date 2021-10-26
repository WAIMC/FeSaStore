{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển')
@section('directory', 'Danh Mục Sản Phẩm')
@section('action', 'Thêm Mới Sản Phẩm')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-header">
                    <h4 class="text-center">Thêm Sản Phẩm Mới</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" id="formInsert">
                        @csrf
                        <div class="row">
                            <div class="col-9">
    
                                <div class="form-group">
                                    <label for="name">Tên Sản Phẩm</label>
                                    <input type="text" name="name" id="name" aria-describedby="name" placeholder="Tên Sản Phẩm"
                                        value="{{ old('name') }}" class="form-control @error('name')
                                              is-invalid
                                        @enderror">
                                    @error('name')
                                        <small id="name" class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-inline">
                                    <label for="">Trạng Thái :  &nbsp;</label>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="show" name="status" value="0" checked>
                                        <label for="show" class="custom-control-label">Hiện</label>
                                    </div>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="hide" name="status" value="1">
                                        <label for="hide" class="custom-control-label">Ẩn</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="short_description">Mô Tả Ngắn</label>
                                    <textarea name="short_description" id="short_description" aria-describedby="short_description" class="form-control 
                                        @error('short_description')
                                              is-invalid
                                        @enderror">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <small id="short_description"
                                            class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                            </div>
                            <div class="col-3">
    
                                <div class="form-group">
                                    <label for="category_id">Thể Loại</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        {!! $list_cate !!}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="brand_id">Thương Hiệu</label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        @foreach ($list_brand as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="image">Hình Ảnh</label>
                                    <div class="row">
                                        <div class="col-9 m-0 p-0">
                                            <div class="form-group">
                                                <input type="text" value="" name="image" id="image" aria-describedby="image" placeholder="Nhập Ảnh"
                                                 class="form-control @error('image')
                                                          is-invalid
                                                    @enderror">
                                                @error('image')
                                                    <small id="image"
                                                        class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3 m-0 p-0">
                                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                                data-target="#upload_image">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <img src="" id="show_image" width="100px" height="100px" alt="">
                                    </div>
                                </div>
                                
                               

    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="description">Mô Tả Chi Tiết</label>
                                <textarea name="description" id="description" aria-describedby="description" class="form-control 
                                    @error('description')
                                          is-invalid
                                    @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <small id="description"
                                        class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="row">
                                <h4 class="col-12">Thuộc Tính Sản Phẩm (Tối đa 2 thuộc tính)</h4>
                                <hr>
                            </div>
                            <div class="shadow rounded field_wrapper">
                                <div class="row m-auto attribute">
                                    <div class="col-5">
                                        <div class="form-group">
                                          <label for="name_att">Tên Thuộc Tính</label>
                                          <input type="text" name="name_att[]" id="name_att" placeholder="Tên Thuộc Tính vd: Kích Cỡ nhập -> size" 
                                          class="form-control @error('name_att')
                                                is-invalid
                                            @enderror">
                                        @error('name_att')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                    </div>
                                   <div class="col-5">
                                    <div class="form-group">
                                        <label for="attri">Thuộc Tính</label>
                                        <input type="text" name="attri[]" id="attri" placeholder="Nhâp Thuộc Tính vd: sm, md, lg -> sm|md|lg" class="form-control 
                                            @error('attri')
                                                is-invalid
                                            @enderror">
                                        @error('attri')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                   </div>
                                   <div class="col-2">
                                       <a href="javascript:void(0);" class="add_button" title="Thêm Thuộc Tính"> <i class="fa fa-plus-circle" style="font-size: 30px;line-height: 86px" aria-hidden="true"></i></a>
                                   </div>
                                </div>
                            </div>
                            <div class="row m-2">
                                <input type="hidden" name="variant">
                                <button type="button" class="btn btn-dark btnMerge ml-2">Kết Hợp Các Thuộc Tính!</button>
                            </div>
                        </div>

                        <div class=" variant_product"></div>
                        
                        <div class="row mt-5">
                            <button type="button" class="btn btn-primary btnInsert">Thêm Mới</button>
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
    <div class="modal fade" id="upload_image" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Hình Ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('public/fileManager/dialog.php?field_id=image') }}"
                        style="width:100%;height:500px;overflow-y:auto;border:none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div id="show_modal"></div>

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
        //  summernote description
        $(function() {
            // short description
            $('#short_description').summernote({
                height: 150,
                placeholder: 'Mô Tả Ngắn'
            });
            // description
            $('#description').summernote({
                height: 250,
                placeholder: 'Mô Tả Chi Tiết'
            });
        })

        // modal image
        $('#upload_image').on('hide.bs.modal', function(e) {
            var _link = $('input#image').val();
            var _image = "{{ url('public/uploads') }}" + "/" + _link;
            $('#show_image').attr('src', _image);
        });

        // insert conformation
        $('.btnInsert').click(function(e) {
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
                    $('form#formInsert').submit();
                    Swal.fire(
                        'Đang Thêm Mới!',
                        'Dữ Liệu Đang Được Thêm.',
                        'success'
                    );
                }
            });
        });

        // insert variant product
        $(document).ready(function(){
            var maxField = 2;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper'); 
            var fieldHTML = `<div class="row m-auto attribute">
                                <div class="col-5">
                                    <div class="form-group">
                                       <label for="name_att">Tên Thuộc Tính</label>
                                        <input type="text" name="name_att[]" id="name_att" placeholder="Tên Thuộc Tính vd: Kích Cỡ nhập -> size" class="form-control
                                            @error('name_att')
                                                is-invalid
                                            @enderror">
                                        @error('name_att')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-5">
                                <div class="form-group">
                                    <label for="attri">Thuộc Tính</label>
                                    <input type="text" name="attri[]" id="attri" placeholder="Nhâp Thuộc Tính vd: sm, md, lg -> sm|md|lg" class="form-control
                                            @error('attri')
                                                is-invalid
                                            @enderror">
                                        @error('attri')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="javascript:void(0);" class="remove_button" title="Xóa Thuộc Tính"> <i class="fa fa-minus-circle" style="font-size: 30px;line-height: 86px" aria-hidden="true"></i></a>
                                </div>
                            </div>`; 
            var x = 1; 
            
            //Once add button is clicked
            $(addButton).click(function(){
                if(x < maxField){ 
                    x++; 
                    $(wrapper).append(fieldHTML);
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                //or use : $(this).parent('div').parent('div').remove();
                $(this).closest("div .attribute").remove();
                x--;
            });
        });

        var arr_attri = [];

        $('.btnMerge').click(function (e) { 
            e.preventDefault();
            // get all value name attribute
            var name_attribute = $('input[name^=name_att]').map(function(idx, elem) {
                return $(elem).val();
            }).get();
            $('input[name=variant]').val(name_attribute.join('|'));

            // get all value attribute
            var attri = $('input[name^=attri]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            
            attri.forEach(element => {
                arr_attri.push(element.split('|'));
            });

            //getValue(arr_attri);
            
            var i = 0;
            var fill_variant = '';
            if(arr_attri.length == 1 && arr_attri !== ''){
                arr_attri[0].forEach(attr_one => {
                    if(attr_one !== 'undefined'){
                            fill_variant = `
                            <div class="row shadow rounded mt-4">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="variant_attribute">Biến Thể</label>
                                        <input type="text"  name="variant_attribute[]" id="variant_attribute" value="${attr_one}" placeholder="" required class="form-control 
                                        @error('variant_attribute')
                                          is-invalid
                                        @enderror">
                                        @error('variant_attribute')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Giá</label>
                                        <input type="number" name="price[]" id="price" placeholder="Giá" required class="form-control
                                        @error('price')
                                          is-invalid
                                        @enderror">
                                        @error('price')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="discount">Giảm Giá</label>
                                        <input type="number" name="discount[]" id="discount" placeholder="Giảm Giá" required class="form-control 
                                        @error('discount')
                                          is-invalid
                                        @enderror">
                                        @error('discount')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="quantity">Số Lượng</label>
                                        <input type="number" name="quantity[]" id="quantity" placeholder="Số Lượng" required class="form-control
                                        @error('quantity')
                                        is-invalid
                                        @enderror">
                                        @error('quantity')
                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-6">
                                        
                                    <div><label for="">Trạng Thái : &nbsp; </label></div>
                                    <div class="form-inline">
                                        <div class="custom-control custom-radio mr-2">
                                            <input class="custom-control-input" type="radio" id="show_${i}" name="status_${i}" value="0" checked='checked'>
                                            <label for="show_${i}" class="custom-control-label">Hiện</label>
                                        </div>
                                        <div class="custom-control custom-radio mr-2">
                                            <input class="custom-control-input" type="radio" id="hide_${i}" name="status_${i}" value="1">
                                            <label for="hide_modal_gallery${i}" class="custom-control-label">Ẩn</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="list_modal_gallery_${i}">Bộ Sưu Tập Ảnh</label>
                                        <div class="row">
                                            <div class="col-9 m-0 p-0">
                                                <div class="form-group">
                                                    <input type="text" value="" name="gallery[]" id="list_modal_gallery_${i}" placeholder="Nhập Ảnh"
                                                        class="form-control @error('gallery')
                                                                is-invalid
                                                        @enderror">
                                                    @error('gallery')
                                                        <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-3 m-0 p-0">
                                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                                    data-target="#modal_gallery_${i}">
                                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row" id="show_modal_gallery_${i}">
                                        </div>
                                    </div>

                                </div>
                            </div>`;

                            // fill html variant
                            $('.variant_product').append(fill_variant);

                            // fill modal
                            $('#show_modal').append(`
                                <div class="modal fade" id="modal_gallery_${i}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center">Hình Ảnh</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="{{ url('public/fileManager/dialog.php?field_id=list_modal_gallery_${i}') }}"
                                                    style="width:100%;height:500px;overflow-y:auto;border:none;"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);

                            // get show gallery 
                            $('.modal').on('hide.bs.modal', function(e) {
                                var _id = $(this).attr('id');

                                var _links = $('input#list_'+_id).val();
                                var _html = '';
                                // var _args = $.parseJSON(_links);
                                // check input data json string to parseJSON
                                if (/^[\],:{}\s]*$/.test(_links.replace(/\\["\\\/bfnrtu]/g, '@').replace(
                                        /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(
                                        /(?:^|:|,)(?:\s*\[)+/g, ''))) {
                                    var _args = $.parseJSON(_links);
                                    for (let img = 0; img < _args.length; img++) {
                                        let _url = "{{ url('public/uploads') }}" + "/" + _args[img];
                                        _html += "<div class='col-sm-4'>";

                                        _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";

                                        _html += "</div>";
                                    };
                                } else {
                                    let _url = "{{ url('public/uploads') }}" + "/" + _links;
                                    _html += "<div class='col-sm-4'>";

                                    _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";

                                    _html += "</div>";
                                }
                                $('#show_'+_id).html(_html);
                            });
                                
                            i +=1;
                    }
                });
            }else{
                arr_attri[0].forEach(one => {
                    arr_attri[1].forEach(two => {
                        if(one !== 'undefined' && two !== 'undefined'){
                                fill_variant = `
                                <div class="row shadow rounded mt-4">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="variant_attribute">Biến Thể</label>
                                            <input type="text" name="variant_attribute[]" id="variant_attribute" value="${one}|${two}" placeholder="" required 
                                                class="form-control @error('image')
                                                    is-invalid
                                            @enderror">
                                            @error('name')
                                                <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Giá</label>
                                            <input type="number" name="price[]" id="price" placeholder="Giá" required 
                                                class="form-control @error('price')
                                                        is-invalid
                                                @enderror">
                                            @error('name')
                                                <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                            @enderror   
                                        </div>

                                        <div class="form-group">
                                            <label for="discount">Giảm Giá</label>
                                            <input type="number"  name="discount[]" id="discount" placeholder="Giảm Giá" required 
                                                class="form-control @error('discount')
                                                        is-invalid
                                                    @enderror">
                                            @error('discount')
                                                <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="quantity">Số Lượng</label>
                                            <input type="number" name="quantity[]" id="quantity" placeholder="Số Lượng" required
                                                class="form-control @error('quantity')
                                                    is-invalid
                                                @enderror">
                                                @error('gallery')
                                                    <small id="quantity"
                                                        class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>

                                    </div>
                                    <div class="col-6">

                                        <div><label for="">Trạng Thái : &nbsp; </label></div>
                                        <div class="form-inline">
                                            <div class="custom-control custom-radio mr-2">
                                                <input class="custom-control-input" type="radio" id="show_${i}" name="status_${i}" value="0" checked>
                                                <label for="show_${i}" class="custom-control-label">Hiện</label>
                                            </div>
                                            <div class="custom-control custom-radio mr-2">
                                                <input class="custom-control-input" type="radio" id="hide_${i}" name="status_${i}" value="1">
                                                <label for="hide_modal_gallery${i}" class="custom-control-label">Ẩn</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="list_modal_gallery_${i}">Bộ Sưu Tập Ảnh</label>
                                            <div class="row">
                                                <div class="col-9 m-0 p-0">
                                                    <div class="form-group">
                                                        <input type="text" value="" name="gallery[]" id="list_modal_gallery_${i}" placeholder="Nhập Ảnh"
                                                            class="form-control @error('gallery')
                                                                    is-invalid
                                                            @enderror">
                                                        @error('gallery')
                                                            <small class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3 m-0 p-0">
                                                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                                        data-target="#modal_gallery_${i}">
                                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row" id="show_modal_gallery_${i}">
                                            </div>
                                        </div>

                                    </div>
                                </div>`;

                                // fill html variant
                                $('.variant_product').append(fill_variant);

                                // fill modal
                                $('#show_modal').append(`
                                    <div class="modal fade" id="modal_gallery_${i}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center">Hình Ảnh</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe src="{{ url('public/fileManager/dialog.php?field_id=list_modal_gallery_${i}') }}"
                                                        style="width:100%;height:500px;overflow-y:auto;border:none;"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);

                                // get show gallery 
                                $('.modal').on('hide.bs.modal', function(e) {
                                    var _id = $(this).attr('id');

                                    var _links = $('input#list_'+_id).val();
                                    var _html = '';
                                    // var _args = $.parseJSON(_links);
                                    // check input data json string to parseJSON
                                    if (/^[\],:{}\s]*$/.test(_links.replace(/\\["\\\/bfnrtu]/g, '@').replace(
                                            /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(
                                            /(?:^|:|,)(?:\s*\[)+/g, ''))) {
                                        var _args = $.parseJSON(_links);
                                        for (let img = 0; img < _args.length; img++) {
                                            let _url = "{{ url('public/uploads') }}" + "/" + _args[img];
                                            _html += "<div class='col-sm-4'>";

                                            _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";

                                            _html += "</div>";
                                        };
                                    } else {
                                        let _url = "{{ url('public/uploads') }}" + "/" + _links;
                                        _html += "<div class='col-sm-4'>";

                                        _html += "<img src='" + _url + "' alt='' width='100%' height='100px' >";

                                        _html += "</div>";
                                    }
                                    $('#show_'+_id).html(_html);
                                });
                                    
                                i +=1;
                        }
                    });
                });
            }
                
        });

       
        
        
    </script>
@endsection