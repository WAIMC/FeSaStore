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
                            href="{{ route('client.productDetail', $data_product_detail->slug) }}">{{ $data_product_detail->name }}</a>
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
                                <div class="avg_rating_header">
                                <div class="rating" id="avg_rating">
                                   
                                </div>
                                </div>
                                <div class="rating-feedback">
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
                                        <div class="actions-primary" id="show_qt_add_card">
                                            <a href="#" id="add_cart_detail" title="thêm" data-original-title="Thêm vào giỏ hàng">
                                                + Thêm vào giỏ hàng
                                            </a>
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
                                <p>
                                    <span class="in-stock">
                                        <i class="ion-checkmark-round"></i> 
                                        <span id="quantity_pro_dt"></span> 
                                    </span>
                                </p>
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
                                

                                <div class="review border-default universal-padding">
                                    <h4 class="review-mini-title">Đánh giá trung bình</h4>
                                    <br>
                                    <div class="row" id="rating_product">
                                        <div class="col-sm-2">
                                            @if($avg_rating)
                                                <p class="point">{{$avg_rating}}/5</p>
                                            @else
                                                <p class="point1">Chưa có</p>
                                            @endif
                                            <br>
                                            <p class="number_rating">{{$number_rating}} đánh giá</p>
                                            <div class="rating" id="avg_rating_2">
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                        <p class="star">Bạn chấm sản phẩm này bao nhiêu sao ?</p>
                                                <div id="rateYo" style="margin:0 auto"></div>
                                                @if(isset(Auth::guard('cus')->user()->id))
                                                    <form>
                                                        <input type="hidden" name="rating_star" value="5" id="rating_star">
                                                        <input type="hidden" name="product_id" value="{{$data_product_detail->id}}" >
                                                        <input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}" >
                                                    </form>
                                                </div>
                                                <div class="col-sm-3">
                                                    <!-- Check xem tài khoản đã đánh giá sao cho sản phẩm này hay chưa -->
                                                    @if($data_rating)
                                                        <?php 
                                                            $check = false;
                                                            foreach($data_rating as $rating){
                                                                if($rating->customer_id == Auth::guard('cus')->user()->id){
                                                                    $check = true;
                                                                }
                                                            }
                                                        ?>
                                                    @endif
                                                    <!-- Hiển thị -->
                                                    @if($check == true)
                                                        <p>Bạn đã đánh giá cho sản phẩm này!</p>
                                                    @else
                                                        <button id="post_rating_star" class="customer-btn"> Gửi đánh giá của bạn</button>
                                                    @endif
                                                </div>
                                            @else
                                                <!-- <div class="col-sm-3">
                                                    <button class="customer-btn" disablded> Đăng nhập để đánh giá</button>
                                                </div> -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if(isset(Auth::guard('cus')->user()->id))
                                    <form>
                                        <input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}">
                                        <input type="hidden" name="product_id" value="{{$data_product_detail->id}}">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" name="comment" id="comment"
                                                required="required" placeholder="Nhận xét về sản phẩm ..." style="width:100%"></textarea>
                                        </div>
                                        <div id="rated_star">
                                        <button id="post_product_details" class="customer-btn">Gửi Đi Đánh Giá</button>
                                        </div>
                                    </form>
                                @else
                                    <p style="color:red;">Vui lòng đăng nhập để bình luận</p>
                                @endif
                                </div>
                                <!--Show bình luận -->
                                <div class="review border-default universal-padding" id="comment_product">
                                @if($data_comment && $data_comment->count() > 0)
                                    @foreach($data_comment as $comment)
                                        <div class="row iconcustomer">
                                            <div class="col-1">
                                                <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:135%">
                                            </div>
                                            <div class="col-11">
                                                <p class="review-mini-title-comment"><b>{{$comment->cus->name}}</b> <span class="time"> bình luận vào lúc {{ date('H:i d-m-Y ',strtotime($comment->created_at))}}</span></p> 
                                                <p>{{$comment->comment}}</p>
                                                 <!--Phần trả lời comment -->
                                                    @if($data_answer_comment != null)
                                                            @foreach($data_answer_comment as $answer_comment)
                                                                @if($answer_comment->parent_id == $comment->id)
                                                            
                                                                    <div class="col-10">
                                                                    <p class="answer-comment text-info font-italic"> <span class="font-weight-bold text-success">Quản trị phản hồi :</span> {{$answer_comment->comment}} - <i> được trả lời bởi FESA Store vào lúc <span class="time">{{ date('H:i d-m-Y ',strtotime($answer_comment->created_at))}}</span></i> </p>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                    @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>Chưa có bình luận cho sản phẩm này!</h4>
                                @endif
                                </div>
                                <!--End  bình luận -->
                                <!-- Reviews Field Start -->
                            </div>
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
                            <a href="{{ route('client.productDetail', $realted_pro->slug) }}">
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
                                        href="{{ route('client.productDetail', $realted_pro->slug) }}">{{ $realted_pro->name }}</a>
                                </h4>
                                <p><span class="price">
                                        @if ($realted_pro->product_variantProduct->first()->price > $realted_pro->product_variantProduct->first()->discount)
                                            {{ number_format($realted_pro->product_variantProduct->first()->discount) }} <u>đ</u>
                                        @else
                                            {{ number_format($realted_pro->product_variantProduct->first()->price) }} <u>đ</u>
                                        @endif
                                    </span></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="#"  class="quick_view" data-toggle="modal" data-target="{{ $realted_pro->id }}" title="Thêm vào giỏ hàng"> + Thêm vào giỏ hàng</a>
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
                var quantity_dt = 0;
                var thumb_gallery_detail = '';
                var thumb_menu_gallery_detail = '';
                var active_thumb_detail = '';
                var num_thumb_detail = 0;
                var id_variant = '';
                // set color for button when click
                $('input:radio[name="attr_detail_0"]').parent().removeClass('bg-dark');
                $('input:radio[name="attr_detail_0"]').parent().find('span').removeClass('text-white');
                $('input:radio[name="attr_detail_0"]:checked').parent().addClass('bg-dark');
                $('input:radio[name="attr_detail_0"]:checked').parent().find('span').addClass('text-white');
                // get each variant product
                if ($('input:radio[name="attr_detail_1"]:checked').val() != undefined) {
                    // set color for button when click
                    $('input:radio[name="attr_detail_1"]').parent().removeClass('bg-dark');
                    $('input:radio[name="attr_detail_1"]').parent().find('span').removeClass('text-white');
                    $('input:radio[name="attr_detail_1"]:checked').parent().addClass('bg-dark');
                    $('input:radio[name="attr_detail_1"]:checked').parent().find('span').addClass('text-white');

                    value_attr_detail_second = $('input:radio[name="attr_detail_1"]:checked').val();
                    merge_detail_attri = value_attr_detail_first + "|" + value_attr_detail_second;
                    variant_product_detail.forEach(var_pro_detail => {
                        if (var_pro_detail['product_id'] == product_id && var_pro_detail[
                                'variant_attribute'] === merge_detail_attri) {
                            price_detail = var_pro_detail['price'];
                            id_variant = var_pro_detail['id'];
                            discount_detail = var_pro_detail['discount'];
                            quantity_dt = var_pro_detail['quantity'];
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
                        quantity_dt = var_pro_detail['quantity'];
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
                $('.price_dt').html("<span class='price'>" + new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(price_detail) + "</span>");

                // fill quantity product detail
                if (quantity_dt > 0) {
                    $('#show_qt_add_card').show();
                    $('#quantity_pro_dt').html(quantity_dt+' trong kho');
                } else {
                    $('#show_qt_add_card').hide();
                    $('#quantity_pro_dt').html('đã hết hàng trong kho');
                }

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
                    console.log(response);
                    $('#cart-box-width').empty();
                    $('#cart-box-width').html(response);
                    $('.total-pro').text($('#quantity_cart').val());
                    alertify.success('Đã thêm vào giỏ hàng');
                },
                error: (error) => {
                    // console.log(JSON.stringify(error));
                    alert(error.status + ' ' + error.statusText);
                    console.log('roi');
                     console.log(error);
                    alertify.error(error.error);
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

        $(function () {
            var star_rating = {!! $avg_rating !!};
            // show star rating customer has choose
            $("#rateYo").rateYo({
                rating: star_rating,
                fullStar: true
            }).on("rateyo.set",function(e,data){
                $('#rating_star').val(data.rating);
            });

            // show star rating product
            $("#avg_rating").rateYo({
                rating: star_rating,
                fullStar: true,
                readOnly : true
            }).on("rateyo.set",function(e,data){
                $('#rating_star').val(data.rating);
            });

            // show star rating product 2
            $("#avg_rating_2").rateYo({
                rating: star_rating,
                fullStar: true,
                readOnly : true
            }).on("rateyo.set",function(e,data){
                $('#rating_star').val(data.rating);
            });

            });


        // Gửi bình luận sản phẩm bằng ajax
        $('#post_rating_star').click(function(e) {
            e.preventDefault();
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          var customer_id = $("input[name=customer_id]").val();
          var product_id = $("input[name=product_id]").val();
          var star = $("input[name=rating_star]").val();

          console.log(customer_id);
          console.log(product_id);
          console.log(star);
            $.ajax({
                type: 'get',
                url:  '{{url('')}}/productDetail/rating/'+$("input[name=product_id]").val(),
                data: {
                     customer_id : $("input[name=customer_id]").val(),
                     product_id : $("input[name=product_id]").val(),
                     star_rating : $("input[name=rating_star]").val()
                },
                success: function(response) {
                    alertify.success('Đã gửi đánh giá');
                    console.log(response);
                    $('#rating_product').empty();
                    $('#rating_product').html(response);
                    // load div
                    // show star rating product
                    $("#avg_rating").rateYo({
                        rating: $("input[name=avg_rating_header]").val(),
                        readOnly : true
                    }).on("rateyo.set",function(e,data){
                        $('#rating_star').val(data.rating);
                    });
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        });
    </script>
@endsection
