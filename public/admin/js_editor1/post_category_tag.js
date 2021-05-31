$(document).ready(function()
{	
    getPostCategory();

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
	$('#nestable-posts-category').nestable({
		group: 1
	})
	.on('change', updateOutputMedia);

  	// output initial serialised data
  	updateOutputMedia($('#nestable-posts-category').data('output', $('#nestable-output-media-category')));

  	$('.posts-categories-expand-all').click(function()
  	{
    	$(".posts-categories-expand-all").hide();
    	$(".posts-categories-collapse-all").show();
  	});

  	$('.posts-categories-collapse-all').click(function()
  	{
    	$(".posts-categories-collapse-all").hide();
    	$(".posts-categories-expand-all").show();
  	});

  	$('#nestable-posts-categories').on('click', function(e)
  	{
		var target = $(e.target),
		    action = target.data('action');
		if (action === 'expand-all') {
		    $('.dd-category').nestable('expandAll');
		}
		if (action === 'collapse-all') {
		    $('.dd-category').nestable('collapseAll');
		}
  	});
  
  	$("#submit").click(function()
  	{
      	// $("#load").show();

      	// var b_posts_type_id = $("select[name='b_posts_type_id']").val();
      	var b_posts_type_id = $("#b_posts_type_id").val();

      	var dataString = { 
      		id : $("#id").val(),
      		title : $("#titleItem").val(),
      		b_posts_type_id: $("#b_posts_type_id").val(),
        };

    	// console.log($("#titleItem").val());

		$.ajax({
			type: "POST",
			url: "/api/admin/posts/categories/createEdit",
			data: dataString,
			dataType: "json",
			cache : false,
			success: function(data)
			{
				// console.log(data);

				if(data['result'] == 'childNotChange')
			  	{
			    	alert('本分类消除所有子分类，才能修改当前所属类别');
			    	return false;
			  	}

			  	if(data['result'] == 'parentNotChange')
			  	{
			   		alert('本分类取消当前父分类，才能修改当前所属类别');
			    	return false;
			  	}

				if(data['type'] == 'add')
				{
				    // location.reload();
				    window.location.replace("/admin/posts/categories/type/"+b_posts_type_id);
				    // $("#category-id").append(createmedia(data));
				   
				} else if(data['type'] == 'edit')
				{
				    // location.reload();
				    window.location.replace("/admin/posts/categories/type/"+b_posts_type_id);
				    // $('#title_show'+data['id']).html(data['title']);
				}

				$('#titleItem').val('');
				$('#id').val('');
				// $("#load").hide();
			},
			error: function(xhr, status, error)
			{
				alert(error);
			},
    	});
	});

	$('.dd-category').on('change', function()
	// $(document).on("click",".release-media",function()
	{
	    $("#load").show();
	    var dataString = 
	    { 
	        data : $("#nestable-output-media-category").val(),
	    };

	    $.ajax({
			type: "POST",
			url: "/api/admin/posts/categories/change",
			data: dataString,
			cache : false,
	      	success: function(data)
	      	{
	        	$("#load").hide();
	        	// $("li[category-id='" + id +"']").remove();
	      	} ,error: function(xhr, status, error) 
	      	{
	        	alert(error);
	      	},
	    });

	});

	$(document).on("click",".del-media-category",function()
	{
	    var x = confirm('删除本分类，会将所属的循环页，设置为“默认分类”');
	    var id = $(this).attr('id');
	    
	    if(x)
	    {
	      	// if(id == 1)
	      	// {
	       //    	alert('不可删除默认分类');
	       //    	return false;
	      	// }

	      	// $("#load").show();
	      	$.ajax({
		        type: "POST",
		        url: "/api/admin/posts/categories/delete",
		        data: { 
		          id: id,
		          deleteKey: 'deleteAEzBQMmYg1adsfdsASDFDSFS1888111postType',
		          deleteKey1: 'delet111eAEzBdfaaaASDFDSF111111333gq111postType',
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

		            location.reload();
		            // window.location.replace("/admin/posts/categoriess");

		            // $("li[data-id='" + id +"']").remove();
		        } ,error: function(xhr, status, error) 
		        {
		            alert(error);
		        },
	      	});
	    }
	});

  	$(document).on("click",".add-posts-category",function()
  	{
	    $('#id').val('');
	    $('#titleItem').val('');
	    var type_id = $("#b_posts_type_id").val();
	    $("select[name='b_posts_type_id']").val(type_id);
  	});

  	$(document).on("click",".edit-posts-category",function() {
	    var id = $(this).attr('id');
	    var title = $("#title_show"+$(this).attr('id')).html();
	    $("#id").val(id);
	    $("#titleItem").val(title);

	    var type_id = $("#b_posts_type_id").val();
	    $("select[name='b_posts_type_id']").val(type_id);
    });

    $(document).on("click","#reset",function(){
      	$('#id').val('');
    	$('#titleItem').val('');
    });

    $(document).on("click","#addRecord",function(){
      	$('#id').val('');
    	$('#titleItem').val('');
  	});

});

function getPostCategory()
{
	// alert($("#b_menus_category_id").val());
	var dataString = {
		id: $("#b_posts_type_id").val(),
	};

    $.ajax({
	    url: "/api/admin/posts/categories",
	    method: "GET",
	    data: dataString,
	    dataType: "JSON",
	    success: function (data)
	    {
	      	// console.log(data);

	      	document.getElementById("get_posts_category").innerHTML = get_posts_category(data);

	      	var url = window.location.pathname;

           	// if(url.substring(0, 21) == '/admin/post/type/add/')
           	// {
           		selectCategoryItem();
           	// }
	    }
    });
}

function get_posts_category(data, tag = 'dd-list')
{

	var html = '';

  	html += "<ol class=\""+tag+"\" id=\"category-id\">";

  	for (var key in data) // foreach, 順次序
  	{
	    html += '<li class="dd-item dd3-item" data-id="'+data[key]['id']+'" > ';
	    html += '<div class="dd-handle dd3-handle"></div>';
	    html += '<div class="dd3-content">';

	    html += '<span class="titleText left">ID: '+data[key]['id']+'&nbsp;&nbsp;|&nbsp;&nbsp;</span>';

	    html += '<a id="title_show'+data[key]['id']+'" class="titleText left" href="#">'+data[key]['title']+'</a> ';

	    if(data[key]['id'] == 1)
	    {
	    	html += '<span class="first-id">默认</span>';
	    }

	    html += '<span class="span-right">';

	    // html += '<a class="del-media-category" id="'+data[key]['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

	    // html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	    // html += '<a class="edit-posts-category" ';
	    // html += 'id="'+data[key]['id']+'" ';
	    // html += 'title="'+data[key]['title']+'" ';
	    // html += 'data-toggle="modal" data-target="#addItem">';
	    // html += '<i class="uil uil-pen font-size-18"></i></a>';

	    // html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	
		html += '<input type="checkbox" id="checkbox_category'+data[key]['id']+'" name="categoryItem" class="checkbox_category" value="'+data[key]['id']+'">';

	    html += '</span> ';
	    html += '</div>';

	    if(data[key].hasOwnProperty("child"))
	    {
	    html += get_posts_category(data[key]['child'], 'child');
	    }

	    html += "</li>";
    }

    html += "</ol>";

  	return html;
}

function createmedia(data)
{
	var html = '';

	html += '<li class="dd-item dd3-item" data-id="'+data['id']+'" >';
	html += '<div class="dd-handle dd3-handle"></div>';
	html += '<div class="dd3-content">';

	html += '<a id="title_show'+data['id']+'" class="titleText left" href="#">'+data['title']+'</a>';

	if(data[key]['id'] == 1)
	{
	html += '<span class="first-id">默认</span>';
	}

	html += '<span class="span-right">';

	html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	// html += '<a class="del-media-category" id="'+data['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

	// html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	// html += '<a class="edit-posts-category" ';
	// html += 'id="'+data['id']+'" ';
	// html += 'title="'+data['title']+'" ';
	// html += 'data-toggle="modal" data-target="#addItem">';
	// html += '<i class="uil uil-pen font-size-18"></i></a>';

	// html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	
	html += '<input type="checkbox" id="checkbox_category'+data[key]['id']+'" name="categoryItem" class="checkbox_category" value="'+data[key]['id']+'">';

	html += '</span> ';
	html += '</div>';

	if(data.hasOwnProperty("child"))
	{
	html += get_posts_category(data['child'], 'child');
	}

	html += "</li>";

	return html;
}


// posts tag start
$(document).ready(function()
{
  	getPostTag();

  	var updateOutputTag = function(e)
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
	$('#nestable-media-tag').nestable({
		group: 1
	})
	.on('change', updateOutputTag);

	// output initial serialised data
	updateOutputTag($('#nestable-media-tag').data('output', $('#nestable-output-media-tag')));

	$('.posts-tags-expand-all').click(function()
	{
		$(".posts-tags-expand-all").hide();
		$(".posts-tags-collapse-all").show();
	});

	$('.posts-tags-collapse-all').click(function()
	{
		$(".posts-tags-collapse-all").hide();
		$(".posts-tags-expand-all").show();
	});

	$('#nestable-posts-tags').on('click', function(e)
	{
		var target = $(e.target),
		  	action = target.data('action');
		if (action === 'expand-all') {
		  	$('.dd').nestable('expandAll');
		}
		if (action === 'collapse-all') {
		  	$('.dd').nestable('collapseAll');
		}
	});
  
  $("#submit").click(function()
  {
     	// $("#load").show();

     	var b_posts_type_id = $("#b_posts_type_id").val();

     	var dataString = { 
			id : $("#id").val(),
			title : $("#titleItem").val(),
			b_posts_type_id: $("#b_posts_type_id").val(),
      	};

		// console.log($("#titleItem").val());

		$.ajax({
			type: "POST",
			url: "/api/admin/posts/tags/createEdit",
			data: dataString,
			dataType: "json",
			cache : false,
			success: function(data)
			{
				// console.log(data);

				if(data['result'] == 'childNotChange')
			  	{
			    	alert('本标签消除所有子标签，才能修改当前所属类别');
			    	return false;
			  	}

			  	if(data['result'] == 'parentNotChange')
			  	{
			    	alert('本标签取消当前父标签，才能修改当前所属类别');
			    	return false;
			  	}

				if(data['type'] == 'add')
				{
				  	// location.reload();
				  	window.location.replace("/admin/posts/tags/type/"+b_posts_type_id);
				  	// $("#media-id").append(createmedia(data));
				   
				} else if(data['type'] == 'edit')
				{
				  	// location.reload();
				  	window.location.replace("/admin/posts/tags/type/"+b_posts_type_id);
				  	// $('#title_show'+data['id']).html(data['title']);
				}

				$('#titleItem').val('');
				$('#id').val('');
				// $("#load").hide();
			},
			error: function(xhr, status, error)
			{
				alert(error);
			},
      	});
  });

	$('.dd-tag').on('change', function()
	// $(document).on("click",".release-media",function()
	{
		$("#load").show();
		var dataString = 
		{ 
		  	data : $("#nestable-output-media-tag").val(),
		};

		$.ajax({
			type: "POST",
			url: "/api/admin/posts/tags/change",
			data: dataString,
			cache : false,
			success: function(data)
			{
				$("#load").hide();
				$("li[media-id='" + id +"']").remove();
			} ,error: function(xhr, status, error) 
			{
				alert(error);
			},
		});

  	});

	$(document).on("click",".del-media-tag",function()
	{
		var x = confirm('删除本分类，会将所属的循环页，设置为“默认分类”');
		var id = $(this).attr('id');
    
		if(x)
		{
			// if(id == 1)
			// {
			//   	alert('不可删除默认分类');
			//   	return false;
			// }

			// $("#load").show();
			$.ajax({
				type: "POST",
				url: "/api/admin/posts/tags/delete",
				data: { 
					id: id,
					deleteKey: 'deleteAEzBQMmYg1adsfdsASDFDSFS1888111postType',
					deleteKey1: 'delet111eAEzBdfaaaASDFDSF111111333gq111postType',
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

				  	location.reload();
				  	// window.location.replace("/admin/posts/tags");

				  	// $("li[data-id='" + id +"']").remove();
				} ,error: function(xhr, status, error) 
				{
				  	alert(error);
				},
			});
		}
  	});

  	$(document).on("click",".add-posts-tag",function()
	{
		$('#id').val('');
		$('#titleItem').val('');
		var type_id = $("#b_posts_tag_id").val();
		$("select[name='b_posts_type_id']").val(type_id);
	});

  	$(document).on("click",".edit-posts-tag",function() {
		var id = $(this).attr('id');
		var title = $("#title_show"+$(this).attr('id')).html();
		$("#id").val(id);
		$("#titleItem").val(title);

		var type_id = $("#b_posts_tag_id").val();
		$("select[name='b_posts_type_id']").val(type_id);
  	});

  	$(document).on("click","#reset",function() {
		$('#titleItem').val('');
		$('#id').val('');
  	});

  	$(document).on("click","#addRecord",function() {
		$('#titleItem').val('');
		$('#id').val('');
  	});

});

function getPostTag()
{
	var dataString = {
		id: $("#b_posts_tag_id").val(),
	};

  	$.ajax({
		url: "/api/admin/posts/tags",
		method: "GET",
		data: dataString,
		dataType: "JSON",
		success: function (data)
		{
			// console.log(data);

			document.getElementById("get_posts_tag").innerHTML = get_posts_tag(data);

			var url = window.location.pathname;
			
			// if(url.substring(0, 21) == '/admin/post/type/add/')
           	// {
           		selectTagItem();
           	// }
		}
    });
}

var html = '';
function get_posts_tag(data, tag = 'dd-list')
{

	html = '';

	html += "<ol class=\""+tag+"\" id=\"media-id\">";

	for (var key in data) // foreach, 順次序
	{
		html += '<li class="dd-item dd3-item" data-id="'+data[key]['id']+'" > ';
		html += '<div class="dd-handle dd3-handle"></div>';
		html += '<div class="dd3-content">';

		html += '<span class="titleText left">ID: '+data[key]['id']+'&nbsp;&nbsp;|&nbsp;&nbsp;</span>';
		
		html += '<a id="title_show'+data[key]['id']+'" class="titleText left" href="#">'+data[key]['title']+'</a> ';

		if(data[key]['id'] == 1)
		{
			html += '<span class="first-id">默认</span>';
		}

		html += '<span class="span-right">';

		// html += '<a class="del-media-tag" id="'+data[key]['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

		// html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		// html += '<a class="edit-posts-tag" ';
		// html += 'id="'+data[key]['id']+'" ';
		// html += 'title="'+data[key]['title']+'" ';
		// html += 'data-toggle="modal" data-target="#addItem">';
		// html += '<i class="uil uil-pen font-size-18"></i></a>';

		// html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		html += '<input type="checkbox" id="checkbox_tag'+data[key]['id']+'" name="TagItem" class="checkbox_tag" value="'+data[key]['id']+'">';

		html += '</span> ';
		html += '</div>';

		if(data[key].hasOwnProperty("child"))
		{
		html += get_posts_tag(data[key]['child'], 'child');
		}

		html += "</li>";
  	}

  	html += "</ol>";

  return html;
}

var html = '';
function createmedia(data)
{
	html = '';

	html += '<li class="dd-item dd3-item" data-id="'+data['id']+'" >';
	html += '<div class="dd-handle dd3-handle"></div>';
	html += '<div class="dd3-content">';

	html += '<a id="title_show'+data['id']+'" class="titleText left" href="#">'+data['title']+'</a>';

	if(data[key]['id'] == 1)
	{
		html += '<span class="first-id">默认</span>';
	}
	
	html += '<span class="span-right">';

	html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	// html += '<a class="del-media-tag" id="'+data['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

	// html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	// html += '<a class="edit-posts-tag" ';
	// html += 'id="'+data['id']+'" ';
	// html += 'title="'+data['title']+'" ';
	// html += 'data-toggle="modal" data-target="#addItem">';
	// html += '<i class="uil uil-pen font-size-18"></i></a>';

	// html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

	html += '<input type="checkbox" id="checkbox_tag'+data[key]['id']+'" name="TagItem" class="checkbox_tag" value="'+data[key]['id']+'">';

	html += '</span> ';
	html += '</div>';

	if(data.hasOwnProperty("child"))
	{
	html += get_posts_tag(data['child'], 'child');
	}

	html += "</li>";

	return html;
}

function selectCategoryItem() 
{
	var items=document.getElementsByName("categoryItem");
	var str1 = $("#selectCategoryValue").val();
	if($("#selectCategoryValue").val() != '')
	{
		var str1 = str1 + ' ';
	}

	for(var i=0;i<items.length;i++)
	{
	    items[i].onchange=function()
	    {
	    	// console.log(1);
	        if(this.checked)
	        {
	        	// console.log(2);
	            str1=str1+this.value + ' ';
	        } else
	        {
	        	// console.log(4);
	            str1=str1.replace(this.value, '');
	        }
	        // console.log(str1);
	        $("#selectCategoryValue").val(str1);
	    }
	}
}

function selectTagItem()
{
	var items=document.getElementsByName("TagItem");
	var str1 = $("#selectTagValue").val();
	if($("#selectTagValue").val() != '')
	{
		var str1 = str1 + ' ';
	}

	for(var i=0;i<items.length;i++)
	{
	    items[i].onchange=function()
	    {
	        if(this.checked)
	        {
	            str1=str1+this.value + ' ';
	        } else
	        {
	            str1=str1.replace(this.value, '');
	        }

	        $("#selectTagValue").val(str1);
	    }
	}
}

function union(arr)
{
	var arr1 = [];
	for(var i=0; i<arr.length; i++)
	{
		if(!(arr[i] in arr1))
		{
			arr1.push(arr[i]);
		}
	}
	console.log(arr1);
}
// posts tag end