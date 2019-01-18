<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neo system</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo url(''); ?>/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo url(''); ?>/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo url(''); ?>/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo url(''); ?>/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo url(''); ?>/admin/plugins/iCheck/square/blue.css">
  
  <link rel="stylesheet" href="<?php echo url(''); ?>/admin/css/style.css">
  <style>
    html, body {
        height: unset;
    }
    body.hold-transition.login-page {
      background-image: url(<?php echo url(''); ?>/admin/images-login/backend.jpg);
      background-size: cover;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        Neo system
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Login</p>

      <form action="<?php echo url(''); ?>/admin/login" method="post">
          {{csrf_field()}}
          <div class="form-group has-feedback">
              <input name="name" type="text" class="form-control" placeholder="名字">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input name="password" type="password" class="form-control" placeholder="密码">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
              <!-- /.col -->
              @include("admin.layout.error")
              <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">login</button>
              </div>
              <!-- /.col -->
          </div>
      </form>

      <br>
      <center>demo account：test1<br>
      demo password：123456</center>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo url(''); ?>/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo url(''); ?>/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo url(''); ?>/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
