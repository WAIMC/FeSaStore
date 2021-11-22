{{-- start aside --}}
  
  

  <?php
    $menus = Config('menu');
  ?>
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="{{ url('public/dashboard') }}/dist/img/logo_admin.png"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">FeSa Shop</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('public/dashboard') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::guard('adminAuth')->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @foreach ($menus as $menu)
          @if (Auth::guard('adminAuth')->user()->can($menu['route']))
            <li class="nav-item has-treeview">
              <a href="{{ route($menu['route']) }}" class="nav-link">
                <i class="nav-icon fas {{ $menu['icon'] }}"></i>
                <p>
                  {{ $menu['label'] }}
                  @if (isset($menu['items']))
                      <i class="fas fa-angle-left right"></i>
                  @endif
                </p>
              </a>
              @if (isset($menu['items']))
                <ul class="nav nav-treeview">
                  @foreach ($menu['items'] as $menu_item)
                    @if (Auth::guard('adminAuth')->user()->can($menu_item['route']))
                      <li class="nav-item">
                        <a href="{{ route($menu_item['route']) }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>{{ $menu_item['label'] }}</p>
                        </a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              @endif
            </li>
          @endif
        @endforeach
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
{{-- end aside --}}