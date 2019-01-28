@extends("admin.layout.main")

@section("content")

<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

<section class="content-header">
  <span class="h3">媒体列表&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <span class="h3"><a href="/admin/medias/list" type="button" class="btn btn-primary">媒体列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <span class="h3"><a href="/admin/media/mediaUpload" type="button" class="btn btn-warning">上传</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active">媒体列表</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr class="text-center">
                <th>图片</th>
                <th>链接</th>
                <th>大小</th>
                <th>上传时间</th>
                <th>操作</th>
            </tr>
            
            <?php

            $dir = $_SERVER['DOCUMENT_ROOT'].'/storage/images/';
            $fileMonth = scandir($dir);
            
            foreach (array_reverse($fileMonth) as $fileMonth)
            {
              if($fileMonth != "." && $fileMonth != "..") 
              {
                  $dir = $_SERVER['DOCUMENT_ROOT'].'/storage/images/'.$fileMonth;
                  // echo '<br/>'.$file.'<br/>';
                  ?>
                  <tr class="text-center1">

                      <td class="folder-month"><b>月份：<?php echo $fileMonth; ?></b></td> <td></td> <td></td> <td></td> <td></td>

                  </tr>
                  <?php
                  $file = scandir($dir);

                  foreach (array_reverse($file) as $file) 
                  {
                      if ( substr($file, 0, 6) == 'image_' ) 
                      {
                          ?>
                          
                          <tr class="text-center1">
                              <td><img src="<?php echo url(''); ?>/storage/images/<?php echo $fileMonth; ?>/<?php echo $file; ?>" width="80px" alt="haoyuan"></td>
                              <td><?php echo url(''); ?>/storage/images/<?php echo $fileMonth; ?>/<?php echo $file; ?></td>
                              <td><?php echo round(filesize($_SERVER['DOCUMENT_ROOT'].'/storage/images/'.$fileMonth.'/'.$file) / 1024, 2); ?> KB</td>
                              <td><?php echo substr($file, 6, 10); ?> <?php echo substr($file, 17, 2); ?>:<?php echo substr($file, 20, 2); ?>:<?php echo substr($file, 23, 2); ?></td>
                              <td>
                                  <span class="h3"><a href="<?php echo url(''); ?>/storage/images/<?php echo $fileMonth; ?>/<?php echo $file; ?>" type="button" class="btn btn-success" target="_blank">查看</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="h3"><a href="" type="button" class="btn btn-danger deleteMedia_<?php echo substr($file, 0, 36); ?>">删除</a></span>
                              </td>
                          </tr>

                          <script>

                          $(".deleteMedia_<?php echo substr($file, 0, 36); ?>").click(function(){

                            var form = new FormData();
                            var data = '<?php echo $fileMonth; ?>/<?php echo $file; ?>';
                            form.append("data", data);

                            var settings = {
                              "async": true,
                              "crossDomain": true,
                              "url": "http://127.0.0.1:8000/api/admin/media/deleteMedia",
                              "method": "POST",
                              "headers": {
                                "cache-control": "no-cache"
                              },
                              "processData": false,
                              "contentType": false,
                              "mimeType": "multipart/form-data",
                              "data": form
                            }

                            $.ajax(settings).done(function (response) {
                              console.log(response);
                            });
                          });

                          </script>

                          <?php
                      }
                  }
              } 
            }
            ?>
            
          </table>
          
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

@endsection



  
  
