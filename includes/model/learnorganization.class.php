<?php

class model_learnOrganization extends model_base
{
    //检查是否存在当月学修日志
    public function inspectLogExists($date)
    {
        $sql = "select count(1) from  dymf_organization where  stuid=:stuid  and learn_date=:learn_date";
        $pdoStatement = self::DB()->prepare($sql);
        $return = $pdoStatement->execute(array('stuid' => $_SESSION['trainee_id'], 'learn_date' => $date));
        if (!$return)
            throw new Exception('exception');
        $rows = (int)$pdoStatement->fetchColumn();
        return $rows !== 0;
    }



    // 增加学习日志
    public function addLearnLogs(Array $dataOrg, Array $dataLogs)
    {
        // $dataOrg = array('stuid' => 1, 'classid' => 1, 'squadid' => 1, 'learn_date' => 123456);
        //$dataLog = array('orgid' => 0, 'courseid' => 2, 'monthcount' => 2, 'sumcount' => 20);
        $strQuery1 = "insert into dymf_organization (stuid,classid,squadid,learn_date) values (:stuid,:classid,:squadid,:learn_date)";
        $strQuery2 = "insert into dymf_learnlogs (orgid,cstatcode,monthcount,sumcount) values (:orgid,:cstatcode,:monthcount,:sumcount)";
        $pdo = self::DB();
        $pdoStatement1 = $pdo->prepare($strQuery1);
        $pdoStatement2 = $pdo->prepare($strQuery2);
        try {
            $pdo->beginTransaction();
            $pdoStatement1->execute($dataOrg);
            $orgId = $pdo->lastInsertId();
            foreach ($dataLogs as $log) {
                $log['orgid'] = $orgId;
                $pdoStatement2->execute($log);
            }
            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
    }
}