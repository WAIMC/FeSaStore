@extends('client.layouts.master')
@section('title','Liên hệ')
@section('main')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Contact Email Area Start -->
<div class="contact-area ptb-100 ptb-sm-60">
    <div class="container">
        <h3 class="mb-20">Liên hệ</h3>
        <p class="text-capitalize mb-20">Mọi góp ý của khách hàng nhằm đem đến cho chúng tôi cải thiện chất lượng tốt hơn. Vui lòng điền đầy đủ thông tin bên dưới: </p>
        <form id="contact-form" class="contact-form" action="" method="post">
            @csrf
            <div class="address-wrapper row">
                <div class="col-md-6">
                    <div class="address-email">
                        <input class="form-control" type="text"  name="name" placeholder="Họ và tên ..." required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="address-web">
                        <input class="form-control" type="text" name="email" placeholder="Email ..." required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="address-textarea">
                        <textarea name="content" class="form-control" placeholder="Nội dung góp ý ..." required></textarea>
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
</div>
<!-- Contact Email Area End -->
<!-- Google Map Start -->
<div class="goole-map">
    <div id="map" style="height:400px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d996055.8616275564!2d107.67927259742174!3d12.788687412967574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f7daf7307157%3A0x8ef97694d9883315!2zxJDhuq9rIEzhuq9rLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1633511906759!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!-- Google Map End -->

@endsection