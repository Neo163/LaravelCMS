@extends("admin.layout.main")

@section("content")
<!-- label-success and label-primary -->

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <span class="h2">{{$category->title}}&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <span class="h3"><a href="<?php echo url(''); ?>/admin/categorys/list" type="button" class="btn btn-primary">文章列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/category/create" type="button" class="btn btn-primary">写文章</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/category/{{$category->id}}" type="button" class="btn btn-success">浏览</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="h3"><a href="<?php echo url(''); ?>/admin/category/{{$category->id}}/edit" type="button" class="btn btn-info">编辑</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <!-- <span class="h3"><a href="/category/{{$category->id}}" target="_blank" type="button" class="btn btn-warning">查看当前页</a></span>&nbsp;&nbsp;&nbsp;&nbsp; -->
    
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active"><a href="/admin/categorys/list">文章列表</a></li>
    <li class="active">文章详情</li>
  </ol>
</section>

<section>
    <div class="row">
        <form action="<?php echo url(''); ?>/admin/category/{{$category->id}}" method="POST">        
        {{method_field("PUT")}}
        {{csrf_field()}}

        <div class="col-xs-12 col-sm-8 col-md-8 blog-main">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <button type="submit" class="btn btn-info submit-button">更新</button>

                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" placeholder="标题" value="{{$category->title}}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>内容</label>
                    <input name="content" type="text" class="form-control" placeholder="标题" value="{{$category->content}}">
                </div>
                </div>
            <br>

        </div>

       
        @include('admin/layout.error')
        </form>
    </div>
</section>
<!-- /.content -->
  <!-- /.content-wrapper -->

@endsection



  
  
