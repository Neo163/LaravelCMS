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

	<div class="comment-content">
		@foreach($comments as $comment)
        <div class="comment-avatar">
            <img src="/assets/images/users/img.png" width="50px" class="comment-avatar-img">

            <div class="comment-avatar-text">
                <div class="comment-avatar-name">美美</div>
                <div class="comment-avatar-content">新年快乐！</div>
                <div class="comment-avatar-time">
                    今天08: 20 
                    <span class="comment-avatar-report" onclick="commentReport({{$comment->id}}, 1)">举报</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="postId">{{$bPost->id}}</div>

	<script>
		function comment()
		{
			$.ajax({
				type: "POST",
				url: "/api/comment/create",
				data: {
					id: $("#postId").text(),
					content: $("#comment").val(),
					category: 'article',
					commentKey: 'AEzBQMmYg1adsfdsASDFDSFS1888111comment',
				},
				cache : false,
				success: function(data)
				{
				  	console.log(data);

				  	$(".comment-content").append(commentAdd(data));

				} ,error: function(xhr, status, error) 
				{
				  	alert(error);
				},
	      	});
		}

		function commentAdd(data)
		{
			var html = '';
			
			html += '<div class="ToBeReviewed">';
			html += '待审核';
			html += '</div>';

			return html;
		}

		function commentReport(id, report)
		{
			var x = confirm('是否进行举报操作？');
		    
		    if(x)
		    {
		    	$.ajax({
					type: "POST",
					url: "/api/comment/report",
					data: {
						id: id,
						report: report,
						commentKey: 'AEzBQMmYg1adsfdsASDFDSFS1888111comment',
					},
					cache : false,
					success: function(data)
					{
					  	// console.log(data);

					  	location.reload();

					} ,error: function(xhr, status, error) 
					{
					  	alert(error);
					},
		      	});
		    }
		}
	</script>

</body>
</html>