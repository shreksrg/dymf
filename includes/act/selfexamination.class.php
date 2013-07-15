<?php
/**
 * 戒律自查
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_selfexamination {
    /**
     * 皈依入学页面
     */
    public static function showHTML() {
        base_cmshop::smarty() -> display('selfexamination.html');

    }
}
?>