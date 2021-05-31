$(document).ready(function()
{
  	getMedia();

  	$("#hidePostContent").click(function()
  	{
	    if($("#postContentBox").css("display")=="none")
	    {
	        $("#postContentBox").show();
	        $(".postContentText").text("隐藏主体");
	    }else{
	        $("#postContentBox").hide();
	        $(".postContentText").text("显示主体");
	    }

	    var url = window.location.pathname;

	    if(url.substring(0,22) == '/admin/post/type/edit/')
	    {
	      var status = $(this).attr('status');
	      var post = $(this).attr('post');

	      $.ajax({
	        type: "POST",
	        url: "/api/admin/post/content/status/"+post,
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

  	$('.dd-media').on('change', function()
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
		  // 	if(id == 1)
		  // 	{
				// alert('不可删除默认分类');
				// return false;
		  // 	}

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
