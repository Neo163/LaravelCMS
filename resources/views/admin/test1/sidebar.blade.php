<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @can("activity")
            <li><a href="/admin/activities"><i class="fa fa-edit"></i> <span>活动</span></a></li>
            @endcan
            
            @can("order")
            <li><a href="/admin/orders/paid"><i class="fa fa-envelope"></i> <span>订单</span></a></li>
            @endcan

            @can("message")
            <li><a href="/admin/activities"><i class="fa fa-envelope"></i> <span>留言</span></a></li>
            @endcan

            @can("admin_post")
            <li><a href="/admin/admin_posts"><i class="fa fa-edit"></i> <span>内部文章</span></a></li>
            @endcan

            @can("category")
            <li><a href="/admin/categories/list"><i class="fa fa-cog"></i> <span>分类</span></a></li>
            @endcan

            @can("topic")
            <li><a href="/admin/topics"><i class="fa fa-cog"></i> <span>专题</span></a></li>
            @endcan

            @can("notice")
            <li><a href="/admin/notices"><i class="fa fa-cog"></i> <span>通知</span></a></li>
            @endcan
            
            @can("page")
            <li><a href="/admin/pages/list"><i class="fa fa-edit"></i> <span>页面</span></a></li>
            @endcan

            @can("media")
            <li><a href="/admin/medias/list"><i class="fa fa-picture-o"></i> <span>媒体</span></a></li>
            @endcan 

            @can("statistics")
            <li><a href="/admin/setting"><i class="fa fa-cog"></i> <span>统计</span></a></li>
            @endcan

            @can("setting")
            <li><a href="/admin/setting"><i class="fa fa-cog"></i> <span>设置</span></a></li>
            @endcan

            @can("plan")
            <li><a href="/admin/plans"><i class="fa fa-paper-plane-o"></i> <span>定格计划图</span></a></li>
            @endcan

            @can("logs")
            <li><a href="/admin/logs"><i class="fa fa-align-left"></i> <span>日志</span></a></li>
            @endcan

            @can("web_user")
            <li><a href="/admin/web_users"><i class="fa fa-user"></i> <span>前台用户</span></a></li>
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
                <span>后台用户</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/admin/users"><i class="fa fa-user-plus"></i> <span>用户管理</span></a></li>
                <li><a href="/admin/roles"><i class="fa fa-user-plus"></i> <span>角色管理</span></a></li>
                <li><a href="/admin/permissions"><i class="fa fa-user-plus"></i> <span>权限管理</span></a></li>
              </ul>
            </li>
            @endcan

            <li><a href=""> <span></span></a></li>
            <li><a href="/admin/tengmei/logout"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
         </ul>
    </section>
    <!-- /.sidebar -->
</aside>