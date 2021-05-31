<input type="file" name="select_file" class="select_file_upload" />

<button type="button" class="btn btn-primary btn-lg btn-block1 waves-effect waves-light upload-tips" id="upload-tips" hidden></button>


<div class="rightBtn">
	<button type="button" class="btn w-md btn-primary" onclick="uploadMediaApi('select_file')">提交</button>
	   	&nbsp;&nbsp;&nbsp;&nbsp;
	<span type="button" class="btn w-md btn-secondary" data-dismiss="modal" id="reset">取消</span>
</div>

<script>
	$('.selectMediaText').click(function()
    {
    	media_all();
        $(".selectMediaBox").show();
        $(".uploadMediaBox").hide();
    });

    $('.uploadMediaText').click(function()
    {
        $(".selectMediaBox").hide();
        $(".uploadMediaBox").show();
    });

    function uploadMediaApi(position)
    {
        // 获取到文件列表
        var files = $('input[name="'+position+'"]').prop('files');

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
                $('#upload-tips').trigger("click");
            },
            error:function()
            {
                alert("上传失败");
            }
        });
    }
</script>