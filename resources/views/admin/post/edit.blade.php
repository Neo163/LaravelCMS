@extends("admin.layout.main")

@section("content")
<!-- label-success and label-primary -->

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <span class="h2">{{$post->title}}&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <span class="h3"><a href="<?php echo url(''); ?>/admin/posts/list" type="button" class="btn btn-primary">文章列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/post/create" type="button" class="btn btn-primary">写文章</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/post/{{$post->id}}" type="button" class="btn btn-success">浏览</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/post/{{$post->id}}/edit" type="button" class="btn btn-info">编辑</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active"><a href="/admin/posts/list">文章列表</a></li>
    <li class="active">{{$post->title}}</li>
  </ol>
</section>

<!-- Main content -->
<div class="col-sm-12 blog-main">
    <form action="<?php echo url(''); ?>/admin/post/{{$post->id}}" method="POST">
        
        {{method_field("PUT")}}
        {{csrf_field()}}
        <button type="submit" class="btn btn-info submit-button">更新</button>
        <div class="form-group">
            <label>标题</label>
            <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea id="editor1" name="content" class="form-control" placeholder="这里是内容">{{$post->content}}</textarea>
        </div>
        @include('admin/layout.error')
    </form>
    <br>
</div><!-- /.blog-main -->

<!-- /.content -->
  <!-- /.content-wrapper -->

@endsection



  
  
