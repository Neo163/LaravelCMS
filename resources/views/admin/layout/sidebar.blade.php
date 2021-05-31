<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/admin/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <!-- <img src="/assets/images/logo-sm.png" alt="" height="22"> -->
                <span class="backenk-title-large">后台</span>
            </span>
            <span class="logo-lg">
                <!-- <img src="/assets/images/logo-dark.png" alt="" height="20"> -->
                <span class="backenk-title-large">后台</span>
            </span>
        </a>

        <a href="/admin/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <!-- <img src="/assets/images/logo-sm.png" alt="" height="22"> -->
                <span class="backenk-title-large">后台</span>
            </span>
            <span class="logo-lg">
                <!-- <img src="/assets/images/logo-light.png" alt="" height="20"> -->
                <span class="backenk-title-large">后台</span>
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <div id="sidebar-menu">

            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">核心</li>

                <li>
                    <a href="/admin/dashboard">
                        <i class="uil-tachometer-fast"></i>
                        <span>概览</span>
                    </a>
                </li>

                @can("system")
                @if(substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/user/' || substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/role/')
                <li class="mm-active">
                    <a href="javascript: void(0);" class="has-arrow waves-effect mm-active">
                @else
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                @endif
                        <i class="uil-user"></i>
                        <span>用户和权限</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/user/')
                        <li class="mm-active"><a href="/admin/users" class="active">
                        @else
                        <li><a href="/admin/users">
                        @endif
                        用户</a></li>

                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/role/')
                        <li class="mm-active"><a href="/admin/roles" class="active">
                        @else
                        <li><a href="/admin/roles">
                        @endif
                        角色</a></li>
                        <li><a href="/admin/permissions">权限</a></li>
                    </ul>
                </li>
                @endcan

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-cog"></i>
                        <span>设置</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin/setting">基本</a></li>
                        <li><a href="/admin/information">系统信息</a></li>
                    </ul>
                </li>
                
                <li class="menu-title">模块</li>

                @can("menu")
                @if(substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/menu/')
                <li class="mm-active"><a href="/admin/menus" class="active">
                @else
                <li><a href="/admin/menus">
                @endif
                        <i class="uil-bars"></i>
                        <span>菜单</span>
                    </a>
                </li>
                @endcan

                @if(substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/post/' && $_SERVER['REQUEST_URI'] != '/admin/post/type/add/1' && $_SERVER['REQUEST_URI'] != '/admin/post/type/add/1?editor=2' && substr($_SERVER['REQUEST_URI'] , 0 , 24) != '/admin/post/type/edit/1/' )
                <li class="mm-active">
                    <a href="javascript: void(0);" class="has-arrow waves-effect mm-active">
                @else
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                @endif
                        <i class="uil-layer-group"></i>
                        <span>循环页</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @if( ( substr($_SERVER['REQUEST_URI'] , 0 , 13) == '/admin/posts' || substr($_SERVER['REQUEST_URI'] , 0 , 18) == '/admin/posts/type/' ) 
                        && substr($_SERVER['REQUEST_URI'] , 0 , 24) != '/admin/post/type/edit/1/' 
                        && substr($_SERVER['REQUEST_URI'] , 0 , 19) != '/admin/posts/type/1' )
                            @if($_SERVER['REQUEST_URI'] == '/admin/post/type/add/1')
                            <li><a href="/admin/posts/type/2">
                            @else
                            <li class="mm-active"><a href="/admin/posts/type/2" class="active">
                            @endif
                        @else
                        <li><a href="/admin/posts/type/2">
                        @endif
                        循环页+大类</a></li>

                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 29) == '/admin/posts/categories/type/')
                        <li class="mm-active"><a href="/admin/posts/categories/type/2" class="active">
                        @else
                        <li><a href="/admin/posts/categories/type/2">
                        @endif
                        小类+大类</a></li>

                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 23) == '/admin/posts/tags/type/')
                        <li class="mm-active"><a href="/admin/posts/tags/type/2" class="active">
                        @else
                        <li><a href="/admin/posts/tags/type/2">
                        @endif
                        标签+大类</a></li>

                        <li><a href="/admin/posts/types">大类</a></li>
                        
                    </ul>
                </li>

                @if(substr($_SERVER['REQUEST_URI'] , 0 , 24) == '/admin/post/type/edit/1/')
                <li class="mm-active">
                    <a href="javascript: void(0);" class="has-arrow waves-effect mm-active">
                @else
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                @endif
                        <i class="uil-layer-group"></i>
                        <span>专题页</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 24) == '/admin/post/type/edit/1/')
                        <li class="mm-active"><a href="/admin/posts/type/1" class="active">
                        @else
                        <li><a href="/admin/posts/type/1">
                        @endif
                        专题页</a></li>

                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 15) == '/admin/page/add')
                        <li class="mm-active"><a href="/admin/post/type/add/1" class="active">
                        @else
                        <li><a href="/admin/post/type/add/1">
                        @endif
                        新建专题页</a></li>
                        
                    </ul>
                </li>

                <!-- @if(substr($_SERVER['REQUEST_URI'] , 0 , 12) == '/admin/page/')
                <li class="mm-active">
                    <a href="javascript: void(0);" class="has-arrow waves-effect mm-active">
                @else
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                @endif
                        <i class="uil-layer-group"></i>
                        <span>专题页</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 16) == '/admin/page/edit')
                        <li class="mm-active"><a href="/admin/pages" class="active">
                        @else
                        <li><a href="/admin/pages">
                        @endif
                        专题页</a></li>

                        @if(substr($_SERVER['REQUEST_URI'] , 0 , 15) == '/admin/page/add')
                        <li class="mm-active"><a href="/admin/page/add" class="active">
                        @else
                        <li><a href="/admin/page/add">
                        @endif
                        新建专题页</a></li>
                        
                    </ul>
                </li> -->

                <li>
                    <a href="/admin/comments/uncheck" class="waves-effect">
                        <i class="uil-align-left-justify"></i>
                        <span>评论</span>
                    </a>
                </li>

                @if(substr($_SERVER['REQUEST_URI'] , 0 , 16) == '/admin/template/')
                <li class="mm-active"><a href="/admin/templates" class="active">
                @else
                <li><a href="/admin/templates">
                @endif
                        <i class="uil-th"></i>
                        <span>页面模板</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/paragraphs" class="waves-effect">
                        <i class="uil-align-left-justify"></i>
                        <span>段落</span>
                    </a>
                </li>

                @can("media")
                <li>
                    <a href="/admin/media" class="waves-effect">
                        <i class="uil-image"></i>
                        <span>媒体</span>
                    </a>
                </li>
                @endcan

                <li class="menu-title"></li>

                <li>
                    <a href="/" target="_blank" class="waves-effect">
                        <i class="uil-home-alt"></i>
                        <span>首页</span>
                    </a>
                </li>

            </ul>
        </div>
        
    </div>
</div>