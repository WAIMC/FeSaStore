<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FeSa Shop | @yield('title')</title>

    {{-- load css --}}
    @yield('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ url('public/dashboard') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <h1>@yield('title')</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Đã Xảy Ra Lỗi</a></li>
                  <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
  
        {{-- start main error --}}

            @yield('main')

        {{-- end main error --}}
  
      </div>
      <!-- /.wrapper -->

    <!-- jQuery -->
    <script src="{{ url('public/dashboard') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public/dashboard') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('public/dashboard') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('public/dashboard') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- jQuery Knob -->
    <script src="{{ url('public/dashboard') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ url('public/dashboard') }}/plugins/sparklines/sparkline.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public/dashboard') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('public/dashboard') }}/dist/js/demo.js"></script>
    {{-- load css --}}
    @yield('js')
</body>

</html>