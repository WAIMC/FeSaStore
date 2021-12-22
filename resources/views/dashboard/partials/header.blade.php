{{-- start header --}}
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('admin.index') }}" class="nav-link">Trang Chủ</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    {{-- Infomation Admin Dropdown Menu  --}}
    <li class="nav-item dropdown user-menu show">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <img src="{{ url('public/dashboard')}}/dist/img/Admin.jpg" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">{{ Auth::guard('adminAuth')->user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right hide" style="left: inherit; right: 0px;">
        <!-- User image -->
        <li class="user-header bg-gradient-primary">
          <img src="{{ url('public/dashboard')}}/dist/img/Admin.jpg" class="img-circle elevation-2" alt="User Image">

          <p>
            {{ Auth::guard('adminAuth')->user()->name }} - Back End Web Developer
            <small>Quản trị viên. 2021</small>
          </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
          <div class="row">
            <div class="col-4 text-center">
              <a href="#">Theo Dõi</a>
            </div>
            <div class="col-4 text-center">
              <a href="#">Sales</a>
            </div>
            <div class="col-4 text-center">
              <a href="#">Bạn Bè</a>
            </div>
          </div>
          <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="#" class="btn btn-default btn-flat">Thông Tin</a>
          <a href="#" class="btn btn-default btn-flat float-right" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();" >Đăng Xuất</a>
          <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>
        </li>
      </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
{{-- end header --}}