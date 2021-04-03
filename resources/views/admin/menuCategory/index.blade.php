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

        <script src="/admin/js/jquery-ui-1.11.2.js"></script>

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
                                    <h4 class="mb-0">菜单</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">菜单</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Main content start -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addMenu"><i class="mdi mdi-plus mr-2"></i> 新增菜单</a>
                                                </div>
                                            </div>
                
                                            <!-- <div class="col-md-6">
                                                <div class="form-inline float-md-right mb-3">
                                                    <div class="search-box ml-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                                            <i class="mdi mdi-magnify search-icon"></i>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div> -->
                
                                        </div>
                                        <!-- end row -->
                                        <div class="table-responsive mb-4">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                  <tr>
                                                    <!-- <th scope="col" style="width: 50px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="contacusercheck">
                                                            <label class="custom-control-label" for="contacusercheck"></label>
                                                        </div>
                                                    </th> -->
                                                    <th scope="col">标题</th>
                                                    <th scope="col">状态</th>
                                                    <th scope="col" style="width: 200px;">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody id="page_list1">
                                                    @foreach($menuCategory as $data)
                                                    <tr id="{{$data->id}}" class="sorting-tr">
                                                        <td>
                                                            <span id="title_{{$data->id}}">{{$data->title}}</span>
                                                        </td>
                                                        <td>
                                                            @if($data->location_status == 0)
                                                            <span class="status-red">未使用</span>
                                                            @endif
                                                            @if($data->location_status != 0)
                                                            <span class="status-blue">使用中</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" id="{{$data->id}}" onclick="deleleMenuCategory({{$data->id}})"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary edit-button" id="{{$data->id}}" title="{{$data->title}}" data-toggle="modal" data-target="#editMenuCategory"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <a href="/admin/menu/{{$data->id}}" class="px-2 text-primary"><i class="uil uil-edit font-size-18"></i></a>
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

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addLocation"><i class="mdi mdi-plus mr-2"></i> 新增位置</a>
                                                </div>
                                            </div>
                
                                            <!-- <div class="col-md-6">
                                                <div class="form-inline float-md-right mb-3">
                                                    <div class="search-box ml-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                                            <i class="mdi mdi-magnify search-icon"></i>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div> -->
                
                                        </div>
                                        <!-- end row -->
                                        <div class="table-responsive mb-4">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                  <tr>
                                                    <!-- <th scope="col" style="width: 50px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="contacusercheck">
                                                            <label class="custom-control-label" for="contacusercheck"></label>
                                                        </div>
                                                    </th> -->
                                                    <th scope="col">ID</th>
                                                    <th scope="col">标题</th>
                                                    <th scope="col">位置</th>
                                                    <th scope="col" style="width: 200px;">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody id="page_list2">
                                                    @foreach($menuLocation as $data)
                                                    <tr id="{{$data->id}}" class="sorting-tr">
                                                        <td>
                                                            <span>{{$data->id}}</span>
                                                        </td>
                                                        <td>
                                                            <span id="titleLocation_{{$data->id}}">{{$data->title}}</span>
                                                        </td>
                                                        <td id="BMenuCategoryTitle_{{$data->id}}">
                                                            @if(isset($data->BMenuCategory->title))
                                                                {{$data->BMenuCategory->title}}
                                                            @endif
                                                        </td>
                                                        <td id="BMenuCategoryId_{{$data->id}}" hidden>
                                                            @if(isset($data->BMenuCategory->id))
                                                                {{$data->BMenuCategory->id}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline mb-0">

                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" idLocation="{{$data->id}}" onclick="deleleMenuLocation({{$data->id}})"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary editLocation" idLocation="{{$data->id}}" menuCat="{{$data->b_menu_category_id}}" data-toggle="modal" data-target="#editMenuLocation"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                      
                                                </tbody>
                                            </table>
                                        </div>

                                        <script>
                                            $( "#page_list1" ).sortable({
                                                placeholder : "ui-state-highlight",
                                                update  : function(event, ui)
                                                {
                                                    var page_id_array = new Array();
                                                    $('#page_list1 tr').each(function()
                                                    {
                                                        page_id_array.push($(this).attr("id"));
                                                    });
                                                    $.ajax({
                                                        url:"/api/menuCategory/sorting",
                                                        method:"POST",
                                                        data:{page_id_array:page_id_array},
                                                        success:function(data)
                                                        {
                                                            // console.log(data);
                                                        }
                                                    });
                                                }
                                            });

                                            $( "#page_list2" ).sortable({
                                                placeholder : "ui-state-highlight",
                                                update  : function(event, ui)
                                                {
                                                    var page_id_array = new Array();
                                                    $('#page_list2 tr').each(function()
                                                    {
                                                        page_id_array.push($(this).attr("id"));
                                                    });
                                                    $.ajax({
                                                        url:"/api/menuLocation/sorting",
                                                        method:"POST",
                                                        data:{page_id_array:page_id_array},
                                                        success:function(data)
                                                        {
                                                            // console.log(data);
                                                        }
                                                    });
                                                }
                                            });
                                        </script>
                                        
                                        <!-- <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="float-sm-right">
                                                    <ul class="pagination mb-sm-0">
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
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Main content end -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                @include("admin.layout.footer")
            </div>
            <!-- end main content-->

            <!-- The Modal 1 -->
            <div class="modal fade" id="addMenu">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">

                    <form action="/admin/menuCategory/create" method="POST">
                    {{csrf_field()}}
                    
                    @include('admin.layout.error')

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
                                  <input type="text" class="form-control" id="title" name="title" placeholder="" required>
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
            <div class="modal fade" id="editMenuCategory">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">

                    <div class="form">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">编辑菜单</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">标题</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="titleUpdateMenu" name="title" placeholder="" required>
                                </div>
                            </div>
                              
                            <input type="hidden" id="idUpdateMenuCategory">

                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <span type="submit" class="btn btn-primary w-md" id="submitUpdateMenuCategory" data-dismiss="modal" id="reset">提交</span>
                          <!-- <button type="submit" class="btn btn-primary w-md">提交</button> -->
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                        </div>

                    </div>
                    
                  </div>
                </div>
            </div>

            <!-- The Modal 3 -->
            <div class="modal fade" id="addLocation">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">

                    <form action="/admin/menuLocation/create" method="POST">
                    {{csrf_field()}}

                    @include('admin.layout.error')
                  
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">新增位置</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                              <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">标题</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="title" name="title" placeholder="" required>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="link" class="col-sm-2 col-form-label">选择菜单</label>

                                <div class="col-sm-10">
                                    <select class="form-control select21" name="bMenuCategory" id="bMenuCategory">
                                        <option value="1">未分类</option>
                                        @foreach($menuCategory as $menuCategory)
                                        <option value="{{$menuCategory->id}}">{{$menuCategory->title}}</option>
                                        @endforeach
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

            <!-- The Modal 4 -->
            <div class="modal fade" id="editMenuLocation">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">编辑位置</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form">

                          <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">标题</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="titleLocationEdit" name="titleLocationEdit" placeholder="" required>
                            </div>
                          </div>

                          <div class="form-group row">
                                <label for="link" class="col-sm-2 col-form-label">选择菜单</label>

                                <div class="col-sm-10">
                                    <select class="form-control select21" name="bMenuCategoryEditSelect" id="bMenuCategoryEditSelect">
                                        @foreach($menuCategoryAll as $menuCategory)
                                        <option value="{{$menuCategory->id}}">{{$menuCategory->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                              </div>

                          <input type="hidden" id="idMenuLocationEdit">
                          <input type="hidden" id="BMenuCategoryTitleEdit">
                          
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <span type="button" class="btn btn-primary w-md" id="submitUpdateMenuLocation" data-dismiss="modal" id="reset">提交</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                        <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                    </div>
                    
                  </div>
                </div>
            </div>

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <!-- <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> -->

        <script src="/assets/js/app.js"></script>
        <script src="/admin/js/adminScript.js"></script>

        <script>
            // Menu Category start
            $(document).on("click",".edit-button",function()
            {
                var id = $(this).attr('id');
                var title = $("#title_"+$(this).attr('id')).html();
                $("#idUpdateMenuCategory").val(id);
                $("#titleUpdateMenu").val(title);
            });

            $("#submitUpdateMenuCategory").click(function()
            {
                var dataString = { 
                    id : $("#idUpdateMenuCategory").val(),
                    title : $("#titleUpdateMenu").val(),
                    updateKey: 'updatebAEzBQMmaYg11rjaajHI0qc333UpdateMenu',
                    updateKey1: 'updateAEzBQaMmaYcgrjbdjHSI0gq333UpdateMenu',
                };

                $.ajax({
                  type: "POST",
                  url: "/api/admin/menuCategory/update",
                  data: dataString,
                  dataType: "json",
                  cache : false,
                  success: function(data)
                  {
                    console.log(data);
                    $('#title_'+data['id']).html(data['title']);

                    $('#titleUpdateMenu').val('');
                    $('#idUpdateMenuCategory').val('');
                  },
                  error: function(xhr, status, error)
                  {
                    alert(error);
                  },
                });
            });
            // Menu Category end

            // Menu Location start
            $(document).on("click",".editLocation",function()
            {
                var id = $(this).attr('idLocation');
                var title = $("#titleLocation_"+id).html();
                var menuCat = $(this).attr('menuCat');

                var BMenuCategoryId = $("#BMenuCategoryId_"+id).html();
                var BMenuCategoryTitle = $("#BMenuCategoryTitle_"+id).html();

                $("#idMenuLocationEdit").val(id);
                $("#titleLocationEdit").val(title);
                document.getElementsByName("bMenuCategoryEditSelect")[0].value = BMenuCategoryId;
                $("#BMenuCategoryTitleEdit").val(BMenuCategoryTitle);
                $("select[name='bMenuCategoryEditSelect']").val(menuCat);
            });

            $("#submitUpdateMenuLocation").click(function()
            {
                var dataString = { 
                    id : $("#idMenuLocationEdit").val(),
                    title : $("#titleLocationEdit").val(),
                    b_menu_category_id : document.getElementById("bMenuCategoryEditSelect").value,
                    location : $("#BMenuCategoryTitleEdit").val(),

                    updateKey: 'updatebzdwNExaVFhRVTRBaFE1115ZE1naUE9PSIsInZhbHVlIjoiaU888UpdateMenu',
                    updateKey1: 'updatepUFJXRERyTFwvUzR6XC8w111QT09IiwidmFsdWUiOiJmdEhqSG1SUXBYdTQzdUFZWEV5NlZWTzNBNlZzQ1wvUDZwNkxQblRtczB0VT0iLCJtYWjZWQyMWQyMjlh888UpdateMenu',
                };

                // alert($("#idMenuLocationEdit").val());
                // alert($("#titleLocationEdit").val());

                $.ajax({
                  type: "POST",
                  url: "/api/admin/menuLocation/update",
                  data: dataString,
                  dataType: "json",
                  cache : false,
                  success: function(data)
                  {
                    var url = window.location.href;
                    window.location.replace(url);

                    // console.log(data);
                    // $('#titleLocation_'+data['id']).html(data['title']);
                    // $('#BMenuCategoryTitle_'+data['id']).html(data['location']);

                    // $('#titleLocationEdit').val('');
                    // $('#idMenuLocationEdit').val('');
                  },
                  error: function(xhr, status, error)
                  {
                    alert(error);
                  },
                });
            });

            function deleleMenuLocation(id)
            {
                var x = confirm('是否删除这个菜单');
                var id = id;

                if(x)
                {
                    $.ajax({
                        type: "POST",
                        url: "/api/admin/menuLocation/delete",
                        data: { 
                            id: id,
                            deleteKey: 'deleteVkVm1PU2xXNXdyYTQzNkp1Rn111VYTFE9PSIsInZhbHVlI000deleteMenu',
                            deleteKey1: 'deleteNJcVRKTFFvcFhrR1k4XC888ARHp1NkxnPT0iLCJ2YWx1ZSI6000deleteMenu',
                        },
                        cache : false,
                        success: function(data)
                        {
                            $("tr[trLocation_id='" + id +"']").remove();
                            // window.location.replace("/admin/menus");
                        } ,error: function(xhr, status, error) 
                        {
                            alert(error);
                        },
                    });
                }
            }
            // Menu Location end
        </script>

    </body>

</html>