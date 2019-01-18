@extends("admin.layout.main")

@section("content")
<!-- label-success and label-primary -->

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <span class="h3">创建文章&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <span class="h3"><a href="/admin/posts/list" type="button" class="btn btn-primary">文章列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <span class="h3"><a href="/admin/posts/trashs/list" type="button" class="btn btn-warning">回收站</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <ol class="breadcrumb">
    <li><a href="<?php echo url(''); ?>/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <!-- <li><a href="#">Tables</a></li> -->
    <li class="active">创建文章</li>
  </ol>
</section>

<!-- Main content -->
<div class="col-sm-12 blog-main">
    <form action="<?php echo url(''); ?>/admin/posts/list" method="POST">
        {{csrf_field()}}
        <button type="submit" class="btn btn-info submit-button">提交</button>
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> -->
        <div class="form-group">
            <label class="submit-title">标题</label>
            <input name="title" type="text" class="form-control" placeholder="这里是标题">
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea id="editor1"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容"></textarea>
        </div>
        
        @include('admin/layout.error')

    </form>
    <br>

</div><!-- /.blog-main -->

<!-- /.content -->
  <!-- /.content-wrapper -->

@endsection



  
  
