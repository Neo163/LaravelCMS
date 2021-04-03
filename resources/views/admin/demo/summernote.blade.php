<!doctype html>
<html lang="en">

    <head>

        @include("admin.layout.headStart")
        
        <title>后台</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <link href="/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Summernote css -->
        <link href="/assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="/admin/css/menu.css">

        <script src="/resources/js/jquery-3.5.1.js"></script>

        @include("admin.layout.headEnd")

    </head>

    <body style="width: 80%;margin: auto;" >

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
                // document.getElementById('myform').submit();
                console.log(content);
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
                            // multiUpload();
                            singleUpload(files);
                        }
                    }
                });
            });

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

        </script>
    </body>

    

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <!-- <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> -->

        <script src="/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="/assets/js/pages/lightbox.init.js"></script>

        <!-- Summernote js -->
        <script src="/assets/libs/summernote/summernote-bs4.min.js"></script>
        <!-- init js -->
        <script src="/assets/js/pages/form-editor.init.js"></script>

        <script src="/assets/js/app.js"></script>

        <script src="/resources/js/jquery.nestable.js"></script>
        <!-- <script src="/admin/js/page.js"></script> -->
        <script src="/admin/js/page_add.js"></script>

        <script src="/editor/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
              selector: "textarea",
              plugins: "code",
            });

            function go(name)
            {
                $("#target_upload").val('');
                $("#month").val('');
                $("#fix_link").val('');
                $("#media-upload-link").val('');

                $('.media-ok-mark').removeClass('media-ok');
                $("#target_upload").val(name);
            }

            function removeItem(target)
            {
                var content_num_text = $("#content_num_"+target).val();
                
                if(Number(content_num_text) > 0)
                {
                    $(".item_"+target+content_num_text).remove();
                    var content_num_textNow = Number(content_num_text) - 1;
                    $("#content_num_"+target).val(content_num_textNow);
                    $("#number_"+target).text(content_num_textNow);
                }

                if(Number(content_num_text) == 1)
                {
                    $("#content_box_"+target).css('display','none');
                }
            }

            function removeItemSlider(target)
            {
                var content_num_text = $("#content_num_"+target).val();
                
                if(Number(content_num_text) > 0)
                {
                    $(".item_"+target+'_'+content_num_text).remove();
                    var content_num_textNow = Number(content_num_text) - 1;
                    $("#content_num_"+target).val(content_num_textNow);
                    $("#number_"+target).text(content_num_textNow);
                }

                if(Number(content_num_text) == 1)
                {
                    $("#slider_content1").html('');
                    $("#accordion").html('');

                    $("#number_"+target).text(0);

                    $(".content_box_"+target).css('display','none');
                }
            }
        </script>

        <!-- <script>
        ClassicEditor
        .create( document.querySelector( '#classic-editor' ) )
        .catch( error => {
            console.error( error );
        } );
        </script> -->

    </body>

</html>