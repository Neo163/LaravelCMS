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

function submit_content()
{
    var content = $('#summernote').summernote('code');
    document.getElementById('content').value = content;
    // console.log(content);
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
            // console.log(data);

            var path = '/storage/media/'+data['month']+'/'+data['fix_link'];
            $('#summernote').summernote('insertImage', path);
        },
        error:function()
        {
            alert("上传失败");
        }
    });
}

function copy_link(copy_link, position)
{
    // var link = window.location.host+copy_link;

    // if(link.substring(0,4) != 'http')
    // {
    //  link = 'http://'+link;
    // }

    var link = copy_link;
    var timestamp = (new Date()).valueOf();

    $(position).after('<input id="urlText_'+timestamp+'" style="position:fixed;top:-200%;left:-200%;" type="text" value=' + link + '>');
    $('#urlText_'+timestamp).select(); //选择对象
    document.execCommand("Copy"); //执行浏览器复制命令

    $('#copy-link').trigger("click");
}
