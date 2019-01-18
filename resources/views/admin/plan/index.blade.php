@extends("admin.layout.main")

@section("content")

<section class="content-header">
    <span class="h2">计划</span>
    
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <!-- <li><a href="#">Tables</a></li> -->
    <li class="active">定格计划图</li>
  </ol>

</section>

<section class="content">

  <div class="container-fluid">
    <center><h2>定格计划图</h2></center>

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#plan1">定格计划图demo 1</a></li>
      <li><a data-toggle="tab" href="#plan2">定格计划图demo 2</a></li>
    </ul>

    <div class="tab-content">
      <div id="plan1" class="tab-pane fade in active">
        <center><img src="/admin/images_plan/20181231175943.png" width="320px"></center>
      </div>
      <div id="plan2" class="tab-pane fade">
        <center><img src="/admin/images_plan/20181231180551.png" width="320px"></center>
      </div>
    </div>

  </div>
</section>

@endsection



  
  


