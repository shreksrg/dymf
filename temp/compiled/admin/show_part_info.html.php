<?php echo $this->fetch('public/page_head.html'); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
		<div style="margin-top:5px;">
			<form method="post" action="<?php echo $this->_var['action']; ?>" onsubmit="submit_value()" >
				<div id="stypestate" style="">
					<h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
					<div class="admin_table mb10">
						<input name="part_id" value="<?php echo $this->_var['id']; ?>" type="hidden" />
						<input name="p_id" value="<?php echo $this->_var['p_id']; ?>" type="hidden" />
						<input name="class_num" value="<?php echo $this->_var['num']; ?>" type="hidden" />
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr class="tr1 vt">
								<td class="td1"><?php echo $this->_var['txt']; ?>名称：</td>
								<td class="td2">
								<input class="easyui-validatebox input_wb input" data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['part_name']; ?>" name="part_name" id="part_name" <?php if ($this->_var['is_lock'] == 1): ?> disabled="disabled" <?php endif; ?> />
								</td>
								<td class="td2"><div class="help_a" style="display: block;"></div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1"><?php echo $this->_var['txt']; ?>备注：</td>
								<td class="td2">								<textarea  name="Remark" id="Remark" rows="5" cols="50" ><?php echo $this->_var['remark']; ?></textarea></td>
								<td class="td2"><div class="help_a" style="display: block;"></div></td>
							</tr>
						</table>
					</div>
					<div class="tac mb10">
						<span class="btn" id="submit"><span> <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">递交</a> </span></span>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script>
	function submit_value() {
		$("#part_name").removeAttr("disabled");
	}

	$(function() {
		$("a[href='#']").attr("href", "javascript:;");

		$("#submit").click(function() {
			if ($.trim($("#part_name").val()).length < 1) {
				alert("请输入名称！");
				return false;
			}
			$("form").submit();
		});

		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('#Remark', {
				items : _editOptionEz,
				afterBlur : function() {
					this.sync();
				}
			});
		});
	})
</script>
</div>

<?php echo $this->fetch('public/page_foot.html'); ?>