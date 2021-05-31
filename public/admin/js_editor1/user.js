$(document).ready(function()
{
	$('.set_password').click(function()
    {
    	$(".set_password").css('display','none');
		$(".cancel_password").css('display','inline-block');

		document.getElementById("set_password").innerHTML = set_password();
        
    });

    $('.cancel_password').click(function()
    {
    	$(".set_password").css('display','inline-block');
		$(".cancel_password").css('display','none');

		document.getElementById("set_password").innerHTML = '';	
        
    });
});

function set_password()
{
	var html = '';

	html +='<div class="form-group row">';
	html +='    <label for="example-search-input" class="col-md-2 col-form-label">旧密码</label>';
	html +='    <div class="col-md-10">';
	html +='        <input class="form-control" type="password" value="" id="old_password" name="old_password" required="required" minlength="6" maxlength="300">';
	html +='    </div>';
	html +='</div>';

	html +='<div class="form-group row">';
	html +='    <label for="example-search-input" class="col-md-2 col-form-label">密码</label>';
	html +='    <div class="col-md-10">';
	html +='        <input class="form-control" type="password" value="" id="new_password" name="new_password" required="required" minlength="6" maxlength="300">';
	html +='    </div>';
	html +='</div>';

	html +='<div class="form-group row">';
	html +='    <label for="example-search-input" class="col-md-2 col-form-label">确认密码</label>';
	html +='    <div class="col-md-10">';
	html +='        <input class="form-control" type="password" value="" id="confirm_password" name="confirm_password" required="required" minlength="6" maxlength="300">';
	html +='    </div>';
	html +='</div>';

	return html;
}