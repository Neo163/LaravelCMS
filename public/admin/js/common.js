var id = 1;

$.ajax({
    url: "/api/admin/paragraph",
    method: "GET",
    data: {
        id: id,
        paragraphKey: 'create897FSJs$#&*^*0KEJOEPs/dRMUrrfASD!#$F0784fd0adad1%^&^ewhfghdde6SDFSb9d9125c07493b8eId9EA1',
    },
    dataType: "json",
    cache : false,
    success: function (data)
    {
        var data = JSON.parse(data['paragraph'][0]['content']);
        document.title = data['t1'];
    },
    error: function(xhr, status, error)
    {
        alert(error);
    },
});

function getQueryVariable(variable)
{
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0;i<vars.length;i++)
	{
		var pair = vars[i].split("=");
		if(pair[0] == variable){return pair[1];}
	}
	return(false);
}
function GetExtensionFileName(pathfilename) 
{ 
	var reg = /(\\+)/g; 
	var pfn = pathfilename.replace(reg, "#"); 
	var arrpfn = pfn.split("#"); 
	var fn = arrpfn[arrpfn.length - 1]; 
	var arrfn = fn.split("."); 
	return arrfn[arrfn.length - 1]; 
}

function copy_link(copy_link, position)
{
	var link = window.location.host+copy_link;
	var timestamp = (new Date()).valueOf();

	if(link.substring(0,4) != 'http')
	{
		link = 'http://'+link;
	}

	$(position).after('<input id="urlText_'+timestamp+'" style="position:fixed;top:-200%;left:-200%;" type="text" value=' + link + '>');
	$('#urlText_'+timestamp).select(); //选择对象
	document.execCommand("Copy"); //执行浏览器复制命令

	$('#copy-link').trigger("click");
}