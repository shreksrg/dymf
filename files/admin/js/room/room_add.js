
$(function() {
$("#root_content").xheditor({
		tools:'mini',
		upImgExt:"jpg,jpeg,gif,png",upImgUrl:"upload.php?immediate=1"
	})

	$('#root_content').xheditor({
		tools : 'simple'
	});
	$("a", $("#submit")).click(function() {
		var _o = $(this).linkbutton('options');
		if (!_o.disabled) {
			$("form").submit();
		}
	})
	
})