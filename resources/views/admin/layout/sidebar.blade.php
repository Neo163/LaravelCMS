<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @can("post")
            <li><a href="<?php echo url(''); ?>/admin/posts/list"><i class="fa fa-edit"></i> <span>文章</span></a></li>
            @endcan
            
            @can("plan")
            <li><a href="<?php echo url(''); ?>/admin/plans"><i class="fa fa-paper-plane-o"></i> <span>定格计划图</span></a></li>
            @endcan
            
            @can("setting")
            <li><a href="<?php echo url(''); ?>/admin/setting"><i class="fa fa-cog"></i> <span>设置</span></a></li>
            @endcan

            @can("logs")
            <li><a href="<?php echo url(''); ?>/admin/logs"><i class="fa fa-align-left"></i> <span>日志记录</span></a></li>
            @endcan

            @can("system")
            <?php
              if (substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/users' || substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/roles' || substr($_SERVER['REQUEST_URI'] , 0 , 18) == '/admin/permissions')
              {
                echo '<li class="active treeview">';
              } else 
              {
                echo '<li class="treeview">';
              }
            ?>
              <a href="#">
                <i class="fa fa-user"></i>
                <span>用户</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo url(''); ?>/admin/users"><i class="fa fa-user-plus"></i> <span>用户管理</span></a></li>
                <li><a href="<?php echo url(''); ?>/admin/roles"><i class="fa fa-user-plus"></i> <span>角色管理</span></a></li>
                <li><a href="<?php echo url(''); ?>/admin/permissions"><i class="fa fa-user-plus"></i> <span>权限管理</span></a></li>
              </ul>
            </li>
            @endcan

            <li><a href=""> <span></span></a></li>
            <li><a href="<?php echo url(''); ?>/admin/logout"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
         </ul>
    </section>
    <!-- /.sidebar -->
</aside>