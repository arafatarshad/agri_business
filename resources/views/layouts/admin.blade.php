<!DOCTYPE html>
<html style="height:100%">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
          -->
          <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />



          <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/main.css')}}">
          <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

          @yield('styles')

          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue" style="height:100%">
        <div class="wrapper" style="height:100%">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo"><b>Admin</b>LTE</a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                 <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
 <!--                     <li class="dropdown messages-menu">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <ul class="menu">
                                    <li> 
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image"/>
                                            </div> 
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul> 
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>  -->

<!--                     <li class="dropdown notifications-menu"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li> 
                                <ul class="menu">
                                    <li> 
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li> 
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>  -->
<!--                     <li class="dropdown tasks-menu"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                             <ul class="menu">
                                <li> 
                                    <a href="#">
                                     <h3>
                                        Design some buttons
                                        <small class="pull-right">20%</small>
                                    </h3>
                                    <div class="progress xs">
                                     <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li> 
                    </ul>
                </li>
                <li class="footer">
                    <a href="#">View all tasks</a>
                </li>
            </ul>
        </li>  -->
<!--         <li class="dropdown user user-menu"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image"/> 
                <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu"> 
                <li class="user-header">
                    <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
                    <p>
                        Alexander Pierce - Web Developer
                        <small>Member since Nov. 2012</small>
                    </p>
                </li> 
                <li class="user-body">
                    <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                    </div>
                </li> 
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li> -->
        <li>
            <a href="{{URL::to('/')}}/auth/logout" class="btn btn-flat">Sign out</a>
        </li>
    </ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="height:50px">
 <!--            <div class="pull-left image">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div> -->
            <div class="pull-left info">
                @if(isset(Auth::user()->name))
                <p>{{Auth::user()->name }}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
<!--         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
 -->        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- <li class="header">HEADER</li> -->
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="active"><a href="{{URL::to('/')}}/"><span>DashBoard</span></a></li> -->
            <li><a href="{{URL::to('/')}}"><span>DashBoard</span></a></li>
            <li><a href="{{URL::to('/')}}/showresidentsguestlog"><span>Show Resident's Log</span></a></li>
            <li class="treeview">
                <a href="#"><span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{URL::to('/')}}/permission/role">Create Role</a></li>
                    <li><a href="{{URL::to('/')}}/permission/permission">Create Permission</a></li>
                    <li><a href="{{URL::to('/')}}/permission/user_role">Assign User Role</a></li>
                    <li><a href="{{URL::to('/')}}/permission/role_permission">Assign Permission On Role</a></li>
                    
                </ul>
            </li>




        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:100%">
    <!-- Content Header (Page header) -->
<!--             <section class="content-header">
                <h1>
                    Page Header
                    <small>Optional description</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section> -->
            
            <!-- Main content -->
            <section class="content" style="height:100%;">
                <!-- Your Page Content Here -->                  
                <div class="container-fluid" style="height:100%">
                    <div class="row" style="height:100%"    >   
                        <div class="col-lg-12">
                            @section('notification-panel')
                        </div>
                        <div class="col-lg-12">
                            @yield('content')
                        </div>      
                    </div>  
                </div> 
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer"> 
            <div class="pull-right hidden-xs">
                Anything you want
            </div> 
            <strong>Copyright © 2015 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div><!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
          <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>           
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
          <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
              @yield('scripts')
          </body>
          </html>