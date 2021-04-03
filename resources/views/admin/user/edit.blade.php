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

        <script src="/admin/js/user.js"></script>

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
                                    <h4 class="mb-0">编辑用户</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">概览</a></li>
                                            <li class="breadcrumb-item active">编辑用户</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <form role="form" action="/admin/user/{{$user->id}}/update" method="POST">
                        {{csrf_field()}}

                        @include('admin.layout.error')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <!-- <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addItem"><i class="mdi mdi-plus mr-2"></i> Add New</a> -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-inline float-md-right mb-3 right">
                                    <div class="search-box ml-2">
                                        <div class="position-relative">

                                            <a href="/admin/users" class="btn btn-success w-md">回到用户列表</a>

                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                            <span class="btn btn-warning w-md cancel_password" style="display: none;">取消修改</span>
                                            
                                            <span class="btn btn-warning w-md set_password">修改密码</span>

                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            
                                            <button type="submit" class="btn btn-primary w-md">提交</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">用户名</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="{{$user->name}}" id="name" name="name" required="required" maxlength="300">
                                            </div>
                                        </div>

                                        <div id="set_password"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive mb-4">

                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">标题</th>
                                                    <th scope="col">描述</th>
                                                    <th scope="col">状态</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($roles as $data)
                                                    <tr>
                                                        
                                                        <td>
                                                            <a href="#" class="text-body">{{$data->title}}</a>
                                                        </td>
                                                        <td>{{$data->description}}</td>

                                                        <td scope="row">
                                                            <div class="custom-control custom-checkbox">

                                                                <input type="radio" class="custom-control-input" id="customRadio_{{$data->id}}" name="roles[]"
                                                                @if($myRoles->contains($data))
                                                                  checked
                                                                  @endif
                                                                  value="{{$data->id}}"
                                                                >
                                                                <label class="custom-control-label" for="customRadio_{{$data->id}}"></label>
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            
                                            <div class="box-footer">
                                                <!-- <button type="submit" class="btn btn-primary">提交</button> -->
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                        
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

        </script>

    </body>

</html>