<div class="col-lg-3">
    <div class="list-group mb-3">
        <a href="{{ route('client.account.index') }}" class="list-group-item list-group-item-action "> <i
                class="fa fa-user"></i> Thông tin
            tài khoản </a>
        <a href="{{ route('client.account.order') }}" class="list-group-item list-group-item-action "> <i
                class="fa fa-shopping-cart" aria-hidden="true"></i> Quản lý đơn hàng</a>
        <a href="{{route('client.account.address')}}" class="list-group-item list-group-item-action"> <i class="fa fa-map-marker" aria-hidden="true"></i>
            Cập nhật địa chỉ</a>
            <a href="{{route('client.account.changepass')}}" class="list-group-item list-group-item-action"><i class="fa fa-key"></i>
                Đổi mật khẩu</a>
    </div>
</div>
