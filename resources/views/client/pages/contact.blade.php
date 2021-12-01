@extends('client.layouts.master')
@section('title','Liên hệ')
@section('main')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
                <li class="active"><a href="{{ route('client.contact') }}">Liên Hệ</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Contact Email Area Start -->
<div class="contact-area ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-20">ĐỂ LẠI LỜI NHẮN</h3>
                <form id="contact-form" class="contact-form" action="" method="post">
                    @csrf
                    <div class="address-wrapper row">
                        <div class="col-md-12">
                            <div class="address-email">
                                <label for="">Tên của bạn: </label>
                                <input class="form-control" type="text"  name="name" placeholder="..." required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="address-web">
                                <label for="">Địa chỉ email: </label>
                                <input class="form-control" type="text" name="email" placeholder="..." required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="address-textarea">
                                <label for="">Nội dung liên hệ: </label>
                                <textarea name="content" class="form-control" placeholder="..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <p class="form-message">
                    <div class="footer-content mail-content clearfix">
                        <div class="send-email float-md-right">
                            <input value="Gửi" class="return-customer-btn" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <h3 class="mb-20">THÔNG TIN LIÊN HỆ</h3>
                    <p class="style-contact">FESA Store muốn lắng nghe những góp ý của bạn về dịch vụ khách hàng, sản phẩm hoặc bất kỳ chia sẻ nào. Những góp ý của bạn luôn được đánh giá cao.</p>
                    <p class="style-contact"><i class="fa fa-home"></i> Địa chỉ: 137 Nguyễn Thị Thập – Phường Hòa Minh – TP Đà Nẵng</p>
                    <p class="style-contact"><i class="fa fa-phone"></i> Hotline: 1800.6879</p>
                    <p class="style-contact"><i class="fa fa-envelope"></i> Email: fesastorefpoly@gmail.com</p>
                    <p class="style-contact"><i class="fa fa-clock-o"></i> Thời gian: 8:00-17:30 từ thứ 2 đến thứ 7</p>
                    <br>
                <h3 class="mb-20">GÓP Ý, KHIẾU NẠI</h3>
                    <p class="style-contact">Chúng tôi thực lòng mong muốn lắng nghe những góp ý từ Bạn. Đừng ngần ngại liên hệ và hãy theo dõi với chúng tôi qua những kênh sau đây:</p>
                    <p class="style-contact"><i class="fa fa-facebook" aria-hidden="true"></i> Fanpage: facebook.com/FESAStore </p>
                    <p class="style-contact"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram: Instagram.com/FESAStore</p>
                    <p class="style-contact"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter: Twitter.com/FESAStore</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact Email Area End -->
<!-- Google Map Start -->
<div class="goole-map pb-50">
    <div id="map" style="height:400px">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8025459042856!2d108.1677603148079!3d16.075732988876894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218e6e72e66f5%3A0x46619a0e2d55370a!2zMTM3IE5ndXnhu4VuIFRo4buLIFRo4bqtcCwgVGhhbmggS2jDqiBUw6J5LCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1636890877959!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!-- Google Map End -->
<!-- Support Area Start Here -->
@endsection