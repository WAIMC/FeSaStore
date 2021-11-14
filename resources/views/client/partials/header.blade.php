<!-- Main Header Area Start Here -->
<header>
    <!-- Header Top Start Here -->
     <div class="header-top-area">
        <div class="container">
            <!-- Header Top Start -->
            <div class="header-top">
                <ul>
                    <li><a href="#">Miễn phí chuyển hàng với đơn hàng trên 1.000.000đ</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                    <li><a href="{{route('client.checkout')}}">Thủ tục thanh toán</a></li>
                </ul>
                <ul>                                          
                    <li><span>Ngôn Ngữ</span> <a href="#">English<i class="lnr lnr-chevron-down"></i></a>
                        <!-- Dropdown Start -->
                        <ul class="ht-dropdown">
                            <li><a href="#"><img src="{{url('public/client')}}/img/header\1.jpg" alt="language-selector">English</a></li>
                            <li><a href="#"><img src="{{url('public/client')}}/img/header\2.jpg" alt="language-selector">Francis</a></li>
                        </ul>
                        <!-- Dropdown End -->
                    </li>
                    <li><span>Currency</span><a href="#"> USD $ <i class="lnr lnr-chevron-down"></i></a>
                        <!-- Dropdown Start -->
                        {{-- <ul class="ht-dropdown">
                            <li><a href="#">&#36; USD</a></li>
                            <li><a href="#"> € Euro</a></li>
                            <li><a href="#">&#163; Pound Sterling</a></li>
                        </ul> --}}
                        <!-- Dropdown End -->
                    </li>
                    <li><a href="#">Tài Khoản<i class="lnr lnr-chevron-down"></i></a>
                        <!-- Dropdown Start -->
                        <ul class="ht-dropdown">
                            @if (Auth::guard()->user())
                            <li><a href="{{route('client.login')}}">Thông tin tài khoản</a></li>
                            @else
                            <li><a href="{{route('client.login')}}">Đăng Nhập</a></li>
                            <li><a href="{{route('client.register')}}">Đăng Ký</a></li>
                            @endif
                           
                        </ul>
                        <!-- Dropdown End -->
                    </li> 
                </ul>
            </div>
            <!-- Header Top End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End Here -->
    <!-- Header Middle Start Here -->
    <div class="header-middle ptb-15">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-lg-3 col-md-12">
                    <div class="logo mb-all-30">
                        <a href="{{route('client.index')}}"><img src="{{url('public/client')}}/img/logo\logo.png" alt="logo-image"></a>
                    </div>
                </div>
                <!-- Categorie Search Box Start Here -->
                <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                    <div class="categorie-search-box">
                        <form action="#">
                            <div class="form-group">
                                <select class="bootstrap-select" name="poscats">
                                    <option value="0">Tất Cả Danh Mục</option>
                                    @foreach ($all_category as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="search" placeholder="Tôi đang muốn mua...">
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Categorie Search Box End Here -->
                <!-- Cart Box Start Here -->
                <div class="col-lg-4 col-md-12">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                            <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">2</span><span>Giỏ Hàng</span></span></a>
                                <ul class="ht-dropdown cart-box-width">
                                    <li>
                                        <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href="#"><img src="{{url('public/client')}}/img/products\1.jpg" alt="cart-image"></a>
                                                <span class="pro-quantity">1X</span>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="{{route('client.index')}}">Printed Summer Red </a></h6>
                                                <span class="cart-price">27.45</span>
                                                <span>Size: S</span>
                                                <span>Color: Yellow</span>
                                            </div>
                                            <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                        </div>
                                        <!-- Cart Box End -->
                                        <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href="#"><img src="{{url('public/client')}}/img/products\2.jpg" alt="cart-image"></a>
                                                <span class="pro-quantity">1X</span>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="{{route('client.index')}}">Printed Round Neck</a></h6>
                                                <span class="cart-price">45.00</span>
                                                <span>Size: XL</span>
                                                <span>Color: Green</span>
                                            </div>
                                            <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                        </div>
                                        <!-- Cart Box End -->
                                        <!-- Cart Footer Inner Start -->
                                        <div class="cart-footer">
                                           <ul class="price-content">
                                               <li>Subtotal <span>$57.95</span></li>
                                               <li>Shipping <span>$7.00</span></li>
                                               <li>Taxes <span>$0.00</span></li>
                                               <li>Total <span>$64.95</span></li>
                                           </ul>
                                            <div class="cart-actions text-center">
                                                <a class="cart-checkout" href="{{route('client.checkout')}}">Checkout</a>
                                            </div>
                                        </div>
                                        <!-- Cart Footer Inner End -->
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Danh Sách</span><span>Ưa Thích (0)</span></span></a>
                            </li>
                            <li><a href="#"><i class="lnr lnr-user"></i></a>
                                @if (Auth::guard()->user())
                                <span class="my-cart">   {{Auth::guard()->user()->last_name}} <br>
                                    <a  href="{{route('client.logout')}}">Đăng xuất</a></span>
                                    @else  
                                    <a href="{{route('client.login')}}">    <span class="my-cart">  <strong>Đăng nhập </strong> /<span><span> Ở Đây</span></span></a>
                            @endif
                            



                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Cart Box End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Middle End Here -->
    <!-- Header Bottom Start Here -->
    <div class="header-bottom  header-sticky">
        <div class="container">
            <div class="row align-items-center">
                 <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                    <span class="categorie-title">MUA SẮM THEO DANH MỤC</span>
                </div>                       
                <div class="col-xl-9 col-lg-8 col-md-12 ">
                    <nav class="d-none d-lg-block">
                        <ul class="header-bottom-list d-flex">
                            <li class="active"><a href="{{route('client.index')}}">Trang Chủ</a>
                                <!-- Home Version Dropdown Start -->
                                <!-- Home Version Dropdown End -->
                            </li>
                            <li><a href="{{route('client.about')}}">Giới Thiệu</a></li>
                            <li><a href="{{route('client.shop')}}">Cửa Hàng</a></li>
                            <li><a href="{{route('client.blog')}}">Bài Viết<i class="fa fa-angle-down"></i></a>
                                <!-- Home Version Dropdown Start -->
                                <ul class="ht-dropdown dropdown-style-two">
                                    @foreach ($modelcategoryblog as $item)
                                        <li><a href="{{route('client.cateblog',$item->slug)}}">{{$item->name}}</a></li>  
                                    @endforeach
                                </ul>
                                <!-- Home Version Dropdown End -->
                            </li>
                            <li><a href="{{route('client.contact')}}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="{{route('client.index')}}">Trang Chủ</a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul>
                                        <li><a href="{{route('client.index')}}">Home Version 1</a></li>
                                        <li><a href="index-2.html">Home Version 2</a></li>
                                        <li><a href="index-3.html">Home Version 3</a></li>
                                        <li><a href="index-4.html">Home Version 4</a></li>
                                    </ul>
                                    <!-- Home Version Dropdown End -->
                                </li>
                                <li><a href="">Cửa Hàng</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="{{route('client.index')}}">product details</a></li>
                                        <li><a href="compare.html">So Sánh Sản Phẩm</a></li>
                                        <li><a href="cart.html">Giỏ Hàng</a></li>
                                        <li><a href="{{route('client.checkout')}}">Thủ Tục Thanh Toán</a></li>
                                        <li><a href="{{route('client.index')}}">Danh Sách Ưa Thích</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="{{route('client.blog')}}">Bài Viết</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        @foreach ($modelcategoryblog as $item)
                                        <li><a href="{{route('client.cateblog',$item->slug)}}">{{$item->name}}</a></li>  
                                    @endforeach
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="#">pages</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="{{route('client.login')}}">register</a></li>
                                        <li><a href="{{route('client.checkout')}}">sign in</a></li>
                                        <li><a href="forgot-password.html">forgot password</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="{{route('client.index')}}">Giới Thiệu</a></li>
                                <li><a href="{{route('client.about')}}">Liên Hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Bottom End Here -->
    <!-- Mobile Vertical Menu Start Here -->
    <div class="container d-block d-lg-none">
        <div class="vertical-menu mt-30">
            <span class="categorie-title mobile-categorei-menu">Cửa Hàng by Categories</span>
            <nav>  
                <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                    <ul>
                        {!! $menus_mobile !!}
                    </ul>
                </div>
                <!-- category-menu-end -->
            </nav>
        </div>
    </div>
    <!-- Mobile Vertical Menu Start End -->
</header>
<!-- Main Header Area End Here -->
<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner ">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list" id="list_category">
                            {!! $menus_desktop !!}
                            
                            <!-- More Categoies Start -->
                            <li id="cate-toggle" class="category-menu v-cat-menu">
                                <ul>
                                    <li class="has-sub"><a href="#">Tất cả danh mục</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- More Categoies End -->
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
            <!-- Slider Area Start Here -->
            @yield('slider')
            <!-- Slider Area End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->