@extends("admin.layout.main")

@section("content")
<!-- label-success and label-primary -->
<!-- Content Wrapper. Contains page content -->
<section class="content-header">
  <span class="h3">分类列表&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <span class="h3"><a href="/admin/categories/list" type="button" class="btn btn-primary">分类列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <span class="h3"><a href="<?php echo url(''); ?>/admin/category/create" type="button" class="btn btn-info">写分类</a></span>
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active">分类列表</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

        <div class="box-header">
          <div class="paginate-link">{{$categories->links()}}</div>
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr class="text-center">
                <th>编号</th>
                <th>标题</th>
                <th>描述</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>

            @foreach($categories as $category)
            <tr class="text-center1">
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{!! $category->content !!}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <span class="h3"><a href="<?php echo url(''); ?>/admin/category/{{$category->id}}/edit" type="button" class="btn btn-info">编辑</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="h3"><a href="<?php echo url(''); ?>/admin/category/{{$category->id}}/delete" type="button" class="btn btn-danger">删除</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            @endforeach
            
          </table>
          <div class="paginate-link">{{$categories->links()}}</div>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- /.content-wrapper -->

@endsection



  
  
