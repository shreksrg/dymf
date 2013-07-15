
$(function() {
	$("#course_content").xheditor({
		tools:'mini',
		upImgExt:"jpg,jpeg,gif,png",upImgUrl:"upload.php?immediate=1"
	})

	$('#course_content').xheditor({
		tools : 'simple'
	});
	$("a", $("#submit")).click(function() {
		var _o = $(this).linkbutton('options');
		if (!_o.disabled) {
			$("form").submit();
		}
	})
	
	KindEditor.ready(function(K) {
			var editor = K.editor({
				allowFileManager : true,
				uploadJson : 'main.php?act=upload&st=startImage'
			});
			K('#image1').click(function() {
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						showRemote : false,
						imageUrl : K('#url1').val(),
						clickFn : function(url, title, width, height, border, align) {
							K('#imagePath').val(url);
							editor.hideDialog();
						}
					});
				});
			});
		});
})