
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FESA Shop | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{url('public/client')}}/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{url('public/client')}}/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{url('public/client')}}/css/responsive.css">
    <!-- JavaScript -->
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- style css -->
     @yield('css')
     <style>
         #list_category{
    display: none ;
}
     </style>
    <!-- Modernizer js -->
    <script src="{{url('public/client')}}/js/vendor\modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        <!-- Banner Popup Start -->
        <div class="popup_banner">
            <span class="popup_off_banner">×</span>
            <div class="banner_popup_area">
                    <img src="{{url('public/client')}}/img/banner\pop-banner.jpg" alt="">
            </div>
        </div>
        <!-- Banner Popup End -->
        <!-- Newsletter Popup Start -->
        <div class="popup_wrapper">
            <div class="test">
                <span class="popup_off">Đóng</span>
                <div class="subscribe_area text-center mt-60">
                    <h2>Thư Mới</h2>
                    <p>Theo dõi danh sách gửi thư FeSa Shop để nhận thông tin cập nhật về hàng mới, ưu đãi đặc biệt và thông tin giảm giá khác.</p>
                    <div class="subscribe-form-group">
                        <form action="#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Nhập Email Của Bạn!">
                            <button type="submit">Đăng Ký</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom mt-15">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Không hiển thị lại cửa sổ bật lên này</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Popup End -->

        {{-- header start--}}
        @include('client.partials.header')
        {{-- header end --}}
  
        {{-- main content start  --}}
        @yield('main')
        {{-- main content end --}}

        <!-- Support Area Start Here -->
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Giá Trị Lớn</h6>
                            <span>Nunc id ante quis tellus faucibus dictum in eget.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Giao hàng trên toàn Đà Nẵng</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Thanh Toán An Toàn</h6>
                            <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Sự tự tin mua sắm</h6>
                            <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Hỗ Trợ</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Support Area End Here -->
        
        {{-- footer area start --}}
        @include('client.partials.footer')
        {{-- footer area end --}}

        <!-- Quick View Content Start -->
        <div class="main-product-thumbnail quick-thumb-content">
            <div class="container">
                <!-- The Modal -->
                <div class="modal fade" id="">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Main Thumbnail Image Start -->
                                    <div class="col-lg-5 col-md-6 col-sm-5">
                                        <!-- Thumbnail Large Image start -->
                                        <div class="tab-content quick_view_thumb_gallery">
                                        </div>
                                        <!-- Thumbnail Large Image End -->
                                        <!-- Thumbnail Image End -->
                                        <div class="product-thumbnail mt-20">
                                            <div class="thumb-menu owl-carousel nav tabs-area quick_view_thumb_menu_gallery" role="tablist">
                                                <a class="active" data-toggle="tab" href="#thumb0"><img src="" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb1"><img src="" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb2"><img src="" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb3"><img src="" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb4"><img src="" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb5"><img src="" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb6"><img src="" alt="product-thumbnail"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail image end -->
                                    </div>
                                    <!-- Main Thumbnail Image End -->
                                    <!-- Thumbnail Description Start -->
                                    <div class="col-lg-7 col-md-6 col-sm-7">
                                        <div class="thubnail-desc fix mt-sm-40">
                                            <h3 class="product-header">Printed Summer Dress</h3>
                                            <div class="pro-price mtb-30">
                                                <p class="d-flex align-items-center qv_price"><span class="prev-price">16.51</span><span class="price">$15.19</span><span class="saving-price">save 8%</span></p>
                                            </div>
                                            <p class="mb-20 pro-desc-details">Long printed dress with thin adjustable straps. V-neckline and wiring under the bust with ruffles at the bottom of the dress.</p>
                                            <div class="show_variant_attr">
                                                <div class="product-size mb-20 clearfix">
                                                    <label>Size</label>
                                                    <select class="">
                                                        <option>S</option>
                                                        <option>M</option>
                                                        <option>L</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            {{-- <div class="color mb-20">
                                                <label>color</label>
                                                <ul class="color-list">
                                                    <li>
                                                        <a class="orange active" href="#"></a>
                                                    </li>
                                                    <li>
                                                        <a class="paste" href="#"></a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                            <div class="box-quantity d-flex">
                                                <form action="#">
                                                    <input class="quantity mr-40 qv_quantity" name="quantity" type="number" min="1" value="1">
                                                </form>
                                                <a class="add-cart" href="#" id="add-cart">Thêm Vào Giỏ Hàng</a>
                                                <input type="hidden" name="id_variant" id="id_variant">
                                            </div>
                                            <div class="pro-ref mt-15">
                                                <p><span class="in-stock"><i class="ion-checkmark-round"></i> Trong Kho</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Description End -->
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="custom-footer">
                                <div class="socila-sharing">
                                    <ul class="d-flex">
                                        <li>Chia Sẻ</li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View Content End -->
    </div>
    <!-- Main Wrapper End Here -->
    

    <!-- jquery 3.2.1 -->
    <script src="{{url('public/client')}}/js/vendor\jquery-3.2.1.min.js"></script>
    <!-- Countdown js -->
    <script src="{{url('public/client')}}/js/jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="{{url('public/client')}}/js/jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="{{url('public/client')}}/js/jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="{{url('public/client')}}/js/jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="{{url('public/client')}}/js/jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="{{url('public/client')}}/js/jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="{{url('public/client')}}/js/jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="{{url('public/client')}}/js/owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="{{url('public/client')}}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{url('public/client')}}/js/bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="{{url('public/client')}}/js/plugins.js"></script>
    <!-- Main activaion js -->
    <script src="{{url('public/client')}}/js/main.js"></script>
    @yield('js')

    <script>
        $(document).ready(function () {
            // get all product
            var object_pro = {!! json_encode($all_product->toArray()) !!};
            var object_variant_pro = {!! json_encode($all_variant_pro->toArray()) !!};

            $('.quick_view').click(function (e) { 
                e.preventDefault();
                // fill id for modal
                $('.modal').attr('id', $(this).attr('data-target'));
                // show modal with id
                $('#'+$(this).attr('data-target')).modal('show');
            });

             // fill data for modal
            $('.modal').on('show.bs.modal', function (e) {
                var qv_product_id = $(this).attr('id');
                // get data product
                object_pro.forEach(el_pro => {
                    if(el_pro['id'] == qv_product_id){
                        // get all variant of product
                        var find_variant = [];
                        object_variant_pro.forEach(el_var => {
                            if(el_var['product_id'] == el_pro['id']){
                                find_variant.push(el_var);
                            }
                        });
                        // show variant attribute
                        var variant_first = [];
                        var variant_secound = [];
                        var get_sub = [];
                        find_variant.forEach(each_el => {
                            // check exist in array, push to array
                            if(each_el['variant_attribute'].indexOf('|') == -1){
                                if(variant_first.includes(each_el['variant_attribute']) == false){
                                    variant_first.push(each_el['variant_attribute']);
                                }
                            }else{
                                if(variant_first.includes(each_el['variant_attribute'].substr(0, each_el['variant_attribute'].indexOf('|'))) == false){
                                    variant_first.push(each_el['variant_attribute'].substr(0, each_el['variant_attribute'].indexOf('|')));
                                }
                                if(variant_secound.includes(each_el['variant_attribute'].substr(each_el['variant_attribute'].indexOf('|')+1)) == false){
                                    variant_secound.push(each_el['variant_attribute'].substr(each_el['variant_attribute'].indexOf('|')+1));
                                }
                            }
                        });
                        // push array atribute
                        get_sub.push(variant_first);
                        get_sub.push(variant_secound);

                        /*
                        * fill information
                        */ 
                        $('.product-header').html(el_pro['name']);
                        $('.pro-desc-details').html(el_pro['short_description']);

                        // show name and attribute variant
                        var get_name_attr = el_pro['variant'].split('|');
                        var show_name_attri = '';
                        var num_attri = 0;
                        get_name_attr.forEach(item_name_attri => {
                            show_name_attri += `<div class="color mb-20">
                                                    <label>${item_name_attri}</label>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">`;
                            // show atribute of product limit 1, max 2
                            get_sub[num_attri].forEach(value_attr => {
                               show_name_attri += `<label class="btn btn-default text-center border-dark shadow rounded m-1 radio-groups qv_radio">
                                                        <input type="radio" value='${value_attr}' name="attr_${num_attri}">
                                                        <span class="text-xl">${value_attr}</span>
                                                    </label>`;
                            });              
                            show_name_attri +=`</div>
                                                </div>`;
                            num_attri++;
                        });
                        $('.show_variant_attr').html(show_name_attri);

                        // checked form input to get value
                        $('input:radio[name="attr_0"]:first').attr('checked', 'checked');
                        if($('input:radio[name="attr_1"]:first').val() != undefined){
                            $('input:radio[name="attr_1"]:first').attr('checked', 'checked');
                        }
                        getVariant(qv_product_id);
                    }
                });
                // change infomation variant product when click
                $('.qv_radio').change(function (e) { 
                    e.preventDefault();
                    var val_pv_radio = $(this).children('input[type=radio]').val();
                    $("input[name="+$(this).children('input[type=radio]').prop('name')+"]").each(function() {
                        if($(this).val() == val_pv_radio){
                            $(this).attr('checked', true);
                        }else{
                            $(this).attr('checked', false);
                        }
                    });
                    getVariant(qv_product_id);
                });

            })

            // show infomation variant product
            function getVariant(product_id){
                var value_attr_first = $('input:radio[name="attr_0"]:checked').val();
                var value_attr_second = '';
                var merge_attri = '';
                var price = '';
                var discount = '';
                var quick_view_thumb_gallery = '';
                var quick_view_thumb_menu_gallery = '';
                var active_thumb = '';
                var num_thumb = 0;
                var id_variant = '';
                // set color for button when click
                $('input:radio[name="attr_0"]').parent().removeClass('bg-primary');
                $('input:radio[name="attr_0"]:checked').parent().addClass('bg-primary');
                // get each variant product
                if($('input:radio[name="attr_1"]:checked').val() != undefined){
                    // set color for button when click
                    $('input:radio[name="attr_1"]').parent().removeClass('bg-primary');
                    $('input:radio[name="attr_1"]:checked').parent().addClass('bg-primary');

                    value_attr_second = $('input:radio[name="attr_1"]:checked').val();
                    merge_attri = value_attr_first+"|"+value_attr_second;
                    object_variant_pro.forEach(var_pro => {
                        if(var_pro['product_id'] == product_id && var_pro['variant_attribute'] === merge_attri){
                            price = var_pro['price'];
                            discount = var_pro['discount'];
                            id_variant = var_pro['id'];
                            $('.qv_quantity').attr('max', var_pro['quantity']);
                            // fill gallery
                            var gallery = JSON.parse(var_pro['gallery']);
                            gallery.forEach(each_gallery => {
                                num_thumb == 0 ? active_thumb = 'show active' : active_thumb = '';
                                quick_view_thumb_gallery +=`<div id="thumb${num_thumb}" class="tab-pane fade ${active_thumb}">
                                                                <a data-fancybox="images" href="{{url('public/uploads')}}/${each_gallery}">
                                                                    <img src="{{url('public/uploads')}}/${each_gallery}" alt="product-view">
                                                                </a>
                                                            </div>`;
                                $(".quick_view_thumb_menu_gallery a[href='#thumb"+num_thumb+"'] img").attr("src", "{{url('public/uploads')}}/"+each_gallery);
                                num_thumb++;
                            });
                        }
                    });
                }

                object_variant_pro.forEach(var_pro => {
                    if(var_pro['product_id'] == product_id && var_pro['variant_attribute'] === value_attr_first){
                        price = var_pro['price'];
                        discount = var_pro['discount'];
                        $('.qv_quantity').attr('max', var_pro['quantity']);
                        id_variant = var_pro['id'];
                        // fill gallery
                        var gallery = JSON.parse(var_pro['gallery']);
                        gallery.forEach(each_gallery => {
                            num_thumb == 0 ? active_thumb = 'show active' : active_thumb = '';
                            quick_view_thumb_gallery +=`<div id="thumb${num_thumb}" class="tab-pane fade ${active_thumb}">
                                                            <a data-fancybox="images" href="{{url('public/uploads')}}/${each_gallery}">
                                                                <img src="{{url('public/uploads')}}/${each_gallery}" alt="product-view">
                                                            </a>
                                                        </div>`;
                            $(".quick_view_thumb_menu_gallery a[href='#thumb"+num_thumb+"'] img").attr("src", "{{url('public/uploads')}}/"+each_gallery);
                            num_thumb++;
                        });
                    }
                });
                // fill price
                if(price > discount){
                    var percent_discount = 100-(price/100*discount);
                    $('.qv_price').html("<span class='prev-price'>"+price+"</span><span class='price'>$"+discount+"</span><span class='saving-price'>save "+percent_discount+"%</span>");
                }
                $('.qv_price').html("<span class='price'>$"+price+"</span>");

                // fill gallery
                //$('.quick_view_thumb_menu_gallery').html(quick_view_thumb_menu_gallery);
                 $("#id_variant").attr('value',id_variant) ;
                 console.log($("input[name=id_variant]").val());
                $('.quick_view_thumb_gallery').html(quick_view_thumb_gallery);
                
            }
            
        });
    </script>



     <script>
        $('#add-cart').click(function(e) {
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
            })


        });

        $('#cart-box-width').on('click','.ion-close',function(e) {
            console.log($(this).data('id'));
            $.ajax({
                type: 'get',
                url:  '{{url('')}}/cart/removelist/'+$(this).data('id'),
                success: function(response) {
                    $('#cart-box-width').empty();
                    $('#cart-box-width').html(response);
                    $('.total-pro').text($('#quantity_cart').val());
                    alertify.success('Đã xóa khỏi giỏ hàng');
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            })
        });
    </script>


</body>

</html>