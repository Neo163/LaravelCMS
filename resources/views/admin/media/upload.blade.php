@extends("admin.layout.main")

@section("content")

<section class="content-header">
  <span class="h3">上传页面&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <span class="h3"><a href="/admin/medias/list" type="button" class="btn btn-primary">媒体列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <span class="h3"><a href="/admin/media/mediaUpload" type="button" class="btn btn-warning">上传</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  <ol class="breadcrumb">
    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> 首页</a></li>
    <li class="active">上传页面</li>
  </ol>
</section>

<div class="container">
   <br />
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
   <img src="<?php echo url(''); ?>{{ Session::get('path') }}" width="300" />
   @endif
   <form method="post" action="/admin/media/mediaUpload" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>jpg, jpeg, png, gif 格式</label></td>
       <td width="30"><input type="file" name="select_file" /></td>
       <td width="30%" align="left"><input type="submit" name="upload" class="btn btn-primary" value="上传"></td>
      </tr>
     </table>
    </div>
   </form>
   <br />
  </div>

@endsection



  
  
