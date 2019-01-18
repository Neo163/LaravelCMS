<header class="main-header"> 
    <!-- Logo -->
    <a href="<?php echo url(''); ?>/admin/home" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Neo system</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">转换导航</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="/admin/logout" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin/dist/img/default_user.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{\Auth::guard("admin")->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="/admin/logout" class="btn btn-default btn-flat">登出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header> <!-- Left side column. contains the logo and sidebar -->