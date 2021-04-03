<html>
 <head>
  <title>Sorting Table Row using JQuery Drag Drop with Ajax PHP</title>
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="/admin/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
   #page_list li
   {
    padding:16px;
    /*background-color:#f9f9f9;*/
    /*border:1px dotted #ccc;*/
    cursor:move;
    margin-top:12px;
   }
   #page_list li
   {
    padding:24px;
    background-color:#ffffcc;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
  </style>
 </head>
 <body>
  <ul class="list-unstyled" id="page_list">
    @foreach($paras as $para)
      <li id="{{$para->id}}">{{$para->sort}} | {{$para->title}}</li>
     @endforeach
   </ul>
 </body>
</html>

<script>
$(document).ready(function(){
 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#page_list li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"/api/sorting",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
     alert(data);
     console.log(data);
    }
   });
  }
 });

});
</script>