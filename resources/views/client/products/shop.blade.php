@extends('client.layouts.master')
@section('title','Cửa hàng')
@section('main')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{ route('client.index')}}">Trang Chủ</a></li>
                    <li class="active"><a href="{{ route('client.shop')}}">Cửa Hàng</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <div class="main-shop-page pt-100 pb-100 ptb-sm-60">
        <div class="container">
            <form id="form_search">
                <!-- Row End -->
                <div class="row">
                    <!-- Sidebar Shopping Option Start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="sidebar">
                            {{-- clear filter start --}}
                            <div class="mb-40">
                                <a name="clear" id="clear" class="btn btn-success btn-lg btn-block d-flex justify-content-start" href="{{ route('client.shop')}}" role="button">
                                    <i class="ion-close text-dark" data-id="228"></i>
                                    &nbsp; Xóa Bộ Lọc ...
                                </a>
                            </div>
                            {{-- clear filter end --}}
                            <!-- Sidebar Electronics Categorie Start -->
                            <div class="electronics mb-40">
                                <h3 class="sidebar-title">Danh Mục</h3>
                                <input type="hidden" id="search_category" name="searchCategory" value="{{ old('searchCategory') }}">
                                <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                    <ul>
                                        {!! $menu_search_category !!}
                                    </ul>
                                </div>
                                <!-- category-menu-end -->
                            </div>
                            <!-- Sidebar Electronics Categorie End -->
                            <!-- Price Filter Options Start -->
                            <div class="search-filter mb-40">
                                <h3 class="sidebar-title">Lọc Giá</h3>
                                <div class="sidbar-style">
                                    <div class="row">
                                        <div class="col-9">
                                            <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 85%;">
                                            </div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 85%;"></span>
                                        </div>
                                        <input type="text" id="amount" class="amount-range" readonly="">
                                        <input type="hidden" name="start_price" value="{{ old('start_price') }}" id="start_price">
                                        <input type="hidden" name="end_price" value="{{ old('end_price') }}" id="end_price">
                                        </div>
                                        <div class="col-3">
                                            <div class="d-flex align-content-start">
                                                <button type="button" id="fillter_price" class="btn btn-secondary">Lọc</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Price Filter Options End -->
                            {{-- tag brand start --}}
                            <div class="tags mb-40">
                                <h3 class="sidebar-title">Tags Sản Phẩm</h3>
                                <div class="sidbar-style">
                                    <input type="hidden" id="search_brand" name="SearchBrand" value="{{ old('SearchBrand') }}">
                                    <ul class="tag-list">
                                        @foreach ($all_brand as $tag_pro)
                                            <li class="brand_id" data-id="{{ $tag_pro->id }}"><a href="">{{ $tag_pro->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            {{-- tag brand end --}}
                            <!-- Product Top Start -->
                            <div class="top-new mb-40">
                                <h3 class="sidebar-title">Mới</h3>
                                <div class="side-product-active owl-carousel owl-loaded owl-drag">
                                    <!-- Side Item Start -->
                                    
                                    <!-- Side Item End -->
                                    <!-- Side Item Start -->
                                    
                                    <!-- Side Item End -->
                                    <!-- Side Item Start -->
                                    
                                    <!-- Side Item End -->
                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 810px;">
                                        <div class="owl-item active" style="width: 270px;">
                                            <div class="side-pro-item">
                                                @foreach ($top_5_new as $top_five)
                                                    <!-- Single Product Start -->
                                                    <div class="single-product single-product-sidebar">
                                                        <!-- Product Image Start -->
                                                        <div class="pro-img">
                                                            <a href="{{ route('client.productDetail', $top_five->slug)}}">
                                                                <img class="primary-img" src="{{url('public/uploads')}}/{{ $top_five->image }}" alt="single-product">
                                                                <img class="secondary-img" src="{{url('public/uploads')}}/{{ $top_five->image }}" alt="single-product">
                                                            </a>
                                                            @if ($top_five->product_variantProduct->first()->price > $top_five->product_variantProduct->first()->discount)
                                                            @endif
                                                        </div>
                                                        <!-- Product Image End -->
                                                        <!-- Product Content Start -->
                                                        <div class="pro-content">
                                                            <h4><a href="{{ route('client.productDetail', $top_five->slug)}}">{{ $top_five->name }}</a></h4>
                                                            @if ($top_five->product_variantProduct->first()->price > $top_five->product_variantProduct->first()->discount)
                                                                <p><span class="price">{{number_format($top_five->product_variantProduct->first()->discount)}} <u>đ</u></span><del class="prev-price">{{ number_format($top_five->product_variantProduct->first()->price) }} <u>đ</u> </del></p>
                                                            @else
                                                                <p><span class="price">{{number_format($top_five->product_variantProduct->first()->price)}}  <u>đ</u></span></p>
                                                            @endif
                                                        </div>
                                                        <!-- Product Content End -->
                                                    </div>
                                                    <!-- Single Product End -->     
                                                @endforeach                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-nav disabled">
                                    <div class="owl-prev">
                                        <i class="lnr lnr-arrow-left"></i>
                                    </div>
                                    <div class="owl-next">
                                        <i class="lnr lnr-arrow-right"></i>
                                    </div>
                                </div>
                                <div class="owl-dots disabled"></div>
                            </div>
                            </div>
                            <!-- Product Top End -->                            
                            <!-- Single Banner Start -->
                            <div class="col-img">
                                <a href="{{ route("client.shop") }}"><img src="{{url('public/client')}}/img/banner\shop.png" alt="slider-banner"></a>
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
                                    <div class="form-inline">
                                        <label for="soft_by_name">Sắp Xếp:</label>
                                        <select class="form-control" name="search_name" id="soft_by_name">
                                            <option value="DESC" selected>Tên, A tới Z</option>
                                            <option value="ASC" >Tên, Z tới A</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Toolbar Short Area End -->
                            <!-- Toolbar Short Area Start -->
                            <div class="main-toolbar-sorter clearfix">
                                <div class="toolbar-sorter d-flex align-items-center">
                                    <div class="form-inline">
                                        <label for="soft_by_paginate">Hiển Thị:</label>
                                        <select class="form-control" name="paginate" id="soft_by_paginate">
                                            <option value="12">12</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    <!-- Row End -->
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
                                            @php
                                                $start_price = isset(request()->start_price) ? request()->start_price : $all_variant_pro->min('price');
                                                $end_price = isset(request()->end_price) ? request()->end_price : $all_variant_pro->max('price');
                                            @endphp
                                            @if ($shop_grid_pro->product_variantProduct->first()->price >= $start_price &&  $shop_grid_pro->product_variantProduct->first()->price <= $end_price)
                                                <!-- Single Product Start -->
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="single-product">
                                                        <!-- Product Image Start -->
                                                        <div class="pro-img">
                                                            <a href="{{ route('client.productDetail', $shop_grid_pro->slug)}}">
                                                                <img class="primary-img" src="{{url('public/uploads')}}/{{$shop_grid_pro->image}}" alt="single-product">
                                                                <img class="secondary-img" src="{{url('public/uploads')}}/{{$shop_grid_pro->image}}" alt="single-product">
                                                            </a>
                                                            <a href="#" class="quick_view" data-toggle="modal" data-target="{{$shop_grid_pro->id}}" title="" data-original-title="Xem Nhanh"><i class="lnr lnr-magnifier"></i></a>
                                                        </div>
                                                        <!-- Product Image End -->
                                                        <!-- Product Content Start -->
                                                        <div class="pro-content">
                                                            <div class="pro-info">
                                                                <h4><a href="{{ route('client.productDetail', $shop_grid_pro->slug)}}">{{$shop_grid_pro->name}}</a></h4>
                                                                @if ($shop_grid_pro->product_variantProduct->first()->price > $shop_grid_pro->product_variantProduct->first()->discount)
                                                                    <p>
                                                                        <span class="price">{{number_format($shop_grid_pro->product_variantProduct->first()->discount)}} <u>đ</u></span>
                                                                        <del class="prev-price">{{number_format($shop_grid_pro->product_variantProduct->first()->price)}} <u>đ</u> </del></p>
                                                                    <div class="label-product l_sale">{{ round((($shop_grid_pro->product_variantProduct->first()->price - $shop_grid_pro->product_variantProduct->first()->discount )/$shop_grid_pro->product_variantProduct->first()->price)*100,0)  }}<span class="symbol-percent">%</span></div>
                                                                @else
                                                                <span class="price">{{$shop_grid_pro->product_variantProduct->first()->discount}} đ</span></p>
                                                                @endif
                                                            </div>
                                                            <div class="pro-actions">
                                                                <div class="actions-primary">
                                                                    <a href="#" title="Thêm vào giỏ hàng" data-original-title="Thêm Vào Giỏ Hàng"  class="quick_view" data-toggle="modal" data-target="{{$shop_grid_pro->id}}"> + Thêm vào giỏ</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Product Content End -->
                                                    </div>
                                                </div>
                                                <!-- Single Product End -->
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- Row End -->
                                </div>
                                <!-- #grid view End -->
                                <div id="list-view" class="tab-pane fade">
                                    @foreach ($data_paginate_product as $shop_list_pro)
                                        @php
                                            $list_start_price = isset(request()->start_price) ? request()->start_price : $all_variant_pro->min('price');
                                            $list_end_price = isset(request()->end_price) ? request()->end_price : $all_variant_pro->max('price');
                                        @endphp
                                        @if ($shop_list_pro->product_variantProduct->first()->price >= $list_start_price && $shop_list_pro->product_variantProduct->first()->price <= $list_end_price)
                                            <!-- Single Product Start -->
                                            <div class="single-product"> 
                                                <div class="row">        
                                                    <!-- Product Image Start -->
                                                    <div class="col-lg-4 col-md-5 col-sm-12">
                                                        <div class="pro-img">
                                                            <a href="{{ route('client.productDetail', $shop_list_pro->slug)}}">
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
                                                            <h4><a href="{{ route('client.productDetail', $shop_list_pro->slug)}}">{{$shop_list_pro->name}}</a></h4>
                                                            @if ($shop_list_pro->product_variantProduct->first()->price > $shop_list_pro->product_variantProduct->first()->discount)
                                                                <p><span class="price">{{number_format($shop_list_pro->product_variantProduct->first()->discount)}} <u>đ</u></span><del class="prev-price">{{ number_format($shop_list_pro->product_variantProduct->first()->price) }} <u>đ</u> </del></p>
                                                            @else
                                                                <p><span class="price">{{$shop_list_pro->product_variantProduct->first()->price}} VNĐ</span></p>
                                                            @endif
                                                            <span style="overflow: hidden;
                                                                    text-overflow: ellipsis;
                                                                    display: -webkit-box;
                                                                    -webkit-line-clamp: 5;
                                                                            line-clamp: 2; 
                                                                    -webkit-box-orient: vertical;"> 
                                                                {!! $shop_list_pro->short_description !!}
                                                            </span>
                                                            <div class="pro-actions">
                                                                <div class="actions-primary">
                                                                    <a href="#" style="line-height:30px;" title="" data-original-title="Thêm Vào Giỏ Hàng"  class="quick_view" data-toggle="modal" data-target="{{$shop_list_pro->id}}"> + Thêm vào giỏ</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Product Content End -->
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        @endif
                                    @endforeach
                                </div>
                                <!-- #list view End -->
                                <div class="pro-pagination">
                                    <div class="blog-pagination">
                                        {{ $data_paginate_product->appends(request()->all())->links('pagination.default') }}
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
            </form>
        </div>
        <!-- Container End -->
    </div>
@endsection

@section('css')
    
@endsection

{{-- load js for index --}}
@section('js')
    <script>
        $(document).ready(function () {
            // set value slier ranger
            $(function () {
                $('#slider-range').slider({
                    range: true,
                    min: {!! $all_variant_pro->min('price') !!},
                    max: {!! $all_variant_pro->max('price') !!},
                    values: [0, 2000],
                    create: function() {
                        $("#amount").val("$"+min+" - $"+max);
                    },
                    slide: function (event, ui) {
                        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                        var mi = ui.values[0];
                        var mx = ui.values[1];
                        $('#start_price').val(ui.values[0]);
                        $('#end_price').val(ui.values[1]);
                    }
                })
            });

            // selected change text category
            $('.category_id').each(function () {  
                var category_id = $(this);
                if(category_id.attr('data-id') == $('#search_category').val()){
                    category_id.find('a').css({'background': '#00483d', 'color': '#fff'});
                }else{
                    category_id.find('a').css({'color': '#2c2c2c'});
                }
            })

            // filter product with category
            $('.category_id').click(function (e) { 
                e.preventDefault();
                var category_id = $(this).attr('data-id');
                $('#search_category').val(category_id);
                $('form#form_search').submit();
            });

            // selected change backgound and text brand
            $('.brand_id').each(function () {  
                var brand = $(this);
                if(brand.attr('data-id') == $('#search_brand').val()){
                    brand.find('a').css({'background': '#00483d', 'color': '#fff'});
                }else{
                    brand.find('a').css({'background': 'rgb(246, 246, 246)', 'color': 'rgb(68, 68, 68)'});
                }
            })

            // filter product with brand
            $('.brand_id').click(function (e) { 
                e.preventDefault();
                var brand = $(this);
                var brand_id = brand.attr('data-id');
                $('#search_brand').val(brand_id);
                $('form#form_search').submit();
            });

            // filter product with price
            $('#fillter_price').click(function (e) { 
                e.preventDefault();
                $('form#form_search').submit();
            });

            // selected and post soft name
            $('#soft_by_name').change(function (e) { 
                e.preventDefault();
                $('form#form_search').submit();
                
            });

            // selected and post soft name
            $('#soft_by_paginate').change(function (e) { 
                e.preventDefault();
                $('form#form_search').submit();
            });
            
        });

    </script>
@endsection
