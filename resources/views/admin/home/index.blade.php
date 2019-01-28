@extends("admin.layout.main")

@section("content")

<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        @can("system")
      	<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>用户</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo url(''); ?>/admin/users" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endcan
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$posts}}</h3>

              <p>文章</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo url(''); ?>/admin/posts/list" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$pages}}</h3>

              <p>页面</p>
            </div>
            <div class="icon">
              <i class="ion ion-podium"></i>
            </div>
            <a href="<?php echo url(''); ?>/admin/pages/list" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3> - </h3>

              <p>媒体</p>
            </div>
            <div class="icon">
              <i class="ion ion-images"></i>
            </div>
            <a href="<?php echo url(''); ?>/admin/medias/list" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection