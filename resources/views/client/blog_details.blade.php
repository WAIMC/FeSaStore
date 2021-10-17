@extends('master_layout')
@section('content')
<div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="blog.html">Nhật kí</a></li>
                        <li class="active"><a href="single-blog.html">Nhật kí đơn</a></li>
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
                                <h3 class="sidebar-title">bài viết mới nhất</h3>
                                <ul class="sidbar-style">
                                    <li><a href="shop.html">máy ảnh</a></li>
                                    <li><a href="shop.html">tay cầm chơi game</a></li>
                                    <li><a href="shop.html">máy ảnh kĩ thuật số</a></li>
                                    <li><a href="shop.html">virtual reality</a></li>
                                </ul>
                            </div>
                            <div class="col-img mb-30">
                                <a href="shop.html"><img src="{{url('public')}}/frontend/img\banner\banner-sidebar.jpg" alt="slider-banner"></a>
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
                                <img src="{{url('public')}}/frontend/img\blog\10.jpg" alt="single-blog-img">
                            </div>
                            <div class="sidebar-post-content">
                                <h3 class="sidebar-lg-title">Đây là bài thứ hai cho XipBlog</h3>
                                <ul class="post-meta d-sm-inline-flex">
                                    <li><span>Đã đăng</span> bởi Demo Posthemes</li>
                                    <li><span> Ngày 27 tháng 4 năm 2018</span></li>
                                </ul>
                            </div>
                            <div class="sidebar-desc mb-50">
                                <p>Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn. Vì mục đích sắp tới, ai trong chúng ta, thực hiện bất kỳ loại công việc nào, ngoại trừ việc lợi dụng các mục tiêu của hậu quả. Cơn đau trong đại diện đã hồi phục. Bản thân nỗi đau là rất nhiều nỗi đau, là quá trình lặp đi lặp lại chính, nhưng tôi cho nó thời gian để cắt giảm nó để một số nỗi đau lớn và đau đớn. Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn. Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn. Vì mục đích sắp tới, ai trong chúng ta, thực hiện bất kỳ loại công việc nào, ngoại trừ việc lợi dụng các mục tiêu của hậu quả. Cơn đau trong đại diện đã hồi phục. Bản thân nỗi đau là rất nhiều nỗi đau, là quá trình lặp đi lặp lại chính, nhưng tôi cho nó thời gian để cắt giảm nó để một số nỗi đau lớn và đau đớn. Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn. Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn.</p>
                                <blockquote class="mtb-30"> <p>Mặt khác, chúng ta tố cáo với lòng căm phẫn chính đáng và không thích những người đàn ông bị bùa ngải dụ dỗ và làm mất tinh thần với sự phẫn nộ và chán ghét chính đáng.</p><span>Christine Rios</span></blockquote>
                                <p>Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn. Vì mục đích sắp tới, ai trong chúng ta, thực hiện bất kỳ loại công việc nào, ngoại trừ việc lợi dụng các mục tiêu của hậu quả. Cơn đau trong đại diện đã hồi phục. Bản thân nỗi đau là rất nhiều nỗi đau, là quá trình lặp đi lặp lại chính, nhưng tôi cho nó thời gian để cắt giảm một số nỗi đau lớn. Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn. Bản thân nỗi đau là quan trọng, nó là quá trình lặp đi lặp lại chính, tôi cho loại thời gian này để cắt giảm một số nỗi đau và nỗi đau lớn. Vì mục đích sắp tới, ai trong chúng ta, thực hiện bất kỳ loại công việc nào, ngoại trừ việc lợi dụng các mục tiêu của hậu quả. Cơn đau trong đại diện đã hồi phục. Nỗi đau tự nó là gợi cảm.</p>
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
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Giá trị lớn</h6>
                            <span>Bây giờ đó là trước khi trái đất được nói trong cổ họng của bất kỳ người đàn ông cần.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Giao hàng trên toàn thế giới</h6>
                            <span>Đối với mỗi bộ tuyên truyền</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Thanh toán an toàn</h6>
                            <span>Bộ phim có rất nhiều niềm vui, nhưng rất nhiều tầng lớp trái đất.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Sự tự tin mua sắm</h6>
                            <span>Cổ họng được cho là làm tăng nhu cầu sợ hãi. Bộ phim rất thú vị, nhưng</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Trung tâm trợ giúp 24/7</h6>
                            <span>Đối với mỗi người nằm xuống ngọn lửa, không ở sân sau của Thiền.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
@endsection