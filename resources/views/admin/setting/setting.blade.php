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

                                        <div>

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
                                                                <button class="btn btn-primary waves-effect waves-light w-md" onclick="submitData(1)">提交</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">软件后端名字</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" id="t1" name="t1" value="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">软件前端名字</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" id="t2" name="t2" value="">
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Logo</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" id="t3" name="t3" value="">
                                                </div>
                                            </div> -->

                                        </div>

                                        <!-- <div class="form-group row">
                                            <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                                            </div>
                                        </div> -->

                                        <!-- <div class="form-group row">
                                            <label class="col-md-2 col-form-label">语言</label>
                                            <div class="col-md-10">
                                                <select class="form-control">
                                                    <option>中文简体</option>
                                                    <option>English</option>
                                                    <option>中文繁体</option>
                                                </select>
                                            </div>
                                        </div> -->

                                        <input type="hidden" name="content" id="test" value="{{$setting}}">
                                        

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

        <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <script src="/resources/js/jquery-3.5.1.js"></script>

        <button type="button" class="btn btn-primary btn-lg btn-block1 waves-effect waves-light release-menu" id="update-tips" hidden="">发布</button>
            
        <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="/assets/js/pages/sweet-alerts.init.js"></script>

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
            var id = 1;

            $.ajax({
                url: "/api/admin/paragraph",
                method: "GET",
                data: {
                    id: id,
                    paragraphKey: 'create897FSJs$#&*^*0KEJOEPs/dRMUrrfASD!#$F0784fd0adad1%^&^ewhfghdde6SDFSb9d9125c07493b8eId9EA1',
                },
                dataType: "json",
                cache : false,
                success: function (data)
                {
                    // console.log(data);
                    var data = JSON.parse(data['paragraph'][0]['content']);
                    // console.log(data);

                    $("#t1").val(data['t1']);
                    $("#t2").val(data['t2']);
                    
                },
                error: function(xhr, status, error)
                {
                    alert(error);
                },
            });

            function submitData(id)
            {
                var data = {};
                data['t1'] = $("#t1").val();
                data['t2'] = $("#t2").val();

                console.log(data);

                $.ajax({
                    url: "/api/admin/paragraph/update",
                    method: "POST",
                    data: {
                        updateKey: 'updaAdsafasdfdsdfgddfAERYQ,FDDFBFGWV122314!@^)^$1123AS!@df33S3UpdasteParagraph',
                        updateKey1: 'upAdateAE!ADSFGDSSDFDSsafwejykc!&*(*&*%$$12124333atefMenuParagraph',
                        id: id,
                        json: data,
                    },
                    // dataType: "json",
                    cache : false,
                    success: function (data)
                    {
                        console.log(data);
                        if(data == 'OK')
                        {
                            $('#update-tips').trigger("click");
                        }
                    },
                    error: function(xhr, status, error)
                    {
                        alert(error);
                    },
                });
            }
        </script>

    </body>

</html>