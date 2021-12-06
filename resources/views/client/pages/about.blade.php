@extends('client.layouts.master')
@section('title','Gới thiêuj')
@section('main')

<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('client.index')}}">Trang chủ </a></li>
                <li class="active"><a href="#">Giới thiệu</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- About Us Start Here -->
<div class="about-us pt-100 pt-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="sidebar-img mb-all-30">
                    <img src="{{url('public/client')}}/img/about\about.png" alt="single-blog-img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-desc">
                    <h3 class="mb-10 about-title">ĐÔI NÉT VỀ FESA STORE</h3>
                    <p class="mb-20 about">Những năm gần đây, FESA Store phát triển nhanh chóng và trở thành một trong những shop thời trang quốc tế được yêu thích bởi các thiết kế tinh tế, mang tính ứng dụng cao. Trong sản xuất, FESA Store luôn bắt đầu từ việc phát triển chất liệu. Chúng tôi tin rằng chất liệu vải là yếu tố quan trọng nhất, quyết định chất lượng của một sản phẩm. FESA Store cam kết sử dụng những chất liệu tốt nhất đã được kiểm tra kỹ lưỡng về chất lượng và độ an toàn cho người sử dụng.</p>
                    <p class="mb-20 about">Cam kết cung cấp hàng chính hãng với chính sách hoàn tiền 111% nếu phát hiện hàng giả, hàng nhái.
                    </p>
                    <p class="about">FESA Store luôn lấy khách hàng làm trọng tâm phát triển. Tại công ty của chúng tôi, thời trang không chỉ đơn thuần là thiết kế, phát triển sản phẩm và quảng bá thị trường. Chúng tôi tin rằng có thể đem đến cho khách hàng những sản phẩm thời trang tinh xảo với giá cả hợp lý nhất chính là mang lại niềm vui cho khách hàng và làm cho cuộc sống của họ đẹp hơn mỗi ngày.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- About Us End Here -->
<!-- About Us Team Start Here -->
<div class="about-team pt-100 pt-sm-60">
    <div class="container">
        <h3 class="mb-30 about-title">MUA HÀNG TẠI FESA STORE</h3>
        <div class="row text-center">
            <!-- Single Team Start Here -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single-team mb-all-30">
                    <div class="team-img sidebar-img">
                        <img src="{{url('public/client')}}/img/about\tantinh.png" alt="team-image">
                        <div class="team-link">
                            <ul>
                            <li>
                                    <div class="team-info">
                                     <h4>TẬN TÌNH</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>Phục vụ tận tình</h4>
                        <p>Khách hàng sẽ được tư vấn và phục vụ tận tình khi sản phẩm của chúng tôi</p>
                    </div>
                </div>
            </div>
            <!-- Single Team End Here -->
            <!-- Single Team Start Here -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single-team mb-all-30">
                    <div class="team-img sidebar-img">
                        <img src="{{url('public/client')}}/img/about\dadang.png" alt="team-image">
                        <div class="team-link">
                            <ul>
                                <li>
                                    <div class="team-info">
                                     <h4>ĐA DẠNG</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>Mẫu mã đa dạng</h4>
                        <p>Luôn nắm bắt những cơ hội và xu hướng thời trang trên thị trường một cách liên tục</p>
                    </div>
                </div>
            </div>
            <!-- Single Team End Here -->
            <!-- Single Team Start Here -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single-team mb-xxs-30">
                    <div class="team-img sidebar-img">
                        <img src="{{url('public/client')}}/img/about\khuyenmai.png" alt="team-image">
                        <div class="team-link">
                            <ul>
                            <li>
                                    <div class="team-info">
                                     <h4>KHUYẾN MÃI</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>Khuyến mãi cực sốc</h4>
                        <p>Các chương trình săn voucher, sale với giá cực sốc và tặng quà diễn ra thường xuyên</p>
                    </div>
                </div>
            </div>
            <!-- Single Team End Here -->
            <!-- Single Team Start Here -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single-team">
                    <div class="team-img sidebar-img">
                        <img src="{{url('public/client')}}/img/about\uytin.png" alt="team-image">
                        <div class="team-link">
                            <ul>
                            <li>
                                    <div class="team-info">
                                     <h4>UY TÍN</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>Đảm bảo uy tín</h4>
                        <p>Cam kết cung cấp hàng chính hãng và hoàn tiền 111% nếu phát hiện hàng giả, hàng nhái.</p>
                    </div>
                </div>
            </div>
            <!-- Single Team End Here -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- About Us Team End Here -->
<!-- About Us Skills Start Here -->
<div class="about-skill ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="about-title mb-20">Đến với chúng tôi</h3>
                <div class="skill-progress mb-all-40">
                    <div class="progress">
                        <div class="skill-title">Sở hữu ngay những mẫu quần áo cực chất</div>
                        <div class="progress-bar wow fadeInLeft" data-wow-delay="0.2s" role="progressbar" style="width: 79%; visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        </div>
                    </div>
                    <div class="progress">
                        <div class="skill-title">Thái độ phục vụ tận tâm & tận tình</div>
                        <div class="progress-bar wow fadeInLeft" data-wow-delay="0.3s" role="progressbar" style="width: 96%; visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                        </div>
                    </div>
                    <div class="progress">
                        <div class="skill-title">Sản phẩm chất lượng - giá thành rẻ</div>
                        <div class="progress-bar wow fadeInLeft" data-wow-delay="0.4s" role="progressbar" style="width: 65%; visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        </div>
                    </div>
                    <div class="progress">
                        <div class="skill-title">Các chương trình khuyến mãi ngập tràn</div>
                        <div class="progress-bar wow fadeInLeft" data-wow-delay="0.5s" role="progressbar" style="width: 75%; visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                        </div>
                    </div>
                    <div class="progress">
                        <div class="skill-title">Cơ hội nhận được quà tặng hấp dẫn</div>
                        <div class="progress-bar wow fadeInLeft" data-wow-delay="0.6s" role="progressbar" style="width: 89%; visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ht-single-about">
                    <h3 class="about-title mb-20">Chính sách ưu đãi</h3>
                    <div class="ht-about-work">
                        <span>1</span>
                        <div class="ht-work-text">
                            <h5><a href="#">Miễn phí giao hàng</a></h5>
                            <p>FREESHIP các đơn hàng từ 300.000 VND. Giao hàng toàn quốc.</p>
                        </div>
                    </div>
                    <div class="ht-about-work">
                        <span>2</span>
                        <div class="ht-work-text">
                            <h5><a href="#">Hotline mua hàng</a></h5>
                            <p>Đường dây nóng 0909009009 hoặc email fesastorefpoly@gmail.com</p>
                        </div>
                    </div>
                    <div class="ht-about-work">
                        <span>3</span>
                        <div class="ht-work-text">
                            <h5><a href="#">Thanh toán an toàn</a></h5>
                            <p>Thanh toán linh hoạt: Tiền mặt, Chuyển khoản, Thẻ Visa,...</p>
                        </div>
                    </div>
                    <div class="ht-about-work">
                        <span>4</span>
                        <div class="ht-work-text">
                            <h5><a href="#">Miễn phí đổi/trả hàng 30 ngày</a></h5>
                            <p>Đổi/trả hàng 30 ngày. Khách hàng an tâm khi mua sắm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- About Us Skills End Here -->


@endsection