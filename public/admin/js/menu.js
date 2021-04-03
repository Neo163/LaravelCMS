$(document).ready(function()
{
  getMenu();

  var updateOutput = function(e)
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
  $('#nestable').nestable({
      group: 1
  })
  .on('change', updateOutput);

  // output initial serialised data
  updateOutput($('#nestable').data('output', $('#nestable-output')));

  $('#nestable-menu').on('click', function(e)
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

  $("#load").hide();
  
  $("#submit").click(function()
  {
     $("#load").show();

     var dataString = { 
            id : $("#id").val(),
            title : $("#title").val(),
            link : $("#link").val(),
            b_menus_category_id: $("#b_menus_category_id").val(),
            json: $("#nestable-output").val(),
          };

      $.ajax({
          type: "POST",
          url: "/api/admin/menu/createEdit",
          data: dataString,
          dataType: "json",
          cache : false,
          success: function(data)
          {
            // console.log(data);

            if(data['type'] == 'add')
            {
              // location.reload();
              $("#menu-id").append(createMenu(data));
               
            } else if(data['type'] == 'edit')
            {
              $('#title_show'+data['id']).html(data['title']);
              $('#remarks_show'+data['id']).html(data['remarks']);
            }
            $('#title').val('');
            $('#link').val('');
            $('#id').val('');
            $("#load").hide();
          },
          error: function(xhr, status, error)
          {
            alert(error);
          },
      });
  });

  // $('.dd').on('change', function()
  $(document).on("click",".release-menu",function()
  {
    $("#load").show();
    var dataString = 
    { 
      data : $("#nestable-output").val(),
    };

    $.ajax({
      type: "POST",
      url: "/api/admin/menu/change",
      data: dataString,
      cache : false,
      success: function(data)
      {
        $("#load").hide();
        $("li[data-id='" + id +"']").remove();
      } ,error: function(xhr, status, error) 
      {
        alert(error);
      },
    });

  });

  $(document).on("click",".del-button",function()
  {
    // saveMeun();
    var x = confirm('是否删除菜单项？');
    var id = $(this).attr('id');
    if(x)
    {
      // $("#load").show();
      $.ajax({
        type: "POST",
        url: "/api/admin/menu/delete",
        data: { 
          id: id,
          deleteKey: 'deleteAEzBQMmYgrjjHI0q111Menu',
          deleteKey1: 'deleteAEzBQMmaYgrjdjHSI0gq111Menu',
        },
        cache : false,
        success: function(data)
        {
          // $("#load").hide();

          if(data == 'child')
          {
            alert('必须删除子菜单项，才能删除本菜单项');
            return false;
          }

          $("li[data-id='" + id +"']").remove();
        } ,error: function(xhr, status, error) 
        {
          alert(error);
        },
      });
    }
  });

  $(document).on("click",".edit-button",function() {
      var id = $(this).attr('id');
      var title = $("#title_show"+$(this).attr('id')).html();
      var link = $(this).attr('link');
      $("#id").val(id);
      $("#title").val(title);
      $("#link").val(link);

      // output initial serialised data
      updateOutput($('#nestable').data('output', $('#nestable-output')));
  });

  $(document).on("click","#reset",function() {
      $('#title').val('');
      $('#link').val('');
      $('#id').val('');
  });

  $(document).on("click","#addRecord",function() {
      $('#title').val('');
      $('#link').val('');
      $('#id').val('');
  });
});

function getMenu()
{
  // alert($("#b_menus_category_id").val());
  var dataString = {
    id: $("#b_menus_category_id").val(),
  };

  $.ajax({
      url: "/api/admin/menu",
      // method: "POST",
      method: "GET",
      data: dataString,
      dataType: "JSON",
      success: function (data)
      {
        // console.log(data);

        document.getElementById("get_menu").innerHTML = get_menu(data);
      }
    });
}

var html = '';
function get_menu(data, tag = 'dd-list')
{

  html = '';

  html += "<ol class=\""+tag+"\" id=\"menu-id\">";

  for (var key in data) // foreach, 順次序
  {
      html += '<li class="dd-item dd3-item" data-id="'+data[key]['id']+'" > ';
      html += '<div class="dd-handle dd3-handle"></div>';
      html += '<div class="dd3-content">';
      // html += '<span id="id_show'+data[key]['id']+'" class="titleText left">id: '+data[key]['id']+' - </span> ';

      html += '<span id="title_show'+data[key]['id']+'" class="titleText left">'+data[key]['title']+'</span> ';

      html += '<span class="span-right">';
      html += '<span id="link_show'+data[key]['id']+'"></span> &nbsp;&nbsp;';

      html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

      html += '<a class="del-button" id="'+data[key]['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

      html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

      html += '<a href="http://'+location.host+'/'+data[key]['link']+'" target="_blank" class="titleText"><i class="uil uil-external-link-alt font-size-18"></i></a>';

      html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

      html += '<a class="edit-button" ';
      html += 'id="'+data[key]['id']+'" ';
      html += 'title="'+data[key]['title']+'" ';
      html += 'link="'+data[key]['link']+'" data-toggle="modal" data-target="#addItem">';
      html += '<i class="uil uil-pen font-size-18"></i></a>';

      html += '</span> ';
      html += '</div>';

      if(data[key].hasOwnProperty("child"))
      {
        html += get_menu(data[key]['child'], 'child');
      }
      
      html += "</li>";
  }

  html += "</ol>";

  return html;
}

var html = '';
function createMenu(data)
{
  html = '';

  html += '<li class="dd-item dd3-item" data-id="'+data['id']+'" >';
  html += '<div class="dd-handle dd3-handle"></div>';
  html += '<div class="dd3-content">';

  html += '<span id="title_show'+data['id']+'" class="titleText left">'+data['title']+'</span>';

  html += '<span class="span-right">';
  html += '<span id="link_show'+data['id']+'"></span> &nbsp;&nbsp;';

  html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  html += '<a class="del-button" id="'+data['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

  html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  html += '<a href="http://'+location.host+'/'+data['link']+'" target="_blank" class="titleText"><i class="uil uil-external-link-alt font-size-18"></i></a>';

  html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  html += '<a class="edit-button" ';
  html += 'id="'+data['id']+'" ';
  html += 'title="'+data['title']+'" ';
  html += 'link="'+data['link']+'" data-toggle="modal" data-target="#addItem">';
  html += '<i class="uil uil-pen font-size-18"></i></a>';

  html += '</span> ';
  html += '</div>';

  if(data.hasOwnProperty("child"))
  {
    html += get_menu(data['child'], 'child');
  }
  
  html += "</li>";

  return html;
}
