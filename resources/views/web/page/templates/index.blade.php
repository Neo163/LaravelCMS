<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="/admin/js/jquery-3.5.1.js"></script>
    <script src="/admin/js/common.js"></script>
</head>
<body>
	<br><br><br><br><br><br><br><br>

	<center>
		<h1>这里是 <span class="t1 text"></span></h1>
	</center>

	<style>
		.text {
		    color: #0099FF;
		}
	</style>
    
    <script>
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
                // console.log(data);
                var data = JSON.parse(data['paragraph'][0]['content']);

                document.title = data['t1'];
                $(".t1").text(data['t1']);
            },
            error: function(xhr, status, error)
            {
                alert(error);
            },
        });
    </script>
</body>
</html>