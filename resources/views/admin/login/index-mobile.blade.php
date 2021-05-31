<!doctype html>
<html lang="en">

    <head>
        
        @include("admin.layout.headStart")

        <title>Log In - Title</title>

        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/admin/login1/css/index-mobile.css">

    </head>

    <body class="authentication-bg">

        <div class="home-icon">
            <a href="/" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>

        <div class="my-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card-body1 p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-light">后台登录</h5>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="/admin/login" method="POST">
                                    {{csrf_field()}}
                                    @include('admin.layout.error')
                                    
                                        <div class="form-group">
                                            <label for="name">用户名</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                                        </div>
                
                                        <div class="form-group">
                                            <!-- <div class="float-right">
                                                <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                            </div> -->
                                            <label for="userpassword">密码</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                                        </div>
                
                                        <!-- <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="auth-remember-check">
                                            <label class="custom-control-label" for="auth-remember-check">Remember me</label>
                                        </div> -->
                                        
                                        <div class="mt-3 text-right">
                                            <button class="btn login-btn" type="submit">登录</button>
                                        </div>

                                    </form>
                                </div>
            
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <script src="/admin/login1/js/jquery.min.js"></script>
        <script src="/admin/login1/js/ban.js"></script>

    </body>
</html>
