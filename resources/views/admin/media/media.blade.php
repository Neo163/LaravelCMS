<!doctype html>
<html lang="en">

    <head>

        @include("admin.layout.headStart")
        
        <title>后台</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <link href="/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="/resources/font-awesome/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="/resources/bootstrap-4.6.0/css/bootstrap.min.css"> -->

        <link rel="stylesheet" type="text/css" href="/admin/css/menu.css">

        <style>
            .menu {
                margin-bottom: 30px;
                max-height: 600px;
                overflow-x: hidden;
            }
            .avatar-xs {
                 height: unset;
                width: 5rem;
            }
        </style>    

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
                                        媒体 &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <span type="button" id="mediaAdd" class="mb-0 btn btn-outline-primary waves-effect waves-light uploadText">
                                            @if($setting_media_upload->status == 0)
                                            上传
                                            @else
                                            取消
                                            @endif
                                        </span>

                                            <span type="button" id="hideMediaCategory" class="mb-0 btn btn-outline-primary waves-effect waves-light mdiaCatText">隐藏小类</span>
                                        </span>
                                    </h4>
                                    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item active">媒体</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @include('admin.layout.error')

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <div class="row" id="mediaUpload">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <!-- <h4 class="card-title">点击或拖动上传媒体</h4> -->
                                        <form method="post" action="/admin/media/mediaUpload" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        
                                            <div>

                                                <div class="form-group mb-4 mb-lg-0">
                                                        <label>媒体小类</label>
                                                        <select class="form-control custom-select" id="media_category" name="media_category">
                                                            @foreach($mediaCategories as $mediaCategory)
                                                            <option value="{{$mediaCategory->id}}">{{$mediaCategory->title}}</option>
                                                            @endforeach                              
                                                        </select>
                                                    </div>

                                                    <script>
                                                        // $("select[name='media_category']").val();
                                                    </script>

                                                    <div class="space-10"></div>
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <!-- <input name="file" type="file" multiple="multiple"> -->
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <input type="file" name="select_file" class="select_file" />
                                                            <!-- <i class="display-4 text-muted uil uil-cloud-upload"></i> -->
                                                        </div>
                                                        
                                                        <!-- <h4>最大上传文件大小</h4> -->
                                                        <h6>可上传文件格式：jpg,jpeg,png,gif,mp3,mp4,mkv,wmv,xlsx,xls,doc,docx,txt,sql,zip,rar,7z,tar,gz,iso</h6>
                                                    </div>
                                                </div>

                                                
                                                <!-- <div class="form-group">
                                                    <input type="file" name="select_file" />
                                                </div> -->
                                            </div>
            
                                            <div class="text-center mt-4">
                                                <button type="submit" name="upload" type="button" class="btn btn-primary waves-effect waves-light w-md">上传</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="sizeBox col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                    <!-- <div class="btn-group mr-2 mb-2 mb-sm-0">
                                                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                                    </div> -->
                                                    <!-- <div class="btn-group mr-2 mb-2 mb-sm-0">
                                                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ml-1"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Updates</a>
                                                            <a class="dropdown-item" href="#">Social</a>
                                                            <a class="dropdown-item" href="#">Team Manage</a>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="btn-group mr-2 mb-2 mb-sm-0">
                                                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ml-1"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Updates</a>
                                                            <a class="dropdown-item" href="#">Social</a>
                                                            <a class="dropdown-item" href="#">Team Manage</a>
                                                        </div>
                                                    </div> -->

                                                    <!-- <div class="form-inline mb-3">
                                                        <div class="search-box ml-2">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                                                <i class="mdi mdi-magnify search-icon"></i>
                                                            </div>
                                                        </div>
                                                        
                                                    </div> -->
                                            </div>
                
                                            <div class="col-md-6">

                                                <div class="right">
                                                    <i class="uil uil-table font-size-20"></i>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <i class="uil uil-align-justify font-size-20"></i>
                                                </div>
                                                

                                                <!-- <div class="btn-group mr-2 mb-2 mb-sm-0 right">
                                                    <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        更多 <i class="mdi mdi-dots-vertical ml-2"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <span id="nestable-media">
                                                            <span class="dropdown-item pointer" data-action="expand-all">扩展媒体小类</span>
                                                            <span class="dropdown-item" data-action="collapse-all">折合媒体小类</span>
                                                        </span>
                                                    </div>
                                                </div> -->
                                            </div>
                
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
                                                    <th scope="col">小类</th>
                                                    <th scope="col">大小</th>
                                                    <th scope="col">预览</th>
                                                    <th scope="col" style="width: 200px;">操作</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($media as $data)
                                                    <tr media_id="{{$data->id}}">
                                                        <td id="li_title_{{$data->id}}">{{$data->title}}</td>
                                                        <td id="li_bMediaCategory_{{$data->id}}">@if(isset($data->bMediaCategory->title))
                                                                {{$data->bMediaCategory->title}}
                                                            @endif
                                                        </td>
                                                        <td>{{$data->size}}</td>
                                                        <td>
                                                            @if(strrchr($data->fix_link, '.') == '.jpg' || strrchr($data->fix_link, '.') == '.jpeg' || strrchr($data->fix_link, '.') == '.png' || strrchr($data->fix_link, '.') == '.gif')
                                                            <img src="/storage/media/{{$data->month}}/{{$data->fix_link}}" alt="{{$data->title}}" class="image_setting">
                                                            @elseif(strrchr($data->fix_link, '.') == '.mp4' || strrchr($data->fix_link, '.') == '.mkv' || strrchr($data->fix_link, '.') == '.wmv')
                                                            <video width="100%" height="" class="video_setting" controlslist="nodownload" controls="" preload="none" poster="">
                                                                <source src="/storage/media/{{$data->month}}/{{$data->fix_link}}" type="video/mp4">
                                                            </video>
                                                            @else
                                                            文件格式为：{{strrchr($data->fix_link, '.')}}
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            <ul class="list-inline mb-0">

                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" title="删除" onclick="deleleItem({{$data->id}})"><i class="uil uil-trash-alt font-size-20"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <!-- <a href="javascript:void(0);" class="px-2 text-danger copy_link" title="Copy"><i class="uil uil-copy font-size-20"></i></a> -->

                                                                    <a href="javascript:void(0);" class="px-2 text-danger copy_link" title="Copy" onclick="copy_link('/storage/media/{{$data->month}}/{{$data->fix_link}}', '#media-upload-link')"><i class="uil uil-copy font-size-20"></i></a>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary edit-media-category" id="{{$data->id}}" title="{{$data->title}}" fix_link="{{$data->fix_link}}" month="{{$data->month}}" media_category_id="{{$data->b_media_category_id}}" media_category="<?php if(isset($data->bMediaCategory->title)){ echo $data->bMediaCategory->title; } ?>" data-toggle="modal" data-target=".bs-example-modal-xl"><i class="uil uil-pen font-size-20"></i></a>
                                                                </li>

                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                      
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-12">
                                                <div>
                                                    <!-- <p class="mb-sm-0">Showing {{$bData['start_media']}} to {{$bData['end_media']}} of {{$bData['allCount']}} entries</p> -->
                                                    
                                                    <p class="mb-sm-0">当页展示 {{$bData['start_media']}} 到 {{$bData['end_media']}} 个媒体，媒体一共有 {{$bData['allCount']}} 个。媒体大小总计：{{$allSize}}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="float-sm-right">
                                                    {{$media->links()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4" id="MediaCategory">
                                <div class="card MediaCategoryCard">
                                    <span id="nestable-media-categories">

                                        <button type="button" class="btn btn-primary btn-block waves-effect waves-light" data-toggle="modal" data-target="#addItem">
                                            新增媒体小类
                                        </button>

                                        <button type="button" class="btn btn-outline-success btn-block waves-effect waves-light media-categories-expand-all" data-action="expand-all-media-categories">扩展</button>

                                        <button type="button" class="btn btn-outline-success btn-block waves-effect waves-light media-categories-collapse-all" data-action="collapse-all-media-categories">折合</button>

                                        <a href="/admin/media" class="btn btn-outline-success btn-block waves-effect waves-light" class="allMedia">
                                            全部媒体
                                        </a>

                                    </span>

                                    <div class="space-20"></div>
                                    
                                    <div class="menu">
                                        <center>
                                          <div id="load"></div>

                                            <div class="dd" id="nestable-media-category">
                                                <div id="get_media"></div>
                                            </div>

                                          <input type="hidden" id="nestable-output-media-category">

                                        </center>
                                    </div>
                                </div>
                            </div>
        
                        </div><!-- End row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!--  Modal 1 extra large -->
                <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">媒体编辑</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form">

                                      <div class="form-group row">
                                        <div class="col-md-6 row">
                                            <label for="title" class="col-sm-2 col-form-label" id="editId">标题</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" id="editTitle" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 row">
                                            <label for="title" class="col-sm-2 col-form-label">媒体小类</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="editMediaCategory" name="editMediaCategory">
                                                    @foreach($mediaCategories as $mediaCategory)
                                                        <option value="{{$mediaCategory->id}}">
                                                            {{$mediaCategory->title}}
                                                        </option>
                                                    @endforeach                  
                                                </select>
                                            </div>

                                        </div>
                                        
                                      </div>

                                        <div class="form-group row">
                                            
                                        </div>

                                        <div class="form-group row">
                                            <img src="" alt="" width="100%" id="editImg">
                                        </div>

                                      <input type="hidden" id="editId">
                                      
                                    </div>
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <span type="button" class="btn btn-primary w-md" data-dismiss="modal" onclick="mediaEdit()">提交</span>
                                  <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                                </div>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- The Modal 2 media category -->
                <div class="modal fade" id="addItem">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">新增记录</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form">

                              <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">标题</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="title" placeholder="" required>
                                </div>
                              </div>

                              <input type="hidden" id="id">
                              
                            </div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <span type="button" class="btn btn-primary w-md" data-dismiss="modal" id="submit">提交</span>
                          <span type="button" class="btn btn-secondary w-md" data-dismiss="modal" id="reset">取消</span>
                        </div>
                        
                      </div>
                    </div>
                </div>
                
                @include("admin.layout.footer")
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <input type="text" id="media-upload-link" name="media-upload-link" hidden>
        <button type="button" class="btn btn-primary btn-lg btn-block1 waves-effect waves-light release-menu" id="copy-link" hidden></button>

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- Summernote js -->
        <script src="/assets/libs/summernote/summernote-bs4.min.js"></script>

        <!-- email summernote init -->
        <script src="/assets/js/pages/email-summernote.init.js"></script>

        <!-- <script src="/assets/libs/dropzone/min/dropzone.min.js"></script> -->

        <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="/assets/js/pages/sweet-alerts.init.js"></script>

        <script src="/assets/js/app.js"></script>

        <script src="/admin/js/media.js"></script>
        
        <script src="/resources/js/jquery.nestable.js"></script>

        @if($setting_media_upload->status == 0)
        <script>
            $("#mediaUpload").hide();
        </script>
        @else
        @endif

        <script>
            // Media Upload start
            // $('#mediaUpload').css('display', 'none');

            // $('.copy_link').click('click',function(){

            //     var copy_link = $(this).attr('copy_link');
            //     var link = window.location.host+copy_link;

            //     var timestamp = (new Date()).valueOf();
                
            //     $(this).after('<input id="urlText_'+timestamp+'" style="position:fixed;top:-200%;left:-200%;" type="text" value=' + link + '>');
            //     $('#urlText_'+timestamp).select(); //选择对象
            //     document.execCommand("Copy"); //执行浏览器复制命令
            //     alert('媒体链接复制成功');
            // });

            $(document).on("click",".edit-media-category",function()
            {
                var id = $(this).attr('id');
                var title = $(this).attr('title');
                var fix_link = $(this).attr('fix_link');
                var month = $(this).attr('month');
                var media_category_id = $(this).attr('media_category_id');
                var path = '/storage/media/'+month+'/'+fix_link;
                
                $("#editId").val(id);
                $("#editTitle").val(title);
                $("#editImg").attr('src', path);
                $("#editImg").attr('alt', title);
                $("#editMediaCategory").val(media_category_id);
            });

            $(document).ready(function()
            {
                $("#mediaAdd").click(function(){
                    if($("#mediaUpload").css("display")=="none")
                    {
                        ajaxMediaUpload(1);
                        $("#mediaUpload").show();
                        $(".uploadText").text("取消");
                    }else{
                        ajaxMediaUpload(0);
                        $("#mediaUpload").hide();
                        $(".uploadText").text("上传");
                    }
                });

                $("#hideMediaCategory").click(function()
                {
                    if($("#MediaCategory").css("display")=="none"){
                        $("#MediaCategory").show();
                        $(".mdiaCatText").text("隐藏小类");
                        $(".sizeBox").toggleClass("col-lg-12");
                    }else{
                        $("#MediaCategory").hide();
                        $(".mdiaCatText").text("显示小类");
                        $(".sizeBox").toggleClass("col-lg-12");
                    }
                });
            });
            // Media Upload end

            function ajaxMediaUpload(status)
            {
                $.ajax({
                    type: "POST",
                    url: "/api/admin/media_upload/status",
                    data: { 
                        status: status,
                        updateKey: 'updateAEzBQMmYg1asfsd@#$%%%dsfdsASDFDSFS1888111Media',
                        updateKey1: 'update111eAEzBdf#@$#vddds!@$#$#@$aaaASDFDSF111111333gq111Media',
                    },
                    cache : false,
                    success: function(data)
                    {
                        // console.log(data);

                    } ,error: function(xhr, status, error) 
                    {
                        alert(error);
                    },
                });
            }

            function mediaEdit()
            {
                $.ajax({
                    type: "POST",
                    url: "/api/admin/media/update",
                    data: { 
                        id: $("#editId").val(),
                        title: $("#editTitle").val(),
                        b_media_category_id: $('#editMediaCategory').val(),
                        b_user_id: {{Auth::guard("admin")->id()}},
                        updateKey: 'updatebAEzBQM111dfmaYg11rsaAAAjaajHI0qc333UpdateMedia',
                        updateKey1: 'upda112teAEzBQdssAssaMmasasdasYcgr111jdd0gq333UpdateMedia',
                    },
                    dataType: "json",
                    cache : false,
                    success: function(data)
                    {
                        // console.log(data);

                        location.reload();

                        // $('#li_title_'+data['id']).html(data['title']);
                        // $('#li_bMediaCategory_'+data['id']).html(data['bMediaCategory']);

                        // $('#editId').val('');
                        // $('#editTitle').val('');
                        // $("#editImg").attr('src', '');
                        // $("#editMediaCategory").val('');

                    },
                    error: function(xhr, status, error)
                    {
                        alert(error);
                    },
                });
            }

            function deleleItem(id)
            {
                var x = confirm('是否删除这个媒体');
                var id = id;

                if(x)
                {
                    $.ajax({
                        type: "POST",
                        url: "/api/admin/media/delete",
                        data: { 
                            id: id,
                            deleteKey: 'deleteVkVm1aPU2111d!fdssADFGD111IbsInZhb2HVlcI0003deleteMedia',
                            deleteKey1: 'deletDSFGDSegvf111fdg!gd3612AAaW3dx1ZSI6000bdedeleteMedia',
                        },
                        cache : false,
                        success: function(data)
                        {
                            // console.log(data);
                            location.reload();
                            // $("tr[media_id='" + id +"']").remove();
                            // window.location.replace("/admin/media");
                        } ,error: function(xhr, status, error) 
                        {
                            alert(error);
                        },
                    });
                }
            }

        </script>

    </body>

</html>