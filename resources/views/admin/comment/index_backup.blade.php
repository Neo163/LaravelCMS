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
                                    <h4 class="mb-0">
                                        评论
                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <a href="" class="btn btn-outline-primary">未审核</a>
                                        &nbsp;&nbsp;
                                        <a href="" class="btn btn-outline-success">已审核</a>
                                        &nbsp;&nbsp;
                                        <a href="" class="btn btn-outline-danger">回收站</a>
                                        &nbsp;&nbsp;
                                        <a href="" class="btn btn-outline-info">全部</a>
                                    </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">评论</li>
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
                                                  <tr class="center">
                                                    <th scope="col">内容</th>
                                                    <th scope="col">用户名</th>
                                                    <th scope="col">状态</th>
                                                    <th scope="col">IP 和 提交时间</th>
                                                    <th scope="col">评论页面ID</th>
                                                    <th scope="col" style="width: 200px;">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($comments as $data)
                                                    <tr tr_id="{{$data->id}}">

                                                        <td width="50%" class="commentContent">
                                                        @if($data->remark != 'admin_reply')
                                                            <textarea rows="5" class="textareaDisabled" id="title_{{$data->id}}" disabled>{!! $data->content !!}</textarea>
                                                        @else
                                                            <span class="replyTitle">管理员：</span>
                                                            <textarea rows="5" class="textareaDisabledReply" id="title_{{$data->id}}" disabled>{!! $data->content !!}</textarea>
                                                        @endif
                                                        </td>
                                                        
                                                        <td id="username_{{$data->id}}" class="center">
                                                            <div>{{$data->username}}</div>
                                                        </td>
                                                        <td class="center">
                                                            @if($data->check == 1)
                                                            <span class="hascheck">通过审核</span>
                                                            @else
                                                            <span class="uncheck">未通过审核</span>
                                                            @endif
                                                        </td>
                                                        <td id="description_{{$data->id}}" class="center">
                                                            <div>{{$data->ip}}</div>
                                                            <div>{{$data->created_at}}</div>
                                                        </td>
                                                        <td id="page_{{$data->id}}" class="center">
                                                            <div>
                                                                <a href="" target="_blank">{{$data->b_post_id}}</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" onclick="deleleItem({{$data->id}})"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary replyBtu" id="{{$data->id}}" b_post_id="{{$data->b_post_id}}" parent="{{$data->parent}}" data-toggle="modal" data-target="#addItem"><i class="uil uil-comment-edit font-size-18"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    @if($data->check == 1)
                                                                    <span class="px-2 text-primary checkBtn" onclick="CommentCheck({{$data->id}}, 0)"><i class="uil uil-info-circle font-size-18"></i></span>
                                                                    @else
                                                                    <span class="px-2 text-primary checkBtn" onclick="CommentCheck({{$data->id}}, 1)"><i class="uil uil-comment-verify font-size-18"></i></span>
                                                                    @endif
                                                                </li>

                                                                @if($data->remark == 'admin_reply')
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary editButton" id="{{$data->id}}" title="{{$data->title}}" data-toggle="modal" data-target="#editItem"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                @endif
                                                                
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

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">回复评论</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="formrow-firstname-input">内容</label>
                                <textarea rows="5" class="form-control" id="content" name="content" placeholder="" required></textarea>
                            </div>

                            <div id="idComment" hidden></div>
                            <div id="b_post_id" hidden></div>
                            <div id="parent" hidden1></div>
                              
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary w-md" onclick="submitReply()">提交</button>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                        </div>
                    
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
                                  <input type="text" class="form-control" id="titleEdit" name="title" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">描述</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit" placeholder="">
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
            //定义变量获取屏幕视口宽度
            var windowWidth = $(window).width();
            if(windowWidth < 623)
            {
                // console.log('手机尺寸');
                $('body').addClass('body_wap');
            }
            // 656
            if(windowWidth >= 640)
            {
                // console.log('电脑尺寸');
                $('#header').removeClass('displayNo');
            }

            // Menu Category start
            $(document).on("click",".replyBtu",function()
            {
                var id = $(this).attr('id');
                var b_post_id = $(this).attr('b_post_id');
                var parent = $(this).attr('parent');
                
                $("#idComment").html(id);
                $("#b_post_id").html(b_post_id);
                $("#parent").html(parent);
            });

            $(document).on("click",".editButton",function()
            {
                var id = $(this).attr('id');
                var title = $("#title_"+id).html();
                var description = $("#description_"+id).html();
                $("#idEdit").val(id);
                $("#titleEdit").val(title);
                $("#descriptionEdit").val(description);
            });

            function submitReply()
            {
                if($("#parent").html() != 0)
                {
                    alert('后台管理员不能回复同角色的后台管理员内容！');
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "/api/comment/create",
                    data: {
                        id: $("#b_post_id").html(),
                        parent: $("#idComment").html(),
                        content: $("#content").val(),
                        category: 'article',
                        username: 'admin_reply',
                        remark: 'admin_reply',
                        commentKey: 'AEzBQMmYg1adsfdsASDFDSFS1888111comment',
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

            $("#updateItem").click(function()
            {
                var dataString = { 
                    id : $("#idEdit").val(),
                    title : $("#titleEdit").text(),
                    // description : $("#descriptionEdit").val(),

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
                    $('#description_'+data['id']).html(data['description']);

                    $('#idEdit').val('');
                    $('#titleEdit').text('');
                    // $('#descriptionEdit').val('');
                  },
                  error: function(xhr, status, error)
                  {
                    alert(error);
                  },
                });
            });

            function CommentCheck(id, status)
            {
                $.ajax({
                    type: "POST",
                    url: "/api/admin/comment/check",
                    data: { 
                        id: id,
                        status: status,
                        checkKey: 'checkVkVm1sdss%……&（……&**（lcI0003Comment',
                    },
                    cache : false,
                    success: function(data)
                    {
                        // console.log(data);

                        location.reload();

                        // window.location.replace("/admin/menus");
                    } ,error: function(xhr, status, error) 
                    {
                        alert(error);
                    },
                });
            }

            function deleleItem(id)
            {
                var x = confirm('是否删除这个评论');
                var id = id;

                if(x)
                {
                    $.ajax({
                        type: "POST",
                        url: "/api/admin/comment/delete",
                        data: { 
                            id: id,
                            deleteKey: 'del1eteVkVm1$#&(&(&(**)_)()(5678bsInZhb2HVlcI0003deleteComment',
                        },
                        cache : false,
                        success: function(data)
                        {
                            // console.log(data);

                            $("tr[tr_id='" + id +"']").remove();
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