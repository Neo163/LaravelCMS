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

<section>
  <div class="col-xs-12 col-sm-8 col-md-8 blog-main">
    <form action="<?php echo url(''); ?>/admin/page/{{$page->id}}" method="POST">

    {{method_field("PUT")}}
    {{csrf_field()}}
      
      
        <button type="submit" class="btn btn-info submit-button">更新</button>
        <div class="form-group">
            <label>标题</label>
            <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{$page->title}}">
        </div>
        <div class="form-group">
            <label>内容</label>
            <!-- <textarea id="editor1" name="content" class="form-control" placeholder="这里是内容">{{$page->content}}</textarea> -->
            <textarea id="content" name="content" class="form-control" style="height:500px;"  placeholder="内容">{{$page->content}}</textarea>
        </div>

      @include('admin/layout.error')
    </form>
      
  </div>
 
 <br/><br/><br/><br/><br/><br/>

  <div class="col-xs-12 col-sm-4 col-md-4">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">封面图 - 开发中</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <div class="form-horizontal">

        <form method="page" action="/admin/page/uploadcoverimage" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="box-body">
          
          <div class="form-group">

              <label for="inputPassword3" class="col-sm-2 control-label">图片</label>

              <div class="col-sm-9 upload_coverimage">
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                     Upload Validation Error<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                     </ul>
                    </div>
                 @endif

                 @if ($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                   </div>
                   <img src="/images/{{ Session::get('path') }}" width="300" />
                 @endif


                 
                    <div class="form-group">
                        <input type="file" name="select_file" class="text-center" />
                        

                        <p class="help-block">jpg, jpeg, png, gif</p>
                    </div>
                 

              </div>
          </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-default">删除</button>
          <!-- <button type="submit" class="btn btn-info pull-right">Sign in</button> -->
          <!-- <input type="submit" name="upload" class="btn btn-primary pull-right" value="上传"> -->
          <input type="submit" name="upload" class="btn btn-primary pull-right" value="Upload">
        </div>
        <!-- /.box-footer -->

        </form>
      </div>
    </div>
    <!-- /.box -->
     
  </div>

</section>    


<!-- /.content -->
  <!-- /.content-wrapper -->

@endsection



  
  
