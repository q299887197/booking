<?php
require_once("models/PDOconfig.php");

class MemberJoin {
    
    var $dbh;
    
    function __construct(){  //將 NEW PDO物件放置建構子 並將內容丟給外面的 $dbh讓大家都可以用 
        $db_con = new DB_con();
        $db = $db_con->db;
        $this-> dbh = $db;
    }
    
    ///=================================================================
    ////  用get抓編號 查活動資訊   SELECT
    ///=================================================================
    function SelectActivityGET($RandURL){  //活動編號ID
        $dbh = $this->dbh ;
        $slet = $dbh->prepare("SELECT * FROM `NewActivity` WHERE `RandURL` = :RandURL");
        $slet->bindParam(':RandURL', $RandURL);
        $slet->execute();
        $dbh = null;
        
        return $slet->fetchAll();
    }
    
    
    ///=================================================================
    ////  用id抓編號 查活動資訊   SELECT
    ///=================================================================
    function SelectActivityID($ActID){  //活動編號ID
        $dbh = $this->dbh ;
        $slet = $dbh->prepare("SELECT * FROM `NewActivity` WHERE `id` = :ActID");
        $slet->bindParam(':ActID', $ActID);
        $slet->execute();
        $dbh = null;
        
        return $slet->fetchAll();
    }
    
    
    ///=================================================================
    ////  用id編號 查員工是否有資格參加活動   SELECT
    ///=================================================================
    function SelectJoinPeople($JoinManID,$JoinManName,$ActID){   //參加人ID , Name , 活動編號ID
     $dbh = $this->dbh ;
        // try{
           
            
        //     $dbh->beginTransaction();
            
            $slet = $dbh->prepare("SELECT * FROM `JoinPeople` WHERE `ActivityID` = :ActivityID FOR UPDATE");
            $slet->bindParam(':ActivityID', $ActID);
            $slet->execute();
            if( $JoinManID != null  &&  $JoinManName != null){
                foreach($slet->fetchAll() as $row){
                    if($row[2] == $JoinManID  && $row[3] == $JoinManName ){   //判斷是否編號 名字相同
                        if($row[4]==NULL){
                            $UPDateresult=$this->UpdateJoinNumber($ActID,$row[0]);   //活動ID  , 登記人的ID
                            // var_dump($UPDateresult);
                            // exit;
                            if($UPDateresult == "OK"){
                                $result["join"]="OK";
                                $result["alert"] = "報名成功!";
                                return $result;
                            }
                            else{
                                $result["alert"] = "人數已經額滿囉!";
                                // throw new Exception("人數已經額滿囉");
                                return $result;
                            }
                        }
                        else{
                            $result["alert"] = "你已經參加過囉!";
                            // throw new Exception("你已經參加過囉");
                            return $result;
                        }
                    }
                }
            }
            else{
                $result["alert"] = "你輸入的是空值";
                // throw new Exception("你輸入的是空值");
                return $result;
            }
            
            if($row[2] != $JoinManID || $row[3] != $JoinManName ){ 
                $result["alert"] = "您無權參加此活動哦!";
                // throw new Exception("您無權參加此活動哦");
                return $result;
            }
            
        //     $dbh->commit();    
        // }catch (Exception $err){
        //     $dbh->rollBack();
        //     $result["alert"] = $err->getMessage();
        //     return $result;
        // }
        
    }
    
    ///=================================================================
    ////  判斷活動是否還有空位可以參加  參加的話給予此人有參加證明 參加人數+1 及 YES   UPDATE
    ///=================================================================
    function UpdateJoinNumber($ActID,$id){ //活動ID  , 登記人的ID 
        $dbh = $this->dbh;
        $selectAct = $this->SelectActivityID($ActID); //呼叫查詢活動的 function
        foreach($selectAct as $row);
        if($row[2] > $row[7]){   //判斷最大人數 大於 目前參加人數 是否吻合
            $row[7] = $row[7] + 1 ;
            $YES = "YES";
            $UPNth = $dbh->prepare("UPDATE `NewActivity` SET `JoinNumber` = :JoinNumber  WHERE `id`= :ActID");
            $UPNth->bindParam(':JoinNumber', $row[7] );
            $UPNth->bindParam(':ActID', $ActID );
            $UPNth->execute();
            
            
            $UPJth = $dbh->prepare("UPDATE `JoinPeople` SET `GoJoin` = :GoJoin  WHERE `id`= :ID");
            $UPJth->bindParam(':GoJoin', $YES );
            $UPJth->bindParam(':ID', $id );
            $UPJth->execute();
            // var_dump($UPJth->execute());
            //                 exit;
            
            $dbh = null;
            
            $result="OK";
            return $result;
        }
        else{
            $result="NO";
            return $result;
        }
    }
    
    
    ///=================================================================
    ////  用id編號 查員工是否有資格參加活動   SELECT
    ///=================================================================
    function SelectAllActivity(){
        $db = $this->dbh;
        $select = $db->prepare("SELECT * FROM `NewActivity` ");
        $select->execute();
        return $select->fetchAll();

    }
    
}

?>