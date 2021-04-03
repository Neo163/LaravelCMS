$(document).ready(function()
{
  $("#load").hide();
  getMedia();

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

  $(".media-categories-expand-all").hide();

  $('.media-categories-expand-all').click(function()
  {
      $(".media-categories-expand-all").hide();
      $(".media-categories-collapse-all").show();
  });

  $('.media-categories-collapse-all').click(function()
  {
      $(".media-categories-collapse-all").hide();
      $(".media-categories-expand-all").show();
  });
  
  $('#nestable-media-categories').on('click', function(e)
  {
      var target = $(e.target),
          action = target.data('action');
      if (action === 'expand-all-media-categories') {
          $('.dd').nestable('expandAll');
      }
      if (action === 'collapse-all-media-categories') {
          $('.dd').nestable('collapseAll');
      }
  });
  
  $("#submit").click(function()
  {
     // $("#load").show();

    var dataString = { 
      id : $("#id").val(),
      title : $("#title").val(),
    };

    // console.log($("#id").val());
    // console.log($("#title").val());

    $.ajax({
      type: "POST",
      url: "/api/admin/mediaCategory/createEdit",
      data: dataString,
      dataType: "json",
      cache : false,
      success: function(data)
      {
        // console.log(data);

        if(data['type'] == 'add')
        {
          location.reload();
          // $("#media-id").append(createmedia(data));
           
        } else if(data['type'] == 'edit')
        {
          $('#title_show'+data['id']).html(data['title']);
          $('#remarks_show'+data['id']).html(data['remarks']);
        }
        $('#title').val('');
        $('#id').val('');
        // $("#load").hide();
      },
      error: function(xhr, status, error)
      {
        alert(error);
      },
    });
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
        $("#load").hide();
        $("li[media-id='" + id +"']").remove();
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

  $(document).on("click","#reset",function() {
      $('#title').val('');
      $('#id').val('');
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

var html = '';
function get_media(data, tag = 'dd-list')
{

  html = '';

  html += "<ol class=\""+tag+"\" id=\"media-id\">";

  for (var key in data) // foreach, 順次序
  {
      html += '<li class="dd-item dd3-item" data-id="'+data[key]['id']+'" > ';
      html += '<div class="dd-handle dd3-handle"></div>';
      html += '<div class="dd3-content">';

      html += '<a id="title_show'+data[key]['id']+'" class="titleText left" href="/admin/media/category/'+data[key]['id']+'">'+data[key]['title']+'</a> ';

      if(data[key]['id'] == 1)
      {
        html += '<span class="first-id">默认</span>';
      }

      html += '<span class="span-right">';

      html += '<a class="del-media-category" id="'+data[key]['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

      html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

      html += '<a class="edit-media-category" ';
      html += 'id="'+data[key]['id']+'" ';
      html += 'title="'+data[key]['title']+'" ';
      html += 'data-toggle="modal" data-target="#addItem">';
      html += '<i class="uil uil-pen font-size-18"></i></a>';

      html += '</span> ';
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

var html = '';
function createmedia(data)
{
  html = '';

  html += '<li class="dd-item dd3-item" data-id="'+data['id']+'" >';
  html += '<div class="dd-handle dd3-handle"></div>';
  html += '<div class="dd3-content">';

  html += '<a id="title_show'+data['id']+'" class="titleText left" href="">'+data['title']+'</a>';

  if(data[key]['id'] == 1)
  {
    html += '<span class="first-id">默认</span>';
  }
  
  html += '<span class="span-right">';

  html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  html += '<a class="del-media-category" id="'+data['id']+'"><i class="uil uil-trash-alt font-size-18"></i></a>';

  html += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  html += '<a class="edit-media-category" ';
  html += 'id="'+data['id']+'" ';
  html += 'title="'+data['title']+'" ';
  html += 'data-toggle="modal" data-target="#addItem">';
  html += '<i class="uil uil-pen font-size-18"></i></a>';

  html += '</span> ';
  html += '</div>';

  if(data.hasOwnProperty("child"))
  {
    html += get_media(data['child'], 'child');
  }
  
  html += "</li>";

  return html;
}
