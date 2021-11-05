@extends('client.layouts.master')
@section('title',$blog->title)
@section('main')
<div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="{{route('client.blog')}}">Bài viết</a></li>
                        <li class="active"><a href="{{route('client.blog_details',$blog->slug)}}">{{$blog->title}}</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Single Blog Page Start Here -->
        <div class="single-blog ptb-100  ptb-sm-60">
            <div class="container">
                <div class="row">
                    <!-- Single Blog Sidebar Start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside>
                            <div class="single-sidebar latest-pro mb-30">
                                <h3 class="sidebar-title">Danh mục bài viết</h3>
                                <ul class="sidbar-style">
                                    @foreach ($categoryblog as $item)
                                        <li><a href="{{route('client.cateblog',$item->slug)}}">{{$item->name}}</a></li>
                                    @endforeach
                                    
                                  
                                </ul>
                            </div>
                            <div class="col-img mb-30">
                                <a href="#"><img src="{{url('public/client')}}/img/banner\banner-sidebar.jpg" alt="slider-banner"></a>
                            </div>
                            <div class="single-sidebar mb-30">
                                 <h3 class="sidebar-title">khác</h3>
                                 <ul class="sidbar-style">
                                     <li><a href="login.html">Đăng nhập</a></li>
                                     <li><a href="#">Mục <abbr title="Really Simple Syndication">RSS</abbr></a></li>
                                     <li><a href="#">Bình luận <abbr title="Really Simple Syndication">RSS</abbr></a></li>
                                     <li><a href="#">Liên kết khác</a></li>
                                 </ul>
                            </div>
                            <div class="tags">
                                 <h3 class="sidebar-title">Thẻ</h3>
                                 <div class="sidbar-style">
                                    <ul class="tag-list">
                                        <li><a href="#">Xây dựng thương hiệu</a></li>
                                        <li><a href="#">Sáng tạo</a></li>
                                        <li><a href="#">thiết kế</a></li>
                                        <li><a href="#">Muộn nhất</a></li>
                                        <li><a href="#">Nam giới</a></li>
                                        <li><a href="#">Nữ giới</a></li>
                                    </ul>
                                 </div>
                            </div>
                        </aside>
                    </div>
                    <!-- Single Blog Sidebar End -->
                    <!-- Single Blog Sidebar Description Start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="single-sidebar-desc mb-all-40">
                            <div class="sidebar-img">
                                <img src="{{url('public/uploads')}}/{{$blog->image}}" alt="{{$blog->name}}">
                            </div>
                            <div class="sidebar-post-content">
                                <h3 class="sidebar-lg-title">{{$blog->title}}</h3>
                                <ul class="post-meta d-sm-inline-flex">
                                    <li><span>Đã đăng</span> bởi {{$blog->getauthor->name}}</li>
                                    <li><span> {{$blog->created_at->format('d/m/Y')}}</span></li>
                                </ul>
                            </div>
                            <div class="sidebar-desc mb-50">
                               {!!$blog->content!!}
                            </div>
                            <!-- Contact Email Area Start -->
                            <div class="blog-detail-contact">
                                <h3 class="mb-15 leave-reply">Để lại một câu trả lời</h3>
                                <div class="submit-review">
                                    <form>
                                        <div class="form-group">
                                            <label for="usr">Tên của bạn:</label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Email cảu bạn là:</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="web-address">Url trang web:</label>
                                            <input type="text" class="form-control" id="web-address">
                                        </div>
                                        <div class="form-group">
                                            <label for="sub">Chủ thể:</label>
                                            <input type="text" class="form-control" id="sub">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Bình luận:</label>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                        </div>
                                        <div class="sbumit-reveiew">
                                            <input value="Submit" class="return-customer-btn" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Contact Email Area End -->
                        </div>
                    </div>
                    <!-- Single Blog Sidebar Description End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Single Blog Page End Here -->
        <!-- Support Area Start Here -->
   
@endsection