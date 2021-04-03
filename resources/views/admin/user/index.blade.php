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
                                    <h4 class="mb-0">用户列表</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">用户列表</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @include('admin.layout.error')

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addItem"><i class="mdi mdi-plus mr-2"></i> 新增用户</a>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-inline float-md-right mb-3">
                                                    <div class="search-box ml-2">
                                                        <div class="position-relative">
                                                            <!-- <input type="text" class="form-control rounded bg-light border-0" placeholder="Search..."> -->
                                                            <!-- <i class="mdi mdi-magnify search-icon"></i> -->
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                
                
                                        </div>
                                        <!-- end row -->
                                        <div class="table-responsive mb-4">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">标题</th>
                                                    <!-- <th scope="col">角色</th> -->
                                                    <th scope="col" style="width: 200px;">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $data)
                                                    <tr tr_id="{{$data->id}}">
                                                        <td>
                                                            <span id="title_{{$data->id}}">{{$data->name}}</span>
                                                        </td>
                                                        <!-- <td>
                                                            <span id="title_{{$data->id}}">{{$data->name}}</span>
                                                        </td> -->
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" onclick="deleleItem({{$data->id}})"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>

                                                                &nbsp;&nbsp;

                                                                <li class="list-inline-item">
                                                                    <a href="/admin/user/{{$data->id}}/edit" class="px-2 text-primary"><i class="uil uil-edit font-size-18"></i></a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                      
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div>
                                                    <!-- <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="float-sm-right">
                                                    {{ $users->links() }}
                                                    <!-- <ul class="pagination mb-sm-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                        </li>
                                                    </ul> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

            <!-- The Modal 1 -->
            <div class="modal fade" id="addItem">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">

                    <form action="/admin/user/create" method="POST">
                    {{csrf_field()}}

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">新增菜单</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">标题</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">密码</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">确认密码</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="">
                                </div>
                            </div>
                              
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary w-md">提交</button>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span type="button" class="btn btn-secondary w-md" onclick="clearButton()">清除</span>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                        </div>

                    </form>
                    
                  </div>
                </div>
            </div>

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
            // user start
            function clearButton()
            {
                document.getElementById("name").value = '';
                document.getElementById("password").value = '';
                document.getElementById("confirm_password").value = '';
            }

            function deleleItem(id)
            {
                var x = confirm('是否删除这个菜单');
                var id = id;

                if(x)
                {
                    if({{Auth::guard("admin")->id()}} == id)
                    {
                        alert('不可删除自己账号');
                        return false;
                    }

                    $.ajax({
                        type: "POST",
                        url: "/api/admin/user/delete",
                        data: { 
                            id: id,
                            user_id: {{Auth::guard("admin")->id()}},
                            deleteKey: 'deleteAEzBQMmYgrjjHI0ql69i1Q8',
                            deleteKey1: 'deleteAEzBQMmaYgrjdjHSI0gql69Ai1Q8',
                        },
                        cache : false,
                        success: function(data)
                        {
                            console.log(data);
                            // $("tr[tr_id='" + id +"']").remove();
                            window.location.replace("/admin/users");
                        } ,error: function(xhr, status, error) 
                        {
                            alert(error);
                        },
                    });
                }
            }
            // user end
        </script>

    </body>

</html>