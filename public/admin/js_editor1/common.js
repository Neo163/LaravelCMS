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


