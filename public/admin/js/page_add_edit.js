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

$(document).ready(function()
{
  	getMedia();

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

  	$("#hidePageContent").click(function()
  	{
	    if($("#pageContentBox").css("display")=="none")
	    {
	        $("#pageContentBox").show();
	        $(".pageContentText").text("隐藏主体");
	    }else{
	        $("#pageContentBox").hide();
	        $(".pageContentText").text("显示主体");
	    }

	    var url = window.location.pathname;

	    if(url.substring(0,17) == '/admin/page/edit/')
	    {
	      var status = $(this).attr('status');
	      var page = $(this).attr('page');

	      $.ajax({
	        type: "POST",
	        url: "/api/admin/page/content/status/"+page,
	        data: { 
	          status: status,
	        },
	        cache : false,
	        success: function(data)
	        {
	          // console.log(data);
	          if(data == 'child')
	          {
	            alert('必须删除子分类，才能删除本分类');
	            return false;
	          }
	        } ,error: function(xhr, status, error) 
	        {
	          alert(error);
	        },
	      });
	    }
    
  	});

  	$("#media-submit").click(function()
  	{
	    if($("#media-upload-link").val() != '')
	    {
	      var id = $("#target_upload").val();
	      var month = $("#month").val();
	      var fix_link = $("#fix_link").val();

	      // alert(id);

	      $('.'+id+'A').attr('src', $("#media-upload-link").val());
	      $('#'+id).val(month+'/'+fix_link);
	    }
    
  	});

  	$(document).on("click","#reset",function() {
	    $('.media-ok-mark').removeClass('media-ok');

	    $('#media-submit').removeClass('btn-primary');
	    $('#media-submit').addClass('btn-light');

	    $("#target_upload").val('');
	    $("#month").val('');
	    $("#fix_link").val('');
	    $("#media-upload-link").val('');
  	});

  	var updateOutputMedia = function(e)
  	{
		var list   = e.length ? e : $(e.target),
		  	output = list.data('output');
		if (window.JSON) {
		  	output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
		} else {
		  	output.val('JSON browser support required for this demo.');
		}
  	};

	// activate Nestable for list 1
	$('#nestable-media-category').nestable({
	  	group: 1
	})
	.on('change', updateOutputMedia);

	// output initial serialised data
	updateOutputMedia($('#nestable-media-category').data('output', $('#nestable-output-media-category')));

	$(".media-category-expand-all").hide();

    $('.media-category-expand-all').click(function()
    {
        $(".media-category-expand-all").hide();
        $(".media-category-collapse-all").show();
    });

    $('.media-category-collapse-all').click(function()
    {
        $(".media-category-collapse-all").hide();
        $(".media-category-expand-all").show();
    });
    
  	$('#nestable-media').on('click', function(e)
  	{
		var target = $(e.target),
		  	action = target.data('action');
		if (action === 'expand-all-media') {
		  	$('.dd').nestable('expandAll');
		}
		if (action === 'collapse-all-media') {
		  	$('.dd').nestable('collapseAll');
		}
  	});

  	$('.dd').on('change', function()
  	// $(document).on("click",".release-media",function()
  	{
		$("#load").show();
		var dataString = 
		{ 
		  	data : $("#nestable-output-media-category").val(),
		};

		$.ajax({
			type: "POST",
			url: "/api/admin/mediaCategory/change",
			data: dataString,
			cache : false,
			success: function(data)
			{
			// $("li[media-id='" + id +"']").remove();
			} ,error: function(xhr, status, error) 
			{
			alert(error);
			},
		});

  	});

  	$(document).on("click",".del-media-category",function()
  	{
		var x = confirm('删除媒体分类，会将所属的媒体，设置为默认分类');
		var id = $(this).attr('id');

		if(x)
		{
		  	if(id == 1)
		  	{
				alert('不可删除默认分类');
				return false;
		  	}

		  	// $("#load").show();
		  	$.ajax({
			    type: "POST",
			    url: "/api/admin/mediaCategory/delete",
			    data: { 
			      id: id,
			      deleteKey: 'deleteAEzBQMmYg111rjjHI330q111media',
			      deleteKey1: 'delet111eAEzBQMmaYgrjdjHSI0333gq111media',
			    },
			    cache : false,
			    success: function(data)
			    {
			      if(data == 'child')
			      {
			        alert('必须删除子分类，才能删除本分类');
			        return false;
			      }
			      // $("#load").hide();

			      // location.reload();
			      window.location.replace("/admin/media");

			      // $("li[data-id='" + id +"']").remove();
			    } ,error: function(xhr, status, error) 
			    {
			      alert(error);
			    },
		  	});
		}
  	});

  	$(document).on("click",".edit-media-category",function() {
		var id = $(this).attr('id');
		var title = $("#title_show"+$(this).attr('id')).html();
		$("#id").val(id);
		$("#title").val(title);
  	});

  	$(document).on("click","#addRecord",function() {
		$('#title').val('');
		$('#id').val('');
  	});

});

function getMedia()
{
  	$.ajax({
		url: "/api/admin/mediaCategory",
		method: "GET",
		// data: dataString,
		// dataType: "JSON",
		success: function (data)
		{
			// console.log(data);

			document.getElementById("get_media").innerHTML = get_media(data);
		}
	});
}

function get_media(data, tag = 'dd-list')
{
	var html = '';

	html += "<ol class=\""+tag+"\" id=\"media-id\">";

	for (var key in data) // foreach, 順次序
	{
	  html += '<li class="dd-item dd3-item" data-id="'+data[key]['id']+'" > ';
	  html += '<div class="dd-handle dd3-handle"></div>';
	  html += '<div class="dd3-content">';

	  html += '<span id="title_show'+data[key]['id']+'" class="titleText left" onclick="media_category('+data[key]['id']+')">'+data[key]['title']+'</span> ';

	  html += '</div>';

	  if(data[key].hasOwnProperty("child"))
	  {
	    html += get_media(data[key]['child'], 'child');
	  }
	  
	  html += "</li>";
	}

	html += "</ol>";

	return html;
}

function selectImg(id, month, fix_link)
{
	$('.media-ok-mark').removeClass('media-ok');
	$('#media-ok-mark-'+id).toggleClass('media-ok');

	$('#media-submit').removeClass('btn-light');
	$('#media-submit').addClass('btn-primary');

	$("#month").val(month);
	$("#fix_link").val(fix_link);

	var link = '/storage/media/'+month+'/'+fix_link;
	$("#media-upload-link").val(link);
}
