@extends('client.layouts.master')
@section('title','Cửa hàng')
@section('main')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index')}}">Trang Chủ</a></li>
                    <li class="active"><a href="{{ route('client.shop')}}">Shop</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <div class="main-shop-page pt-100 pb-100 ptb-sm-60">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                <!-- Sidebar Shopping Option Start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="sidebar">
                        <!-- Sidebar Electronics Categorie Start -->
                        <div class="electronics mb-40">
                            <h3 class="sidebar-title">Electronics</h3>
                            <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                <ul>
                                    {!! $menus_mobile !!}
                                </ul>
                            </div>
                            <!-- category-menu-end -->
                        </div>
                        <!-- Sidebar Electronics Categorie End -->
                        <!-- Price Filter Options Start -->
                        <div class="search-filter mb-40">
                            <h3 class="sidebar-title">filter by price</h3>
                            <form action="#" class="sidbar-style">
                                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 85%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 85%;"></span></div>
                                <input type="text" id="amount" class="amount-range" readonly="">
                            </form>
                        </div>
                        <!-- Price Filter Options End -->
                        <!-- Sidebar Categorie Start -->
                        <div class="sidebar-categorie mb-40">
                            <h3 class="sidebar-title">categories</h3>
                            <ul class="sidbar-style">
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="camera" type="checkbox">
                                    <label class="form-check-label" for="camera">Cameras (8)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="GamePad" type="checkbox">
                                    <label class="form-check-label" for="GamePad">GamePad (8)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="Digital" type="checkbox">
                                    <label class="form-check-label" for="Digital">Digital Cameras (8)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="#" id="Virtual" type="checkbox">
                                    <label class="form-check-label" for="Virtual"> Virtual Reality (8) </label>
                                </li>
                            </ul>
                        </div>
                        <!-- Sidebar Categorie Start -->
                        <!-- Product Size Start -->
                        <div class="size mb-40">
                            <h3 class="sidebar-title">size</h3>
                            <ul class="size-list sidbar-style">
                                <li class="form-check">
                                    <input class="form-check-input" value="" id="small" type="checkbox">
                                    <label class="form-check-label" for="small">S (6)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="" id="medium" type="checkbox">
                                    <label class="form-check-label" for="medium">M (9)</label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" value="" id="large" type="checkbox">
                                    <label class="form-check-label" for="large">L (8)</label>
                                </li>
                            </ul>
                        </div>
                        <!-- Product Size End -->
                        <!-- Product Color Start -->
                        <div class="color mb-40">
                            <h3 class="sidebar-title">color</h3>
                            <ul class="color-option sidbar-style">
                                <li>
                                    <span class="white"></span>
                                    <a href="#">white (4)</a>
                                </li>
                                <li>
                                    <span class="orange"></span>
                                    <a href="#">Orange (2)</a>
                                </li>
                                <li>
                                    <span class="blue"></span>
                                    <a href="#">Blue (6)</a>
                                </li>
                                <li>
                                    <span class="yellow"></span>
                                    <a href="#">Yellow (8)</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Product Color End -->
                        <!-- Product Top Start -->
                        <div class="top-new mb-40">
                            <h3 class="sidebar-title">Top New</h3>
                            <div class="side-product-active owl-carousel owl-loaded owl-drag">
                                <!-- Side Item Start -->
                                
                                <!-- Side Item End -->
                                <!-- Side Item Start -->
                                
                                <!-- Side Item End -->
                                <!-- Side Item Start -->
                                
                                <!-- Side Item End -->
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 810px;"><div class="owl-item active" style="width: 270px;"><div class="side-pro-item">
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\20.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\19.jpg" alt="single-product">
                                            </a>
                                            <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                            <p><span class="price">$130.45</span><del class="prev-price">180.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->  
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\2.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\1.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End --> 
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\3.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\4.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Proin Work Lamp Silver </a></h4>
                                            <p><span class="price">$150.45</span><del class="prev-price">$200.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End --> 
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\25.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\26.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->                                        
                                </div></div><div class="owl-item" style="width: 270px;"><div class="side-pro-item">
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\41.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\42.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                            <p><span class="price">$80.45</span><del class="prev-price">$100.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->  
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\36.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\35.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End --> 
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\33.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\34.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Lamp Proin Work  Silver </a></h4>
                                            <p><span class="price">$120.45</span><del class="prev-price">130.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End --> 
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\31.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\32.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                            <p><span class="price">$140.45</span><del class="prev-price">$150.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->                                        
                                </div></div><div class="owl-item" style="width: 270px;"><div class="side-pro-item">
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\15.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\16.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Lamp Work Silver Proin</a></h4>
                                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->  
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\17.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\18.jpg" alt="single-product">
                                            </a>
                                            <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End --> 
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\23.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\24.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Proin Work Lamp Silver </a></h4>
                                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End --> 
                                    <!-- Single Product Start -->
                                    <div class="single-product single-product-sidebar">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="{{url('public/client')}}/img/products\25.jpg" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/client')}}/img/products\26.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->                                        
                                </div></div></div></div><div class="owl-nav disabled"><div class="owl-prev"><i class="lnr lnr-arrow-left"></i></div><div class="owl-next"><i class="lnr lnr-arrow-right"></i></div></div><div class="owl-dots disabled"></div></div>
                        </div>
                        <!-- Product Top End -->                            
                        <!-- Single Banner Start -->
                        <div class="col-img">
                            <a href="shop.html"><img src="{{url('public/client')}}/img/banner\banner-sidebar.jpg" alt="slider-banner"></a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
                <!-- Sidebar Shopping Option End -->
                <!-- Product Categorie List Start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Grid & List View Start -->
                    <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                        <div class="grid-list-view  mb-sm-15">
                            <ul class="nav tabs-area d-flex align-items-center">
                                <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                            </ul>
                        </div>
                        <!-- Toolbar Short Area Start -->
                        <div class="main-toolbar-sorter clearfix">
                            <div class="toolbar-sorter d-flex align-items-center">
                                <label>Sắp Xếp:</label>
                                <select class="sorter wide" style="display: none;" name='' id="soft_by_type">
                                    <option value="Position">Relevance</option>
                                    <option value="DESC" data-na="name" selected="">Tên, A tới Z</option>
                                    <option value="ASC" data-na="name" selected="">Tên, Z tới A</option>
                                    <option value="ASC" data-na="price" selected="">Giá thấp đến cao</option>
                                    <option value="DESC" data-na="price"  selected="">Giá cao đến thấp</option>
                                </select>
                                <div class="nice-select sorter wide" tabindex="0">
                                    <span class="current">Giá cao đến thấp</span>
                                    <ul class="list" >
                                        <li data-value="Position" class="option">Relevance</li>
                                        <li data-value="DESC" class="option">Tên, A tới Z</li>
                                        <li data-value="ASC" class="option">Tên, Z tới A</li>
                                        <li data-value="ASC" class="option">Giá thấp đến cao</li>
                                        <li data-value="DESC" class="option">Giá cao đến thấp</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Toolbar Short Area End -->
                        <!-- Toolbar Short Area Start -->
                        <div class="main-toolbar-sorter clearfix">
                            <div class="toolbar-sorter d-flex align-items-center">
                                <label>Hiển Thị:</label>
                                <select class="sorter wide" style="display: none;">
                                    <option value="12">12</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                </select>
                                <div class="nice-select sorter wide" tabindex="0">
                                    <span class="current">12</span>
                                    <ul class="list">
                                        <li data-value="12" class="option selected">12</li>
                                        <li data-value="25" class="option">25</li>
                                        <li data-value="50" class="option">50</li>
                                        <li data-value="75" class="option">75</li>
                                        <li data-value="100" class="option">100</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Toolbar Short Area End -->
                    </div>
                    <!-- Grid & List View End -->
                    <div class="main-categorie mb-all-40">
                        <!-- Grid & List Main Area End -->
                        <div class="tab-content fix">
                            <div id="grid-view" class="tab-pane fade show active">
                                <div class="row">
                                    @foreach ($data_paginate_product as $shop_grid_pro)
                                        <!-- Single Product Start -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="{{ route('client.productDetail', $shop_grid_pro->id)}}">
                                                        <img class="primary-img" src="{{url('public/uploads')}}/{{$shop_grid_pro->image}}" alt="single-product">
                                                        <img class="secondary-img" src="{{url('public/uploads')}}/{{$shop_grid_pro->image}}" alt="single-product">
                                                    </a>
                                                    <a href="#" class="quick_view" data-toggle="modal" data-target="{{$shop_grid_pro->id}}" title="" data-original-title="Xem Nhanh"><i class="lnr lnr-magnifier"></i></a>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <div class="pro-info">
                                                        <h4><a href="{{ route('client.productDetail', $shop_grid_pro->id)}}">{{$shop_grid_pro->name}}</a></h4>
                                                        @if ($shop_grid_pro->product_variantProduct->first()->price > $shop_grid_pro->product_variantProduct->first()->discount)
                                                            <p>
                                                                <span class="price">${{$shop_grid_pro->product_variantProduct->first()->discount}}</span>
                                                                <del class="prev-price">${{$shop_grid_pro->product_variantProduct->first()->price}}</del></p>
                                                            <div class="label-product l_sale">{{ 100-($shop_grid_pro->product_variantProduct->first()->price/100*$shop_grid_pro->product_variantProduct->first()->discount) }}<span class="symbol-percent">%</span></div>
                                                        @else
                                                        <span class="price">${{$shop_grid_pro->product_variantProduct->first()->discount}}</span></p>
                                                        @endif
                                                    </div>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="" data-original-title="Thêm Vào Giỏ Hàng"> + Thêm Vào Giỏ Hàng</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="compare.html" title="" data-original-title="So Sánh"><i class="lnr lnr-sync"></i> <span>Thêm Vào So Sánh</span></a>
                                                            <a href="wishlist.html" title="" data-original-title="Ưa Thích"><i class="lnr lnr-heart"></i> <span>Thêm Vào Danh Sách ưa Thích</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                        </div>
                                        <!-- Single Product End -->
                                    @endforeach
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- #grid view End -->
                            <div id="list-view" class="tab-pane fade">
                                @foreach ($data_paginate_product as $shop_list_pro)
                                    <!-- Single Product Start -->
                                    <div class="single-product"> 
                                        <div class="row">        
                                            <!-- Product Image Start -->
                                            <div class="col-lg-4 col-md-5 col-sm-12">
                                                <div class="pro-img">
                                                    <a href="{{ route('client.productDetail', $shop_list_pro->id)}}">
                                                        <img class="primary-img" src="{{url('public/uploads')}}/{{$shop_list_pro->image}}" alt="single-product">
                                                        <img class="secondary-img" src="{{url('public/uploads')}}/{{$shop_list_pro->image}}" alt="single-product">
                                                    </a>
                                                    <a href="#" class="quick_view" data-toggle="modal" data-target="{{$shop_list_pro->id}}" title="" data-original-title="Xem Nhanh"><i class="lnr lnr-magnifier"></i></a>
                                                    <span class="sticker-new">Mới</span>
                                                </div>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="col-lg-8 col-md-7 col-sm-12">
                                                <div class="pro-content hot-product2">
                                                    <h4><a href="{{ route('client.productDetail', $shop_list_pro->id)}}">{{$shop_list_pro->name}}</a></h4>
                                                    @if ($shop_list_pro->product_variantProduct->first()->price > $shop_list_pro->product_variantProduct->first()->discount)
                                                        <p><span class="price">${{$shop_list_pro->product_variantProduct->first()->discount}}</span></p>
                                                    @else
                                                        <p><span class="price">${{$shop_list_pro->product_variantProduct->first()->price}}</span></p>
                                                    @endif
                                                    <p> {!! $shop_list_pro->short_description !!}</p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="" data-original-title="Thêm Vào Giỏ Hàng"> + Thêm Vào Giỏ Hàng</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="compare.html" title="" data-original-title="So Sánh"><i class="lnr lnr-sync"></i> <span>Thêm Vào So Sánh</span></a>
                                                            <a href="wishlist.html" title="" data-original-title="Ưa Thích"><i class="lnr lnr-heart"></i> <span>Thêm Vào Danh Mục Ưa Thích</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- #list view End -->
                            <div class="pro-pagination">
                                <div class="blog-pagination">
                                    {{ $data_paginate_product->appends(request()->all())->links() }}
                                </div>                                    
                                <div class="product-pagination">
                                    <span class="grid-item-list">Xem {{ $data_paginate_product->currentPage() }} đến {{ $data_paginate_product->perPage() }} của {{ $data_paginate_product->total() }} ({{ $data_paginate_product->currentPage() }} Trang)</span>
                                </div>
                            </div>
                            <!-- Product Pagination Info -->
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                </div>
                <!-- product Categorie List End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <form action="" method="post" id="formPost"></form>
@endsection

@section('css')
    
@endsection

{{-- load js for index --}}
@section('js')
    <script>
        // selected and post soft-by-type
        $('#soft_by_type').change(function (e) { 
            e.preventDefault();
            alert($(this).attr('data-na'));
            // $('#formPost').submit();
            // $(this).addClass('selected');
        });
    </script>
@endsection
