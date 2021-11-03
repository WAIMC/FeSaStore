
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
     <!-- style css -->
     @yield('css')
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
                <div class="modal fade" id="myModal">
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
                                        <div class="tab-content">
                                            <div id="thumb1" class="tab-pane fade show active">
                                                <a data-fancybox="images" href="{{url('public/client')}}/img/products\35.jpg"><img src="{{url('public/client')}}/img/products\35.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb2" class="tab-pane fade">
                                                <a data-fancybox="images" href="{{url('public/client')}}/img/products\13.jpg"><img src="{{url('public/client')}}/img/products\13.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb3" class="tab-pane fade">
                                                <a data-fancybox="images" href="{{url('public/client')}}/img/products\15.jpg"><img src="{{url('public/client')}}/img/products\15.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb4" class="tab-pane fade">
                                                <a data-fancybox="images" href="{{url('public/client')}}/img/products\4.jpg"><img src="{{url('public/client')}}/img/products\4.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb5" class="tab-pane fade">
                                                <a data-fancybox="images" href="{{url('public/client')}}/img/products\5.jpg"><img src="{{url('public/client')}}/img/products\5.jpg" alt="product-view"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail Large Image End -->
                                        <!-- Thumbnail Image End -->
                                        <div class="product-thumbnail mt-20">
                                            <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                                                <a class="active" data-toggle="tab" href="#thumb1"><img src="{{url('public/client')}}/img/products\35.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb2"><img src="{{url('public/client')}}/img/products\13.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb3"><img src="{{url('public/client')}}/img/products\15.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb4"><img src="{{url('public/client')}}/img/products\4.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb5"><img src="{{url('public/client')}}/img/products\5.jpg" alt="product-thumbnail"></a>
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
                                                <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span class="price">$15.19</span><span class="saving-price">save 8%</span></p>
                                            </div>
                                            <p class="mb-20 pro-desc-details">Long printed dress with thin adjustable straps. V-neckline and wiring under the bust with ruffles at the bottom of the dress.</p>
                                            <div class="product-size mb-20 clearfix">
                                                <label>Size</label>
                                                <select class="">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                </select>
                                            </div>
                                            <div class="color mb-20">
                                                <label>color</label>
                                                <ul class="color-list">
                                                    <li>
                                                        <a class="orange active" href="#"></a>
                                                    </li>
                                                    <li>
                                                        <a class="paste" href="#"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="box-quantity d-flex">
                                                <form action="#">
                                                    <input class="quantity mr-40" type="number" min="1" value="1">
                                                </form>
                                                <a class="add-cart" href="cart.html">Thêm Vào Giỏ Hàng</a>
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
</body>

</html>