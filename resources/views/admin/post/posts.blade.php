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
                                    <h4 class="mb-0">
                                        @if($bPostType->id != 1)
                                        循环页 - {{$bPostType->title}}
                                        @else
                                        {{$bPostType->title}}
                                        @endif

                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <span type="button" id="hidePostType" class="mb-0 btn btn-outline-primary waves-effect waves-light mdiaCatText">
                                            @if($bSetting->status == 0)
                                            显示循环页大类
                                            @else
                                            隐藏循环页大类
                                            @endif
                                        </span>
                                    </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">循环页 - {{$bPostType->title}}</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="sizeBox col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <a href="/admin/post/type/add/{{$bPostType->id}}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i> 新增循环页</a>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-inline float-md-right mb-3">
                                                    <div class="search-box ml-2">
                                                        <div class="position-relative">
                                                            {{ $posts->links() }}
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
                                                    <th scope="col" class="list-table-li">ID</th>
                                                    <th scope="col" class="list-table-li">标题</th>
                                                    @if($_SERVER['REQUEST_URI'] != '/admin/posts/type/1')
                                                    <th scope="col" class="list-table-li">小类</th>
                                                    @endif
                                                    <th scope="col" class="list-table-li">模板</th>
                                                    <th scope="col" class="list-table-li center">浏览</th>
                                                    <th scope="col" class="list-table-li center">状态</th>
                                                    <th scope="col" class="list-table-li">置顶</th>
                                                    <th scope="col" class="list-table-li center">发布时间</th>
                                                    <th scope="col" class="list-table-li list-table-action-btn">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($posts as $data)
                                                    <tr tr_id="{{$data->id}}">
                                                        <td class="list-table-li">
                                                            <span>{{$data->id}}</span>
                                                        </td>
                                                        <td class="list-table-li">
                                                            <span id="title_{{$data->id}}">{{$data->title}}</span>
                                                        </td>
                                                        @if($_SERVER['REQUEST_URI'] != '/admin/posts/type/1')
                                                        <td class="list-table-li" id="content3_{{$data->id}}">
                                                            <?php $i = 1; ?>
                                                            @if(count($data->categories) > 0 )
                                                                @foreach ($data->categories as $key => $cat)
                                                                    {{$cat->title}}
                                                                    @if($i < count($data->categories))
                                                                    ，
                                                                    @endif
                                                                    <?php $i++; ?>
                                                                @endforeach
                                                            @else
                                                            无小类
                                                            @endif
                                                        </td>
                                                        @endif
                                                        <td class="list-table-li">
                                                            <span>{{$data->template}}</span>
                                                        </td>
                                                        <td id="view_{{$data->id}}" class="center">{{$data->view}}</td>
                                                        <td id="public_{{$data->id}}" class="center">
                                                            @if($data->public == 'public')
                                                            <span class="haspublic">已发布</span>
                                                            @else
                                                            <span class="unpublic">草稿</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($data->ranking == 0)
                                                            <span class="notTop">否 {{$data->ranking}}</span>
                                                            @else
                                                            <span class="top">是 {{$data->ranking}}</span>
                                                            @endif
                                                        </td>
                                                        <td class="center">{{$data->created_at}}</td>
                                                        
                                                        <td>
                                                            <ul class="list-inline mb-0">

                                                                <li class="list-inline-item">
                                                                    <a href="/post/{{$bPostType->id}}/{{$data->id}}.html" target="_blank"><i class="uil uil-external-link-alt font-size-18"></i></a>
                                                                </li>

                                                                &nbsp;&nbsp;

                                                                <li class="list-inline-item">
                                                                    <a href="/admin/post/type/edit/{{$bPostType->id}}/{{$data->id}}" class="px-2 text-primary"><i class="uil uil-edit font-size-18"></i></a>
                                                                </li>

                                                                <div class="btn-group mr-1 mt-2">
                                                                    <button type="button" class="btn btn-info">更多</button>
                                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="mdi mdi-chevron-down"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="">
                                                                        <div class="dropdown-divider"></div>
                                                                        <span class="dropdown-item pointer copy-post" id="{{$data->id}}" type="{{$data->b_posts_type_id}}" data-toggle="modal" data-target="#copyPost">
                                                                            复制
                                                                        </span>
                                                                        <div class="dropdown-divider"></div>
                                                                        <span class="dropdown-item pointer" onclick="deleleItem({{$data->id}})">删除</span>
                                                                    </div>
                                                                </div>
                                                                
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
                                                        {{ $posts->links() }}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($bPostType->id != 1)
                            <div class="col-lg-4" id="MediaCategory" style="display: none;">
                                <div class="card MediaCategoryCard">

                                    <span id="nestable-posts-types">
                                        <button type="button" class="btn btn-primary btn-block waves-effect waves-light add-posts-type" data-toggle="modal" data-target="#addPostType">
                                            新增循环页大类
                                        </button>

                                        <button type="button" class="btn btn-outline-success btn-block waves-effect waves-light posts-types-expand-all" data-action="expand-all-types">扩展</button>

                                        <button type="button" class="btn btn-outline-success btn-block waves-effect waves-light posts-types-collapse-all" data-action="collapse-all-teyps">折合</button>
                                    </span>

                                    <div class="space-15"></div>

                                    <div class="menu">
                                        <center>
                                          <div id="loadT"></div>

                                            <div class="dd-type" id="nestable-post-type">
                                                <div id="get_post_type"></div>
                                            </div>

                                          <input type="hidden" id="nestable-output-post-type">

                                        </center>
                                    </div>

                                </div>
                            </div>
                            @endif

                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                @include("admin.layout.footer")
            </div>
            <!-- end main content-->

            <!-- The Modal 1 post type -->
            <div class="modal fade" id="addPostType">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">新增循环页大类</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form">

                          <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">标题</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="postTypeTitle" placeholder="" required>
                            </div>
                          </div>

                          <input type="hidden" id="postTypeId">
                          
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <span type="button" class="btn btn-primary w-md" data-dismiss="modal" id="postTypeSubmit">提交</span>
                      <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="postTypeReset">取消</span>
                    </div>
                    
                  </div>
                </div>
            </div>

            <!-- The Modal 1 post type -->
            <div class="modal fade" id="copyPost">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">复制页面</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form">

                          <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">页面大类</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="selectPostType" name="selectPostType">
                                    @if($_SERVER['REQUEST_URI'] == '/admin/posts/type/1')
                                    <option value="1">专题页</option>
                                    @else
                                    @foreach($bPostTypes as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                          </div>

                          <input type="text" id="postId" hidden>
                          
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <span type="button" class="btn btn-primary w-md" data-dismiss="modal" onclick="copyPost()">提交</span>
                      <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="postTypeReset">取消</span>
                    </div>
                    
                  </div>
                </div>
            </div>

        </div>
        <!-- END layout-wrapper -->

        @if($bSetting->status != 0)
        <script>
            $("#MediaCategory").css('display','block');
            $('.sizeBox').addClass('sizeBox col-lg-8');
        </script>
        @else
        <script>
            $("#MediaCategory").css('display','none');
            $('.sizeBox').addClass('sizeBox col-lg-8 col-lg-12');
        </script>
        @endif

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <!-- <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> -->

        <script src="/assets/js/app.js"></script>
        <script src="/resources/js/jquery.nestable.js"></script>
        <script src="/admin/js/post.js"></script>

        <script>
            $(document).ready(function()
            {
                $("#hidePostType").click(function()
                {
                    if($("#MediaCategory").css("display")=="none"){
                        $("#MediaCategory").show();
                        $(".mdiaCatText").text("隐藏循环页大类");
                        $(".sizeBox").toggleClass("col-lg-12");
                        displayContentStatus(1);
                        console.log(1);
                    }else{
                        $("#MediaCategory").hide();
                        $(".mdiaCatText").text("显示循环页大类");
                        $(".sizeBox").toggleClass("col-lg-12");
                        displayContentStatus(0);
                        console.log(0);
                    }
                });
            });

            function displayContentStatus(status)
            {
                $.ajax({
                    type: "POST",
                    url: "/api/admin/post/display/content/type",
                    data: { 
                        status: status,
                        displayKey: 'displayAEzAaSASAS&^(*&^&*(*&DS!E0@L;L;#aAF;12345678SDFSASAjHI330q111post',
                    },
                    cache : false,
                    success: function(data)
                    {
                        console.log(data);
                        // location.reload();

                    } ,error: function(xhr, status, error) 
                    {
                        alert(error);
                    },
                });
            }

            $(document).on("click",".copy-post",function()
            {
                var id = $(this).attr('id');
                var type = $(this).attr('type');
                $("#postId").val(id);
                $("select[name='selectPostType']").val(type);
            });

            // Menu Category start
            $(document).on("click",".editButton",function()
            {
                var id = $(this).attr('id');
                var title = $("#title_"+id).html();
                var content = $("#content_"+id).html();
                $("#idEdit").val(id);
                $("#titleEdit").val(title);
                $("#contentEdit").val(content);
            });

            $("#updateItem").click(function()
            {
                var dataString = { 
                    id : $("#idEdit").val(),
                    title : $("#titleEdit").val(),
                    content : $("#contentEdit").val(),

                    updateKey: 'updatebAEzBQMAadasmaYgds11raFjsaasjHI0qGcdf33S3UpdasteMenu',
                    updateKey1: 'upAdateAEzdBSQaMsmaYScDgrjbdjHaSI0gaq33F3UpdSaatefMenu',
                };

                $.ajax({
                  type: "POST",
                  url: "/api/admin/role/update",
                  data: dataString,
                  dataType: "json",
                  cache : false,
                  success: function(data)
                  {
                    console.log(data);
                    $('#title_'+data['id']).html(data['title']);
                    $('#content_'+data['id']).html(data['content']);

                    $('#idEdit').val('');
                    $('#titleEdit').val('');
                    $('#contentEdit').val('');
                  },
                  error: function(xhr, status, error)
                  {
                    alert(error);
                  },
                });
            });

            function copyPost()
            {
                var id = $("#postId").val();
                var type = $("select[name='selectPostType']").val();

                $.ajax({
                    type: "POST",
                    url: "/api/admin/post/copy",
                    data: { 
                        id: id,
                        type: type,
                        copyKey: 'copyAEzAdsdkSDs321&……（……（*&……（*FDS!E0@L;L;#aAF;12345678SDFSASAjHI330q111post',
                        copyKey1: 'copyAASFSDjsdkfj……&*……&**（￥sdfdASFGFEHGASa!sdjfhdjskld&*(*(dd__dsfdksfdI330q111post',
                    },
                    cache : false,
                    success: function(data)
                    {
                        // console.log(data);
                        // location.reload();

                        window.location.href = "/admin/posts/type/"+type;

                    } ,error: function(xhr, status, error) 
                    {
                        alert(error);
                    },
                });
            }

            function deleleItem(id)
            {
                var x = confirm('是否删除这个菜单？');
                var id = id;

                if(x)
                {
                    $.ajax({
                        type: "POST",
                        url: "/api/admin/post/delete",
                        data: { 
                            id: id,
                            deleteKey: 'deleteAEzAdsdkSDFDS!E0@L;L;#aAF;12345678SDFSASAjHI330q111post',
                            deleteKey1: 'delet!ADFGRDF@GFH#dfga$jghdrer%12121678EzBQMmaYgrjdjHSI0333gq111post',
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