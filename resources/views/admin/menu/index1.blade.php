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

        <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="/resources/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/resources/bootstrap-4.6.0/css/bootstrap.min.css">
        <script src="/resources/js/jquery-3.5.1.js"></script>
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
                                    <h4 class="mb-0">Checkout</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                            <li class="breadcrumb-item active">Checkout</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                            <div class="card-body">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link <?php if($tab == 0){echo 'active';} ?>" href="/admin/menu1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">菜单</span>    
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if($tab == 1){echo 'active';} ?>" href="/admin/menu1?tab=1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">位置</span>    
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane <?php if($tab == 0){echo 'active';} ?>" id="navtabs-home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="custom-accordion">

                                                    <div class="card">
                                                        <a href="#checkout-billinginfo-collapse" class="text-dark" data-toggle="collapse">
                                                            <div class="p-4">
                                                                
                                                                <div class="media align-items-center">
                                                                    <div class="mr-3">
                                                                        <i class="uil uil-receipt text-primary h2"></i>
                                                                    </div>
                                                                    <div class="media-body overflow-hidden">
                                                                        <h5 class="font-size-16 mb-1">当前菜单</h5>
                                                                    </div>
                                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                                </div>
                                                                
                                                            </div>
                                                        </a>

                                                        <div id="checkout-billinginfo-collapse" class="collapse show">
                                                            <div class="p-4 border-top">

                                                                <div class="sidenav">
                                                                    <div class="list-group">
                                                                        <span id="nestable-menu">

                                                                            <button type="button" class="btn btn-outline-primary btn-lg btn-block waves-effect waves-light" data-toggle="modal" data-target="#myModal" id="addRecord">新增记录</button>

                                                                            <button type="button" class="btn btn-outline-success btn-lg btn-block waves-effect waves-light" data-action="expand-all">扩展</button>

                                                                            <button type="button" class="btn btn-outline-info btn-lg btn-block waves-effect waves-light" data-action="collapse-all">折合</button>

                                                                            <button type="button" class="btn btn-danger btn-lg btn-block waves-effect waves-light">删除</button>

                                                                            <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light release-menu" id="sa-position">发布</button>

                                                                        </span>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <a href="#checkout-shippinginfo-collapse" class="text-dark" data-toggle="collapse">
                                                            <div class="p-4">
                                                                
                                                                <div class="media align-items-center">
                                                                    <div class="mr-3">
                                                                        <i class="uil uil-truck text-primary h2"></i>
                                                                    </div>
                                                                    <div class="media-body overflow-hidden">
                                                                        <h5 class="font-size-16 mb-1">选择菜单</h5>
                                                                    </div>
                                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                                </div>
                                                                
                                                            </div>
                                                        </a>

                                                        <div id="checkout-shippinginfo-collapse" class="collapse show">
                                                            <div class="p-4 border-top">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">

                                                                            <button type="button" class="btn btn-outline-primary btn-lg btn-block waves-effect waves-light mb-1" data-toggle="modal" data-target="#addMenu">新增菜单</button>

                                                                            <br/>

                                                                            <label class="control-label">选择菜单</label>

                                                                            <select class="form-control select21">
                                                                                <option>Select</option>
                                                                                <option value="AK">Alaska</option>
                                                                                <option value="HI">Hawaii</option>
                                                                                <option value="CA">California</option>
                                                                                <option value="NV">Nevada</option>
                                                                                <option value="OR">Oregon</option>
                                                                                <option value="WA">Washington</option>
                                                                            </select>
                                                                            
                                                                        </div>

                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="text-sm-right mt-2 mt-sm-0">
                                                                            <button type="button" class="btn btn-success waves-effect waves-light"> <i class="uil uil-check mr-2"></i> 提交 </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <div class="col-xl-9">
                                                <div class="menu">
                                                    <center>
                                                      <div id="load"></div>

                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">

                                                                <div class="container">
                                                                      <p>菜单名字</p>
                                                                      
                                                                    </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="dd" id="nestable">

                                                                <div id="get_menu"></div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                      <input type="hidden" id="nestable-output">

                                                    </center>
                                                </div>  
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane <?php if($tab == 1){echo 'active';} ?>" id="navtabs-profile" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="custom-accordion">

                                                    <div class="card">
                                                        <a href="#checkout-billinginfo-collapse" class="text-dark" data-toggle="collapse">
                                                            <div class="p-4">
                                                                
                                                                <div class="media align-items-center">
                                                                    <div class="mr-3">
                                                                        <i class="uil uil-receipt text-primary h2"></i>
                                                                    </div>
                                                                    <div class="media-body overflow-hidden">
                                                                        <h5 class="font-size-16 mb-1">当前菜单</h5>
                                                                    </div>
                                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                                </div>
                                                                
                                                            </div>
                                                        </a>

                                                        <div id="checkout-billinginfo-collapse" class="collapse show">
                                                            <div class="p-4 border-top">

                                                                <div class="sidenav">
                                                                    <div class="list-group">
                                                                        <span id="nestable-menu">

                                                                            <button type="button" class="btn btn-outline-primary btn-lg btn-block waves-effect waves-light" data-toggle="modal" data-target="#addLocation" id="addRecord">新增位置</button>

                                                                        </span>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <div class="col-xl-9">
                                                <div class="card border shadow-none">
                                                    <div class="card-body">

                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mt-3">
                                                                        <p class="text-muted mb-2">顶部菜单栏</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mt-3">

                                                                        <div class="form-group">
                                                                        <select class="form-control select21">
                                                                            <option>Select</option>
                                                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                                <option value="AK">Alaska</option>
                                                                                <option value="HI">Hawaii</option>
                                                                            </optgroup>
                                                                            <optgroup label="Pacific Time Zone">
                                                                                <option value="CA">California</option>
                                                                                <option value="NV">Nevada</option>
                                                                                <option value="OR">Oregon</option>
                                                                                <option value="WA">Washington</option>
                                                                            </optgroup>
                                                                            <optgroup label="Mountain Time Zone">
                                                                                <option value="AZ">Arizona</option>
                                                                                <option value="CO">Colorado</option>
                                                                                <option value="ID">Idaho</option>
                                                                                <option value="MT">Montana</option>
                                                                                <option value="NE">Nebraska</option>
                                                                                <option value="NM">New Mexico</option>
                                                                                <option value="ND">North Dakota</option>
                                                                                <option value="UT">Utah</option>
                                                                                <option value="WY">Wyoming</option>
                                                                            </optgroup>
                                                                            <optgroup label="Central Time Zone">
                                                                                <option value="AL">Alabama</option>
                                                                                <option value="AR">Arkansas</option>
                                                                                <option value="IL">Illinois</option>
                                                                                <option value="IA">Iowa</option>
                                                                                <option value="KS">Kansas</option>
                                                                                <option value="KY">Kentucky</option>
                                                                                <option value="LA">Louisiana</option>
                                                                                <option value="MN">Minnesota</option>
                                                                                <option value="MS">Mississippi</option>
                                                                                <option value="MO">Missouri</option>
                                                                                <option value="OK">Oklahoma</option>
                                                                                <option value="SD">South Dakota</option>
                                                                                <option value="TX">Texas</option>
                                                                                <option value="TN">Tennessee</option>
                                                                                <option value="WI">Wisconsin</option>
                                                                            </optgroup>
                                                                            <optgroup label="Eastern Time Zone">
                                                                                <option value="CT">Connecticut</option>
                                                                                <option value="DE">Delaware</option>
                                                                                <option value="FL">Florida</option>
                                                                                <option value="GA">Georgia</option>
                                                                                <option value="IN">Indiana</option>
                                                                                <option value="ME">Maine</option>
                                                                                <option value="MD">Maryland</option>
                                                                                <option value="MA">Massachusetts</option>
                                                                                <option value="MI">Michigan</option>
                                                                                <option value="NH">New Hampshire</option>
                                                                                <option value="NJ">New Jersey</option>
                                                                                <option value="NY">New York</option>
                                                                                <option value="NC">North Carolina</option>
                                                                                <option value="OH">Ohio</option>
                                                                                <option value="PA">Pennsylvania</option>
                                                                                <option value="RI">Rhode Island</option>
                                                                                <option value="SC">South Carolina</option>
                                                                                <option value="VT">Vermont</option>
                                                                                <option value="VA">Virginia</option>
                                                                                <option value="WV">West Virginia</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mt-3">
                                                                        <ul class="list-inline mb-0 font-size-16 right">
                                                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Remove">
                                                                                <a href="#" class="text-muted px-2">
                                                                                    <i class="uil uil-trash-alt"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Add Wishlist">
                                                                                <a href="#" class="text-muted px-2">
                                                                                    <i class="uil uil-heart"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="card border shadow-none">
                                                    <div class="card-body">

                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mt-3">
                                                                        <p class="text-muted mb-2">顶部菜单栏1</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mt-3">

                                                                        <div class="form-group">
                                                                        <select class="form-control select21">
                                                                            <option>Select</option>
                                                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                                <option value="AK">Alaska</option>
                                                                                <option value="HI">Hawaii</option>
                                                                            </optgroup>
                                                                            <optgroup label="Pacific Time Zone">
                                                                                <option value="CA">California</option>
                                                                                <option value="NV">Nevada</option>
                                                                                <option value="OR">Oregon</option>
                                                                                <option value="WA">Washington</option>
                                                                            </optgroup>
                                                                            <optgroup label="Mountain Time Zone">
                                                                                <option value="AZ">Arizona</option>
                                                                                <option value="CO">Colorado</option>
                                                                                <option value="ID">Idaho</option>
                                                                                <option value="MT">Montana</option>
                                                                                <option value="NE">Nebraska</option>
                                                                                <option value="NM">New Mexico</option>
                                                                                <option value="ND">North Dakota</option>
                                                                                <option value="UT">Utah</option>
                                                                                <option value="WY">Wyoming</option>
                                                                            </optgroup>
                                                                            <optgroup label="Central Time Zone">
                                                                                <option value="AL">Alabama</option>
                                                                                <option value="AR">Arkansas</option>
                                                                                <option value="IL">Illinois</option>
                                                                                <option value="IA">Iowa</option>
                                                                                <option value="KS">Kansas</option>
                                                                                <option value="KY">Kentucky</option>
                                                                                <option value="LA">Louisiana</option>
                                                                                <option value="MN">Minnesota</option>
                                                                                <option value="MS">Mississippi</option>
                                                                                <option value="MO">Missouri</option>
                                                                                <option value="OK">Oklahoma</option>
                                                                                <option value="SD">South Dakota</option>
                                                                                <option value="TX">Texas</option>
                                                                                <option value="TN">Tennessee</option>
                                                                                <option value="WI">Wisconsin</option>
                                                                            </optgroup>
                                                                            <optgroup label="Eastern Time Zone">
                                                                                <option value="CT">Connecticut</option>
                                                                                <option value="DE">Delaware</option>
                                                                                <option value="FL">Florida</option>
                                                                                <option value="GA">Georgia</option>
                                                                                <option value="IN">Indiana</option>
                                                                                <option value="ME">Maine</option>
                                                                                <option value="MD">Maryland</option>
                                                                                <option value="MA">Massachusetts</option>
                                                                                <option value="MI">Michigan</option>
                                                                                <option value="NH">New Hampshire</option>
                                                                                <option value="NJ">New Jersey</option>
                                                                                <option value="NY">New York</option>
                                                                                <option value="NC">North Carolina</option>
                                                                                <option value="OH">Ohio</option>
                                                                                <option value="PA">Pennsylvania</option>
                                                                                <option value="RI">Rhode Island</option>
                                                                                <option value="SC">South Carolina</option>
                                                                                <option value="VT">Vermont</option>
                                                                                <option value="VA">Virginia</option>
                                                                                <option value="WV">West Virginia</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mt-3">
                                                                        <ul class="list-inline mb-0 font-size-16 right">
                                                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Remove">
                                                                                <a href="#" class="text-muted px-2">
                                                                                    <i class="uil uil-trash-alt"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Add Wishlist">
                                                                                <a href="#" class="text-muted px-2">
                                                                                    <i class="uil uil-heart"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
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

        <!-- The Modal 1 -->
        <div class="modal fade" id="myModal">
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

                      <div class="form-group row">
                        <label for="link" class="col-sm-2 col-form-label">链接</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="link" placeholder="">
                        </div>
                      </div>

                      <input type="hidden" id="id">
                      
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <span type="button" class="btn btn-primary lang" data-dismiss="modal" id="submit" key="submit"></span>
                  <span type="button" class="btn btn-secondary lang" data-dismiss="modal" id="reset" key="cancel"></span>
                </div>
                
              </div>
            </div>
        </div>

        <!-- The Modal 2 -->
        <div class="modal fade" id="addMenu">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">新增菜单</h4>
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
                      
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <span type="button" class="btn btn-primary lang" data-dismiss="modal" id="submit" key="submit"></span>
                  <span type="button" class="btn btn-secondary lang" data-dismiss="modal" id="reset" key="cancel"></span>
                </div>
                
              </div>
            </div>
        </div>

        <!-- The Modal 2 -->
        <div class="modal fade" id="addLocation">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">新增位置</h4>
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
                      
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <span type="button" class="btn btn-primary lang" data-dismiss="modal" id="submit" key="submit"></span>
                  <span type="button" class="btn btn-secondary lang" data-dismiss="modal" id="reset" key="cancel"></span>
                </div>
                
              </div>
            </div>
        </div>

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

        <?php if($tab == 0){echo '<script src="/admin/js/menu.js"></script>';} ?>
        
        <script src="/resources/js/jquery-3.5.1.js"></script>
        <script src="/resources/js/jquery.nestable.js"></script>

        <script src="/resources/js/languages.js"></script>

        <script src="/assets/libs/select2/js/select2.min.js"></script>
        <script src="/assets/js/pages/form-advanced.init.js"></script>

        <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="/assets/js/pages/sweet-alerts.init.js"></script>

    </body>

</html>