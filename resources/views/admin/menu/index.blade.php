<!doctype html>
<html lang="en">

    <head>

        @include("admin.layout.headStart")
        
        <title>后台</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="/resources/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/resources/bootstrap-4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/menu.css">

        @include("admin.layout.headEnd")

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include("admin.layout.header")
            <!-- ========== Left Sidebar Start ========== -->
            @include("admin.layout.sidebar")
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">{{$bmenu->title}}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">{{$bmenu->title}}</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3">
                                <div class="custom-accordion sidebarFix">

                                    <div class="card">
                                        <a href="#checkout-billinginfo-collapse" class="text-dark" data-toggle="collapse">
                                            <div class="p-4">
                                                
                                                <div class="media align-items-center">
                                                    <div class="mr-3">
                                                        <i class="uil uil-receipt text-primary h2"></i>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">当前菜单</h5>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>
                                                
                                            </div>
                                        </a>

                                        <div id="checkout-billinginfo-collapse" class="collapse show">
                                            <div class="p-4 border-top">

                                                <div class="sidenav">
                                                    <div class="list-group">
                                                        <span id="nestable-menu">

                                                            <button type="button" class="btn btn-outline-primary btn-lg btn-block waves-effect waves-light" data-toggle="modal" data-target="#addItem" id="addRecord">新增记录</button>

                                                            <button type="button" class="btn btn-outline-success btn-lg btn-block waves-effect waves-light" data-action="expand-all">扩展</button>

                                                            <button type="button" class="btn btn-outline-info btn-lg btn-block waves-effect waves-light" data-action="collapse-all">折合</button>

                                                            <button type="button" class="btn btn-danger btn-lg btn-block waves-effect waves-light" onclick="deleleMenuCategory({{$bmenu->id}})">删除</button>

                                                            <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light release-menu" id="sa-position">发布</button>

                                                        </span>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="col-xl-9">
                                <div class="menu">
                                    <center>
                                      <div id="load"></div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">

                                                <div class="container">
                                                      <p>{{$bmenu->title}}</p>
                                                      
                                                    </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="dd" id="nestable">

                                                <div id="get_menu"></div>

                                                </div>
                                            </div>
                                        </div>

                                      <input type="hidden" id="nestable-output">

                                    </center>
                                </div>  
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                @include("admin.layout.footer")
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- The Modal 1 -->
        <div class="modal fade" id="addItem">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">新增记录</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form">

                      <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">标题</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="title" placeholder="" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="link" class="col-sm-2 col-form-label">链接</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="link" placeholder="">
                        </div>
                      </div>

                      <input type="hidden" id="b_menus_category_id" value="{{$bmenu->id}}">
                      <input type="hidden" id="id">
                      
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <span type="button" class="btn btn-primary" data-dismiss="modal" id="submit">提交</span>
                  <span type="button" class="btn btn-secondary" data-dismiss="modal" id="reset">取消</span>
                </div>
                
              </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <!-- <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> -->

        <!-- apexcharts -->
        <!-- <script src="/assets/libs/apexcharts/apexcharts.min.js"></script> -->

        <!-- <script src="/assets/js/pages/dashboard.init.js"></script> -->

        <script src="/assets/js/app.js"></script>

        <script src="/admin/js/menu.js"></script>
        
        <script src="/resources/js/jquery-3.5.1.js"></script>
        <script src="/resources/js/jquery.nestable.js"></script>

        <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="/assets/js/pages/sweet-alerts.init.js"></script>

        <script src="/admin/js/adminScript.js"></script>

    </body>

</html>