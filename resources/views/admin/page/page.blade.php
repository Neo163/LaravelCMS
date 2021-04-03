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
                                    <h4 class="mb-0">专题页</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">专题页</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <a href="/admin/page/add" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i> 新增专题页</a>
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
                                                    <th scope="col">前端模板</th>
                                                    <th scope="col">发布时间</th>
                                                    <th scope="col" style="width: 200px;">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pages as $data)
                                                    <tr tr_id="{{$data->id}}">
                                                        <td>
                                                            <span id="title_{{$data->id}}">{{$data->title}}</span>
                                                        </td>
                                                        <td>{{$data->template}}</td>
                                                        <td>{{$data->created_at}}</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" onclick="deleleItem({{$data->id}})"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>

                                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                                <!-- <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary editButton" id="{{$data->id}}" title="{{$data->title}}" data-toggle="modal" data-target="#editItem"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li> -->

                                                                <li class="list-inline-item">
                                                                    <a href="/admin/page/edit/{{$data->id}}" class="px-2 text-primary"><i class="uil uil-edit font-size-18"></i></a>
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
                                                    <ul class="pagination mb-sm-0">
                                                        <!-- <li class="page-item disabled">
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
                                                        </li> -->
                                                        {{ $pages->links() }}
                                                    </ul>
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
        <!-- <script src="/assets/libs/apexcharts/apexcharts.min.js"></script> -->

        <!-- <script src="/assets/js/pages/dashboard.init.js"></script> -->

        <script src="/assets/js/app.js"></script>

        <script>
            // Menu Category start
            $(document).on("click",".editButton",function()
            {
                var id = $(this).attr('id');
                var title = $("#title_"+id).html();
                var description = $("#description_"+id).html();
                $("#idEdit").val(id);
                $("#titleEdit").val(title);
                $("#descriptionEdit").val(description);
            });

            $("#updateItem").click(function()
            {
                var dataString = { 
                    id : $("#idEdit").val(),
                    title : $("#titleEdit").val(),
                    description : $("#descriptionEdit").val(),

                    updateKey: 'updatebAEzBQMAadasmaYgds11raFjsaasjHI0qGcdf33S3UpdasteMenu',
                    updateKey1: 'upAdateAEzdBSQaMsmaYScDgrjbdjHaSI0gaq33F3UpdSaatefMenu',
                };

                $.ajax({
                  type: "POST",
                  url: "/api/admin/page/update",
                  data: dataString,
                  dataType: "json",
                  cache : false,
                  success: function(data)
                  {
                    console.log(data);
                    $('#title_'+data['id']).html(data['title']);
                    $('#description_'+data['id']).html(data['description']);

                    $('#idEdit').val('');
                    $('#titleEdit').val('');
                    $('#descriptionEdit').val('');
                  },
                  error: function(xhr, status, error)
                  {
                    alert(error);
                  },
                });
            });

            function deleleItem(id)
            {
                var x = confirm('是否删除这个菜单');
                var id = id;

                if(x)
                {
                    $.ajax({
                        type: "POST",
                        url: "/api/admin/page/delete",
                        data: { 
                            id: id,
                            deleteKey: 'deleteAEzBQMmYg111ADFSSDFSASDFWEQWZVFBHssd12345678rjjHI330q111page',
                            deleteKey1: 'delet111eAAEFGERSFGTJRYIKRDafaergwegrg12345678EzBQMmaYgrjdjHSI0333gq111media',
                        },
                        cache : false,
                        success: function(data)
                        {
                            // $("tr[tr_id='" + id +"']").remove();
                            location.reload();
                            // window.location.replace("/admin/menus");
                        } ,error: function(xhr, status, error) 
                        {
                            alert(error);
                        },
                    });
                }
            }
            // Menu Category end
        </script>

    </body>

</html>