<!doctype html>
<html lang="en">

    <head>

        @include("admin.layout.headStart")
        
        <title>后台</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <link href="/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Summernote css -->
        <link href="/assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />

        <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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
                                        新增循环页 
                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <span type="button" id="hidePostContent" class="mb-0 btn btn-outline-primary waves-effect waves-light pageContentText" status="{{$bpost->content_show}}" post="{{$bpost->id}}">
                                            @if($bpost->content_show == 0)
                                            隐藏主体
                                            <script>
                                                $("#postContentBox").hide()
                                                $("#postContentBox").css('display','none');
                                            </script>
                                            @endif
                                            @if($bpost->content_show == 1)
                                            <script>
                                                $("#postContentBox").css('display','none');
                                            </script>
                                            显示主体
                                            @endif
                                        </span>
                                        &nbsp;&nbsp;
                                        
                                        <span class="bigBlock">
                                            <select class="form-control selectContent" id="selectContent" name="selectContent" onchange="onChangeStructure(this.value)">
                                                <option value="text">文字</option>
                                                <option value="image">图片</option>
                                                <option value="video">视频</option>
                                                <option value="slider">轮播图</option>
                                                <!-- <option value="template">模板</option> -->
                                            </select>

                                            <span id="selectNum">
                                                <input type="text" class="form-control num" id="num" name="num" maxlength="1" value="1" oninput="value=value.replace(/[^\d]/g,'')" />
                                            </span>

                                            <select class="form-control" id="selectTemplate" name="selectTemplate" style="display: none;">
                                                <option value=""></option>
                                            </select>

                                            <input type="text" id="templateJson" name="templateJson" hidden>

                                            <span type="button" class="mb-0 btn btn-outline-success waves-effect waves-light addPageContent">添加</span>
                                        </span>
                                    </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/posts">循环页</a></li>
                                            <li class="breadcrumb-item active">新增循环页</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Post content Start -->
                        <form action="/admin/post/update/{{$bpost->id}}" method="POST">
                        {{csrf_field()}}
                        
                        @include('admin.layout.error')
                        <div class="row">
                            <div class="col-xl-12">
                                
                                <div class="custom-accordion">

                                    <div class="row">
                                        <div class="col-lg-8">

                                            <div class="form-group mb-4">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="标题" value="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="custom-accordion">

                                                <div class="release">
                                                    <div class="right">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light w-md" onclick="submit_content()">提交</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 主体内容 -->
                                    @include('admin.post.main_edit')

                                    <div class="card">
                                        <a href="#ContentBox1" class="text-dark" data-toggle="collapse">
                                            <div class="p-4">
                                                
                                                <div class="media align-items-center">
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">分类+标签</h5>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>
                                                
                                            </div>
                                        </a>

                                        <div id="ContentBox1" class="collapse show">
                                            <div class="p-4 border-top">

                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-4">
                                                            <label for="billing-name">分类</label>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="menu">
                                                                        <center>
                                                                            <div class="dd dd-category" id="nestable-posts-category">
                                                                                <div id="get_posts_category"></div>
                                                                            </div>

                                                                          <input type="hidden" id="nestable-output-media-category">

                                                                        </center>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input type="hidden" id="b_posts_type_id" name="b_posts_type_id" value="{{$bPostType->id}}">
                                                                
                                                                <input type="hidden" id="selectCategoryValue" name="selectCategoryValue">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-4">
                                                            <label for="billing-name">标签</label>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="menu">
                                                                        <center>
                                                                            <div class="dd dd-tag" id="nestable-media-tag">
                                                                                <div id="get_posts_tag"></div>
                                                                            </div>

                                                                          <input type="hidden" id="nestable-output-media-tag">

                                                                        </center>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" id="b_posts_tag_id" name="b_posts_tag_id" value="{{$bPostType->id}}">

                                                                <input type="hidden" id="selectTagValue" name="selectTagValue">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 文字 -->
                                    <div id="content_box_text" style="display: none;">
                                        文字一共 <span id="number_text"></span>个
                                        <i class="uil uil-trash-alt font-size-18 del_target" onclick="removeItem('text')"></i>

                                        <input type="number" id="content_num_text" name="content_num_text" value="0" hidden>

                                        <div class="card margin-top-10">
                                            <a href="#contentBox1" class="text-dark" data-toggle="collapse">
                                                <div class="p-4">
                                                    
                                                    <div class="media align-items-center">
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="font-size-16 mb-1">
                                                                文字 
                                                            </h5>
                                                        </div>
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>
                                                    
                                                </div>
                                            </a>

                                            <div id="contentBox1" class="collapse show">
                                                <div class="p-4 border-top">

                                                    <div class="row" id="content_text">
                                                        <!-- <div class="col-lg-3">
                                                            <div class="form-group mb-4">
                                                                <label for="billing-name">文字1</label>
                                                                <input type="text" class="form-control" id="text1" name="data[text1]" placeholder="" value="">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 图片 -->
                                    <div id="content_box_image" style="display: none;">
                                        图片一共 <span id="number_image"></span>个
                                        <i class="uil uil-trash-alt font-size-18 del_target" onclick="removeItem('image')"></i>

                                        <input type="number" id="content_num_image" name="content_num_image" value="0" hidden>

                                        <div class="card margin-top-10">
                                            <a href="#contentBox2" class="text-dark" data-toggle="collapse">
                                                <div class="p-4">
                                                    
                                                    <div class="media align-items-center">
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="font-size-16 mb-1">图片</h5>
                                                        </div>
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>
                                                    
                                                </div>
                                            </a>

                                            <div id="contentBox2" class="collapse show">
                                                <div class="p-4 border-top">

                                                    <div class="row" id="content_image">

                                                        <!-- <div class="col-lg-3">
                                                            <div class="form-group mb-4">
                                                                <label for="billing-name">图片1</label>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" target="media1" data-toggle="modal" data-target=".bs-example-modal-xl" onclick="go('media1')">
                                                                            <i class="uil uil-image font-size-18"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="col-lg-9">
                                                                        <img class="media1A" target="media1" data-toggle="modal" data-target=".bs-example-modal-xl" src="" width="100%" name="data[media1A]">

                                                                        <input type="text" id="media1" name="data[media1]" value="">
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 视频 -->
                                    <div id="content_box_video" class="contentVideo"  style="display: none">
                                        视频一共 <span id="number_video"></span>个
                                        <i class="uil uil-trash-alt font-size-18 del_target" onclick="removeItem('video')"></i>
                                        <input type="number" id="content_num_video" name="content_num_video" value="0" hidden>

                                        <div class="card margin-top-10">
                                            <a href="#contentBox4" class="text-dark" data-toggle="collapse">
                                                <div class="p-4">
                                                    
                                                    <div class="media align-items-center">
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="font-size-16 mb-1">视频</h5>
                                                        </div>
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>
                                                    
                                                </div>
                                            </a>

                                            <div id="contentBox4" class="collapse show">
                                                <div class="p-4 border-top" id="content_video">

                                                    <!-- <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="card">
                                                                <div class="card-body videoBox">
                                    
                                                                    <div class="videoBox1">
                                                                        <span class="video-title" data-toggle="modal" data-target=".bs-example-modal-xl">视频 1</span>
                                                                        <span class="video-description">默认比例：16:9</span>

                                                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light right" target="media1" data-toggle="modal" data-target=".bs-example-modal-xl" onclick="go('video1')">
                                                                            <i class="uil uil-image font-size-18"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="embed-responsive embed-responsive-16by9 video-content">
                                                                        <video class="video1A" width="100%" height="" controlslist="nodownload" controls="" preload="none" poster="">
                                                                            <source src="" type="video/mp4">
                                                                        </video>
                                                                    </div>

                                                                    <input type="text" id="video1" name="data[video1]" value="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div class="card1">
                                                                <div class="card-body videoBox">

                                                                    <div class="videoBox1">
                                                                        <span class="video-title" data-toggle="modal" data-target=".bs-example-modal-xl">封面图 1</span>

                                                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light right" target="media1" data-toggle="modal" data-target=".bs-example-modal-xl" onclick="go('videoImage1')">
                                                                            <i class="uil uil-image font-size-18"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-2">
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <img class="videoImage1A" target="videoImage1" data-toggle="modal" data-target=".bs-example-modal-xl" src="" width="100%" name="data[videoImage1A]">
                                                                        </div>
                                                                    </div>

                                                                    <input type="text" id="videoImage1" name="data[videoImage1]" value="">

                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                    </div> -->
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 轮播图 -->
                                    <div id="content_box_slider" style="display: none;">
                                        轮播图一共 <span id="number_slider"></span>个
                                        <i class="uil uil-trash-alt font-size-18 del_target" onclick="removeItem('slider')"></i>

                                        <input type="number" id="content_num_slider" name="content_num_slider" value="0" hidden>

                                        <div class="card contentSlider margin-top-10">
                                            <a href="#contentBox3" class="text-dark" data-toggle="collapse">
                                                <div class="p-4">
                                                    
                                                    <div class="media align-items-center">
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="font-size-16 mb-1">轮播图</h5>
                                                        </div>
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>
                                                    
                                                </div>
                                            </a>

                                            <div id="contentBox3" class="collapse show">
                                                <div class="p-4 border-top" id="content_slider">

                                                    <!-- <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                    
                                                                    <div class="sliderBox">
                                                                        <span class="video-title" data-toggle="modal" data-target=".bs-example-modal-xl">模拟效果</span>
                                                                    </div>
                                    
                                                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                                                        <ol class="carousel-indicators" id="slider_ol1">
                                                                        </ol>

                                                                        <div class="carousel-inner" role="listbox" id="slider_content1">    
                                                                        </div>

                                                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                            <span class="sr-only">Previous</span>
                                                                        </a>
                                                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                            <span class="sr-only">Next</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div class="card sliderBoxRight">
                                                                <div class="card-body">
                                                                    
                                                                    <div class="sliderSetting">
                                                                        <h4 class="card-title">
                                                                            设置
                                                                        </h4>
                                                                        <span type="button" class="mb-0 btn btn-outline-success waves-effect waves-light" onclick="addSliderContent('1')">添加</span>
                                                                    </div>

                                                                    图字一共 <span id="number_slider1">0</span>个
                                                                    <i class="uil uil-trash-alt font-size-18 del_target" onclick="removeItemSlider('slider1')"></i>
                                                                    <input type="number" id="content_num_slider1" name="content_num_slider1" value="0">

                                                                    <div id="accordion3" class="custom-accordion">
                                                                        
                                                                    </div>
                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                    </div> -->
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>

                        </div>
                        </form>
                        <!-- Post content Sizing -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                @include("admin.layout.footer")
            </div>
            <!-- end main content-->

            <div class="card mfp-hide mfp-popup-form mx-auto" id="test-form">
                <div class="card-body">
                    include('admin.page.templates.sidebar_edit_select_media')
                </div>
            </div>

            <div class="modal fade1 bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered lg-modal">
                    <div class="modal-content" style="min-height: 610px;">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">选择媒体</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('admin.page.select_media')
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END layout-wrapper -->

        <button type="button" class="btn btn-primary btn-lg btn-block1 waves-effect waves-light release-menu" id="copy-link" hidden></button>

        <input type="text" id="b_post_id" name="b_post_id" value="{{$bpost->id}}" hidden>

        @if($bpost->content_show == 0)
        
        @endif
        @if($bpost->content_show == 1)
        <script>
            $("#postContentBox").css('display','none');
        </script>
        @endif

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <!-- <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> -->

        <script src="/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="/assets/js/pages/lightbox.init.js"></script>

        <!-- Summernote js -->
        <script src="/assets/libs/summernote/summernote-bs4.min.js"></script>
        <!-- init js -->
        <script src="/assets/js/pages/form-editor.init.js"></script>

        <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="/assets/js/pages/sweet-alerts.init.js"></script>

        <script src="/assets/js/app.js"></script>

        <script src="/resources/js/jquery.nestable.js"></script>
        <script src="/admin/js/post_add_edit.js"></script>
        <script src="/admin/js/post_edit.js"></script>
        <script src="/admin/js/post_category_tag.js"></script>
        <script src="/admin/js/select_media.js"></script>

    </body>

</html>