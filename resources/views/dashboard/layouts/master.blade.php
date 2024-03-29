
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> FeSa Store | @yield('title')</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  {{-- load icon logo shortcut --}}
  <link rel="shortcut icon" href="{{ url('public/dashboard') }}/dist/img/logo_admin.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/dashboard') }}/dist/css/adminlte.min.css">
  {{-- summernote --}}
  <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {{-- css master layout --}}
  @yield('css')
  <style> 
  .table td, .table th {
    vertical-align: middle !important;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{-- start include header --}}
        @include('dashboard.partials.header')
    {{-- end include header --}}
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- start include aside --}}
        @include('dashboard.partials.aside')
    {{-- end include header --}}
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
              <li class="breadcrumb-item"><a href="#">@yield('directory')</a></li>
              <li class="breadcrumb-item active">@yield('action')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
       @include('dashboard.partials.message')
        <div class="row">
          <div class="col-12">


            {{-- start main --}}
                @yield('main')
            {{-- end main --}}


          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    {{-- start include header --}}
        @include('dashboard.partials.footer')
    {{-- end include header --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<!-- DataTables -->
<script src="{{ url('public/dashboard') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('public/dashboard') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('public/dashboard') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('public/dashboard') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/dashboard') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/dashboard') }}/dist/js/demo.js"></script>
<script src="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script>
{{-- js master layout --}}
@yield('js')

</body>
</html>
