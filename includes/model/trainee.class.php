<?php
/**
 * 学员数据表模型
 * @author    jermyn.shi
 * @date    2013-07-14
 */
class model_trainee extends model_base
{
    /**
     * 验证用户登录信息
     */
    public function validateLogin($loginData)
    {
        $loginData['password'] = sha1($loginData['password']);
        $sql = "
		select count(1) from dymf_trainee where password=:password and username=:username
		";
        $rs = self::DB()->prepare($sql);
        $return = $rs->execute($loginData);
        $rows = (int)$rs->fetchColumn();
        return $rows !== 0;
    }


    public function getTraineeInfo($username)
    {
        $sql = "
    	select * from dymf_trainee where username=?
    	";
        $pdoStatement = self::DB()->prepare($sql);
        $return = $pdoStatement->execute(array($username));
        $rows = $pdoStatement->fetch();
        return $rows;
    }

    public function find($field, $id)
    {
        $sql = "
    	select * from dymf_trainee where {$field}=? limit 0,1
    	";
        $pdoStatement = self::DB()->prepare($sql);
        $return = $pdoStatement->execute(array($id));
        $rows = $pdoStatement->fetch();
        return $rows;
    }

    public function findByAttribute($attr, Array $stubVal = null)
    {
        $sql = "
    	select * from dymf_trainee where {$attr}
    	";
        $pdoStatement = self::DB()->prepare($sql);
        $return = $pdoStatement->execute($stubVal);
        $rows = $pdoStatement->fetch();
        return $rows;
    }

    public function addTrainee($trainee)
    {
        foreach ($trainee as $k => $v) {
            $fieldsArr[] = $k;
            $stubsArr[] = ':' . $k;
        }
        $fields = implode(',', $fieldsArr);
        $stubs = implode(',', $stubsArr);
        $sql = "
    	 insert into dymf_trainee($fields) values ($stubs)
    	";
        $pdo = self::DB();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute($trainee);
        return $pdo->lastInsertId();
    }

}
