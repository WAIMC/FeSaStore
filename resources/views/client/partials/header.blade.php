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
                            @if (Auth::guard('cus')->user())
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
                            <li><a href="{{route('cart.view')}}"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">{{ $cart->total_quantity }}</span><span>Giỏ Hàng</span></span></a>
                                @if (isset($cart))
                                <ul class="ht-dropdown cart-box-width" id="cart-box-width">
                                    <li>
                                      
                                          @foreach ($cart->items as $item)
                                          <div class="single-cart-box cartqickview{{$item['id']}}" >
                                            <div class="cart-img">
                                                <a href="#"><img src="{{url('public/uploads')}}/{{$item['image']}}" alt="{{$item['name']}}"></a>
                                                <span class="pro-quantity">X{{$item['quantity']}}</span>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="{{route('client.index')}}">{{$item['name']}}</a></h6>
                                                <span class="cart-price">{{ number_format($item['price'])}} VND</span>
                                                <span>Thuộc tính: {{$item['attr']}}</span>
                                               
                                            </div>
                                            <a class="del-icone" href="#"><i class="ion-close"data-id="{{$item['id']}}"></i></a>
                                        </div>
                                          @endforeach  
                                     
                                        <!-- Cart Box Start -->
                                       
                                        <!-- Cart Box End -->
                                
                                        <!-- Cart Footer Inner Start -->
                                        <div class="cart-footer">
                                           <ul class="price-content">
                                               {{-- <li>Subtotal <span>$57.95</span></li>
                                               <li>Shipping <span>$7.00</span></li>
                                               <li>Taxes <span>$0.00</span></li> --}}
                                               <li>Tổng tiền <span>{{number_format($cart->total_price) }} VND</span></li>
                                           </ul>
                                            <div class="cart-actions text-center">
                                                <a class="cart-checkout" href="{{route('cart.view')}}">Giỏ hàng</a>
                                            </div>
                                        </div>
                                        <!-- Cart Footer Inner End -->
                                    </li>
                                </ul>
                                @endif
                            </li>
                            <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Danh Sách</span><span>Ưa Thích (0)</span></span></a>
                            </li>
                            <li><a href="#"><i class="lnr lnr-user"></i></a>
                                @if (Auth::guard('cus')->user())
                                <span class="my-cart">   {{Auth::guard('cus')->user()->name}} <br>
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
                            <li class="active"><a href="{{route('client.index')}}">Trang Chủ</a></li>
                            <li><a href="{{route('client.shop')}}">Cửa Hàng</a></li>
                            <li><a href="{{route('client.about')}}">Giới Thiệu</a></li>
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
                                <li><a href="{{route('client.index')}}">Trang Chủ</a> </li>
                                <li><a href="">Cửa Hàng</a>      </li>
                                <li><a href="{{route('client.blog')}}">Bài Viết</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        @foreach ($modelcategoryblog as $item)
                                        <li><a href="{{route('client.cateblog',$item->slug)}}">{{$item->name}}</a></li>  
                                    @endforeach
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
            <span class="categorie-title mobile-categorei-menu">Mua sắm theo danh mục</span>
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
<div class="main-page-banner pb-50 off-white-bg">
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