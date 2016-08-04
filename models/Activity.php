<?php
require_once("models/PDOconfig.php");

class Activity {
    var $dbh;
    
    function __construct(){  //將 NEW PDO物件放置建構子 並將內容丟給外面的 $dbh讓大家都可以用 
        $db_con = new DB_con();
        $db = $db_con->db;
        $this-> dbh = $db;
    }
    
    ///=================================================================
    ////  用id編號 查活動資訊   SELECT
    ///=================================================================
    function SelectActivityID($id){
        $dbh = $this->dbh ;
        $slet = $dbh->prepare("SELECT * FROM `NewActivity` WHERE `id` = :ActivityID");
        $slet->bindParam(':ActivityID', $id);
        $slet->execute();
        $dbh = null;
        
        return $slet->fetchAll();
    }
    
    ///=================================================================
    ////  用 查可以參加的人   SELECT
    ///=================================================================
    function SelectActivity($id){
        $dbh = $this->dbh ;
        $slet = $dbh->prepare("SELECT * FROM `JoinPeople` WHERE `ActivityID` = :AID");
        $slet->bindParam(':AID', $id);
        $slet->execute();
        $dbh = null;
        
        return $slet->fetchAll();
    }

 
    ///=================================================================
    ////  新增活動資訊 再查詢本次新增內容  INSERT  and  SELECT
    ///=================================================================
    function InsertActivity($ActivityName,$MaxPeople,$MaxPartner=0,$StartTime,$EndTime,$Partner){
        $dbh = $this->dbh ;
        if($Partner == "PartnerNO") {
            $MaxPartner=0;
        }
        // 新增活動內容到資料庫
        $sth = $dbh->prepare("INSERT INTO `NewActivity` (`ActivityName`,`MaxPeople`,`MaxPartner`,`StartTime`,`EndTime`)
 									VALUES (?, ?, ?, ?, ?)");
        $sth->bindParam(1, $ActivityName);
        $sth->bindParam(2, $MaxPeople);
        $sth->bindParam(3, $MaxPartner);
        $sth->bindParam(4, $StartTime);
        $sth->bindParam(5, $EndTime);
        // $dbh = null;
        $sth->execute();
        
        // 將新增到資料庫的活動內容 查詢取 id
        $slet = $dbh->prepare("SELECT * FROM `NewActivity` WHERE `ActivityName` = :ActivityName");
        $slet->bindParam(':ActivityName', $ActivityName);
        $slet->execute();
        $dbh = null;
        
        return $slet->fetchAll();
    }
    
    ///=================================================================
    ////  新增屬於本次活動可以參加的成員   INSERT
    ///=================================================================
    function InsertPeople($resultName,$resultConrent,$resultActivityID){
        $dbh = $this->dbh ;
        $i=0;
        foreach($resultName as $resultName){
            // 新增人員到資料庫
            $sth = $dbh->prepare("INSERT INTO `JoinPeople` (`ActivityID`,`MemberID`,`MemberName`)
     									VALUES (?, ?, ?)");
            $sth->bindParam(1, $resultActivityID);
            $sth->bindParam(2, $resultName);
            $sth->bindParam(3, $resultConrent[$i]);
            
            $sth->execute();

            $i++;
        }
        $dbh = null;
        return $result = "OK";
    }
    
    
}
?>