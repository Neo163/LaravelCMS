@extends("admin.layout.main")

@section("content")

<section class="content-header">
  <span class="h3">创建分类&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <span class="h3"><a href="/admin/categories/list" type="button" class="btn btn-primary">分类列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <ol class="breadcrumb">
    <li><a href="<?php echo url(''); ?>/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <!-- <li><a href="#">Tables</a></li> -->
    <li class="active">创建分类</li>
  </ol>
</section>

<section>
  <div class="row">
    <form action="/admin/categories/list" method="POST">
    {{csrf_field()}}
    
    <div class="col-xs-12 col-sm-8 col-md-8 blog-main">
        
            <div class="col-xs-12 col-sm-12 col-md-12">

              @include('admin/layout.error')

              <button type="submit" class="btn btn-info submit-button">提交</button>
              
              <div class="form-group">
                <label class="submit-title">分类标题</label> 
                <input name="title" type="text" class="form-control" placeholder="分类标题">
              </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label class="submit-title">分类描述</label> 
                  <input name="content" type="text" class="form-control" placeholder="分类描述">
                </div>
            </div>


        
      </div>

     

    </form>

    <br>

  </div>
</section>

@endsection



  
  
