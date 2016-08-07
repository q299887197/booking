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
    function SelectJoinPeople($JoinManID,$JoinManName,$JoinPartenr,$ActID){   //參加人ID , Name , 攜伴人數 , 活動編號ID
     $dbh = $this->dbh ;
    //  var_dump($JionPartenr);
    //  exit;
        // try{
           
            
        //     $dbh->beginTransaction();
            
            $slet = $dbh->prepare("SELECT * FROM `JoinPeople` WHERE `ActivityID` = :ActivityID");
            $slet->bindParam(':ActivityID', $ActID);
            $slet->execute();
            if( $JoinManID != null  &&  $JoinManName != null){
                foreach($slet->fetchAll() as $row){
                    if($row[2] == $JoinManID  && $row[3] == $JoinManName ){   //判斷是否編號 名字相同
                        if($row[4]==NULL){
                            $UPDateresult=$this->UpdateJoinNumber($ActID,$row[0],$JoinPartenr);   //活動ID  , 登記人的ID 攜伴人數
                            // var_dump($UPDateresult);
                            // exit;
                            if($UPDateresult == "OK"){
                                $result["join"]="OK";
                                $result["alert"] = "報名成功!";
                                return $result;
                            }
                            elseif($UPDateresult == "overflow"){
                                $result["alert"] = "攜伴人數超過多";
                                return $result;
                            }
                            else{
                                $result["alert"] = "人數已經額滿囉!";
                                return $result;
                                // throw new Exception("人數已經額滿囉");
                            }
                        }
                        else{
                            $result["alert"] = "你已經參加過囉!";
                            return $result;
                            // throw new Exception("你已經參加過囉");
                        }
                    }
                }
            }
            else{
                $result["alert"] = "你輸入的是空值";
                return $result;
                // throw new Exception("你輸入的是空值");
            }
            
            if($row[2] != $JoinManID || $row[3] != $JoinManName ){ 
                $result["alert"] = "您無權參加此活動哦!";
                return $result;
                // throw new Exception("您無權參加此活動哦");
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
    function UpdateJoinNumber($ActID,$id,$JoinPartenr){ //活動ID  , 登記人的ID  攜伴人數
        $dbh = $this->dbh;
        $selectAct = $this->SelectActivityID($ActID); //呼叫查詢活動的 function
        foreach($selectAct as $row);
        $joinPeople =  $row[7] + $JoinPartenr + 1;
        // var_dump($joinPeople);
        // exit;
        if($row[2] > $row[7]){   //判斷最大人數 大於 目前參加人數 是否吻合
            if($row[2] >= $joinPeople ){
                // $row[7] = $row[7] + 1 ;
                $YES = "YES";
                $UPNth = $dbh->prepare("UPDATE `NewActivity` SET `JoinNumber` = :JoinNumber  WHERE `id`= :ActID" );
                $UPNth->bindParam(':JoinNumber', $joinPeople );
                $UPNth->bindParam(':ActID', $ActID );
                $UPNth->execute();
                
                $UPJth = $dbh->prepare("UPDATE `JoinPeople` SET `GoJoin` = :GoJoin  WHERE `id`= :ID" );
                $UPJth->bindParam(':GoJoin', $YES );
                $UPJth->bindParam(':ID', $id );
                $UPJth->execute();
    
                $dbh = null;
                
                $result="OK";
                return $result;
                // throw new Exception("OK");
            }
            else{
                $result="overflow";
                return $result;
            }
        }
        else{
            $result="NO"; //人數已滿
            return $result;
            // throw new Exception("NO");
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