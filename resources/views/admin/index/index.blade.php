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
                                    <h4 class="mb-0">概览</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li> -->
                                            <!-- <li class="breadcrumb-item active">概览</li> -->
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <div id="total-revenue-chart"></div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$data['bUsersCount']}}</span> 个</h4>
                                            <p class="text-muted mb-0">后台用户</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <span class="text-success mr-1">
                                                <a href="/admin/users">查看</a>
                                                <!-- <i class="mdi mdi-arrow-up-bold ml-1"></i>
                                                1.65% -->
                                            </span>
                                            <!-- 最近7天 -->
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <div id="growth-chart"></div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"> <span data-plugin="counterup">{{$data['usersCount']}}</span> 个</h4>
                                            <p class="text-muted mb-0">前台用户</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <span class="text-success mr-1">
                                                <a href="">暂无</a>
                                                <!-- <i class="mdi mdi-arrow-up-bold ml-1"></i>
                                                10.51% -->
                                            </span>
                                            <!-- 最近7天 -->
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <div id="orders-chart"> </div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$data['bPost']}}</span></h4>
                                            <p class="text-muted mb-0">循环页</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <span class="text-danger mr-1">
                                                <a href="/admin/posts/type/1">查看</a>
                                                <!-- <i class="mdi mdi-arrow-up-bold ml-1"></i>
                                                <i class="mdi mdi-arrow-down-bold ml-1"></i>
                                                0.82% -->
                                            </span>
                                            <!-- 最近7天 -->
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <div id="customers-chart"> </div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$data['bPage']}}</span></h4>
                                            <p class="text-muted mb-0">专题页</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <span class="text-danger mr-1">
                                                <a href="/admin/pages">查看</a>
                                                <!-- <i class="mdi mdi-arrow-down-bold ml-1"></i>
                                                6.24% -->
                                            </span>
                                            <!-- 最近7天 -->
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <i class="uil uil-image font-size-40 dashboard-icon"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$data['bMedia']}}</span></h4>
                                            <p class="text-muted mb-0">媒体</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <span class="text-danger mr-1">
                                                <a href="/admin/media">查看</a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                媒体大小：{{$data['bMediaSize']}}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <div class="dropdown">
                                                <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">All Members<i class="mdi mdi-chevron-down ml-1"></i></span>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#">Locations</a>
                                                    <a class="dropdown-item" href="#">Revenue</a>
                                                    <a class="dropdown-item" href="#">Join Date</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title mb-4">Top Users</h4>

                                        <div data-simplebar style="max-height: 336px;">
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-centered table-nowrap">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 20px;"><img src="/assets/images/users/avatar-4.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                            <td>
                                                                <h6 class="font-size-15 mb-1 font-weight-normal">Glenn Holden</h6>
                                                                <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Nevada</p>
                                                            </td>
                                                            <td><span class="badge badge-soft-danger font-size-12">Cancel</span></td>
                                                            <td class="text-muted font-weight-semibold text-right"><i class="icon-xs icon mr-2 text-success" data-feather="trending-up"></i>$250.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/assets/images/users/avatar-5.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                            <td>
                                                                <h6 class="font-size-15 mb-1 font-weight-normal">Lolita Hamill</h6>
                                                                <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Texas</p>
                                                            </td>
                                                            <td><span class="badge badge-soft-success font-size-12">Success</span></td>
                                                            <td class="text-muted font-weight-semibold text-right"><i class="icon-xs icon mr-2 text-danger" data-feather="trending-down"></i>$110.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/assets/images/users/avatar-6.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                            <td>
                                                                <h6 class="font-size-15 mb-1 font-weight-normal">Robert Mercer</h6>
                                                                <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </td>
                                                            <td><span class="badge badge-soft-info font-size-12">Active</span></td>
                                                            <td class="text-muted font-weight-semibold text-right"><i class="icon-xs icon mr-2 text-success" data-feather="trending-up"></i>$420.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                            <td>
                                                                <h6 class="font-size-15 mb-1 font-weight-normal">Marie Kim</h6>
                                                                <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Montana</p>
                                                            </td>
                                                            <td><span class="badge badge-soft-warning font-size-12">Pending</span></td>
                                                            <td class="text-muted font-weight-semibold text-right"><i class="icon-xs icon mr-2 text-danger" data-feather="trending-down"></i>$120.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/assets/images/users/avatar-8.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                            <td>
                                                                <h6 class="font-size-15 mb-1 font-weight-normal">Sonya Henshaw</h6>
                                                                <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Colorado</p>
                                                            </td>
                                                            <td><span class="badge badge-soft-info font-size-12">Active</span></td>
                                                            <td class="text-muted font-weight-semibold text-right"><i class="icon-xs icon mr-2 text-success" data-feather="trending-up"></i>$112.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/assets/images/users/avatar-2.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                            <td>
                                                                <h6 class="font-size-15 mb-1 font-weight-normal">Marie Kim</h6>
                                                                <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Australia</p>
                                                            </td>
                                                            <td><span class="badge badge-soft-success font-size-12">Success</span></td>
                                                            <td class="text-muted font-weight-semibold text-right"><i class="icon-xs icon mr-2 text-danger" data-feather="trending-down"></i>$120.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/assets/images/users/avatar-1.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                            <td>
                                                                <h6 class="font-size-15 mb-1 font-weight-normal">Sonya Henshaw</h6>
                                                                <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> India</p>
                                                            </td>
                                                            <td><span class="badge badge-soft-danger font-size-12">Cancel</span></td>
                                                            <td class="text-muted font-weight-semibold text-right"><i class="icon-xs icon mr-2 text-success" data-feather="trending-up"></i>$112.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div> 
                                    </div>
                                </div> 
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" id="dropdownMenuButton3"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Recent<i class="mdi mdi-chevron-down ml-1"></i></span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton3">
                                                    <a class="dropdown-item" href="#">Recent</a>
                                                    <a class="dropdown-item" href="#">By Users</a>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="card-title mb-4">Recent Activity</h4>

                                        <ol class="activity-feed mb-0 pl-2" data-simplebar style="max-height: 336px;">
                                            <li class="feed-item">
                                                <div class="feed-item-list">
                                                    <p class="text-muted mb-1 font-size-13">Today<small class="d-inline-block ml-1">12:20 pm</small></p>
                                                    <p class="mt-0 mb-0">Andrei Coman magna sed porta finibus, risus
                                                        posted a new article: <span class="text-primary">Forget UX
                                                            Rowland</span></p>
                                                </div>
                                            </li>
                                            <li class="feed-item">
                                                <p class="text-muted mb-1 font-size-13">22 Jul, 2020 <small class="d-inline-block ml-1">12:36 pm</small></p>
                                                <p class="mt-0 mb-0">Andrei Coman posted a new article: <span
                                                        class="text-primary">Designer Alex</span></p>
                                            </li>
                                            <li class="feed-item">
                                                <p class="text-muted mb-1 font-size-13">18 Jul, 2020 <small class="d-inline-block ml-1">07:56 am</small></p>
                                                <p class="mt-0 mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace
                                                    Commented <span class="text-primary"> Developer Moreno</span></p>
                                            </li>
                                            <li class="feed-item">
                                                <p class="text-muted mb-1 font-size-13">10 Jul, 2020 <small class="d-inline-block ml-1">08:42 pm</small></p>
                                                <p class="mt-0 mb-0">Zack Wetass, Chris combined Commented <span
                                                        class="text-primary">UX Murphy</span></p>
                                            </li>

                                            <li class="feed-item">
                                                <p class="text-muted mb-1 font-size-13">23 Jun, 2020 <small class="d-inline-block ml-1">12:22 am</small></p>
                                                <p class="mt-0 mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace
                                                    Commented <span class="text-primary"> Developer Moreno</span></p>
                                            </li>
                                            <li class="feed-item pb-1">
                                                <p class="text-muted mb-1 font-size-13">20 Jun, 2020 <small class="d-inline-block ml-1">09:48 pm</small></p>
                                                <p class="mt-0 mb-0">Zack Wetass, Chris combined Commented <span
                                                        class="text-primary">UX Murphy</span></p>
                                            </li>

                                        </ol>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="float-right">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" id="dropdownMenuButton4"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Monthly<i class="mdi mdi-chevron-down ml-1"></i></span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                                                    <a class="dropdown-item" href="#">Yearly</a>
                                                    <a class="dropdown-item" href="#">Monthly</a>
                                                    <a class="dropdown-item" href="#">Weekly</a>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="card-title">Social Source</h4>

                                        <div class="text-center">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-soft-primary font-size-24">
                                                        <i class="mdi mdi-facebook text-primary"></i>
                                                    </span>
                                            </div>
                                            <p class="font-16 text-muted mb-2"></p>
                                            <h5><a href="#" class="text-dark">Facebook - <span class="text-muted font-16">125 sales</span> </a></h5>
                                            <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus tincidunt.</p>
                                            <a href="#" class="text-reset font-16">Learn more <i class="mdi mdi-chevron-right"></i></a>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <div class="social-source text-center mt-3">
                                                    <div class="avatar-xs mx-auto mb-3">
                                                        <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                                <i class="mdi mdi-facebook text-white"></i>
                                                            </span>
                                                    </div>
                                                    <h5 class="font-size-15">Facebook</h5>
                                                    <p class="text-muted mb-0">125 sales</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="social-source text-center mt-3">
                                                    <div class="avatar-xs mx-auto mb-3">
                                                        <span class="avatar-title rounded-circle bg-info font-size-16">
                                                                <i class="mdi mdi-twitter text-white"></i>
                                                            </span>
                                                    </div>
                                                    <h5 class="font-size-15">Twitter</h5>
                                                    <p class="text-muted mb-0">112 sales</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="social-source text-center mt-3">
                                                    <div class="avatar-xs mx-auto mb-3">
                                                        <span class="avatar-title rounded-circle bg-pink font-size-16">
                                                                <i class="mdi mdi-instagram text-white"></i>
                                                            </span>
                                                    </div>
                                                    <h5 class="font-size-15">Instagram</h5>
                                                    <p class="text-muted mb-0">104 sales</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <a href="#" class="text-primary font-size-14 font-weight-medium">View All Sources <i class="mdi mdi-chevron-right"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> -->
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
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="/assets/js/pages/dashboard.init.js"></script>

        <script src="/assets/js/app.js"></script>

    </body>

</html>