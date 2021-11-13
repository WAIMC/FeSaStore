@extends('client.layouts.master')
@section('title','Chi tiết sản phẩm')

@section('main')

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
                        <li><a href="{{ route('client.shop') }}">Cửa Hàng</a></li>
                        <li class="active"><a href="{{ route('client.productDetail', $data_product_detail->id) }}">{{ $data_product_detail->name }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Product Thumbnail Start -->
        <div class="main-product-thumbnail ptb-100 ptb-sm-60">
            <div class="container">
                <div class="thumb-bg">
                    <div class="row">
                        <!-- Main Thumbnail Image Start -->
                        <div class="col-lg-5 mb-all-40">
                            <!-- Thumbnail Large Image start -->
                            <div class="tab-content thumb_gallery_detail">
                                
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="product-thumbnail mt-15">
                                <div class="thumb-menu owl-carousel nav tabs-area thumb_menu_gallery_detail" role="tablist">
                                    <a class="active" data-toggle="tab" href="#thumb_dt_1"><img src="" alt="product-thumbnail"></a>
                                    <a data-toggle="tab" href="#thumb_dt_2"><img src="" alt="product-thumbnail"></a>
                                    <a data-toggle="tab" href="#thumb_dt_3"><img src="" alt="product-thumbnail"></a>
                                    <a data-toggle="tab" href="#thumb_dt_4"><img src="" alt="product-thumbnail"></a>
                                    <a data-toggle="tab" href="#thumb_dt_5"><img src="" alt="product-thumbnail"></a>
                                </div>
                            </div>
                            <!-- Thumbnail image end -->
                        </div>
                        <!-- Main Thumbnail Image End -->
                        <!-- Thumbnail Description Start -->
                        <div class="col-lg-7">
                            <div class="thubnail-desc fix">
                                <h3 class="product-header">{{ $data_product_detail->name }}</h3>
                                <div class="rating-summary fix mtb-10">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="rating-feedback">
                                        <a href="#">(1 review)</a>
                                        <a href="#">thêm đánh giá của bạn</a>
                                    </div>
                                </div>
                                <div class="pro-price mtb-30">
                                    <p class="d-flex align-items-center price_dt"></p>
                                </div>
                                <p class="mb-20 pro-desc-details">{!! $data_product_detail->short_description !!}</p>
                                <div class="show_name_variant">
                                </div>
                                <div class="box-quantity d-flex hot-product2">
                                    <form action="#">
                                        <input class="quantity mr-15 quantity_pro_detail" type="number" min="1" value="1">
                                    </form>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="" data-original-title="Thêm vào giỏ hàng"> + Thêm vào giỏ hàng</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="" data-original-title="Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm vào so sánh</span></a>
                                            <a href="wishlist.html" title="" data-original-title="Thêm danh sách yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm danh sách yêu thích</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-ref mt-20">
                                    <p><span class="in-stock"><i class="ion-checkmark-round"></i> Trong kho</span></p>
                                </div>
                                <div class="socila-sharing mt-25">
                                    <ul class="d-flex">
                                        <li>chia sẻ</li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Thumbnail Description End -->
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail End -->
        <!-- Product Thumbnail Description Start -->
        <div class="thumnail-desc pb-100 pb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="main-thumb-desc nav tabs-area" role="tablist">
                            <li><a class="active" data-toggle="tab" href="#dtail">Chi Tiết Sản Phẩm</a></li>
                            <li><a data-toggle="tab" href="#review">Reviews 1</a></li>
                        </ul>
                        <!-- Product Thumbnail Tab Content Start -->
                        <div class="tab-content thumb-content border-default">
                            <div id="dtail" class="tab-pane fade show active">
                                <p>{!! $data_product_detail->description !!}</p>
                            </div>
                            <div id="review" class="tab-pane fade">
                                <!-- Reviews Start -->
                                <div class="review border-default universal-padding">
                                    <div class="group-title">
                                        <h2>đánh giá người dùng</h2>
                                    </div>
                                    <h4 class="review-mini-title">FeSa</h4>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Số Lượng</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>FeSa</label>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Giá</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>Đánh giá bởi <a href="https://themeforest.net/user/hastech">FeSa</a></label>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Giá trị</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>Posted on 7/20/18</label>
                                        </li>
                                        <!-- Single Review List End -->
                                    </ul>
                                </div>
                                <!-- Reviews End -->
                                <!-- Reviews Start -->
                                <div class="review border-default universal-padding mt-30">
                                    <h2 class="review-title mb-30">Bạn đang đánh giá: <br><span>{{$data_product_detail->name}}</span></h2>
                                    <p class="review-mini-title">Bạn xếp hạng</p>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Số lượng</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Giá</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Giá trị</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                    </ul>
                                    <!-- Reviews Field Start -->
                                    <div class="riview-field mt-40">
                                        <form autocomplete="off" action="#">
                                            <div class="form-group">
                                                <label class="req" for="sure-name">Nickname</label>
                                                <input type="text" class="form-control" id="sure-name" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="req" for="subject">Tóm Lược</label>
                                                <input type="text" class="form-control" id="subject" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="req" for="comments">Đánh giá</label>
                                                <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                            </div>
                                            <button type="submit" class="customer-btn">Gửi Đi Đánh Giá</button>
                                        </form>
                                    </div>
                                    <!-- Reviews Field Start -->
                                </div>
                                <!-- Reviews End -->
                            </div>
                        </div>
                        <!-- Product Thumbnail Tab Content End -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail Description End -->
        <!-- Realted Products Start Here -->
        <div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
            <div class="container">
               <!-- Product Title Start -->
               <div class="post-title pb-30">
                   <h2>Sản Phẩm Liên Quan</h2>
               </div>
               <!-- Product Title End -->
                <!-- Hot Deal Product Activation Start -->
                <div class="hot-deal-active owl-carousel">
                    @foreach ($all_product as $realted_pro)
                         <!-- Single Product Start -->
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="{{ route('client.productDetail',$realted_pro->id) }}">
                                    <img class="primary-img" src="{{ url('public/uploads/'. $realted_pro->image) }}" alt="single-product">
                                    <img class="secondary-img" src="{{ url('public/uploads/'. $realted_pro->image) }}" alt="single-product">
                                </a>
                                <a href="#" class="quick_view" data-toggle="modal" data-target="{{ $realted_pro->id }}" title="Xem Nhanh"><i class="lnr lnr-magnifier"></i></a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info">
                                    <h4><a href="{{ route('client.productDetail',$realted_pro->id) }}">{{ $realted_pro->name }}</a></h4>
                                    <p><span class="price">
                                        @if ($realted_pro->product_variantProduct->first()->price > $realted_pro->product_variantProduct->first()->discount)
                                            ${{$realted_pro->product_variantProduct->first()->discount}}
                                        @else
                                            ${{$realted_pro->product_variantProduct->first()->price}}
                                        @endif
                                    </span></p>
                                </div>
                                <div class="pro-actions">
                                    <div class="actions-primary">
                                        <a href="cart.html" title="Thêm vào giỏ hàng"> + Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="actions-secondary">
                                        <a href="compare.html" title="So Sánh"><i class="lnr lnr-sync"></i> <span>Thêm Vào So Sánh</span></a>
                                        <a href="wishlist.html" title="Ưa Thích"><i class="lnr lnr-heart"></i> <span>Thêm Vào Ưa Thích</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                            <span class="sticker-new">mới</span>
                        </div>
                        <!-- Single Product End -->
                    @endforeach
                </div>                
                <!-- Hot Deal Product Active End -->

            </div>
            <!-- Container End -->
        </div>
        <!-- Realated Products End Here -->

@endsection

@section('css')
    
@endsection

{{-- load js for index --}}
@section('js')
    <script>
        $(document).ready(function () {
            // get data product detail
            var product_detail = {!! json_encode($data_product_detail->toArray()) !!};
            var variant_product_detail = {!! json_encode($data_product_detail->product_variantProduct->toArray()) !!};
            
            // show variant attribute
            var variant_pro_detail_first = [];
            var variant_pro_detail_secound = [];
            var get_sub_vari = [];
            variant_product_detail.forEach(each_var_detail => {
                // check exist in array, push to array
                if(each_var_detail['variant_attribute'].indexOf('|') == -1){
                    if(variant_pro_detail_first.includes(each_var_detail['variant_attribute']) == false){
                        variant_pro_detail_first.push(each_var_detail['variant_attribute']);
                    }
                }else{
                    if(variant_pro_detail_first.includes(each_var_detail['variant_attribute'].substr(0, each_var_detail['variant_attribute'].indexOf('|'))) == false){
                        variant_pro_detail_first.push(each_var_detail['variant_attribute'].substr(0, each_var_detail['variant_attribute'].indexOf('|')));
                    }
                    if(variant_pro_detail_secound.includes(each_var_detail['variant_attribute'].substr(each_var_detail['variant_attribute'].indexOf('|')+1)) == false){
                        variant_pro_detail_secound.push(each_var_detail['variant_attribute'].substr(each_var_detail['variant_attribute'].indexOf('|')+1));
                    }
                }
            });
            // push array atribute
            get_sub_vari.push(variant_pro_detail_first);
            get_sub_vari.push(variant_pro_detail_secound);

            /*
            * fill information
            */ 

            // show name and attribute variant
            var name_pro_detail_attr = product_detail['variant'].split('|');
            var show_name_pro_attri = '';
            var num_detail_attri = 0;
            name_pro_detail_attr.forEach(each_name_attri => {
                show_name_pro_attri += `<div class="color clearfix mb-20">
                                        <label>${each_name_attri}</label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">`;
                // show atribute of product limit 1, max 2
                get_sub_vari[num_detail_attri].forEach(value_detail_attr => {
                    show_name_pro_attri += `<label class="btn btn-default text-center border-dark shadow rounded m-1 radio-groups dt_radio">
                                            <input type="radio" value='${value_detail_attr}' name="attr_detail_${num_detail_attri}">
                                            <span class="text-xl">${value_detail_attr}</span>
                                        </label>`;
                });              
                show_name_pro_attri +=`</div>
                                    </div>`;
                num_detail_attri++;
            });
            $('.show_name_variant').html(show_name_pro_attri);

            // checked form input to get value
            $('input:radio[name="attr_detail_0"]:first').attr('checked', 'checked');
            if($('input:radio[name="attr_detail_1"]:first').val() != undefined){
                $('input:radio[name="attr_detail_1"]:first').attr('checked', 'checked');
            }
            getVariantDetail(product_detail['id']);

            // change infomation variant product when click
            $('.dt_radio').change(function (e) { 
                    e.preventDefault();
                    var val_pv_radio = $(this).children('input[type=radio]').val();
                    $("input[name="+$(this).children('input[type=radio]').prop('name')+"]").each(function() {
                        if($(this).val() == val_pv_radio){
                            $(this).attr('checked', true);
                        }else{
                            $(this).attr('checked', false);
                        }
                    });
                    getVariantDetail(product_detail['id']);
                });

            // show infomation variant product detail
            function getVariantDetail(product_id){
                var value_attr_detail_first = $('input:radio[name="attr_detail_0"]:checked').val();
                var value_attr_detail_second = '';
                var merge_detail_attri = '';
                var price_detail = '';
                var discount_detail = '';
                var thumb_gallery_detail = '';
                var thumb_menu_gallery_detail = '';
                var active_thumb_detail = '';
                var num_thumb_detail = 0;
                // set color for button when click
                $('input:radio[name="attr_detail_0"]').parent().removeClass('bg-primary');
                $('input:radio[name="attr_detail_0"]:checked').parent().addClass('bg-primary');
                // get each variant product
                if($('input:radio[name="attr_detail_1"]:checked').val() != undefined){
                    // set color for button when click
                    $('input:radio[name="attr_detail_1"]').parent().removeClass('bg-primary');
                    $('input:radio[name="attr_detail_1"]:checked').parent().addClass('bg-primary');

                    value_attr_detail_second = $('input:radio[name="attr_detail_1"]:checked').val();
                    merge_detail_attri = value_attr_detail_first+"|"+value_attr_detail_second;
                    variant_product_detail.forEach(var_pro_detail => {
                        if(var_pro_detail['product_id'] == product_id && var_pro_detail['variant_attribute'] === merge_detail_attri){
                            price_detail = var_pro_detail['price'];
                            discount_detail = var_pro_detail['discount'];
                            $('.quantity_pro_detail').attr('max', var_pro_detail['quantity']);
                            // fill gallery
                            var gallery_detail = JSON.parse(var_pro_detail['gallery']);
                            gallery_detail.forEach(each_gallery_detail => {
                                num_thumb_detail == 0 ? active_thumb_detail = 'show active' : active_thumb_detail = '';
                                thumb_gallery_detail +=`<div id="thumb_dt_${num_thumb_detail}" class="tab-pane fade ${active_thumb_detail}">
                                                                <a data-fancybox="images" href="{{url('public/uploads')}}/${each_gallery_detail}">
                                                                    <img src="{{url('public/uploads')}}/${each_gallery_detail}" alt="product-view">
                                                                </a>
                                                            </div>`;
                                $(".thumb_menu_gallery_detail a[href='#thumb_dt_"+num_thumb_detail+"'] img").attr("src", "{{url('public/uploads')}}/"+each_gallery_detail);
                                num_thumb_detail++;
                            });
                        }
                    });
                }

                variant_product_detail.forEach(var_pro_detail => {
                    if(var_pro_detail['product_id'] == product_id && var_pro_detail['variant_attribute'] === value_attr_detail_first){
                        price_detail = var_pro_detail['price'];
                        discount_detail = var_pro_detail['discount'];
                        $('.quantity_pro_detail').attr('max', var_pro_detail['quantity']);
                        // fill gallery
                        var gallery_detail = JSON.parse(var_pro_detail['gallery']);
                        gallery_detail.forEach(each_gallery_detail => {
                            num_thumb_detail == 0 ? active_thumb_detail = 'show active' : active_thumb_detail = '';
                            thumb_gallery_detail +=`<div id="thumb_dt_${num_thumb_detail}" class="tab-pane fade ${active_thumb_detail}">
                                                            <a data-fancybox="images" href="{{url('public/uploads')}}/${each_gallery_detail}">
                                                                <img src="{{url('public/uploads')}}/${each_gallery_detail}" alt="product-view">
                                                            </a>
                                                        </div>`;
                            $(".thumb_menu_gallery_detail a[href='#thumb_dt_"+num_thumb_detail+"'] img").attr("src", "{{url('public/uploads')}}/"+each_gallery_detail);
                            num_thumb_detail++;
                        });
                    }
                });
                // fill price
                if(price_detail > discount_detail){
                    var percent_discount = 100-(price_detail/100*discount_detail);
                    $('.price_dt').html("<span class='prev-price'>"+price_detail+"</span><span class='price'>$"+discount_detail+"</span><span class='saving-price'>Giảm "+percent_discount+"%</span>");
                }
                $('.price_dt').html("<span class='price'>$"+price_detail+"</span>");

                // fill gallery
                $('.thumb_gallery_detail').html(thumb_gallery_detail);
                
            }

        });
    </script>
@endsection