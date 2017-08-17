<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kappe Admin Panel | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo asset(''); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo asset(''); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo asset(''); ?>assets/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo asset(''); ?>assets/admin/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo asset(''); ?>assets/admin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo asset(''); ?>assets/admin/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="<?php echo asset(''); ?>assets/admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?php echo asset(''); ?>assets/admin/css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='<?php echo asset(''); ?>assets/admin/http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="<?php echo asset(''); ?>assets/admin/css/style.css" rel="stylesheet" type="text/css" />
          <style type="text/css">

          </style>
</head>
<body class="skin-black">
    <header class="header">
        <a href="index.html" class="logo">
            Kappe Admin Panel
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
           
            <div class="navbar-right">
                <ul class="nav navbar-nav">                                                
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span>Admin<i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                        </ul>
                    </div>
                </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo asset('')?>assets/admin/img/26115.jpg" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>Hello, Admin</p>                                
                    </div>
                </div>
               
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="">
                        <a href="#">
                            <span>PRODUCT</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('categories') }}">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categories</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('products') }}">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Products</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        
        <!-- Main content aside-->
        <aside class="right-side">

            <!-- Main content section-->
            <section class="content">
                @yield('content')
            </section>
        </aside>

    </div><!-- ./wrapper -->

<!-- add new calendar event modal -->



<script src="<?php echo asset(''); ?>assets/admin/js/jquery.min.js" type="text/javascript"></script>
<!-- jQuery UI 1.10.3 -->
<script src="<?php echo asset(''); ?>assets/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo asset(''); ?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Director App -->
<script src="<?php echo asset(''); ?>assets/admin/js/Director/app.js" type="text/javascript"></script>




</body>
</html>