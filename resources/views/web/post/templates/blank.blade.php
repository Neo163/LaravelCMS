<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="/web/css/defaut.css" rel="stylesheet" type="text/css" />
	<script src="/admin/js/jquery-3.5.1.js"></script>
</head>
<body>
	<p>title: {{$bPost->title}}</p>
	<p>浏览：{{$view}}</p>
	<p>content: {!! $bPost->content !!}</p>

	<p>text1: {{$data['text1']}}</p>
	
	<p><img src="/storage/media/{{$bPost->month}}/{{$bPost->image}}" alt="" width="300px"></p>
	<p>image1-link: {{$data['image1_link']}}</p>
	
	<p>video1: {{$data['video1']}}</p>
	<p>videoImage1: {{$data['videoImage1']}}</p>

	<p>slider1_1_image: {{$data['slider1_1_image']}}</p>
	<p>slider1_1_text1: {{$data['slider1_1_text1']}}</p>
	<p>slider1_1_text2: {{$data['slider1_1_text2']}}</p>
	<p>slider1_1_link: {{$data['slider1_1_link']}}</p>

	评论：

	<!-- <form action="/comment/create" method="POST">
    {{csrf_field()}}
		<textarea rows="3" cols="20" name="comment"></textarea>
		<button type="submit">提交</button>
	</form> -->

	<div class="comment">
		<textarea rows="3" cols="20" id="comment"></textarea>
		<div id="commentBtn" onclick="comment()">提交</div>
	</div>

	<script>
		function comment()
		{
			$.ajax({
				type: "POST",
				url: "/api/comment/create",
				data: { 
					content: $("#comment").val(),
					category: 'article',
					commentKey: 'AEzBQMmYg1adsfdsASDFDSFS1888111comment',
				},
				cache : false,
				success: function(data)
				{
				  	console.log(data);

				} ,error: function(xhr, status, error) 
				{
				  	alert(error);
				},
	      	});
		}
	</script>

</body>
</html>