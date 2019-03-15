<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIFIKS  |
        @if($role == "Doctor")
            {{ __('Doctors') }}
        @else
            {{ __('Administrator') }}
        @endif
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="
    @if($role == "Doctor")
        skin-yellow
    @else
        skin-blue
    @endif
    hold-transition sidebar-mini fixed
">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="
        @if($role == "Doctor")
            {{ route('doctor-index') }}
        @else
            {{ route('admin-index') }}
        @endif
        " class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                @if($role == "Doctor")
                    <img src="https://i.ibb.co/PjJBk1n/LOGO1.png" alt="LOGO1" width="75%" border="0">
                @else
                    <img src="https://i.ibb.co/0XXj1FY/LOGO.png" alt="LOGO" width="75%" border="0">
                @endif
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                @if($role == "Doctor")
                    <img src="https://i.ibb.co/wwj2vnt/sifiks2.png" alt="sifiks2" width="40%" border="0">
                @else
                    <img src="https://i.ibb.co/JQbV1BQ/sifiks5.png" alt="sifiks5" width="40%" border="0">
                @endif
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Alfuzzy Satria JalaIkan</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Alfuzzy Satria JalaIkan - Fans Kpop
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alfuzzy Satria JalaIkan</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ $role }}</a>
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
                <li class="header text-center">WORKING SPACE</li>
                <li>
                    <a href="
                    @if($role == "Doctor")
                        {{ route('doctor-index') }}
                    @else
                        {{ route('admin-index') }}
                    @endif
                    ">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
                </li>
                <li>
                    <a href="
                    @if($role == "Doctor")
                        {{ route('doctor-article') }}
                    @else
                        {{ route('admin-article') }}
                    @endif
                    ">
                        <i class="fa fa-file-text"></i> <span>Article</span>
                    </a>
                </li>
                <li>
                    <a href="
                    @if($role == "Doctor")
                    {{ route('doctor-thread') }}
                    @else
                    {{ route('admin-thread') }}
                    @endif
                    ">
                        <i class="fa fa-commenting"></i> <span>Thread</span>
                    </a>
                </li>
                @if($role == "Admin")
                    <li>
                        <a href="{{ route('admin-admin') }}">
                            <i class="fa fa-user-secret"></i> <span>Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-doctor') }}">
                            <i class="fa fa-user-md"></i> <span>Doctor</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-member') }}">
                            <i class="fa fa-users"></i> <span>Member</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-hospital') }}">
                            <i class="fa fa-hospital-o"></i> <span>Hospital</span>
                        </a>
                    </li>
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Page Header
                <small></small>
            </h1>
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
                {{--<li class="active">Here</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            @yield('content')

        </section>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <p>Copyright © <a href="https://flying-coders.github.io/" target="_blank">Flying Coders</a></p>
    </footer>
</div>
<!-- ./wrapper -->

<script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset("bower_components/fastclick/lib/fastclick.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
<script src="{{ asset("bower_components/ckeditor/ckeditor.js") }}"></script>
<script>
    $(document).ready(function () {

        // CKEDITOR.replace( 'editor1' );

    })
</script>
</body>
</html>
