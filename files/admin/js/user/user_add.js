$(function() {
	$("a", $("#submit")).click(function() {
		var _o = $(this).linkbutton('options');
		if (!_o.disabled) {
			$("#user_email")
			$("form").submit();
		}
	})
})