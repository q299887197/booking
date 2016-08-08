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
    function SelectActivityALL(){
        $dbh = $this->dbh ;
        $slet = $dbh->prepare("SELECT * FROM `NewActivity`");
        $slet->execute();
        $dbh = null;
        
        return $slet->fetchAll();
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
    ////  新增活動資訊 再將網址更新上去  INSERT  and  UPDATE
    ///=================================================================
    function InsertActivity($ActivityName,$MaxPeople,$MaxPartner=0,$StartTime,$EndTime,$Partner){
        $dbh = $this->dbh ;
        if($Partner == "PartnerNO") {
            $MaxPartner=0;
        }
        if($ActivityName!=null && $MaxPeople!=null && $StartTime!=null && $EndTime!=null){
            if($StartTime <= $EndTime){ //判斷時間是否正確
                // 新增活動內容到資料庫
                $sth = $dbh->prepare("INSERT INTO `NewActivity` (`ActivityName`,`MaxPeople`,`MaxPartner`,`StartTime`,`EndTime`)
         									VALUES (?, ?, ?, ?, ?)");
                $sth->bindParam(1, $ActivityName);
                $sth->bindParam(2, $MaxPeople);
                $sth->bindParam(3, $MaxPartner);
                $sth->bindParam(4, $StartTime);
                $sth->bindParam(5, $EndTime);
                $sth->execute();
                
                $lastId = $dbh->lastInsertId(); //查詢本次做完的最後一筆 id
                
                $IDmd5 = md5($lastId);
                
                $ActivityURL= "https://lab-bob-chen.c9users.io/booking/Member/iwantJoin?id=".$IDmd5."";
                
                $UPth = $dbh->prepare("UPDATE `NewActivity` SET `ActivityURL` = :ActivityURL , `RandURL` = :RandURL   WHERE `id`= :ActID");
                $UPth->bindParam(':ActivityURL', $ActivityURL );
                $UPth->bindParam(':RandURL', $IDmd5 );
                $UPth->bindParam(':ActID', $lastId );
                $UPth->execute();
                
                $dbh = null;
                $data['OK']="OK";
                $data['Id']=$lastId;
                return $data;  //傳回本次 ID
            }
            else{
                $data["alert"]="時間有誤";
                return $data;
            }
        }
        else{
            $data["alert"]="請輸入正確內容";
            return $data;
        }
    }
    
    ///=================================================================
    ////  新增屬於本次活動可以參加的成員   INSERT
    ///=================================================================
    function InsertPeople($resultName,$resultConrent,$resultActivityID){
        $dbh = $this->dbh ;
        $i=0;
        foreach($resultName as $resultName){
            if($resultName!=null && $resultConrent!=null){ //新增人員表格有空值不新增置資料庫
            // 新增人員到資料庫
            $sth = $dbh->prepare("INSERT INTO `JoinPeople` (`ActivityID`,`MemberID`,`MemberName`)
     									VALUES (?, ?, ?)");
            $sth->bindParam(1, $resultActivityID);
            $sth->bindParam(2, $resultName);
            $sth->bindParam(3, $resultConrent[$i]);
            
            $sth->execute();

            $i++;
        }
        }
        $dbh = null;
        return true;
    }

    
    
    
}
?>