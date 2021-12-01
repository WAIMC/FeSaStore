@extends('client.layouts.master')
@section('title', 'Chi tiết sản phẩm')

@section('main')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('client.shop') }}">Cửa Hàng</a></li>
                    <li class="active"><a
                            href="{{ route('client.productDetail', $data_product_detail->id) }}">{{ $data_product_detail->name }}</a>
                    </li>
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
                                <a class="active" data-toggle="tab" href="#thumb_dt_1"><img src=""
                                        alt="product-thumbnail"></a>
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
                                {{-- <form action="{{ route('cart.add') }}" id="form-add" method="post"> --}}
                                    @csrf
                                    <input class="quantity mr-15 " name="quantity" type="number" value="1">
                                    <input type="hidden" name="id_variant" id="id_variant">
                                    <div class="pro-actions mt-1">
                                        <div class="actions-primary">
                                            <a href="#" id="add_cart_detail" title="thêm" data-original-title="Thêm vào giỏ hàng">
                                                + Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                {{-- </form> --}}

                                {{-- <form action="{{ route('wishlist.add') }}" id="form-add" method="post"> --}}
                                    @csrf
                                    <input type="hidden" class="quantity mr-15 " name="quantity" type="number" value="1">
                                    <input type="hidden" name="id_variant" id="id_variant">
                                    <div class="pro-actions mt-1">
                                        <div class="actions-secondary">
                                            <a href="#" id="add_wishlist" title=""
                                                data-original-title="Thêm danh sách yêu thích"><i
                                                    class="lnr lnr-heart"></i> <span>Thêm danh sách yêu thích</span></a>
                                        </div>
                                    </div>
                                {{-- </form> --}}
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
                        <li><a data-toggle="tab" href="#review">ĐÁNH GIÁ</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        <div id="dtail" class="tab-pane fade show active">
                            <p>{!! $data_product_detail->description !!}</p>
                        </div>
                        <div id="review" class="tab-pane fade">
                        <div class="review border-default universal-padding mt-30">
                                <h2 class="review-title mb-30"><span> Đánh giá & Nhận xét {{ $data_product_detail->name }}</span>
                                </h2>
                                <!-- Reviews Field Start -->
                                <div class="riview-field mt-40">
                                @if(isset(Auth::guard('cus')->user()->id))
                                <form>
                                        <input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}">
                                        <input type="hidden" name="product_id" value="{{$data_product_detail->id}}">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" name="comment" id="comment"
                                                required="required" style="width:100%"></textarea>
                                        </div>
                                        <button id="post_product_details" class="customer-btn">Gửi Đi Đánh Giá</button>
                                    </form>
                                @else
                                    <p>Vui lòng đăng nhập để bình luận</p>
                                @endif
                                </div>
                                <!-- Reviews Field Start -->
                            </div>
                            <!-- Reviews Start -->
                            <div class="review border-default universal-padding" id="comment_product">
                            @if($data_comment)
                             @foreach($data_comment as $comment)
                               <div class="row iconcustomer">
                                   <div class="col-2">
                                       <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:60%">
                                   </div>
                                   <div class="col-10">
                                   <h4 class="review-mini-title">{{$comment->cus->name}} <span class="time">{{ date('\V\à\o \l\ú\c H:i d-m-Y ',strtotime($comment->created_at))}}</span></h4> 
                                       <p>{{$comment->comment}}</p>
                                   </div>
                               </div>
                               @endforeach
                            @else
                                <p>Chưa có bình luận cho sản phẩm này!</p>
                            @endif
                            </div>
                            <!-- Reviews End -->
                            <!-- Reviews Start -->
                      
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
                            <a href="{{ route('client.productDetail', $realted_pro->id) }}">
                                <img class="primary-img" src="{{ url('public/uploads/' . $realted_pro->image) }}"
                                    alt="single-product">
                                <img class="secondary-img" src="{{ url('public/uploads/' . $realted_pro->image) }}"
                                    alt="single-product">
                            </a>
                            <a href="#" class="quick_view" data-toggle="modal" data-target="{{ $realted_pro->id }}"
                                title="Xem Nhanh"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a
                                        href="{{ route('client.productDetail', $realted_pro->id) }}">{{ $realted_pro->name }}</a>
                                </h4>
                                <p><span class="price">
                                        @if ($realted_pro->product_variantProduct->first()->price > $realted_pro->product_variantProduct->first()->discount)
                                            ${{ $realted_pro->product_variantProduct->first()->discount }}
                                        @else
                                            ${{ $realted_pro->product_variantProduct->first()->price }}
                                        @endif
                                    </span></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="#"  class="quick_view" data-toggle="modal" data-target="{{ $realted_pro->id }}" title="Thêm vào giỏ hàng"> + Thêm vào giỏ hàng</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="compare.html" title="So Sánh"><i class="lnr lnr-sync"></i> <span>Thêm Vào So
                                            Sánh</span></a>
                                    <a href="wishlist.html" title="Ưa Thích"><i class="lnr lnr-heart"></i> <span>Thêm Vào
                                            Ưa Thích</span></a>
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
        $(document).ready(function() {
            // get data product detail
            var product_detail = {!! json_encode($data_product_detail->toArray()) !!};
            var variant_product_detail = {!! json_encode($data_product_detail->product_variantProduct->toArray()) !!};

            // show variant attribute
            var variant_pro_detail_first = [];
            var variant_pro_detail_secound = [];
            var get_sub_vari = [];
            variant_product_detail.forEach(each_var_detail => {
                // check exist in array, push to array
                if (each_var_detail['variant_attribute'].indexOf('|') == -1) {
                    if (variant_pro_detail_first.includes(each_var_detail['variant_attribute']) == false) {
                        variant_pro_detail_first.push(each_var_detail['variant_attribute']);
                    }
                } else {
                    if (variant_pro_detail_first.includes(each_var_detail['variant_attribute'].substr(0,
                            each_var_detail['variant_attribute'].indexOf('|'))) == false) {
                        variant_pro_detail_first.push(each_var_detail['variant_attribute'].substr(0,
                            each_var_detail['variant_attribute'].indexOf('|')));
                    }
                    if (variant_pro_detail_secound.includes(each_var_detail['variant_attribute'].substr(
                            each_var_detail['variant_attribute'].indexOf('|') + 1)) == false) {
                        variant_pro_detail_secound.push(each_var_detail['variant_attribute'].substr(
                            each_var_detail['variant_attribute'].indexOf('|') + 1));
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
                show_name_pro_attri += `</div>
                                    </div>`;
                num_detail_attri++;
            });
            $('.show_name_variant').html(show_name_pro_attri);

            // checked form input to get value
            $('input:radio[name="attr_detail_0"]:first').attr('checked', 'checked');
            if ($('input:radio[name="attr_detail_1"]:first').val() != undefined) {
                $('input:radio[name="attr_detail_1"]:first').attr('checked', 'checked');
            }
            getVariantDetail(product_detail['id']);

            // change infomation variant product when click
            $('.dt_radio').change(function(e) {
                e.preventDefault();
                var val_pv_radio = $(this).children('input[type=radio]').val();
                $("input[name=" + $(this).children('input[type=radio]').prop('name') + "]").each(
                    function() {
                        if ($(this).val() == val_pv_radio) {
                            $(this).attr('checked', true);
                        } else {
                            $(this).attr('checked', false);
                        }
                    });
                getVariantDetail(product_detail['id']);
            });

            // show infomation variant product detail
            function getVariantDetail(product_id) {
                var value_attr_detail_first = $('input:radio[name="attr_detail_0"]:checked').val();
                var value_attr_detail_second = '';
                var merge_detail_attri = '';
                var price_detail = '';
                var discount_detail = '';
                var thumb_gallery_detail = '';
                var thumb_menu_gallery_detail = '';
                var active_thumb_detail = '';
                var num_thumb_detail = 0;
                var id_variant = '';
                // set color for button when click
                $('input:radio[name="attr_detail_0"]').parent().removeClass('bg-primary');
                $('input:radio[name="attr_detail_0"]:checked').parent().addClass('bg-primary');
                // get each variant product
                if ($('input:radio[name="attr_detail_1"]:checked').val() != undefined) {
                    // set color for button when click
                    $('input:radio[name="attr_detail_1"]').parent().removeClass('bg-primary');
                    $('input:radio[name="attr_detail_1"]:checked').parent().addClass('bg-primary');

                    value_attr_detail_second = $('input:radio[name="attr_detail_1"]:checked').val();
                    merge_detail_attri = value_attr_detail_first + "|" + value_attr_detail_second;
                    variant_product_detail.forEach(var_pro_detail => {
                        if (var_pro_detail['product_id'] == product_id && var_pro_detail[
                                'variant_attribute'] === merge_detail_attri) {
                            price_detail = var_pro_detail['price'];
                            id_variant = var_pro_detail['id'];
                            discount_detail = var_pro_detail['discount'];
                            $('.quantity_pro_detail').attr('max', var_pro_detail['quantity']);
                            // fill gallery
                            var gallery_detail = JSON.parse(var_pro_detail['gallery']);
                            gallery_detail.forEach(each_gallery_detail => {
                                num_thumb_detail == 0 ? active_thumb_detail = 'show active' :
                                    active_thumb_detail = '';
                                thumb_gallery_detail += `<div id="thumb_dt_${num_thumb_detail}" class="tab-pane fade ${active_thumb_detail}">
                                                                <a data-fancybox="images" href="{{ url('public/uploads') }}/${each_gallery_detail}">
                                                                    <img src="{{ url('public/uploads') }}/${each_gallery_detail}" alt="product-view">
                                                                </a>
                                                            </div>`;
                                $(".thumb_menu_gallery_detail a[href='#thumb_dt_" +
                                    num_thumb_detail + "'] img").attr("src",
                                    "{{ url('public/uploads') }}/" + each_gallery_detail);
                                num_thumb_detail++;
                            });
                        }
                    });
                }

                variant_product_detail.forEach(var_pro_detail => {
                    if (var_pro_detail['product_id'] == product_id && var_pro_detail[
                            'variant_attribute'] === value_attr_detail_first) {
                        price_detail = var_pro_detail['price'];
                        id_variant = var_pro_detail['id'];
                        discount_detail = var_pro_detail['discount'];
                        $('.quantity_pro_detail').attr('max', var_pro_detail['quantity']);
                        // fill gallery
                        var gallery_detail = JSON.parse(var_pro_detail['gallery']);
                        gallery_detail.forEach(each_gallery_detail => {
                            num_thumb_detail == 0 ? active_thumb_detail = 'show active' :
                                active_thumb_detail = '';
                            thumb_gallery_detail += `<div id="thumb_dt_${num_thumb_detail}" class="tab-pane fade ${active_thumb_detail}">
                                                            <a data-fancybox="images" href="{{ url('public/uploads') }}/${each_gallery_detail}">
                                                                <img src="{{ url('public/uploads') }}/${each_gallery_detail}" alt="product-view">
                                                            </a>
                                                        </div>`;
                            $(".thumb_menu_gallery_detail a[href='#thumb_dt_" + num_thumb_detail +
                                "'] img").attr("src", "{{ url('public/uploads') }}/" +
                                each_gallery_detail);
                            num_thumb_detail++;
                        });
                    }
                });
                // fill price
                if (price_detail > discount_detail) {
                    var percent_discount = 100 - (price_detail / 100 * discount_detail);
                    $('.price_dt').html("<span class='prev-price'>" + price_detail +
                        "</span><span class='price'>$" + discount_detail +
                        "</span><span class='saving-price'>Giảm " + percent_discount + "%</span>");
                }
                $('.price_dt').html("<span class='price'>$" + price_detail + "</span>");

                // fill gallery
                $('.thumb_gallery_detail').html(thumb_gallery_detail);
                document.getElementById("id_variant").value = id_variant;
            }

        });

        $('#add_cart_detail').click(function(e) {
            e.preventDefault();
          console.log($("input[name=id_variant]").val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'get',
                url:  '{{url('')}}/cart/add/'+$("input[name=id_variant]").val(),
                data: {
                    quantity: $("input[name=quantity]").val(),
                    id: $("input[name=id_variant]").val()
                },
                success: function(response) {
                    $('#cart-box-width').empty();
                    $('#cart-box-width').html(response);
                    $('.total-pro').text($('#quantity_cart').val());
                    alertify.success('Đã thêm vào giỏ hàng');
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        });


        $('#add_wishlist').click(function(e) {
            e.preventDefault();
          console.log($("input[name=id_variant]").val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'get',
                url:  '{{url('')}}/wishlist/add/'+$("input[name=id_variant]").val(),
                data: {
                    quantity: 1,
                    id: $("input[name=id_variant]").val()
                },
                success: function(response) {
                    
                    $('.total-wish').text(response);
                    setTimeout(() => {
                        console.log($('#quantity_wishlist').val()) ;
                        $('#quantity_wishlist').val();
                    }, 1000);


                  
             
                    alertify.success('Đã thêm vào danh sách yêu thích');
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        });



      // Gửi bình luận sản phẩm bằng ajax
        $('#post_product_details').click(function(e) {
            e.preventDefault();
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          var customer_id = $("input[name=customer_id]").val();
          var product_id = $("input[name=product_id]").val();
          var comment = $("textarea[name=comment]").val();
          console.log(customer_id);
          console.log(product_id);
          console.log(comment);
            $.ajax({
                type: 'post',
                url:  '{{url('')}}/productDetail/'+$("input[name=product_id]").val(),
                data: {
                     customer_id : $("input[name=customer_id]").val(),
                     product_id : $("input[name=product_id]").val(),
                     comment : $("textarea[name=comment]").val()
                },
                success: function(response) {
                    alertify.success('Đã gửi bình luận');
                    console.log(response);
                    $('#comment_product').empty();
                    $('#comment_product').html(response);
                    $('#comment').val('');
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        });


    </script>
@endsection
