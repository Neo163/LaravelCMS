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
                                    <h4 class="mb-0">新增用户</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">新增用户</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <form role="form" action="/admin/user/create" method="POST">
                                            {{csrf_field()}}
                                            
                                            @include('admin.layout.error')
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">用户名</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="" id="name" name="name" required="required" maxlength="300">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">密码</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" value="" id="password" name="password" required="required" minlength="6" maxlength="300">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">确认密码</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" value="" id="confirm_password" name="confirm_password" required="required" minlength="6" maxlength="300">
                                                </div>
                                            </div>

                                            <div class="right">

                                                <a href="/admin/users" class="btn btn-light w-md">回到用户列表</a>
                                                <span class="btn btn-light w-md" onclick="clearUserText()">取消</span>
                                                <button type="submit" class="btn btn-primary w-md">提交</button>
                                            </div>

                                        </form>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
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

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <!-- <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> -->

        <!-- apexcharts -->
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="/assets/js/pages/dashboard.init.js"></script>

        <script src="/assets/js/app.js"></script>

        <script>
            function clearUserText()
            {
                document.getElementById("name").value = '';
                document.getElementById("password").value = '';
                document.getElementById("confirm_password").value = '';
            }
        </script>

    </body>

</html>