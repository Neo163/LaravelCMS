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
                                    <h4 class="mb-0">Basic Elements</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Basic Elements</li>
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
                                                    <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-plus mr-2"></i> Add New</a>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-inline float-md-right mb-3">
                                                    <div class="search-box ml-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                                            <i class="mdi mdi-magnify search-icon"></i>
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
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="contacusercheck">
                                                            <label class="custom-control-label" for="contacusercheck"></label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">标题</th>
                                                    <th scope="col">位置</th>
                                                    <th scope="col" style="width: 200px;">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck1">
                                                                <label class="custom-control-label" for="contacusercheck1"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <img src="/assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle mr-2">
                                                            <a href="#" class="text-body">Simon Ryles</a>
                                                        </td>
                                                        <td>Full Stack Developer</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck3">
                                                                <label class="custom-control-label" for="contacusercheck3"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="avatar-xs d-inline-block mr-2">
                                                                <div class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                    <i class="mdi mdi-account-circle m-0"></i>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="text-body">Frederick White</a>
                                                        </td>
                                                        <td>UI/UX Designer</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck4">
                                                                <label class="custom-control-label" for="contacusercheck4"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <img src="/assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle mr-2">
                                                            <a href="#" class="text-body">Shanon Marvin</a>
                                                        </td>
                                                        <td>ShanonMarvin@minible.com</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                      </tr>
                                                      
                                                      <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck6">
                                                                <label class="custom-control-label" for="contacusercheck6"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <img src="/assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle mr-2">
                                                            <a href="#" class="text-body">Janice Morgan</a>
                                                        </td>
                                                        <td>JaniceMorgan@minible.com</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                      </tr>
                                                      
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
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
                                                    <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-plus mr-2"></i> Add New</a>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-inline float-md-right mb-3">
                                                    <div class="search-box ml-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                                            <i class="mdi mdi-magnify search-icon"></i>
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
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="contacusercheck">
                                                            <label class="custom-control-label" for="contacusercheck"></label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">标题</th>
                                                    <th scope="col">位置</th>
                                                    <th scope="col" style="width: 200px;">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck1">
                                                                <label class="custom-control-label" for="contacusercheck1"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <img src="/assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle mr-2">
                                                            <a href="#" class="text-body">Simon Ryles</a>
                                                        </td>
                                                        <td>Full Stack Developer</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck3">
                                                                <label class="custom-control-label" for="contacusercheck3"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="avatar-xs d-inline-block mr-2">
                                                                <div class="avatar-title bg-soft-primary rounded-circle text-primary">
                                                                    <i class="mdi mdi-account-circle m-0"></i>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="text-body">Frederick White</a>
                                                        </td>
                                                        <td>UI/UX Designer</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck4">
                                                                <label class="custom-control-label" for="contacusercheck4"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <img src="/assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle mr-2">
                                                            <a href="#" class="text-body">Shanon Marvin</a>
                                                        </td>
                                                        <td>ShanonMarvin@minible.com</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                      </tr>
                                                      
                                                      <tr>
                                                        <th scope="row">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="contacusercheck6">
                                                                <label class="custom-control-label" for="contacusercheck6"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <img src="/assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle mr-2">
                                                            <a href="#" class="text-body">Janice Morgan</a>
                                                        </td>
                                                        <td>JaniceMorgan@minible.com</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript:void(0);" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="uil uil-ellipsis-v"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                      </tr>
                                                      
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
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
                                        </div>
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
                          
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <span type="button" class="btn btn-primary" data-dismiss="modal" id="submit">提交</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <span type="button" class="btn btn-secondary" data-dismiss="modal" id="reset">取消</span>
                    </div>
                    
                  </div>
                </div>
            </div>

            <!-- The Modal 2 -->
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
                          
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <span type="button" class="btn btn-primary" data-dismiss="modal" id="submit">提交</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <span type="button" class="btn btn-secondary" data-dismiss="modal" id="reset">取消</span>
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

        <!-- apexcharts -->
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="/assets/js/pages/dashboard.init.js"></script>

        <script src="/assets/js/app.js"></script>

    </body>

</html>