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
    <!-- <span class="h3"><a href="/post/{{$post->id}}" target="_blank" type="button" class="btn btn-warning">查看当前页</a></span>&nbsp;&nbsp;&nbsp;&nbsp; -->
    
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active"><a href="/admin/posts/list">文章列表</a></li>
    <li class="active">文章详情</li>
  </ol>
</section>

<section>
    <div class="row">
        <form action="<?php echo url(''); ?>/admin/post/{{$post->id}}" method="POST">        
        {{method_field("PUT")}}
        {{csrf_field()}}

        <div class="col-xs-12 col-sm-8 col-md-8 blog-main">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" placeholder="标题" value="{{$post->title}}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>内容</label>
                    <textarea id="content" name="content" class="form-control" style="height:600px;"  placeholder="内容">{{$post->content}}</textarea>
                </div>
                </div>
            <br>

        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 blog-main">
            <br/>
            <button type="submit" class="btn btn-info submit-button">更新</button>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>封面链接</label>
                        <input name="image" type="text" class="form-control" placeholder="链接" value="{{$post->image}}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>封面图</label><br/>
                        <img src="{{$post->image}}" width="300px" alt="">
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



  
  
