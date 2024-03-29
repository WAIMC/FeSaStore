@extends('client.layouts.master')
@section('title','Trang chủ')

@section('slider')
    <div class="col-xl-9 col-lg-8 slider_box pb-50" >
        <div class="slider-wrapper theme-default">
            <!-- Slider Background  Image Start-->
            <div id="slider" class="nivoSlider">
            @foreach($all_slider as $sl)
                <a href="{{ $sl->link}}"><img src="{{url('public/uploads')}}/{{$sl->image}}" data-thumb="{{url('public/uploads')}}/{{$sl->image}}" alt="" title="#htmlcaption"></a>
                <a href="{{ $sl->link}}"><img src="{{url('public/uploads')}}/{{$sl->image}}" data-thumb="{{url('public/uploads')}}/{{$sl->image}}" alt="" title="#htmlcaption2"></a>
            @endforeach
            </div>
            <!-- Slider Background  Image Start-->
        </div>
    </div>
@endsection

@section('main')
    <!-- Brand Banner Area Start Here -->
    <div class="image-banner pb-50 off-white-bg">
        <div class="container">
            <div class="col-img">
                @foreach($all_banner as $bn)
                @if($bn->position == "brand_banner")
                    <a href="{{ $bn->link }}">
                        <img src="{{url('public/uploads')}}/{{$bn->image}}" data-thumb="{{url('public/uploads')}}/{{$bn->image}}" >
                    </a> 
                @endif
                @endforeach
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Brand Banner Area End Here -->
    <!-- Hot Deal Products Start Here -->
    <div class="hot-deal-products off-white-bg pb-90 pb-sm-50">
        <div class="container">
            <!-- Product Title Start -->
            <div class="post-title pb-30">
                <h2>SẢN PHẨM HOT</h2>
            </div>
            <!-- Product Title End -->
            <!-- Hot Deal Product Activation Start -->
            <div class="hot-deal-active owl-carousel">
                @foreach ($all_product as $item_pro)
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{ route('client.productDetail', $item_pro->slug)}}">
                                <img class="primary-img" src="{{url('public/uploads/'.$item_pro->image)}}" alt="single-product">
                                <img class="secondary-img" src="{{url('public/uploads/'.$item_pro->image)}}" alt="single-product">
                            </a>
                            <a href="#" class="quick_view" data-toggle="modal" data-target="{{$item_pro->id}}" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="{{ route('client.productDetail', $item_pro->slug)}}">{{ $item_pro->name }}</a></h4>
                                @if ($item_pro->product_variantProduct->first()->price > $item_pro->product_variantProduct->first()->discount)
                                    <p><span class="price">{{number_format($item_pro->product_variantProduct->first()->discount)}}  <u>đ</u></span><del class="prev-price">{{number_format($item_pro->product_variantProduct->first()->price)}} <u>đ</u> </del></p>
                                    <div class="label-product l_sale">{{ round((($item_pro->product_variantProduct->first()->price - $item_pro->product_variantProduct->first()->discount )/$item_pro->product_variantProduct->first()->price)*100,0) }}<span class="symbol-percent">%</span></div>
                                @else
                                    <p><span class="price">{{$item_pro->product_variantProduct->first()->price}} VNĐ</span></p>
                                @endif
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="#" class="quick_view" title="Thêm vào giỏ hàng" data-toggle="modal" data-target="{{$item_pro->id}}" > + Thêm vào giỏ hàng</a>
                                </div>
                                
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                @endforeach
            </div>
            <!-- Hot Deal Product Active End -->

        </div>
        <!-- Container End -->
    </div>
    <!-- Hot Deal Products End Here -->
    <!-- Hot Deal Products End Here -->
    <!-- Big Banner Start Here -->
    <div class="big-banner mt-100 pb-85 mt-sm-60 pb-sm-45">
        <div class="container banner-2">
            <div class="banner-box">
                @foreach($all_banner as $bn)
                    @if($bn->position == "big_banner1")
                    <div class="col-img">
                        <a href="{{$bn->link}}">
                            <img src="{{url('public/uploads')}}/{{$bn->image}}"  alt="">
                        </a>
                    </div>
                    @endif
                @endforeach
                @foreach($all_banner as $bn)
                    @if($bn->position == "big_banner2")
                        <div class="col-img">
                            <a href="{{ $bn->link }}">
                                <img src="{{url('public/uploads')}}/{{$bn->image}}"  alt="">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="banner-box">
            @foreach($all_banner as $bn)
                @if($bn->position == "big_banner4")
                    <div class="col-img">
                        <a href="{{ $bn->link }}">
                            <img src="{{url('public/uploads')}}/{{$bn->image}}" alt="">
                        </a>
                    </div>
                @endif
            @endforeach
            @foreach($all_banner as $bn)
                @if($bn->position == "big_banner5")
                    <div class="col-img">
                        <a href="{{ $bn->link }}">
                            <img src="{{url('public/uploads')}}/{{$bn->image}}" alt="">
                        </a>
                    </div>
                @endif
            @endforeach
            </div>
            <div class="banner-box">
            @foreach($all_banner as $bn)
                @if($bn->position == "big_banner7")
                    <div class="col-img">
                        <a href="{{ $bn->link }}">
                            <img src="{{url('public/uploads')}}/{{$bn->image}}" alt="">
                        </a>
                    </div>
                @endif
            @endforeach
            @foreach($all_banner as $bn)
                @if($bn->position == "big_banner8")
                <div class="col-img">
                    <a href="{{ $bn->link }}">
                        <img src="{{url('public/uploads')}}/{{$bn->image}}" alt="">
                    </a>
                </div>
                @endif
            @endforeach
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Big Banner End Here -->
    <!-- Arrivals Products Area Start Here -->
    <div class="arrivals-product pb-85 pb-sm-45">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-25">
                    <div class="section-ttitle">
                        <h2>Danh Mục Tiêu Biểu</h2>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        @php
                            $num_list_arrival = 0;
                        @endphp
                        @foreach ($paginate_cate as $list_arrival)
                            @php
                                $num_list_arrival++;
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link {{ $num_list_arrival == 1 ? 'show active' : '' }}" data-toggle="tab" href="#arivals_{{$list_arrival->id}}">{{$list_arrival->name}}</a>
                            </li>
                        @endforeach
                    </ul>     
                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    @php
                        $num_arrival = 0;
                    @endphp
                    @foreach ($paginate_cate as $tab_pro_arrival)
                        @php
                            $num_arrival++;
                        @endphp
                        <div id="arivals_{{$tab_pro_arrival->id}}" class="tab-pane fade {{ $num_arrival == 1 ? 'show active' : '' }} ">
                            <div class="row">
                                <div class="col-lg-5 order-2 order-lg-1">
                                    <div class="banner-site-box mt-10">
                                        @foreach($all_banner as $bn)
                                            <div class="col-img">
                                                @if($bn->position == "tab_content")
                                                <a href="{{ $bn->link }}"><img src="{{url('public/uploads')}}/{{$bn->image}}" data-thumb="{{url('public/uploads')}}/{{$bn->image}}" alt=""></a>
                                                @endif
                                            </div>
                                        @endforeach
                                        <!-- Single Product Start -->
                                        <div class="single-product mt-0">
                                            <!-- Product Image Start -->
                                            <a href="{{ route('client.shop') }}">
                                                <img src="{{url('public/client')}}/img/banner\sanphamtieubieu.png" style="width:100%;" alt="">
                                            </a>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">       
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                            <span class="sticker-new">Mới</span>
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                </div>
                                <div class="col-lg-7 order-1 order-lg-2">
                                    <!-- Arrivals Product Activation Start Here -->
                                    <div class="electronics-pro-active2 owl-carousel">
                                    @for ($nu_pro = 0; $nu_pro < $tab_pro_arrival->category_product->count(); $nu_pro++)
                                        @php    
                                            $single_pro_first = $tab_pro_arrival->category_product[$nu_pro];
                                            if(++$nu_pro < $tab_pro_arrival->category_product->count()){
                                                $single_pro_secound = $tab_pro_arrival->category_product[$nu_pro];
                                            }
                                        @endphp
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="{{ route('client.productDetail', $single_pro_first->slug)}}">
                                                        <img class="primary-img" src="{{url('public/uploads/'.$single_pro_first->image)}}" alt="single-product">
                                                        <img class="secondary-img" src="{{url('public/uploads/'.$single_pro_first->image)}}" alt="single-product">
                                                    </a>
                                                    <a href="#" class="quick_view" data-toggle="modal" data-target="{{$single_pro_first->id}}" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <div class="pro-info">
                                                        <h4><a href="{{ route('client.productDetail', $single_pro_first->slug)}}">{{$single_pro_first->name}}</a></h4>
                                                        @if ($single_pro_first->product_variantProduct->first()->price > $single_pro_first->product_variantProduct->first()->discount)
                                                            <p><span class="price">{{number_format($single_pro_first->product_variantProduct->first()->discount)}} <u>đ</u> </span><del class="prev-price">{{number_format($single_pro_first->product_variantProduct->first()->price) }}<u>đ</u></del></p>
                                                            <div class="label-product l_sale">{{ round((($single_pro_first->product_variantProduct->first()->price - $single_pro_first->product_variantProduct->first()->discount )/$single_pro_first->product_variantProduct->first()->price)*100,0)}}<span class="symbol-percent">%</span></div>    
                                                        @else
                                                            <p><span class="price">{{$single_pro_first->product_variantProduct->first()->price}} VNĐ</span></p>
                                                        @endif
                                                    </div>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="#" class="quick_view" data-toggle="modal" data-target="{{$single_pro_first->id}}" title="Thêm vào giỏ hàng"> + Thêm vào giỏ hàng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                                <span class="sticker-new">new</span>
                                            </div>
                                            <!-- Single Product End -->
                                            @if (isset($single_pro_secound))
                                                <!-- Single Product Start -->
                                                <div class="single-product">
                                                    <!-- Product Image Start -->
                                                    <div class="pro-img">
                                                        <a href="{{ route('client.productDetail', $single_pro_secound->slug)}}">
                                                            <img class="primary-img" src="{{url('public/uploads/'.$single_pro_secound->image)}}" alt="single-product">
                                                            <img class="secondary-img" src="{{url('public/uploads/'.$single_pro_secound->image)}}" alt="single-product">
                                                        </a>
                                                        <a href="#" class="quick_view" data-toggle="modal" data-target="{{$single_pro_secound->id}}" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                                    </div>
                                                    <!-- Product Image End -->
                                                    <!-- Product Content Start -->
                                                    <div class="pro-content">
                                                        <div class="pro-info">
                                                            <h4><a href="{{ route('client.productDetail', $single_pro_secound->slug)}}">{{$single_pro_secound->name}}</a></h4>
                                                            @if ($single_pro_secound->product_variantProduct->first()->price > $single_pro_secound->product_variantProduct->first()->discount)
                                                                <p><span class="price">{{number_format($single_pro_secound->product_variantProduct->first()->discount)}} <u>đ</u> </span><del class="prev-price">{{number_format($single_pro_secound->product_variantProduct->first()->price)}} <u>đ</u> </del></p>
                                                                <div class="label-product l_sale">{{ round((($single_pro_secound->product_variantProduct->first()->price - $single_pro_secound->product_variantProduct->first()->discount )/$single_pro_secound->product_variantProduct->first()->price)*100,0)}}<span class="symbol-percent">%</span></div>    
                                                            @else
                                                                <p><span class="price">{{$single_pro_secound->product_variantProduct->first()->price}} VNĐ</span></p>
                                                            @endif
                                                        </div>
                                                        <div class="pro-actions">
                                                            <div class="actions-primary">
                                                                <a href="#" class="quick_view" data-toggle="modal" data-target="{{$single_pro_secound->id}}" title="Thêm vào giỏ hàng">+ Thêm vào giỏ hàng</a>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                    <!-- Product Content End -->
                                                    <span class="sticker-new">Mới</span>
                                                </div>
                                                <!-- Single Product End -->
                                            @endif
                                        </div>
                                        <!-- Double Product End -->
                                    @endfor
                                    </div>
                                    <!-- Arrivals Product Activation End Here -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Arrivals Products Area Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-25">
                    <div class="section-ttitle">
                        <h2>Bán Chạy Nhất</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        @php
                            $num_bestSell = 0;
                        @endphp
                        @foreach ($paginate_cate as $best_cate)
                        @php
                            $num_bestSell++;
                            $active_bestSell = $num_bestSell == 1 ? 'active' : '';
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{ $active_bestSell }}" data-toggle="tab" href="#tab_{{$best_cate->id}}">{{ $best_cate->name }}</a>
                        </li>
                        @endforeach
                    </ul>                       

                </div> 

                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    @php
                        $num_tab_bestSell = 0;
                    @endphp
                    @foreach ($paginate_cate as $tab_best)
                        @php
                            $num_tab_bestSell++;
                            $tab_active_bestSell = $num_tab_bestSell == 1 ? 'show active' : '';
                        @endphp
                        <div id="tab_{{$tab_best->id}}" class="tab-pane fade {{$tab_active_bestSell}}">
                            <!-- Arrivals Product Activation Start Here -->
                            <div class="best-seller-pro-active owl-carousel">
                                @foreach ($tab_best->category_product as $best_pro)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{ route('client.productDetail', $best_pro->slug)}}">
                                                <img class="primary-img" src="{{url('public/uploads/'.$best_pro->image)}}" alt="single-product">
                                                <img class="secondary-img" src="{{url('public/uploads/'.$best_pro->image)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="{{$best_pro->id}}" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{ route('client.productDetail', $best_pro->slug)}}">{{ $best_pro->name }}</a></h4>
                                                <p><span class="price">{{ number_format($best_pro->product_variantProduct->first()->discount) }} <u>đ</u> </span> <del class="prev-price">{{number_format($best_pro->product_variantProduct->first()->price)}} <u>đ</u> </del></p>
                                                <div class="label-product l_sale">{{ round((($best_pro->product_variantProduct->first()->price - $best_pro->product_variantProduct->first()->discount )/$best_pro->product_variantProduct->first()->price)*100,0)}}<span class="symbol-percent">%</span></div>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="#" class="quick_view" data-toggle="modal" data-target="{{$best_pro->id}}" title="Thêm vào giỏ hàng">+ Thêm vào giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Arrivals Product Activation End Here -->
                        </div>
                    @endforeach
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Latest Blog Area Start Here -->
    <div class="blog-area ptb-95 off-white-bg ptb-sm-55">
        <div class="container">
            <div class="like-product-area"> 
                <h2 class="section-ttitle2 mb-30">Bài Viết Gần Đây</h2>
           <!-- Latest Blog Active Start Here -->
           <div class="latest-blog-active owl-carousel">
               {{-- get all blog active --}}
                @foreach ($modelcategoryblog as $category_blog)
                    @foreach ($category_blog->getblog as $blog)
                        <!-- Single Blog Start -->
                        <div class="single-latest-blog">
                            <div class="blog-img">
                                <a href="{{ route('client.blog_details', $blog->slug) }}"><img src="{{ url('public/uploads/') }}/{{$blog->image}}" alt="blog-image"></a>
                            </div>
                            <div class="blog-desc">
                                <h4><a href="{{ route('client.blog_details', $blog->slug) }}">{{$blog->title}}</a></h4>
                                <ul class="meta-box d-flex">
                                    <li><a href="#">{{ $blog->getauthor->name }}</a></li>
                                </ul>
                                <span style="overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: -webkit-box;
                                        -webkit-line-clamp: 4;
                                                line-clamp: 2; 
                                        -webkit-box-orient: vertical;">
                                    {!! $blog->content !!}    
                                </span>
                                <a class="readmore" href="{{ route('client.blog_details', $blog->slug) }}">Đọc Thêm</a>
                            </div>
                            <div class="blog-date">
                                <span>{{ $blog->created_at->format('d') }}</span>
                                Tháng {{ $blog->created_at->format('m') }}
                            </div>
                        </div>
                        <!-- Single Blog End -->
                    @endforeach
                @endforeach
           </div>
           <!-- Latest Blog Active End Here -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Latest Blog s Area End Here -->

    <!-- Brand Banner Area Start Here -->
    <div class="main-brand-banner pt-95 pb-100 pt-sm-55 pb-sm-60">
        <div class="container">
            <div class="section-ttitle mb-30">
                <h2>Thương Hiệu Nổi Tiếng</h2>
           </div>
            <div class="row no-gutters">
                <div class="col-lg-3">
                @foreach($all_banner as $bn)
                    <div class="col-img">
                        @if($bn->position == "hot_brand1")
                        <a href="{{ $bn->link }}">
                            <img src="{{url('public/uploads')}}/{{$bn->image}}" alt="">
                        </a>
                        @endif
                    </div>
                @endforeach
                </div>
                <div class="col-lg-6">
                    <!-- Brand Banner Start -->
                    <div class="brand-banner owl-carousel">
                        @foreach ($all_brand as $item_brand)
                            <div class="single-brand">
                                <a href="#"><img class="image" src="{{url('public/uploads').'/'.$item_brand->logo}}" alt="{{ $item_brand->name }}"></a>
                                <a href="#"><img src="{{url('public/uploads').'/'.$item_brand->logo}}" alt="{{ $item_brand->name }}"></a>
                                <a href="#"><img src="{{url('public/uploads').'/'.$item_brand->logo}}" alt="{{ $item_brand->name }}"></a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Brand Banner End -->                        

                </div>
                <div class="col-lg-3">
                @foreach($all_banner as $bn)
                    <div class="col-img">
                        @if($bn->position == "hot_brand2")
                            <a href="{{ $bn->link }}">
                                <img src="{{url('public/uploads')}}/{{$bn->image}}" alt="">
                            </a>
                        @endif
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Brand Banner Area End Here -->
    <div class="big-banner pb-100 pb-sm-60">
        <div class="container big-banner-box">
        @foreach($all_banner as $bn)
                    <div class="col-img">
                        @if($bn->position == "brand_banner1")
                        <a href="{{ $bn->link }}">
                            <img src="{{url('public/uploads')}}/{{$bn->image}}" style="width:99%" alt="">
                        </a>
                        @endif
                    </div>
                @endforeach
                @foreach($all_banner as $bn)
                    <div class="col-img">
                        @if($bn->position == "brand_banner2")
                        <a href="{{ $bn->link }}">
                            <img src="{{url('public/uploads')}}/{{$bn->image}}" style="width:99%" alt="">
                        </a>
                        @endif
                    </div>
                @endforeach
        </div>
        <!-- Container End -->
    </div>
    
@endsection

@section('css')
           <style>
         #list_category{
    display: block !important;
}
    
    </style>
@endsection

{{-- load js for index --}}
@section('js')
    <script>
        $(document).ready(function () {
            
        });
    </script>
@endsection
