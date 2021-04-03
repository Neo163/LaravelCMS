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
                                    <h4 class="mb-0">系统信息</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">系统信息</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Start Form Sizing -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">本系统运行环境要求</h4>
                                        <p class="card-title-desc"></p>
        
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-4">系统PHP版本要求</label>
                                            <div class="col-md-8">
                                                PHP >= 7.3.0
                                            </div>
                                        </div>

                                        <!-- <div class="form-group row">
                                            <label for="example-text-input" class="col-md-4">PHP框架</label>
                                            <div class="col-md-8">
                                                Laravel 8.22.1
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-md-4">需要开启的PHP扩展</label>
                                            <div class="col-md-8">
                                                BCMath PHP Extension<br/>
                                                Ctype PHP Extension<br/>
                                                Fileinfo PHP<br/>Extension<br/>
                                                JSON PHP Extension<br/>
                                                Mbstring PHP<br/>Extension<br/>
                                                OpenSSL PHP Extension<br/>
                                                PDO PHP Extension<br/>
                                                Tokenizer PHP<br/>Extension
                                                XML PHP Extension<br/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-number-input" class="col-md-4">系统MySQL要求</label>
                                            <div class="col-md-8">
                                                MySQL >= 5.6.0
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- End Form Sizing -->
                        
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

        <script src="/assets/js/app.js"></script>

    </body>

</html>