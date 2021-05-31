<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="/editor/weditor/css/wangEditor.min.css">

<textarea id="content" name="content" class="form-control" style="height:600px;"  placeholder="内容"></textarea>

<script src="/resources/js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="/editor/weditor/js/wangEditor.min.js"></script>

<script>
var editor = new wangEditor('content');

editor.config.uploadImgUrl = '/admin/post/image/upload';

//设置 headers（举例）
editor.config.uploadHeaders = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
};

editor.create();
</script>

  
  
