<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/admin/js/jquery-3.5.1.js"></script>
</head>
<body>
    <script src="/admin/js/jquery-3.5.1.js"></script>
    <div class="form_class">    
        <select name="test">
            <option value="0">请选择</option>
            <option value="1">订单</option>
            <option value="2">商品</option>
        </select>
    </div>
    <script>
        $("select[name='test']").val(1);
        // alert($("select[name='test']").val(2));
    </script>
</body>
</html>