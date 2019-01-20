@extends("admin.layout.main")

@section("content")
<!-- label-success and label-primary -->

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <span class="h2">{{$page->title}}&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <span class="h3"><a href="<?php echo url(''); ?>/admin/pages/list" type="button" class="btn btn-primary">页面列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/page/create" type="button" class="btn btn-primary">写页面</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/page/{{$page->id}}" type="button" class="btn btn-success">浏览</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/page/{{$page->id}}/edit" type="button" class="btn btn-info">编辑</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active"><a href="/admin/pages/list">页面列表</a></li>
    <li class="active">{{$page->title}}</li>
  </ol>
</section>

<!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border"><center>
          <h4 class="box-title">发布时间： {{$page->created_at}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <h4 class="box-title">更新时间： {{$page->updated_at}}</h4></center>
        </div>
        <div class="box-body">
          {!! $page->content !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

<!-- /.content -->
  <!-- /.content-wrapper -->

@endsection



  
  
