
<form id="frmLearner" action="/?c=LearnLogs&st=SubmitLearnLogs" method="post">
    <div class="pc-right">
        <ul>
            <li>
                <h2>戒律自查 - <?php echo $this->_var['rows']; ?></h2>

                <p cscode='ws001'>
                    <label for="">本月数</label><input citem='mc' type="text" class="easyui-validatebox" maxlength="20"
                                                    data-options="required:true,validType:'length[1,20]'"/>
                    <label for="">累计数</label><input citem='sc' type=""/>
                </p>
            </li>
            <li>
                <h2>必修课</h2>

                <p cscode='ws002'>
                    <b>每日闻法</b>
                    <label for="">本月数</label><input citem='mc' type="" value="34"/>
                    <label for="">累计数</label><input citem='sc' type="" value="0"/>
                </p>

                <p cscode='ws003'>
                    <b>参加辅导</b>
                    <label for="">本月数</label><input citem='mc' type=""/>
                    <label for="">累计数</label><input citem='sc' type=""/>
                </p>

                <p cscode='ws004'>
                    <b>反复闻思</b>
                    <label for="">本月数</label><input citem='mc' type=""/>
                    <label for="">累计数</label><input citem='sc' type=""/>
                </p>
            </li>
        </ul>
    </div>
    <input type="hidden" name='yii' value="yii"/>

    <div class="pc-btmbtns">
        <input type="button" value="提交" onclick="submitCountForm();return false"/>
        <input type="reset" value="重置"/>
    </div>

</form>


<script type="text/javascript" src="/files/js/comm/learnlogs.js"></script>