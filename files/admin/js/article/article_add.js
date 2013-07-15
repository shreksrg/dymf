$(function(){
	// 富文本框
    $("#article_content").xheditor({
        tools: 'mini',
        upImgExt: "jpg,jpeg,gif,png",
        upImgUrl: "upload.php?immediate=1"
    })
    
    $("#course_content").xheditor({
        tools: 'mini',
        upImgExt: "jpg,jpeg,gif,png",
        upImgUrl: "upload.php?immediate=1"
    })
    
    $('#article_content').xheditor({
        tools: 'simple'
    });
    $("textarea[name='answer']").xheditor({
        tools: 'mini'
    });
    
	// -----------------------------------------------
	
    $("a", $("#submit")).click(function(){
        var _o = $(this).linkbutton('options');
        if (!_o.disabled) {
            $("#user_email")
            $("form").submit();
        }
    })
    
    KindEditor.ready(function(K){
        var editor = K.editor({
            allowFileManager: true,
            uploadJson: '?act=upload&st=startImage'
        });
        // 音频上传
        K('#audio_up').click(function(){
            editor.loadPlugin('image', function(){
                editor.plugin.imageDialog({
                    showRemote: false,
                    imageUrl: K('#url1').val(),
                    clickFn: function(url, title, width, height, border, align){
                        K('#audio_link').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });
        
        // 视频上传
        K('#video_up').click(function(){
            editor.loadPlugin('image', function(){
                editor.plugin.imageDialog({
                    showRemote: false,
                    imageUrl: K('#url1').val(),
                    clickFn: function(url, title, width, height, border, align){
                        K('#video_link').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });
        
        // 文档上传
        K('#doc_up').click(function(){
            editor.loadPlugin('image', function(){
                editor.plugin.imageDialog({
                    showRemote: false,
                    imageUrl: K('#url1').val(),
                    clickFn: function(url, title, width, height, border, align){
                        K('#doc_link').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });
    });
})
