{{-- extend layout master --}}
@extends('dashboard.layouts.master')

{{-- define item for master layout --}}
@section('title','Bảng Điều Khiển')
@section('directory', 'Danh Mục Sản Phẩm')
@section('action', 'Sửa Sản Phẩm')

{{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Sửa Sản Phẩm</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data" id="formEdit">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-9">

                                <div class="form-group">
                                    <label for="name">Tên Sản Phẩm</label>
                                    <input type="text" name="name" id="name" aria-describedby="name" placeholder="Tên Sản Phẩm"
                                        value="{{ $product->name }}" class="form-control @error('name')
                                            is-invalid
                                        @enderror">
                                    @error('name')
                                        <small id="name" class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-inline">
                                    <label for="">Trạng Thái :  &nbsp;</label>
                                    <div class="custom-control custom-radio mr-2">
                                        <input class="custom-control-input" type="radio" id="show" name="status" value="0">
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
                                        @enderror">{{ $product->short_description }}</textarea>
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
                                        {!! $options !!}
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
                                                <input type="text" name="image" id="image" value="{{ $product->image }}" required placeholder="Nhập Ảnh"
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
                                    <div class="">
                                        <img src="{{ url('public/uploads/'. $product->image) }}" id="show_image" width="100%" alt="">
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
                                    @enderror">{{ $product->description }}</textarea>
                                @error('description')
                                    <small id="description"
                                        class="invalid-feedback form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-sm btn-secondary" id="show_hide_atri">CLick để sửa hoặc không sửa thuộc tính</button>
                            </div>
                            <div class="col-12" id="info_attri">
                                @if ($product->product_variantProduct->count() > 0)
                                    <h4 class="text-danger">Vui lòng xóa hết các thuộc tính sản phẩm trước muốn sửa biến thể, mặc định chỉ sửa sản phẩm!</h4>
                                @else
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
                                        <div class="row m-2 d-flex justify-content-center">
                                            <button type="button" class="btn btn-dark btnMerge ml-2">Kết Hợp Các Thuộc Tính!</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class=" variant_product"></div>
                        <input type="hidden" name="variant" value="{{ $product->variant }}">
                        <div class="row mt-5">
                            <button type="button" class="btn btn-primary btnEdit">Cập Nhật</button>
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
    {{-- load crud js for project --}}
    <script src="{{ url('public/dashboard') }}/setup-project/setup-crud.js"></script>
    <!-- jquery-validation -->
    <script src="{{ url('public/dashboard') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ url('public/dashboard') }}/plugins/jquery-validation/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {

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

            // selected category
            var product = {!! json_encode($product) !!}
            $('#category_id option').each(function(){
                if($(this).val() == product['category_id']){
                    $(this).attr('selected','selected');
                }
            })

            // selected brand
            $('#brand_id option').each(function(){
                if($(this).val() == product['brand_id']){
                    $(this).attr('selected','selected');
                }
            })

            // checked status
            $('input[name=status]').each(function(){
                if($(this).val() == product['status']){
                    $(this).attr('checked','checked');
                }
            })


            // show and hide atribute
            $('#show_hide_atri').click(function (e) { 
                e.preventDefault();
                $('#info_attri').toggle();
            });

            // modal image
            $('#upload_image').on('hide.bs.modal', function(e) {
                var _link = $('input#image').val();
                var _image = "{{ url('public/uploads') }}" + "/" + _link;
                $('#show_image').attr('src', _image);
            });

             /*
            * insert variant product start
            */ 
            var maxField = 2;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper'); 
            var fieldHTML = `<div class="row m-auto attribute">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="name_att">Tên Thuộc Tính</label>
                                        <input type="text" name="name_att[]" required id="name_att" placeholder="Tên Thuộc Tính vd: Kích Cỡ nhập -> size" class="form-control
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
                                        <input type="text" name="attri[]" required id="attri" placeholder="Nhâp Thuộc Tính vd: sm, md, lg -> sm|md|lg" class="form-control
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
            /*
            * insert variant product end
            */ 

            /*
            * merge attribute start
            */
            
            $('.btnMerge').click(function (e) { 
                e.preventDefault();
                $('.variant_product').empty();
                var arr_attri = [];
                // get all value name attribute
                var name_attribute = $('input[name^=name_att]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                // get all value attribute
                var attri = $('input[name^=attri]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                // validate check and alert value null
                if (name_attribute.includes('') == true || attri.includes('') == true) {
                    alert("Vui lòng điền đủ thông tin thuộc tính.");
                } else {
                    // fill name variant
                    $('input[name=variant]').val(name_attribute.join('|'));
                    // merge attribute
                    attri.forEach(element => {
                        arr_attri.push(element.split('|'));
                    });
                }
                
                // fill variant
                var i = 0;
                var fill_variant = '';
                if(arr_attri.length == 1 && arr_attri !== ''){
                    arr_attri[0].forEach(attr_one => {
                        if(attr_one !== undefined){
                                fill_variant = `
                                <div class="test row shadow rounded mt-4">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="variant_attribute">Biến Thể</label>
                                            <input readonly type="text" name="variant_attribute[]" id="variant_attribute" value="${attr_one}" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Giá</label>
                                            <input type="number" name="price[]" id="price" placeholder="Giá" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="discount">Giảm Giá</label>
                                            <input type="number" name="discount[]" id="discount" placeholder="Giảm Giá" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="quantity">Số Lượng</label>
                                            <input type="number" name="quantity[]" id="quantity" placeholder="Số Lượng" required class="form-control">
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
                                                        <input type="text" value="" name="gallery[]" id="list_modal_gallery_${i}" placeholder="Nhập Ít Nhất 2 Ảnh" required class="form-control">
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

                                        _html += "<img src='" + _url + "' alt='' width='100%' height='200px' >";

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
                            if(one !== undefined && two !== undefined){
                                    fill_variant = `
                                    <div class="test row shadow rounded mt-4">
                                        <div class="col-6">

                                            <div class="form-group">
                                                <label for="variant_attribute">Biến Thể</label>
                                                <input readonly type="text" name="variant_attribute[]" id="variant_attribute" value="${one}|${two}" required class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Giá</label>
                                                <input type="number" name="price[]" id="price" placeholder="Giá" required class="form-control"> 
                                            </div>

                                            <div class="form-group">
                                                <label for="discount">Giảm Giá</label>
                                                <input type="number" name="discount[]" id="discount" placeholder="Giảm Giá" required class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="quantity">Số Lượng</label>
                                                <input type="number" name="quantity[]" id="quantity" placeholder="Số Lượng" required class="form-control">
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
                                                            <input type="text" value="" name="gallery[]" id="list_modal_gallery_${i}" placeholder="Nhập ít nhất 2 ảnh" required class="form-control">
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

            /*
            * merge attribute end
            */

            /*
            * form insert validate start
            */ 
            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    var test_value = re.test(value);
                    return this.optional(element) || /^[\],:{}\s]*$/.test(value.replace(/\\["\\\/bfnrtu]/g, '@').
                                                    replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
                                                    replace(/(?:^|:|,)(?:\s*\[)+/g, ''));
                },
                "Nhập ít nhất 2 ảnh !."
            );

            $.validator.prototype.checkForm = function() {
                //overriden in a specific page
                this.prepareForm();
                for (var i = 0, elements = (this.currentElements = this.elements()); elements[i]; i++) {
                    if (this.findByName(elements[i].name).length !== undefined && this.findByName(elements[i].name).length > 1) {
                        for (var cnt = 0; cnt < this.findByName(elements[i].name).length; cnt++) {
                            this.check(this.findByName(elements[i].name)[cnt]);
                        }
                    } else {
                        this.check(elements[i]);
                    }
                }
                return this.valid();
            };

            $('#formEdit').validate({
                rules : {
                    'price[]':{
                        required: true,
                        number: true
                    },
                    'discount[]':{
                        required: true,
                        number: true
                    },
                    'quantity[]':{
                        required: true,
                        number: true
                    },
                    'gallery[]':{
                        required: true,
                        regex: true
                    },
                },
                messages : {
                    'price[]':{
                        required: "Vui lòng không bỏ trống !",
                        number: "Vui lòng nhập số !"
                    },
                    'discount[]':{
                        required: "Vui lòng không bỏ trống !",
                        number: "Vui lòng nhập số !"
                    },
                    'quantity[]':{
                        required: "Vui lòng không bỏ trống !",
                        number: "Vui lòng nhập số !"
                    },
                    'gallery[]':{
                        required: "Vui lòng không bỏ trống !"
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            })
            
            /*
            * form insert validate end
            */ 
        });
    </script>
@endsection