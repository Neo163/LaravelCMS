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
                                    <h4 class="mb-0">新增专题页</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">概览</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/pages">专题页</a></li>
                                            <li class="breadcrumb-item active">新增专题页</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Start Form Sizing -->
                        <form>
                        <div class="row">
                            <div class="col-xl-8">
                                
                                <div class="custom-accordion">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-4">
                                                <input type="text" class="form-control" id="billing-name" placeholder="标题">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <a href="#leftBox1" class="text-dark" data-toggle="collapse">
                                            <div class="p-4">
                                                
                                                <div class="media align-items-center">
                                                    <!-- <div class="mr-3">
                                                        <i class="uil uil-receipt text-primary h2"></i>
                                                    </div> -->
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">正文</h5>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>
                                                
                                            </div>
                                        </a>

                                        <div id="leftBox1" class="collapse show">
                                            <div class="p-4 border-top">

                                                <div>
                                                    

                                                    <div class="form-group mb-4">
                                                        <label for="billing-address">Address</label>
                                                        <textarea class="form-control" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                                    </div>

                                                    

                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <a href="#leftBox2" class="text-dark" data-toggle="collapse">
                                            <div class="p-4">
                                                
                                                <div class="media align-items-center">
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">其他</h5>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>
                                                
                                            </div>
                                        </a>

                                        <div id="leftBox2" class="collapse show">
                                            <div class="p-4 border-top">

                                                <div class="form-group mb-4">
                                                    <label for="billing-address">Address</label>
                                                    <textarea class="form-control" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                                </div>

                                                <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-4">
                                                                <label for="billing-name">Name</label>
                                                                <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-4">
                                                                <label for="billing-email-address">Email Address</label>
                                                                <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-4">
                                                                <label for="billing-phone">Phone</label>
                                                                <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                                            </div>
                                                        </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-4 mb-lg-0">
                                                            <label>Country</label>
                                                            <select class="form-control custom-select" title="Country">
                                                                <option value="0">Select Country</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AL">Albania</option>                             
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-4 mb-lg-0">
                                                            <label for="billing-city">City</label>
                                                            <input type="text" class="form-control" id="billing-city" placeholder="Enter City">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-0">
                                                            <label for="zip-code">Zip / Postal code</label>
                                                            <input type="text" class="form-control" id="zip-code" placeholder="Enter Postal code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                            
                            <div class="col-xl-4">
                                <div class="custom-accordion">

                                    <div class="release">
                                        <div class="right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">提交</button>
                                        </div>
                                    </div>

                                    

                                    <div class="card">
                                        <a href="#rightBox1" class="text-dark" data-toggle="collapse">
                                            <div class="p-4">
                                                
                                                <div class="media align-items-center">
                                                    <div class="mr-3">
                                                        <i class="uil uil-receipt text-primary h2"></i>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">封面图</h5>
                                                        <p class="text-muted text-truncate mb-0">Sed ut perspiciatis unde omnis iste</p>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>
                                                
                                            </div>
                                        </a>

                                        <div id="rightBox1" class="collapse show">
                                            <div class="p-4 border-top">
                                                <!-- <form> -->
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="billing-name">Name</label>
                                                                    <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="billing-email-address">Email Address</label>
                                                                    <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group mb-4">
                                                                    <label for="billing-phone">Phone</label>
                                                                    <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label for="billing-address">Address</label>
                                                            <textarea class="form-control" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group mb-4 mb-lg-0">
                                                                    <label>Country</label>
                                                                    <select class="form-control custom-select" title="Country">
                                                                        <option value="0">Select Country</option>
                                                                        <option value="AF">Afghanistan</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DZ">Algeria</option>                                 
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="form-group mb-4 mb-lg-0">
                                                                    <label for="billing-city">City</label>
                                                                    <input type="text" class="form-control" id="billing-city" placeholder="Enter City">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="form-group mb-0">
                                                                    <label for="zip-code">Zip / Postal code</label>
                                                                    <input type="text" class="form-control" id="zip-code" placeholder="Enter Postal code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <a href="#rightBox2" class="text-dark" data-toggle="collapse">
                                            <div class="p-4">
                                                
                                                <div class="media align-items-center">
                                                    <div class="mr-3">
                                                        <i class="uil uil-truck text-primary h2"></i>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">分类和标签</h5>
                                                        <p class="text-muted text-truncate mb-0">Neque porro quisquam est</p>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>
                                                
                                            </div>
                                        </a>

                                        <div id="rightBox2" class="collapse show">
                                            <div class="p-4 border-top">
                                                <h5 class="font-size-14 mb-3">Shipping Info</h5>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="card border rounded active shipping-address">
                                                            <div class="card-body">
                                                                <a href="#" class="float-right ml-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="uil uil-pen font-size-16"></i>
                                                                </a>
                                                                <h5 class="font-size-14 mb-4">Address 1</h5>
                
                                                                <h5 class="font-size-14">James Morgan</h5>
                                                                <p class="mb-1">1557 Sundown Lane Smithville, TX 78957</p>
                                                                <p class="mb-0">Mo. 012-345-6789</p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="card border rounded shipping-address">
                                                            <div class="card-body">
                                                                <a href="#" class="float-right ml-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="uil uil-pen font-size-16"></i>
                                                                </a>
                                                                <h5 class="font-size-14 mb-4">Address 2</h5>
            
                                                                <h5 class="font-size-14">James Morgan</h5>
                                                                <p class="mb-1">1557 Sundown Lane Smithville, TX 78957</p>
                                                                <p class="mb-0">Mo. 012-345-6789</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <a href="#rightBox3" class="text-dark" data-toggle="collapse">
                                            <div class="p-4">
                                                
                                                <div class="media align-items-center">
                                                    <div class="mr-3">
                                                        <i class="uil uil-bill text-primary h2"></i>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">111</h5>
                                                        <p class="text-muted text-truncate mb-0">Duis arcu tortor, suscipit eget</p>
                                                    </div>
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>
                                                
                                            </div>
                                        </a>

                                        <div id="rightBox3" class="collapse show">
                                            <div class="p-4 border-top">
                                                <div>
                                                    <h5 class="font-size-14 mb-3">Payment method :</h5>

                                                    <div class="row">

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div data-toggle="collapse">
                                                                <label class="card-radio-label">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">
        
                                                                    <span class="card-radio text-center text-truncate">
                                                                        <i class="uil uil-postcard d-block h2 mb-3"></i>
                                                                        Credit / Debit Card
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <label class="card-radio-label">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input">
        
                                                                    <span class="card-radio text-center text-truncate">
                                                                        <i class="uil uil-paypal d-block h2 mb-3"></i>
                                                                        Paypal
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <label class="card-radio-label">
                                                                    <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked>
        
                                                                    <span class="card-radio text-center text-truncate">
                                                                        <i class="uil uil-money-bill d-block h2 mb-3"></i>
                                                                        <span>Cash on Delivery</span>
                                                                    </span>
                                                                </label>
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
                        </form>
                        <!-- End Form Sizing -->
                        
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