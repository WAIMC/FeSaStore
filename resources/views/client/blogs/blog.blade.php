@extends('client.layouts.master')
@section('title','Bài viết')
@section('main')
<div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                        <li class="active"><a href="blog">Bài viết</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Blog Page Start Here -->
        <div class="blog ptb-100  ptb-sm-60">
            <div class="container"> 
                 @if (isset($blogs->getblog))
                <div class="main-blog">
                    <div class="row">
                        <!-- Single Blog Start -->
              
                        @foreach ($blogs->getblog as $blog)
                            <div class="col-lg-6 col-sm-12">
                           <div class="single-latest-blog">
                               <div class="blog-img">
                                   <a href="{{route('client.blog_details',$blog->slug)}}"><img src="{{url('public/uploads')}}/{{$blog->image}}" alt="{{$blog->name}}"></a>
                               </div>
                               <div class="blog-desc">
                                   <h4><a href="{{route('client.blog_details',$blog->slug)}}">{{$blog->title}}</a></h4>
                                    <ul class="meta-box d-flex">
                                        <li><a href="#">Bởi :{{$blog->getauthor->name}}</a></li>
                                    </ul>
                                    <p>{{$blog->description}}</p>
                                    <a class="readmore" href="{{route('client.blog_details',$blog->slug)}}">Đọc thêm</a>
                               </div>
                               <div class="blog-date">
                                    <span>{{$blog->created_at->format('d')}}</span>
                                 Tháng   {{$blog->created_at->format('m')}}
                                </div>
                           </div>
                        </div>  
                        @endforeach                    
                        <!-- Single Blog End -->
                    </div>
                    <!-- Row End -->
                    <div class="row">
                        {{-- <div class="col-sm-12">
                            {{$blogs->getblog->links('pa')}}
                                <div class="pro-pagination">
                                    <ul class="blog-pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>                                    
                                    <div class="product-pagination">
                                        <span class="grid-item-list">Hiển thị 1 đến 12 của 51 (5 Trang)</span>
                                    </div>
                                </div>
                                <!-- Product Pagination Info -->
                        </div> --}}
                    </div>
                    <!-- Row End -->
                </div>
                @else
                <div class="main-blog">
                    <div class="row">
                        <!-- Single Blog Start -->
              
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-sm-12">
                           <div class="single-latest-blog">
                               <div class="blog-img">
                                   <a href="{{route('client.blog_details',$blog->slug)}}"><img src="{{url('public/uploads')}}/{{$blog->image}}" alt="{{$blog->name}}"></a>
                               </div>
                               <div class="blog-desc">
                                   <h4><a href="{{route('client.blog_details',$blog->slug)}}">{{$blog->title}}</a></h4>
                                    <ul class="meta-box d-flex">
                                        <li><a href="#">Bởi :{{$blog->getauthor->name}}</a></li>
                                    </ul>
                                    <p>{{$blog->description}}</p>
                                    <a class="readmore" href="{{route('client.blog_details',$blog->slug)}}">Đọc thêm</a>
                               </div>
                               <div class="blog-date">
                                    <span>{{$blog->created_at->format('d')}}</span>
                                 Tháng   {{$blog->created_at->format('m')}}
                                </div>
                           </div>
                        </div>  
                        @endforeach                    
                        <!-- Single Blog End -->
                    </div>
                    <!-- Row End -->
                    <div class="row">
                        <div class="col-sm-12">
                                {{-- <div class="pro-pagination">
                                    <ul class="blog-pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>                                    
                                    <div class="product-pagination">
                                        <span class="grid-item-list">Hiển thị 1 đến 12 của 51 (5 Trang)</span>
                                    </div>
                                </div> --}}
                                {{$blogs->links('pagination.default')}}
                                <!-- Product Pagination Info -->
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                @endif
            </div>
            <!-- Container End -->
        </div>
        <!-- Blog Page End Here -->
      
@endsection