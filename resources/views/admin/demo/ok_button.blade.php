<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="/resources/js/jquery-3.5.1.js"></script>

<button type="button" class="btn btn-primary btn-lg btn-block1 waves-effect waves-light release-menu" id="sa-position" hidden="">发布</button>
    
<script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<script src="/assets/js/pages/sweet-alerts.init.js"></script>


<div class="go">111</div>

<script>
	$(".go").click(function()
	{
		$('#sa-position').trigger("click");
	});
</script>