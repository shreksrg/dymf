<?php
if (!defined('IN_CMSHOP')) {
    die('Hacking attempt');
}

class cls_session {
    private $conn;
    var $db = NULL;
    var $session_table = '';

    var $max_life_time = SESSION_TIME_OUT;
    // SESSION 过期时间

    var $session_name = '';
    var $session_id = '';

    var $session_expiry = '';
    var $session_md5 = '';

    var $session_cookie_path = '/';
    var $session_cookie_domain = '';
    var $session_cookie_secure = false;

    var $_ip = '';
    var $_time = NULL;

    public static $_instance = NULL;
    private $session_data = NULL;

    function __construct(&$db, $session_table, $session_data_table, $session_name = 'ECS_ID', $session_id = '') {
        $this -> cls_session($db, $session_table, $session_data_table, $session_name, $session_id);
    }

    function cls_session(&$db, $session_table, $session_data_table, $session_name = 'ECS_ID', $session_id = '') {
        $GLOBALS['_SESSION'] = array();

        if (!empty($GLOBALS['cookie_path'])) {
            $this -> session_cookie_path = $GLOBALS['cookie_path'];
        } else {
            $this -> session_cookie_path = '/';
        }

        if (!empty($GLOBALS['cookie_domain'])) {
            $this -> session_cookie_domain = $GLOBALS['cookie_domain'];
        } else {
            $this -> session_cookie_domain = '';
        }

        if (!empty($GLOBALS['cookie_secure'])) {
            $this -> session_cookie_secure = $GLOBALS['cookie_secure'];
        } else {
            $this -> session_cookie_secure = false;
        }

        $this -> session_name = $session_name;
        $this -> session_table = $session_table;
        $this -> session_data_table = $session_data_table;

        $this -> db = &$db;
        $this -> _ip = static_base::real_ip();

        if ($session_id == '' && !empty($_COOKIE[$this -> session_name])) {
            $this -> session_id = $_COOKIE[$this -> session_name];
        } else {
            $this -> session_id = $session_id;
        }
        if ($this -> session_id) {
            $tmp_session_id = substr($this -> session_id, 0, 32);
            if ($this -> gen_session_key($tmp_session_id) == substr($this -> session_id, 32)) {
                $this -> session_id = $tmp_session_id;
            } else {
                $this -> session_id = '';
            }
        }

        $this -> _time = date('Y-m-d H:i:s');
        if ($this -> session_id) {
            $this -> load_session();
        } else {
            $this -> gen_session_id();
            setcookie($this -> session_name, $this -> session_id . $this -> gen_session_key($this -> session_id), 0, $this -> session_cookie_path, $this -> session_cookie_domain, $this -> session_cookie_secure);
        }

        register_shutdown_function(array(
            &$this,
            'close_session'
        ));
    }

    function gen_session_id() {
        $this -> session_id = function_exists('com_create_guid') ? md5(com_create_guid()) : md5($this -> _ip . uniqid(mt_rand(), true));

        // return $this -> insert_session();
        return $this -> load_session();
    }

    function gen_session_key($session_id) {
        static $ip = '';

        if ($ip == '') {
            $ip = substr($this -> _ip, 0, strrpos($this -> _ip, '.'));
        }

        return sprintf('%08x', crc32(ROOT_PATH . $ip . $session_id));
    }

    function insert_session() {
        //    	$sesstemp = array(
        //	            'sesskey'       => ,
        //	            'expiry'        => $this->_time,
        //    			'ip'            => $this->_ip,
        //	            'session_data'  => 'a:0:{}'
        //	        );
        //return $this->db->autoExecute($this->session_table,$sesstemp);
        $sql = 'INSERT INTO ' . $this -> session_table . ' (sesskey, expiry, ip, session_data) VALUES (:sesskey,:expiry,:ip,:session_data)';
        $sqlData = array(
            'sesskey' => $this -> session_id,
            'expiry' => $this -> _time,
            'ip' => $this -> _ip,
            'session_data' => ''
        );

        $this -> db -> prepare($sql) -> execute($sqlData);
        return true;
    }

    function load_session() {
        $sql = "SELECT userid, adminid, user_name, user_rank, discount, email,session_data, expiry, ip, is_table_data FROM {$this -> session_table}  WHERE sesskey = ?";
        $rs = $this -> db -> prepare($sql);
        $rs -> execute(array($this -> session_id));
        $session = $rs -> fetch();
        $session = is_array($session) ? $session : array();

        if (empty($session)) {
            $this -> insert_session();

            $this -> session_expiry = 0;
            $this -> session_md5 = '40cd750bba9870f18aada2478b24840a';
            $GLOBALS['_SESSION'] = array();
        } else {
            //            if (!empty($session['session_data']) && $this->_time - $session['expiry'] <= $this->max_life_time)
            //            {
            //            	if($session['session_data'] != '0')
            //            	{
            //	                $this->session_expiry = $session['expiry'];
            //	                $this->session_md5    = md5(stripcslashes($session['session_data']));
            //	                $GLOBALS['_SESSION']  = unserialize(stripcslashes($session['session_data']));
            //	                $GLOBALS['_SESSION']['user_id'] = $session['userid'];
            //	                $GLOBALS['_SESSION']['admin_id'] = $session['adminid'];
            //	                $GLOBALS['_SESSION']['user_name'] = $session['user_name'];
            //	                $GLOBALS['_SESSION']['user_rank'] = $session['user_rank'];
            //	                $GLOBALS['_SESSION']['discount'] = $session['discount'];
            //	                $GLOBALS['_SESSION']['email'] = $session['email'];
            //            	}
            //            }
            //            else
            //            {
            if ($session['is_table_data']) {
                $sql = "SELECT session_data, expiry FROM {$this -> session_data_table} WHERE sesskey = ?";
                $rs = $this -> db -> prepare($sql);
                $rs -> execute(array($this -> session_id));
                $session_data = $rs -> fetch();
                if (!$session_data)
                    $session_data = array();
            } else {
                $session_data = array();
                $session_data["session_data"] = $session["session_data"];
                $session_data['expiry'] = $session['expiry'];
            }

            if (!empty($session_data['session_data']) && strtotime($this -> _time) - strtotime($session_data['expiry']) <= (time() - $this -> max_life_time)) {
                $this -> session_expiry = $session_data['expiry'];
                $this -> session_md5 = md5($session_data['session_data']);
                $GLOBALS['_SESSION'] = json_decode($session_data['session_data'], 1);
                $GLOBALS['_SESSION']['user_id'] = $session['userid'];
                $GLOBALS['_SESSION']['admin_id'] = $session['adminid'];
                $GLOBALS['_SESSION']['user_name'] = $session['user_name'];
                $GLOBALS['_SESSION']['user_rank'] = $session['user_rank'];
                $GLOBALS['_SESSION']['discount'] = $session['discount'];
                $GLOBALS['_SESSION']['email'] = $session['email'];
            } else {
                $this -> session_expiry = 0;
                $this -> session_md5 = '40cd750bba9870f18aada2478b24840a';
                $GLOBALS['_SESSION'] = array();
            }

        }

        $this -> session_data = md5(json_encode($GLOBALS['_SESSION']));
    }

    function update_session() {
        $session_md5 = md5(json_encode($GLOBALS['_SESSION']));
        if ($session_md5 == $this -> session_data) {
            return TRUE;
        }

        $adminid = !empty($GLOBALS['_SESSION']['admin_id']) ? intval($GLOBALS['_SESSION']['admin_id']) : 0;
        $userid = !empty($GLOBALS['_SESSION']['user_id']) ? intval($GLOBALS['_SESSION']['user_id']) : 0;
        $user_name = !empty($GLOBALS['_SESSION']['user_name']) ? trim($GLOBALS['_SESSION']['user_name']) : 0;
        $user_rank = !empty($GLOBALS['_SESSION']['user_rank']) ? intval($GLOBALS['_SESSION']['user_rank']) : 0;
        $discount = !empty($GLOBALS['_SESSION']['discount']) ? round($GLOBALS['_SESSION']['discount'], 2) : 0;
        $email = !empty($GLOBALS['_SESSION']['email']) ? trim($GLOBALS['_SESSION']['email']) : 0;
        // unset($GLOBALS['_SESSION']['admin_id']);
        // unset($GLOBALS['_SESSION']['user_id']);
        // unset($GLOBALS['_SESSION']['user_name']);
        // unset($GLOBALS['_SESSION']['user_rank']);
        // unset($GLOBALS['_SESSION']['discount']);
        // unset($GLOBALS['_SESSION']['email']);
        $data = json_encode($GLOBALS['_SESSION']);
        $this -> _time = date('Y-m-d H:i:s');
        if (isset($data{SESSION_DATA_LENGTH})) {            /*
             * 在这里是要插入到session_data表中，如果表中已经有数据则是更新，没有则插入新数据
             */
            //        	$sesstemp = array(
            //	            'sesskey'       => $this->session_id,
            //	            'expiry'        => $this->_time,
            //	            'session_data'  => $data
            //	        );

            $sql = "SELECT SESSKEY FROM {$this -> session_data_table} . ' WHERE SESSKEY=?";
            $rs = $this -> db -> prepare($sql);
            $rs -> execute(array($this -> session_id));
            $sesskeytemp = $rs -> fetchcolumn();
            if ($sesskeytemp || static_base::str_len($sesskeytemp) > 0) {
                $sql = 'UPDATE ' . $this -> session_data_table . ' SET expiry=:expiry, session_data=:session_data WHERE sesskey=:sesskey';
                $this -> db -> Binds = array();
                $this -> db -> bind('sesskey', $this -> session_id);
                $this -> db -> bind('expiry', $this -> _time);
                $this -> db -> bind('session_data', $data);
                $this -> db -> query($sql);
                //$this->db->autoExecute($sesstemp,'UPDATE',"sesskey='".$this->session_id."'");
            } else {
                $sql = 'INSERT INTO ' . $this -> session_data_table . ' (sesskey,expiry,session_data) VALUES (:sesskey,:expiry,:session_data)';
                $this -> db -> Binds = array();
                $this -> db -> bind('sesskey', $this -> session_id);
                $this -> db -> bind('expiry', $this -> _time);
                $this -> db -> bind('session_data', $data);
                $this -> db -> query($sql);
                //$this->db->autoExecute($this->session_data_table,$sesstemp);
            }
            $data = '0';
        }
        $sqlData = array(
            'ip' => $this -> _ip,
            'userid' => $userid,
            'adminid' => $adminid,
            'user_name' => $user_name,
            'user_rank' => $user_rank,
            'discount' => $discount,
            'email' => $email,
            'expiry' => $this -> _time,
            'session_data' => $data
        );

        $sql = "UPDATE {$this -> session_table} SET " . static_base::str4prepare($sqlData) . " where  sesskey=:sesskey";
        $sqlData['sesskey'] = $this -> session_id;
        $this -> db -> prepare($sql) -> execute($sqlData);
        //return $this->db->query('UPDATE ' . $this->session_table . " SET expiry = '" . $this->_time . "', ip = '" . $this->_ip . "', userid = '" . $userid . "', adminid = '" . $adminid . "', user_name='" . $user_name . "', user_rank='" . $user_rank . "', discount='" . $discount . "', email='" . $email . "', session_data = '$data' WHERE sesskey = '" . $this->session_id . "'");
        return true;
    }

    function close_session() {
        $this -> update_session();

        /* 随机对 sessions_data 的库进行删除操作 */
        if (mt_rand(0, 2) == 2) {
            $sql = "
			DELETE FROM {$this -> session_data_table} WHERE expiry < ?";
            $this -> db -> prepare($sql) -> execute(array(date('Y-m-d H:i:s', (strtotime($this -> _time) - $this -> max_life_time))));
        }

        if ((time() % 2) == 0) {
            $sql = '
			DELETE FROM ' . $this -> session_table . ' WHERE expiry < ?';
            return $this -> db -> prepare($sql) -> execute(array(date('Y-m-d H:i:s', (strtotime($this -> _time) - $this -> max_life_time))));
        }

        return true;
    }

    function delete_spec_admin_session($adminid) {
        if (!empty($GLOBALS['_SESSION']['admin_id']) && $adminid) {
            return $this -> db -> query('DELETE FROM ' . $this -> session_table . " WHERE adminid = '$adminid'");
        } else {
            return false;
        }
    }

    function destroy_session() {
        $GLOBALS['_SESSION'] = array();

        setcookie($this -> session_name, $this -> session_id, 1, $this -> session_cookie_path, $this -> session_cookie_domain, $this -> session_cookie_secure);

        /* ECSHOP 自定义执行部分 */
        if (!empty($GLOBALS['ecs'])) {
            $this -> db -> query('DELETE FROM ' . $GLOBALS['ecs'] -> table_oci('cart') . " WHERE session_id = '$this->session_id'");
        }
        /* ECSHOP 自定义执行部分 */

        $this -> db -> query('DELETE FROM ' . $this -> session_data_table . " WHERE sesskey = '" . $this -> session_id . "'");

        return $this -> db -> query('DELETE FROM ' . $this -> session_table . " WHERE sesskey = '" . $this -> session_id . "'");
    }

    function get_session_id() {
        return $this -> session_id;
    }

    function get_users_count() {
        return $this -> db -> getOne('SELECT count(*) FROM ' . $this -> session_table);
    }

    /**
     * 初始化函數
     */
    public static function start(&$db, $session_table, $session_data_table, $session_name = SESSION_ID_NAME, $session_id = '') {
        if (empty(self::$_instance) || !(self::$_instance instanceof self)) {
            self::$_instance = new self($db, base_cmshop::table($session_table), base_cmshop::table($session_data_table), $session_name);
        }
    }

}
?>