@extends("admin.layout.main")

@section("content")
<!-- label-success and label-primary -->
<!-- Content Wrapper. Contains page content -->
<section class="content-header">
  <span class="h3">文章列表&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <span class="h3"><a href="/admin/posts/list" type="button" class="btn btn-primary">文章列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <span class="h3"><a href="/admin/posts/trashs/list" type="button" class="btn btn-warning">回收站</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <span class="h3"><a href="<?php echo url(''); ?>/admin/post/create" type="button" class="btn btn-primary">写文章</a></span>
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active">文章列表</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        
        <div class="box-header">
          <br/>

            <div class="col-xs-12 col-sm-4 col-md-3">
              <center>
                <form action="/admin/search_display_post_id" method="GET">
                  <div class="input-group" style="width: 230px;">
                    <input type="text" name="s" class="form-control pull-right" placeholder="搜索编号">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </center>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-3">
              <center>
                <form action="/admin/search_display_post_title" method="GET">
                  <div class="input-group" style="width: 230px;">
                    <input type="text" name="s" class="form-control pull-right" placeholder="搜索标题">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </center>
            </div>

            <!-- <div class="col-xs-12 col-sm-4 col-md-3">
              <center>
                <form action="/admin/posts/list" method="GET">
                  <div class="input-group" style="width: 230px;">
                    <input type="text" name="s" class="form-control pull-right" placeholder="搜索分类-待开发">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </center>
            </div> -->
          
            <div class="col-xs-12 col-sm-4 col-md-3">
              <center>
                <form action="/admin/search_display_post_created_at" method="GET">
                  <div class="input-group" style="width: 230px;">
                    <input type="text" name="s" class="form-control pull-right" placeholder="搜索发布时间">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </center>
            </div>

        </div>

        <div class="box-header">
          <div class="paginate-link">{{$posts->links()}}</div>
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr class="text-center">
                <th>编号</th>
                <th>标题</th>
                <!-- <th>作者</th> -->
                <!-- <th>分类</th> -->
                <th>发布时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>

            @foreach($posts as $post)
            <tr class="text-center1">
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <!-- <td>待开发</td> -->
                <!-- <td>待开发</td> -->
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    <span class="h3"><a href="<?php echo url(''); ?>/admin/post/{{$post->id}}" type="button" class="btn btn-success">浏览</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="h3"><a href="<?php echo url(''); ?>/admin/post/{{$post->id}}/edit" type="button" class="btn btn-info">编辑</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    @if ($post->recycle == 1)
                    <span class="h3"><a href="/admin/post/{{$post->id}}/trash" type="button" class="btn btn-warning">回收站</a></span>
                    @endif
                </td>
            </tr>
            @endforeach
            
          </table>
          <div class="paginate-link">{{$posts->links()}}</div>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- /.content-wrapper -->

@endsection



  
  
