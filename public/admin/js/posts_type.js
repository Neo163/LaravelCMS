// keyword = post-type, postType

$(document).ready(function()
{
  	$("#load").hide();
  	$(".posts-expand-all").hide();
  	
  	getPostType();

  	var updateOutputPostType = function(e)
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
  	$('#nestable-post-type').nestable({
      	group: 1
  	})
  	.on('change', updateOutputPostType);

	// output initial serialised data
	updateOutputPostType($('#nestable-post-type').data('output', $('#nestable-output-post-type')));

	$('.posts-expand-all').click(function()
	{
		$(".posts-expand-all").hide();
		$(".posts-collapse-all").show();
	});

	$('.posts-collapse-all').click(function()
	{
		$(".posts-collapse-all").hide();
		$(".posts-expand-all").show();
	});

	$('#nestable-post').on('click', function(e)
	{
		var target = $(e.target),
		  	action = target.data('action');
		if (action === 'expand-all') {
		  	$('.dd-type').nestable('expandAll');
		}
		if (action === 'collapse-all') {
		  	$('.dd-type').nestable('collapseAll');
		}
	});
  
  	$("#postTypeSubmit").click(function()
  	{
     	// $("#load").show();

     	var dataString = { 
            id : $("#postTypeId").val(),
            title : $("#postTypeTitle").val(),
        };

          	// console.log($("#postTypeId").val());
          	// console.log($("#postTypeTitle").val());

      	$.ajax({
			type: "POST",
			url: "/api/admin/posts/type/createEdit",
			data: dataString,
			dataType: "json",
			cache : false,
			success: function(data)
			{
				// console.log(data);

			if(data['type'] == 'add')
			{
			  	location.reload();
			  	// $("#postsType-id").append(createpostsType(data));
			   
			} else if(data['type'] == 'edit')
			{
			  	$('#title_show'+data['id']).html(data['title']);
			}
				$('#postTypeTitle').val('');
				$('#postTypeId').val('');
				// $("#load").hide();
			},
			error: function(xhr, status, error)
			{
				alert(error);
			},
      	});
  	});

	$('.dd-type').on('change', function()
	// $(document).on("click",".release-postsType",function()
	{
		$("#load").show();
		var dataString = 
		{ 
		  	data : $("#nestable-output-post-type").val(),
		};

		$.ajax({
			type: "POST",
			url: "/api/admin/posts/type/change",
			data: dataString,
			cache : false,
			success: function(data)
			{
				$("#load").hide();
				$("li[postsType-id='" + id +"']").remove();
			} ,error: function(xhr, status, error) 
			{
				alert(error);
			},
		});

  	});

  	$(document).on("click",".delPostsType",function()
  	{
		var id = $(this).attr('id');
   
		if(id == 1)
		{
          	alert('不可删除默认分类');
          	return false;
      	}

      	var ask = confirm('是否删除本类别？');

      	if(ask)
		{
			// $("#load").show();
	      	$.ajax({
				type: "POST",
				url: "/api/admin/posts/type/delete",
				data: { 
					id: id,
					deleteKey: 'deleteAEzBQMmYg1adsfdsASDFDSFS1888111postType',
					deleteKey1: 'delet111eAEzBdfaaaASDFDSF111111333gq111postType',
				},
				cache : false,
				success: function(data)
				{
				  	if(data == 'childType')
				  	{
				    	alert('必须消除本类别的子分类，才能删除本类别');
				    	return false;
				  	}

				  	if(data == 'childCategory')
				  	{
				    	alert('必须消除所属的循环页分类，才能删除本类别');
				    	return false;
				  	}

				  	if(data == 'childTag')
				  	{
				    	alert('必须消除所属的循环页标签，才能删除本类别');
				    	return false;
				  	}
				  	// $("#load").hide();

				  	location.reload();
				  	// window.location.replace("/admin/posts/categories/type/1");

				  	// $("li[data-id='" + id +"']").remove();
				} ,error: function(xhr, status, error) 
				{
				  	alert(error);
				},
	      	});
		}
    
  	});

  	$(document).on("click",".add-posts-type",function()
	{
		$('#postTypeId').val('');
		$('#postTypeTitle').val('');
	});

	$(document).on("click",".edit-posts-type",function()
	{
		var id = $(this).attr('id');
		var title = $(this).attr('title');
		$("#postTypeId").val(id);
		$("#postTypeTitle").val(title);
	});

	$(document).on("click","#postTypeReset",function()
	{
		$('#postTypeId').val('');
		$('#postTypeTitle').val('');
	});

	$(document).on("click","#addRecord",function()
	{
		$('#postTypeId').val('');
		$('#postTypeTitle').val('');  
	});

});

function getPostType()
{
  	$.ajax({
		url: "/api/admin/posts/type",
		method: "GET",
		// data: dataString,
		// dataType: "JSON",
		success: function (data)
		{
			// console.log(data);

			document.getElementById("get_post_type").innerHTML = get_post_type(data);
		}
    });
}

var html = '';
function get_post_type(data, tag = 'dd-list')
{

  	html = '';

  	html += "<ol class=\""+tag+"\" id=\"postsType-id\">";

  	for (var key in data) // foreach, 順次序
  	{
		html += '<li class="dd-item dd3-item" data-id="'+data[key]['id']+'" > ';
		html += '<div class="dd-handle dd3-handle"></div>';
		html += '<div class="dd3-content">';

		// html += '<a id="title_show'+data[key]['id']+'" class="titleText left" href="">'+data[key]['title']+'</a> ';
		html += '<span id="title_show'+data[key]['id']+'" class="titleText left">'+data[key]['title']+'</span> ';

		if(data[key]['id'] == 1)
		{
			html += '<span class="first-id">默认</span>';
		}

		html += '<span class="span-right">';

		html += '<a class="delPostsType" id="'+data[key]['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

		html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		html += '<a class="edit-posts-type" ';
		html += 'id="'+data[key]['id']+'" ';
		html += 'title="'+data[key]['title']+'" ';
		html += 'data-toggle="modal" data-target="#addPostType">';
		html += '<i class="uil uil-pen font-size-18"></i></a>';

		html += '</span> ';
		html += '</div>';

		if(data[key].hasOwnProperty("child"))
		{
		html += get_post_type(data[key]['child'], 'child');
		}

		html += "</li>";
  	}

  	html += "</ol>";

  	return html;
}

var html = '';
function createpostsType(data)
{
	html = '';

	html += '<li class="dd-item dd3-item" data-id="'+data['id']+'" >';
	html += '<div class="dd-handle dd3-handle"></div>';
	html += '<div class="dd3-content">';

	html += '<span id="title_show'+data[key]['id']+'" class="titleText left">'+data[key]['title']+'</span> ';

	if(data[key]['id'] == 1)
	{
		html += '<span class="first-id">默认</span>';
	}

	html += '<span class="span-right">';

	html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	html += '<a class="delPostsType" id="'+data['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

	html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	html += '<a class="edit-posts-type" ';
	html += 'id="'+data['id']+'" ';
	html += 'title="'+data['title']+'" ';
	html += 'data-toggle="modal" data-target="#addPostType">';
	html += '<i class="uil uil-pen font-size-18"></i></a>';

	html += '</span> ';
	html += '</div>';

	if(data.hasOwnProperty("child"))
	{
	html += get_post_type(data['child'], 'child');
	}

	html += "</li>";

	return html;
}
