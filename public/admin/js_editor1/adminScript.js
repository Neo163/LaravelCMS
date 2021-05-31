function deleleMenuCategory(id)
{
    var x = confirm('是否删除这个菜单');
    // var id = $(this).attr('id');
    var id = id;

    if(x)
    {
        $.ajax({
            type: "POST",
            url: "/api/admin/menuCategory/delete",
            data: { 
                id: id,
                deleteKey: 'deleteTRBaFE5ZE1naUE9PSIsInZhbHVlIjo111deleteMenu',
                deleteKey1: 'deleteFJXRERyTFwvUzR6XC8wQT09Iiwidm111deleteMenu',
            },
            cache : false,
            success: function(data)
            {
                // $("tr[tr_id='" + id +"']").remove();
                window.location.replace('/admin/menus');
            } ,error: function(xhr, status, error) 
            {
                alert(error);
            },
        });
    }
}