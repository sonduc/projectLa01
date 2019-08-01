<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>PROJECT LARAVEL01</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <link href="{{ asset('admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">  
  <link href="{{ asset('admin_assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
  
  <link href="{{ asset('admin_assets/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">  
  <link href="{{ asset('admin_assets/dist/css/AdminLTE.min.css') }}" rel="stylesheet">  
  <link href="{{ asset('admin_assets/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">  
  {{-- <link href="{{ asset('admin_assets/bower_components/morris.js/morris.css') }}" rel="stylesheet">   --}}
  <link href="{{ asset('admin_assets/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">  

  <link href="{{ asset('admin_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">  

  <link href="{{ asset('admin_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">  

  <link href="{{ asset('admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

  <link href="{{ asset('admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <span class="logo-lg"><b>Laravel</b>09</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
              </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="https://scontent.fhan2-2.fna.fbcdn.net/v/t1.0-9/28166688_2010624415828949_3893650251895676790_n.jpg?_nc_cat=0&oh=8b71d7c6f6f81785add09ebcef6b8ef7&oe=5B6C8CC3" class="user-image" alt="User Image">
                <span class="hidden-xs">hợ hợ hợ</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="{{ route('logout.get') }}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://scontent.fhan2-2.fna.fbcdn.net/v/t1.0-9/28166688_2010624415828949_3893650251895676790_n.jpg?_nc_cat=0&oh=8b71d7c6f6f81785add09ebcef6b8ef7&oe=5B6C8CC3" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>lalala</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">ADMIN</li>

          <li>
            <a href="{{ route('category.index') }}">
              <i class="fa fa-th"></i> <span>Category</span>
            </a>
          </li>

          <li>
            <a href="{{ route('kind.index') }}">
              <i class="fa fa-book"></i> <span>Kind</span>
            </a>
          </li>

          <li>
            <a href="{{ route('post.index') }}">
              <i class="fa fa-edit"></i> <span>Post</span>
            </a>
          </li>
          <li>
            <a href="{{ route('slide.index') }}">
              <i class="fa fa-glide"></i> <span>Slide</span>
            </a>
          </li>
          <li>
            <a href="{{ route('user.index') }}">
              <i class="fa fa-user"></i> <span>User</span>
            </a>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content_index')
    </div>


    <!-- jQuery 3 -->

    <script src="{{ url('admin_assets/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ url('admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ url('admin_assets/bower_components/raphael/raphael.min.js') }}"></script>

    {{-- <script src="{{ url('admin_assets/bower_components/morris.js/morris.min.js') }}"></script> --}}
    <!-- Sparkline -->
    <script src="{{ url('admin_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <script src="{{ url('admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>

    <script src="{{ url('admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/moment/min/moment.min.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ url('admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ url('admin_assets/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ url('admin_assets/dist/js/pages/dashboard.js') }}"></script>

    <script src="{{ url('admin_assets/dist/js/demo.js') }}"></script>
    <script src="{{ url('admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ url('admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
      $(function () {
        $('#myTable').DataTable();
      })
    </script>

    <script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    @yield('script')
  </body>
  </html> 
<!-- ./wrapper -->