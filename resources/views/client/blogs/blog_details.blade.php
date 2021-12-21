@extends('client.layouts.master')
@section('title',$blog->title)
@section('main')
<div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{route('client.index')}}">Trang chủ</a></li>
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
                                    @foreach ($modelcategoryblog as $item)
                                        <li><a href="{{route('client.cateblog',$item->slug)}}">{{$item->name}}</a></li>
                                    @endforeach
                                    
                                  
                                </ul>
                            </div>
                            <div class="col-img mb-30">
                                <a href="#"><img src="{{url('public/client')}}/img/banner\banner-sidebar.jpg" alt="slider-banner"></a>
                            </div>
                            <div class="single-sidebar mb-30">
                                 {{-- <h3 class="sidebar-title">Bài việt mới nhất</h3>
                                 <ul class="sidbar-style">
                                     @foreach ($blogs as $item)
                                         <li><a href="login.html">{{$item->name}}</a></li> 
                                     @endforeach --}}
                                    
                                    
                                 </ul>
                            </div>
                            {{-- <div class="tags">
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
                            </div> --}}
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
                                @if(isset(Auth::guard('cus')->user()->id))
                                <form>
                                    @csrf
                                    <input type="hidden" name="slug" value="{{$blog->slug}}">
                                    <input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}">
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <div class="form-group">
                                            <label for="comment">Bình luận:</label>
                                            <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
                                        </div>
                                        <div class="sbumit-reveiew">
                                         <button type="submit" id="post_blog_details" class="customer-btn">Gửi Bình Luận</button>
                                        </div>
                                    </form>
                                @else
                                <p style="color:red;">Vui lòng đăng nhập để bình luận</p>
                                @endif
                                </div><br>

                                <div class="review border-default universal-padding" id="comment_blogdetail" >
                                @if($data_commentblog && $data_commentblog->count() > 0)
                                @foreach($data_commentblog as $commentblog)
                                <div class="row iconcustomer">
                                            <div class="col-1">
                                                <img src="{{url('public/client')}}/img/icon/iconcustomer.jpg" alt="" style="width:150%">
                                            </div>
                                            <div class="col-11">
                                                <p class="review-mini-title-comment">{{$commentblog->cus->name}} <span class="time"> bình luận vào lúc {{ date('H:i d-m-Y ',strtotime($commentblog->created_at))}}</span></p> 
                                                <p>{{$commentblog->comment}}</p>
                                            </div>
                                        </div>
                                @endforeach
                                @else
                                    <h4>Chưa có bình luận cho bài viết này !</h4>
                                @endif
                                </div>

                           

                                <!-- @if(isset(Auth::guard('cus')->user()->id))
                                <form action="{{route('client.blog_details',$blog->slug)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{$blog->slug}}">
                                    <input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}">
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <div class="form-group">
                                            <label for="comment">Bình luận:</label>
                                            <textarea class="form-control" name=comment rows="5" id="comment"></textarea>
                                        </div>
                                        <div class="sbumit-reveiew">
                                         <button type="submit" class="customer-btn">Gửi Bình Luận</button>
                                        </div>
                                    </form>
                                @else
                                <p>Vui lòng đăng nhập để bình luận</p>
                                @endif
                                </div> -->
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


{{-- load js for index --}}
@section('js')
   
    <script>
        // Gửi bình luận bài viết bằng ajax

        $('#post_blog_details').click(function(e) {
            e.preventDefault();
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          var slug = $("input[name=slug]").val();
          var customer_id = $("input[name=customer_id]").val();
          var blog_id = $("input[name=blog_id]").val();
          var comment = $("textarea[name=comment]").val();
          console.log(slug);
          console.log(customer_id);
          console.log(blog_id);
          console.log(comment);
            $.ajax({
                type: 'post',
                url:  '{{url('')}}/blog-details/'+$("input[name=slug]").val(),
                data: {
                     slug : $("input[name=slug]").val(),
                     customer_id : $("input[name=customer_id]").val(),
                     blog_id : $("input[name=blog_id]").val(),
                     comment : $("textarea[name=comment]").val()
                },
                success: function(response) {
                    alertify.success('Đã gửi bình luận');
                    console.log(response);
                    $('#comment_blogdetail').empty();
                    $('#comment_blogdetail').html(response);
                    $('#comment').val('');
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        });

    </script>
@endsection
