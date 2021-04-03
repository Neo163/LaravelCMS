var data = $("#template_data").val();
data =  JSON.parse(data);
data['structure'] =  JSON.parse(data['structure']);

$("#title").val(data['title']);
$("select[name='slectTemplateCategory']").val(data['b_templates_category']);
$("#text").val(data['structure']['text']);
$("#image").val(data['structure']['image']);
$("#video").val(data['structure']['video']);
$("#slider").val(data['structure']['slider']);

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

        $("#slectTemplate").append(getTemplate(data['templates']));
        // document.getElementById("slectTemplate").innerHTML = getTemplate(data['templates']);
    }
});

function onChangeSelect(value)
{
    document.getElementById("slectTemplate").innerHTML = slectTemplate(value);
}

function slectTemplate(value)
{
    $.ajax({
        url: "/api/admin/template/data",
        method: "GET",
        data: {
            id: value
        },
        // dataType: "JSON",
        success: function (data)
        {
            // console.log(data);

            document.getElementById("slectTemplate").innerHTML = getTemplate(data['templates']);
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
