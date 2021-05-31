<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>www.jb51.net 阅读协议倒计时</title>
    <script>
      var tim=9;
      function aaa()
      {
        var btnn=document.getElementById("btn");
        if(tim<=0)
        {
          btnn.value="注册";
          btnn.disabled="";
        }
        else
        {
          btnn.value="请仔细阅读，还剩"  +tim+"秒";
          tim--;
        }
      }
      setInterval("aaa()",1000);
    </script>
  </head>
  <body>
    <textarea style="width: 500px;height: 300px;">
    </textarea>
    <input type="button" id="btn" value="请仔细阅读，还剩10秒" disabled="disabled" />
  </body>
</html>