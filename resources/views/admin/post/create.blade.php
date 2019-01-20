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

<section>
  <div class="row">
    <form action="<?php echo url(''); ?>/admin/posts/list" method="POST">
    {{csrf_field()}}
    
    <div class="col-xs-12 col-sm-8 col-md-8 blog-main">
        
            <div class="col-xs-12 col-sm-12 col-md-12">
              
              @include('admin/layout.error')

              <div class="form-group">
                <label class="submit-title">标题</label> 
                <input name="title" type="text" class="form-control" placeholder="标题">
              </div>
            </div>

            
  
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>内容</label>
                    <textarea id="content" name="content" class="form-control" style="height:600px;"  placeholder="内容"></textarea>
                </div>
            </div>


        
      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 blog-main">
        <br/>
        <button type="submit" class="btn btn-info submit-button">提交</button>

            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label class="submit-title">封面链接</label> 
                <input name="image" type="text" class="form-control" placeholder="链接">
              </div>
            </div>
        
      </div>

    </form>

    <br>

  </div>
</section>

@endsection



  
  
