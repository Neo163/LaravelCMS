$(document).ready(function()
{
  getMenu();

  $("#languageEN").click(function(){
    $('.englishText').show();
    $('.chineseText').hide();
  });

  $("#languageTC").click(function(){
    $('.englishText').hide();
    $('.chineseText').show();
  });

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
            icon : $("#icon").val(),
            english : $("#english").val(),
            chinese : $("#chinese").val(),
            english_link : $("#english_link").val(),
            new_subject_code : $("#new_subject_code").val(),
            remarks : $("#remarks").val()
          };

      $.ajax({
          type: "POST",
          url: "http://localhost/2020-07-17/0production/drupal/admin/menu/api/createEdit",
          data: dataString,
          dataType: "json",
          cache : false,
          success: function(data)
          {
            console.log(data);
            var data = data['data'];

            if(data['type'] == 'add')
            {
              location.reload();
              // $("#menu-id").append(createMenu(data));
               
            } else if(data['type'] == 'edit')
            {
              // $('#icon_show'+data['id']).html(data['icon']);
              $('#icon_show'+data['id']).html('&nbsp; &nbsp; | &nbsp;&nbsp;<img src="http://localhost/icon/topic_Icons/'+data['icon']+'" width="30px">&nbsp; | &nbsp;');
              $('#english_show'+data['id']).html(data['english']);
              $('#chinese_show'+data['id']).html(data['chinese']);
              $('#new_subject_code_show'+data['id']).html(data['new_subject_code']);
              $('#remarks_show'+data['id']).html(data['remarks']);
            }
            $('#icon').val('');
            $('#english').val('');
            $('#chinese').val('');
            $('#english_link').val('');
            $('#new_subject_code').val('');
            $('#remarks').val('');
            $('#id').val('');
            $("#load").hide();
          },
          error: function(xhr, status, error)
          {
            alert(error);
          },
      });
  });

  $('.dd').on('change', function() 
  {
    $("#load").show();
    var dataString = 
    { 
      data : $("#nestable-output").val(),
    };

    $.ajax({
      type: "POST",
      url: "http://localhost/2020-07-17/0production/drupal/admin/menu/api/changeMenu",
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
    var x = confirm('Delete this menu?');
    var id = $(this).attr('id');
    if(x)
    {
      var dataString = '3433';
      $("#load").show();
      $.ajax({
        type: "POST",
        url: "http://localhost/2020-07-17/0production/drupal/admin/menu/api/deleteMenu",
        data: { id : id },
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
    }
  });

  $(document).on("click",".edit-button",function() {
      var id = $(this).attr('id');
      var icon = $(this).attr('icon');
      var english = $(this).attr('english');
      var chinese = $(this).attr('chinese');
      var english_link = $(this).attr('english_link');
      var new_subject_code = $(this).attr('new_subject_code');
      var remarks = $(this).attr('remarks');
      $("#id").val(id);
      $("#icon").val(icon);
      $("#english").val(english);
      $("#chinese").val(chinese);
      $("#english_link").val(english_link);
      $("#new_subject_code").val(new_subject_code);
      $("#remarks").val(remarks);
  });

  $(document).on("click","#reset",function() {
      $('#icon').val('');
      $('#english').val('');
      $('#chinese').val('');
      $('#english_link').val('');
      $('#new_subject_code').val('');
      $('#remarks').val('');
      $('#id').val('');
  });

  $(document).on("click","#addRecord",function() {
      $('#icon').val('');
      $('#english').val('');
      $('#chinese').val('');
      $('#english_link').val('');
      $('#new_subject_code').val('');
      $('#remarks').val('');
      $('#id').val('');
  });
});

function getMenu()
{
   // $('.loader').css("display", "block");

  $.ajax({
      // url: "http://localhost/2020-07-17/0production/drupal/admin/menu/api/json",
      url: "http://127.0.0.1:8000/api/admin/menu",
      // method: "POST",
      method: "GET",
      data: {},
      dataType: "JSON",
      success: function (data)
      {
        // $('#tbody_content').empty();
        console.log(data);

        document.getElementById("get_menu").innerHTML = get_menu(data);

        // $('.loader').css("display", "none");
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
      html += '<span class="left">ID: '+data[key]['id']+'</span> ';

      if(data[key]['icon'] != '')
      {
          html += '<span class="left" id="icon_show'+data[key]['id']+'">&nbsp; &nbsp; | &nbsp;&nbsp;';
          html += '<img src="http://localhost/icon/topic_Icons/'+data[key]['icon']+'" width="30px">';
      }

      html += '</span> ';
      
      html += '<span id="english_show'+data[key]['id']+'" class="englishText left">&nbsp; | &nbsp;'+data[key]['english']+'</span> ';
      html += '<span id="chinese_show'+data[key]['id']+'" class="chineseText left">&nbsp; &nbsp;'+data[key]['chinese']+'</span> ';

      html += '<span class="span-right"><span id="english_link_show'+data[key]['id']+'"></span> &nbsp;&nbsp; ';
      
      html += '<a href="http://'+location.host+'/en/'+data[key]['english_link'].slice(0,-5)+'" target="_blank" class="englishText" ><i class="fa fa-pencil-square-o"></i> EN</a>';

      html += '<a href="http://'+location.host+'/tc/'+data[key]['english_link'].slice(0,-5)+'" target="_blank" class="chineseText"><i class="fa fa-pencil-square-o"></i> TC</a>';

      html += '&nbsp; | &nbsp;';

      html += '<a href="http://'+location.host+'/en/'+data[key]['english_link']+'" target="_blank" class="englishText" ><i class="fa fa-laptop"></i> EN</a>';

      html += '<a href="http://'+location.host+'/tc/'+data[key]['english_link']+'" target="_blank" class="chineseText"><i class="fa fa-laptop"></i> TC</a>';

      // html += '<a href="http://10.6.233.37:85/tc/'+data[key]['english_link']+'" target="_blank" class="link-button"> &nbsp; &nbsp; <i class="fa fa-link"></i></a>';

      html += '&nbsp; | &nbsp;';

      html += '<a class="edit-button" ';
      html += 'id="'+data[key]['id']+'" ';
      html += 'icon="'+data[key]['icon']+'" ';
      html += 'english="'+data[key]['english']+'" ';
      html += 'chinese="'+data[key]['chinese']+'" ';
      html += 'new_subject_code="'+data[key]['new_subject_code']+'" ';
      html += 'remarks="'+data[key]['remarks']+'" '; // \""+user_sms_code+"\"
      html += 'english_link="'+data[key]['english_link']+'" data-toggle="modal" data-target="#myModal">';
      html += '<i class="fa fa-pencil"></i> Menu</a> ';

      html += '&nbsp; | &nbsp;';


      html += '<a class="del-button" id="'+data[key]['id']+'"><i class="fa fa-trash"></i></a>';
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

  function get_menu1(data, tag = 'dd-list')
  {
    html = '';

    html = "<ol class=\""+tag+"\" id=\"menu-id\">";

    for (var key in data) // foreach, 順次序
    {
        html += '<li class="dd-item dd3-item" data-id="'+data[key]['id']+'" > ';
        html += '<div class="dd-handle dd3-handle"></div>';
        html += '<div class="dd3-content">';
        html += '<span class="left">ID: '+data[key]['id']+'</span> ';

        html += '<a href="http://10.6.233.37:85/tc/'+data[key]['english_link']+'" target="_blank" class="link-button left"> &nbsp; &nbsp; <i class="fa fa-link"></i></a>';


        html += '<a class="edit-button left"  id="'+data[key]['id']+'" icon="'+data[key]['icon']+'" chinese="'+data[key]['chinese']+'" english_link="'+data[key]['english_link']+'" > &nbsp; &nbsp; &nbsp; &nbsp; <i class="fa fa-pencil" data-toggle="modal" data-target="#myModal"></i></a>';

        html += '&nbsp; &nbsp; &nbsp; &nbsp; ';
        
        html += '</span> ';
        html += '<span id="chinese_show'+data[key]['id']+'">'+data[key]['chinese']+'</span> ';

        html += '<span class="span-right">/<span id="english_link_show'+data[key]['id']+'">'+data[key]['english_link']+'</span> &nbsp;&nbsp; ';

        
        html += '<a class="del-button" id="'+data[key]['id']+'"><i class="fa fa-trash"></i></a>';
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

// var html = '';
// function createMenu(data)
// {
//   html = '';

//   html += '<li class="dd-item dd3-item" data-id="'+data['id']+'" >';
//   html += '<div class="dd-handle dd3-handle"></div>';
//   html += '<div class="dd3-content">';
//   html += '<span class="left">ID: '+data['id']+'</span> ';
//   html += '<span id="icon_show'+data['id']+'">'+data['icon']+'</span>';
//   html += '<span id="english_show'+data['id']+'">'+data['english']+'</span>';
//   html += '<span id="chinese_show'+data['id']+'">'+data['chinese']+'</span>';
//   html += '<span class="span-right">/<span id="english_link_show'+data['id']+'">'+data['english_link']+'</span> &nbsp;&nbsp; ';
//   html += '<a href="http://'+location.host+'/tc/'+data['english_link']+'" target="_blank"><i class="fa fa-link"></i></a>';
//   // html += '<a href="http://10.6.233.37:85/tc/'+data['english_link']+'" target="_blank" class="link-button"> &nbsp; &nbsp; <i class="fa fa-link"></i></a>';
//   html += '&nbsp; &nbsp; &nbsp; &nbsp;';

//   html += '<a class="edit-button" id="'+data['id']+'" english="'+data['english']+'" english_link="'+data['english_link']+'" >';
//   html += '<i class="fa fa-pencil" data-toggle="modal" data-target="#myModal"></i></a> ';
//   html += '&nbsp; &nbsp; &nbsp; &nbsp;';

//   html += '<a class="del-button" id="'+data['id']+'"><i class="fa fa-trash"></i></a>';
//   html += '</span>';
//   html += '</div>';
//   html += '</li>';

//   return html;
// }
