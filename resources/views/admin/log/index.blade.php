@extends("admin.layout.main")

@section("content")
<!-- label-success and label-primary -->
<!-- Content Wrapper. Contains page content -->
<section class="content-header">
  <span class="h3">日志记录</span>
  
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active">日志记录</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        
        <!-- <div class="box-header">
          <br/>

            <div class="col-xs-12 col-sm-4 col-md-3">
              <center>
                <form action="/admin/search_display_log_title" method="GET">
                  <div class="input-group" style="width: 230px;">
                    <input type="text" name="s" class="form-control pull-right" placeholder="搜索标题">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </center>
            </div>
          
            <div class="col-xs-12 col-sm-4 col-md-3">
              <center>
                <form action="/admin/search_display_log_created_at" method="GET">
                  <div class="input-group" style="width: 230px;">
                    <input type="text" name="s" class="form-control pull-right" placeholder="搜索发布时间">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </center>
            </div>

        </div> -->

        <div class="box-header">
          <div class="paginate-link">{{$logs->links()}}</div>
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr class="text-center">
                <th>编号</th>
                <th>标题</th>
                <th>细节</th>
                <th>类别</th>
                <th>生成时间</th>
            </tr>

            @foreach($logs as $log)
            <tr class="text-center1">
                <td>{{$log->id}}</td>
                <td>{{$log->title}}</td>
                <td>{{$log->content}}</td>
                <td>{{$log->category}}</td>
                <td>{{$log->created_at}}</td>
            </tr>
            @endforeach
            
          </table>
          <div class="paginate-link">{{$logs->links()}}</div>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- /.content-wrapper -->

@endsection



  
  
