<?php
class model_test extends model_base
{
    //检查是否存在当月学修日志
    public function inspectLogExists($date)
    {
        $sql = "select count(1) from  dymf_organization where  stuid=:stuid  and learn_date=:learn_date";
        $pdoStatement = self::DB()->prepare($sql);
        $return = $pdoStatement->execute(array('stuid' => 8, 'learn_date' => $date));
        if (!$return)
            throw new Exception('err1');
        $rows = (int)$pdoStatement->fetchColumn();
        return $rows !== 0;
    }

    public function addLearnLogs($data)
    {
        $data1 = array('stuid' => 1, 'classid' => 1, 'squadid' => 1, 'learn_date' => 123456);
        $data2 = array('orgid' => 2, 'courseid' => 2, 'monthcount' => 2, 'sumcount' => 20);
        $data2List = array($data2, $data2, $data2);
        $strQuery1 = "insert into dymf_organization (stuid,classid,squadid,learn_date) values (:stuid,:classid,:squadid,:learn_date)";
        $strQuery2 = "insert into dymf_learnlogs (orgid,courseid,monthcount,sumcount) values (:orgid,:courseid,:monthcount,:sumcount)";
        $pdo = self::DB();
        $pdoStatement1 = $pdo->prepare($strQuery1);
        $pdoStatement2 = $pdo->prepare($strQuery2);
        try {
            $pdo->beginTransaction();
            $pdoStatement1->execute($data1);
            echo $orgId = $pdo->lastInsertId();
            // echo $data2['orgid'] = $pdo->lastInsertId();
            foreach ($data2List as $course) {
                $course['orgid'] = $orgId;
                $pdoStatement2->execute($course);
            }
            // $pdoStatement2->execute($data2);
            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
    }
}