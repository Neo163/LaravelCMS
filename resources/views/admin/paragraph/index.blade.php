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
                                    <h4 class="mb-0">段落</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">段落</li>
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
                                                    <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addItem"><i class="mdi mdi-plus mr-2"></i> 新增段落</a>
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
                                                    <th scope="col">ID</th>
                                                    <th scope="col">标题</th>
                                                    <th scope="col">小类</th>
                                                    <th scope="col" style="width: 200px;">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($paragraphs as $data)
                                                    <tr tr_id="{{$data->id}}">
                                                        <td>
                                                            <span id="id_{{$data->id}}">{{$data->id}}</span>
                                                        </td>
                                                        <td>
                                                            <span id="content_{{$data->id}}">{{$data->content}}</span>
                                                        </td>
                                                        <td id="category_{{$data->id}}">{{$data->category}}</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" onclick="deleleItem({{$data->id}})"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary editButton" id="{{$data->id}}" title="{{$data->title}}" data-toggle="modal" data-target="#editItem"><i class="uil uil-pen font-size-18"></i></a>
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
                                                        {{ $paragraphs->links() }}
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

            <!-- The Modal 1 -->
            <div class="modal fade" id="addItem">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">

                    <form action="/admin/paragraph/create" method="POST">
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
                                  <input type="text" class="form-control" id="content" name="content" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">小类</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="category" id="category">
                                        <option value="text">text</option>
                                        <option value="json">json</option>
                                    </select>
                                </div>
                            </div>
                              
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary w-md">提交</button>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                        </div>

                    </form>
                    
                  </div>
                </div>
            </div>

            <!-- The Modal 2 -->
            <div class="modal fade" id="editItem">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">

                    <div class="form">

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
                                  <input type="text" class="form-control" id="contentEdit" name="content" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">小类</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="categoryEdit" id="categoryEdit">
                                        <option value="text">text</option>
                                        <option value="json">json</option>
                                    </select>
                                </div>
                            </div>
                              
                            <input type="hidden" id="idEdit">

                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <span type="submit" class="btn btn-primary w-md" id="updateItem" data-dismiss="modal" id="reset">提交</span>
                          <!-- <button type="submit" class="btn btn-primary w-md">提交</button> -->
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                        </div>

                    </div>
                    
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

        <script src="/assets/js/app.js"></script>

        <script>
            // Paragraph start
            $(document).on("click",".editButton",function()
            {
                var id = $(this).attr('id');
                var title = $("#content_"+id).html();
                var category = $("#category_"+id).html();
                $("#idEdit").val(id);
                $("#contentEdit").val(title);
                $("#categoryEdit").val(category);
            });

            $("#updateItem").click(function()
            {
                var dataString = { 
                    id : $("#idEdit").val(),
                    content : $("#contentEdit").val(),
                    category : $("#categoryEdit").val(),

                    updateKey: 'updatebAEzBQMAa4a2d3bssAFDG67432jsaasjHI0SFFAqGcddf3a3S3Updaste',
                    updateKey1: 'upAdateAEzdBSQaFsssAAAG11111DF1234243ZVGSssdfge0gaaq33F3UpdSaatef',
                };

                $.ajax({
                  type: "POST",
                  url: "/api/admin/paragraph/update",
                  data: dataString,
                  dataType: "json",
                  cache : false,
                  success: function(data)
                  {
                    console.log(data);
                    $('#content_'+data['id']).html(data['content']);
                    $('#category_'+data['id']).html(data['category']);

                    $('#idEdit').val('');
                    $('#contentEdit').val('');
                    $('#categoryEdit').val('');
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
                        url: "/api/admin/paragraph/delete",
                        data: { 
                            id: id,
                            deleteKey: 'deleteVkVm1aPU2xXNXdyYTQ112DSFGDsdfdsfPSIbsInZhb2HVlcI0003deleteA1',
                            deleteKey1: 'deleteNJcV1888AaRHp1NkxnPT0iLC11DSGASAjyteraasJ12YW3dx1ZSI6000bdeleteA1',
                        },
                        cache : false,
                        success: function(data)
                        {
                            $("tr[tr_id='" + id +"']").remove();
                            // window.location.replace("/admin/menus");
                        } ,error: function(xhr, status, error) 
                        {
                            alert(error);
                        },
                    });
                }
            }
            // Paragraph end
        </script>

    </body>

</html>