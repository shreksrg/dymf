<?php

class model_learnOrganization extends model_base
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = self::DB();
    }

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


    // 增加学修日志
    public function addLearnLogs(Array $dataOrg, Array $dataStats)
    {
        $strQuery1 = "insert into dymf_organization (stuid,clscode,squadid,learn_date)
        values (:stuid,:clscode,:squadid,:learn_date)";
        $strQuery2 = "insert into dymf_learnstatlogs (orgid,cstatcode,monthcount,sumcount)
        values (:orgid,:cstatcode,:monthcount,:sumcount)";
        $pdo = self::DB();
        $pdoStatement1 = $pdo->prepare($strQuery1);
        $pdoStatement2 = $pdo->prepare($strQuery2);
        try {
            $pdo->beginTransaction();
            $pdoStatement1->execute($dataOrg);
            $orgId = $pdo->lastInsertId();
            foreach ($dataStats as $stat) {
                $stat['orgid'] = $orgId;
                $pdoStatement2->execute($stat);
            }
            $pdo->commit();
            return true;
        } catch (Exception $e) {
            $pdo->rollBack();
            return $e->getMessage();
        }
    }

    // 获取指定学修班累计数记录
    public function getClassStatsForSum($stuid, $clscode)
    {
        $strQuery = "SELECT clscode,cstatcode,SUM(monthcount) AS sumcount,MIN(learn_date) AS fromdate,MAX(learn_date) AS todate
        FROM dymf_organization AS org LEFT JOIN dymf_learnstatlogs AS stat ON org.id=stat.orgid
        WHERE org.stuid=:stuid and org.clscode=:clscode  GROUP BY clscode,cstatcode";

        $pdo = self::DB();
        $pdoStatement = $pdo->prepare($strQuery);
        $pdoStatement->execute(array('stuid' => $stuid, 'clscode' => $clscode));
        return $rows = $pdoStatement->fetchAll();
    }
}