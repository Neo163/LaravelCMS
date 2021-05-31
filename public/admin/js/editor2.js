// wangEditor4 start
$(function ()
{
    var E = window.wangEditor
    if (document.getElementById('Weditor')) {
        var editor = new E('#Weditor');
        editor.config.height = 800;
        editor.config.zIndex = 0;

        editor.config.pasteIgnoreImg = true; //开启文件上传服务器
        editor.config.customUploadImg = function (files, insertImgFn) {
            
            singleUpload(files, insertImgFn);
        };

        editor.create()
    }

    var E = window.wangEditor
    if (document.getElementById('demo1')) {
        var editor = new E('#demo1');

        editor.config.zIndex = 0;

        editor.config.pasteIgnoreImg = true; //开启文件上传服务器
        editor.config.customUploadImg = function (files, insertImgFn) {
            
            singleUpload(files, insertImgFn);
        };

        editor.create()
    }

    if (document.getElementById('demo2')) {
        var editor_en = new E('#demo2');

        editor.config.zIndex = 0;

        editor_en.config.pasteIgnoreImg = true; //开启文件上传服务器
        editor_en.config.customUploadImg = function (files, insertImgFn) {
            
            singleUpload(files, insertImgFn);
        };

        editor_en.config.lang = 'en'
        editor_en.i18next = window.i18next

        editor_en.create()
    }

    // 单个媒体上传，选择图片时把图片上传到服务器再读取服务器指定的存储位置显示在富文本区域内
    function singleUpload(files, insertImgFn)
    {
        console.log(files[0]);
        
        var form = new FormData();
        form.append("select_file", files[0]);
        // form.append("b_user_id", );

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
                insertImgFn(path);
            },
            error:function()
            {
                alert("上传失败");
            }
        });
    }
});
// wangEditor4 end

// wangEditor2 start
// var editor = new wangEditor('content');

// editor.config.uploadImgUrl = '/admin/post/image/upload';

// //设置 headers（举例）
// editor.config.uploadHeaders = {
//  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// };

// editor.create();
// wangEditor2 end

function submit_content()
{
    // var content = $('#summernote').summernote('code');
    var content = $(".w-e-text").html();
    document.getElementById('content').value = content;
    // console.log(content);
}

function copy_link(copy_link, position)
{
    // var link = window.location.host+copy_link;

    // if(link.substring(0,4) != 'http')
    // {
    //  link = 'http://'+link;
    // }

    if(copy_link.substring(copy_link.length-4) == '.mp4')
    {
        // console.log(copy_link.substring(copy_link.length-4));
        var link = "<video controls='' src='"+copy_link+"' width='80%' class='note-video-clip'></video>";
        // var link = '&lt;video controls="" src="'+copy_link+'" width="60%" class="note-video-clip"&gt;&lt;/video&gt;';
        console.log(link);
        var timestamp = (new Date()).valueOf();

        $(position).after('<input id="urlText_'+timestamp+'" style="position:fixed;top:-200%;left:-200%;" type="text" value="' + link + '" >');
        $('#urlText_'+timestamp).select(); //选择对象
        document.execCommand("Copy"); //执行浏览器复制命令

    } else
    {
        console.log(copy_link);
        var link = copy_link;
        var timestamp = (new Date()).valueOf();

        $(position).after('<input id="urlText_'+timestamp+'" style="position:fixed;top:-200%;left:-200%;" type="text" value=' + link + '>');
        $('#urlText_'+timestamp).select(); //选择对象
        document.execCommand("Copy"); //执行浏览器复制命令
    }

    

    $('#copy-link').trigger("click");
}