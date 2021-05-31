<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图集内容上传</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="/resources/js/jquery-3.5.1.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>

</head>
<body style="width: 80%;margin: auto;" >

    <div>
        <!-- <input type="file" id="select_file" name="select_file" class="select_file" /> -->
        <!-- <input class="note-image-input form-control" type="file" name="files" accept="image/*" multiple="multiple"> -->

        <!-- <button id="upload-submit">提交</button> -->
    </div>
    

    <script>
        
        $("#upload-submit").click(function()
        {
            // var files = $('input[name="select_file"]').prop('files');//获取到文件列表
            var files = $('input[name="files"]').prop('files');//获取到文件列表

            var form = new FormData();
            form.append("select_file", files[0]);

            var settings = {
              "url": "http://127.0.0.1:8000/api/media/mediaUpload",
              "method": "POST",
              "timeout": 0,
              "processData": false,
              "mimeType": "multipart/form-data",
              "contentType": false,
              "data": form
            };

            $.ajax(settings).done(function (data) {
              console.log(data);
            });
        });
    </script>

    <br>

    <form method="post" action="/test.php" id="myform">
        <div id="summernote" >123</div>
        <input type="hidden" name="content" id="content" value="">
        <div class="am-form-group" align="center">
            <div class="am-u-sm-12" >
                <button  type="button" class="am-btn am-btn-default am-btn-danger" onclick="submit_content()">保存内容</button>
            </div>
        </div>
    </form>


<script>
    function submit_content(){
        var content = $('#summernote').summernote('code');
        document.getElementById('content').value = content;
        document.getElementById('myform').submit();
    }
    $(document).ready(function() {
        var summernote = $('#summernote').summernote({
            maxHeight: 500,
            minHeight: 400,
            lang: 'zh-CN',
            focus: true,
            callbacks:{
                onImageUpload: function(files,editor,$editable){
                    sendFile(files);
                    // alert(1);
                }
            }
        });
    });

    //选择图片时把图片上传到服务器再读取服务器指定的存储位置显示在富文本区域内
    function sendFile(files, editor, $editable)
    {
        // var formdata = new FormData();
        // formdata.append("select_file", $('input[name="files"]').prop('files')[0]);

        // $.ajax({
        //     data : formdata,
        //     type : "POST",
        //     url : "/api/media/mediaUpload", //图片上传出来的url，返回的是图片上传后的路径，http格式
        //     cache : false,
        //     contentType : false,

        //     processData : false,
        //     dataType : "json",
        //     success: function(data) {
        //         // alert(data);
        //         // data是返回的hash,key之类的值，key是定义的文件名
        //         $('#summernote').summernote('insertImage', data);
        //     },
        //     error:function(){
        //         alert("上传失败");
        //     }
        // });

        // 获取到文件列表
        var files = $('input[name="files"]').prop('files');//获取到文件列表

        var form = new FormData();
        form.append("select_file", files[0]);

        var settings = {
          "url": "http://127.0.0.1:8000/api/media/mediaUpload",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (data) {
          console.log(data);

          data =  JSON.parse(data);

          console.log(data['month']);
          console.log(data['fix_link']);

          var path = '/storage/media/'+data['month']+'/'+data['fix_link'];
          console.log(path);
          $('#summernote').summernote('insertImage', path);
        });
    }
</script>
</body>
</html>