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
                                    <h4 class="mb-0">设置</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">设置</li>
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
        
                                        <!-- <h4 class="card-title">Textual inputs</h4> -->

                                        <form action="/admin/template/create" method="POST">
                                        {{csrf_field()}}
                                        
                                        @include('admin.layout.error')

                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <!-- <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addItem"><i class="mdi mdi-plus mr-2"></i> Add New</a> -->
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-6">
                                                    <div class="form-inline float-md-right mb-3 right">
                                                        <div class="search-box ml-2">
                                                            <div class="position-relative">
                                                                <a href="/admin/templates" class="btn btn-success w-md">回到用户列表</a>

                                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                                <button type="submit" class="btn btn-primary waves-effect waves-light w-md">提交</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">名称</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" id="title" name="title" value="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">模板类型</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" id="slectTemplateCategory" name="slectTemplateCategory" onchange="onChangeSelect(this.value)">
                                                        <option value="1">循环页</option>
                                                        <option value="2">专题页</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">前端模板</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" id="slectTemplate" name="slectTemplate">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="example-text-input" class="col-md-12 template-middle-title">后端数据结构</label>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">text</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="" id="text" name="text" maxlength="2" oninput="value=value.replace(/[^\d]/g,'')">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="" id="image" name="image" maxlength="2" oninput="value=value.replace(/[^\d]/g,'')">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">video</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="" id="video" name="video" maxlength="2" oninput="value=value.replace(/[^\d]/g,'')">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">slider</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="" id="slider" name="slider" maxlength="2" oninput="value=value.replace(/[^\d]/g,'')">
                                                </div>
                                            </div>

                                        </form>

                                        <!-- <div class="form-group row">
                                            <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                                            </div>
                                        </div> -->

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
        <!-- <script src="/assets/libs/jquery/jquery.min.js"></script> -->
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <!-- <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> -->

        <script src="/assets/js/app.js"></script>

        <script src="/admin/js/template_add.js"></script>

    </body>

</html>