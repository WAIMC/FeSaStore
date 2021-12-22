<!-- Footer Area Start Here -->
<footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">    
    <!-- Footer Top Start -->
     <div class="footer-top">
        <div class="container">
            <!-- Signup Newsletter Start -->
            <div class="row mb-60">
                 <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                    <div class="news-desc text-center mb-30">
                         <h3>Đăng ký bản tin</h3>
                         <p>Hãy là người đầu tiên biết. Đăng ký nhận bản tin ngay hôm nay</p>
                     </div>
                     <div class="newsletter-box">
                         <form action="#">
                              <input class="subscribe" placeholder="Địa Chỉ Email Của Bạn..." name="email" id="subscribe" type="text">
                              <button type="submit" class="submit">Đăng Ký!</button>
                         </form>
                     </div>
                 </div>
            </div> 
            <!-- Signup-Newsletter End -->                   
            <div class="row">
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title"><span style="font-size:30px;">FASA STORE</span></h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                            <li><a href="contact.html">Thương hiệu thời trang FESA Store đã trở thành một trong những hệ thống kinh doanh uy tín, được đông đảo giới trẻ Đà Nẵng yêu thích và lựa chọn</a></li>
                                <div class="footer-line"></div>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                        <li><i class="lnr lnr-map-marker"></i> 137 Nguyễn Thị Thập - Đà Nẵng</li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#"> fesastorefpoly@gmail.com</a></li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i>  (+84) 0909009009
                                        </li>
                                    </ul>                              
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Chính sách khách hàng</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="contact.html">Chính sách bảo mật</a></li>
                                <li><a href="#">Ưu đãi khách hàng thân thiết</a></li>
                                <li><a href="#">Chính sách bảo hành</a></li>
                                <li><a href="wishlist.html">Chính sách giao nhận</a></li>
                                <li><a href="#">Chính sách đổi trả sản phẩm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Hỗ trợ khách hàng</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="contact.html">Hướng dẫn mua hàng</a></li>
                                <li><a href="#">Tra cứu bảo hành</a></li>
                                <li><a href="#">Quy định về phiếu quà tặng</a></li>
                                <li><a href="#">Điều khoản sử dụng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Theo dõi Fanpage</h3>
                        <div class="footer-content">
                        <div class="fb-page" data-href="https://www.facebook.com/FesaStoreDaNang/" data-tabs="time" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/FesaStoreDaNang/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FesaStoreDaNang/">Fesa Store</a></blockquote></div>
                         
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Top End -->
    <!-- Footer Middle Start -->
    <div class="footer-middle text-center">
        <div class="container">
            <div class="footer-middle-content pt-20 pb-30">
                    <ul class="social-footer">
                        @foreach($settinglink_repo as $item)
                        <li><a href="{{$item->config_value}}"><i class="{{$item->icon}}"></i></a></li>
                        @endforeach
                    </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Middle End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom pb-30">
        <div class="container">

             <div class="copyright-text text-center">                    
                <p>Bản Quyền © 2021 <a target="_blank" href="#">FeSa Shop</a> Đã đăng ký Bản quyền..</p>
             </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Bottom End -->
</footer>
<!-- Footer Area End Here -->