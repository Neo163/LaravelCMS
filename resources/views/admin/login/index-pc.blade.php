<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.layout.headStart")

    <title>Log In - Title</title>

    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <link rel="stylesheet" href="/admin/login1/css/index.css">
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <style>
        i.mdi.mdi-home-variant.h2 {
            color: #fff;
            float: right;
            font-size: 35px;
            margin: 15px 25px;
        }
    </style>

</head>
<body>
<canvas class="cavs" width="1575" height="1337"></canvas>

<a href="/"><i class="mdi mdi-home-variant h2"></i></a>

<div class="loginmain">

    <div class="login-title">
        <span>后台登录</span>
    </div>

    <div class="login-con">
        <form action="/admin/login" method="POST">
        {{csrf_field()}}
        @include('admin.layout.error')
        
            <div class="login-user">
                <div class="icon">
                    <img src="/admin/login1/image/user_icon_copy.png" alt="">
                </div>
                <input type="text" name="name" placeholder="用户名" autocomplete="off" value="">
            </div>
            <br/>
            <div class="login-pwd">
                <div class="icon">
                    <img src="/admin/login1/image/lock_icon_copy.png" alt="">
                </div>
                <input type="password" name="password" placeholder="密码" autocomplete="off" value="">
            </div>

            <!-- <div class="login-yan">
                <div class="icon">
                    <img src="/admin/login1/image/key.png" alt="">
                </div>
                <input type="text" name="pwd" placeholder="验证码" autocomplete="off" value="">
            </div> -->

            <div class="login-btn">
                <input type="submit" value="登录">
            </div>
        </form>

        
    </div>

</div>

<script src="/admin/login1/js/jquery.min.js"></script>
<script src="/admin/login1/js/ban.js"></script>

</body>
</html>
