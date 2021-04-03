<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片上传功能</title>
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <script src="/resources/js/jquery-3.5.1.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="/assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
    <!-- Summernote js -->
    <script src="/assets/libs/summernote/summernote-bs4.min.js"></script>
    <!-- init js -->
    <script src="/assets/js/pages/form-editor.init.js"></script>

</head>
<body style="width: 80%;margin: auto;" >

    <!-- 多个图片上传 -->
    <div>
        <!-- <input class="form-control" type="file" name="files" accept="image/*" multiple="multiple"> -->

        <!-- <button id="upload-submit">提交</button> -->
    </div>
    
    <script>
        // 多个图片上传
        $("#upload-submit").click(function()
        {
            multiUpload1();
        });

        var i=0;
        function multiUpload1()
        {
            var files = $('input[name="files"]').prop('files');//获取到文件列表
            console.log(files[i]);

            var form = new FormData();
            form.append("select_file", files[i]);

            var settings = {
              "url": "http://127.0.0.1:8000/api/media/mediaUpload",
              "method": "POST",
              "timeout": 0,
              "processData": false,
              "mimeType": "multipart/form-data",
              "contentType": false,
              "data": form
            };

            $.ajax(settings).done(function (data)
            {
                console.log(data);
            });

            i++;
            if (i < files.length)
            {
                setTimeout(multiUpload1, 1000*(i+1));
            }
        }

        // 后台高并发目标
        // $("#upload-submit").click(function()
        // {
        //     // var files = $('input[name="select_file"]').prop('files');//获取到文件列表
        //     var files = $('input[name="files"]').prop('files');//获取到文件列表

        //     console.log(files);

        //     for (var i = 0; i < files.length; i++)
        //     {
        //         // console.log(files[i]);
        //         var form = new FormData();
        //         form.append("select_file", files[i]);

        //         var settings = {
        //           "url": "http://127.0.0.1:8000/api/media/mediaUpload",
        //           "method": "POST",
        //           "timeout": 0,
        //           "processData": false,
        //           "mimeType": "multipart/form-data",
        //           "contentType": false,
        //           "data": form
        //         };

        //         $.ajax(settings).done(function (data)
        //         {
        //             console.log(data);
        //         });
        //     }
        // });

        // $("#upload-submit").click(function()
        // {
        //     var i=0;
        //     function uploadImage()
        //     {
        //         console.log(i);

        //         i++;
        //         if (i<5)
        //         {
        //             setTimeout(uploadImage, 1000*(i+1));
        //         }
        //     }

        //     uploadImage();
        // });

        function changeState(data)
        {  
            console.log(data);
            // let content=document.getElementById('content');  
            // content.innerHTML=data;
        }

        function upload()
        {
            // alert(data);
            console.log(data);
            // var form = new FormData();
            // form.append("select_file", data);

            // var settings = {
            //   "url": "http://127.0.0.1:8000/api/media/mediaUpload",
            //   "method": "POST",
            //   "timeout": 0,
            //   "processData": false,
            //   "mimeType": "multipart/form-data",
            //   "contentType": false,
            //   "data": form
            // };

            // $.ajax(settings).done(function (data)
            // {
            //     console.log(data);
            // });
            
        }
    </script>

    <br>

    <!-- 单个图片上传 -->
    <!-- <div>
        <input class="note-image-input form-control" type="file" name="files" accept="image/*">

        <button id="upload-submit">提交</button>
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
    </script> -->

    <br>

    <form method="post" action="/test.php" id="myform">
        <div id="summernote"></div>
        <input type="hidden" name="content" id="content" value="">
        <div class="am-form-group" align="center">
            <div class="am-u-sm-12" >
                <button  type="button" class="am-btn am-btn-default am-btn-danger" onclick="submit_content()">保存内容</button>
            </div>
        </div>
    </form>


    <script>
        function submit_content()
        {
            var content = $('#summernote').summernote('code');
            document.getElementById('content').value = content;
            document.getElementById('myform').submit();
        }

        $(document).ready(function() {
            var summernote = $('#summernote').summernote({
                // maxHeight: 1000,
                minHeight: 500,
                lang: 'zh-CN',
                focus: true,
                callbacks:{
                    onImageUpload: function(files,editor,$editable)
                    {
                        multiUpload();
                        // singleUpload(files);
                    }
                }
            });
        });

        // 多个媒体上传
        var i=0;
        function multiUpload()
        {
            var files = $('input[name="files"]').prop('files');//获取到文件列表

            var form = new FormData();
            form.append("select_file", files[i]);
            form.append("b_user_id", 1);

            $.ajax({
                data: form,
                url: "/api/media/mediaUpload",
                type: "POST",
                timeout: 0,
                dataType: "json",
                cache: false,
                processData: false,
                mimeType: "multipart/form-data",
                contentType: false,
                success: function(data)
                {
                    console.log(data);

                    var path = '/storage/media/'+data['month']+'/'+data['fix_link'];
                    $('#summernote').summernote('insertImage', path);
                },
                error:function()
                {
                    alert("上传失败");
                }
            });

            i++;
            if (i < files.length)
            {
                setTimeout(multiUpload, 1000*(i+1));
            }
        }

        // 单个媒体上传，选择图片时把图片上传到服务器再读取服务器指定的存储位置显示在富文本区域内
        function singleUpload(files, editor, $editable)
        {
            // 获取到文件列表
            var files = $('input[name="files"]').prop('files');

            var form = new FormData();
            form.append("select_file", files[0]);
            form.append("b_user_id", 1);

            $.ajax({
                data: form,
                url: "/api/media/mediaUpload",
                type: "POST",
                timeout: 0,
                dataType: "json",
                cache: false,
                processData: false,
                mimeType: "multipart/form-data",
                contentType: false,
                success: function(data)
                {
                    console.log(data);

                    var path = '/storage/media/'+data['month']+'/'+data['fix_link'];
                    $('#summernote').summernote('insertImage', path);
                },
                error:function()
                {
                    alert("上传失败");
                }
            });
        }
    </script>
</body>
</html>