var slectId = $("#slectTemplateCategory option:selected").val();

$.ajax({
    url: "/api/admin/template/data/templates",
    method: "GET",
    data: {
        id: slectId
    },
    // dataType: "JSON",
    success: function (data)
    {
        // console.log(data);

        document.getElementById("slectTemplate").innerHTML = getTemplate(data['frontEnd']);
    }
});

function onChangeSelect(value)
{
    document.getElementById("slectTemplate").innerHTML = slectTemplate(value);
}

function slectTemplate(value)
{
    $.ajax({
        url: "/api/admin/template/data/templates",
        method: "GET",
        data: {
            id: value
        },
        // dataType: "JSON",
        success: function (data)
        {
            // console.log(data);

            document.getElementById("slectTemplate").innerHTML = getTemplate(data['frontEnd']);
        }
    });
}

function getTemplate(data)
{
    var html = '';

    for(var key in data)
    {
        html += '<option value="'+data[key]+'">'+data[key]+'</option>';
    }

    return html;
}