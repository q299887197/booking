<?php
require_once("models/PDOconfig.php");

class Activity {
    // var $ActivityName ;
    // var $MaxPeople ;
    // var $MaxPartner ;
    // var $StartTime ;
    // var $EndTime ;
    
    // function __construct(){
        
    // }

    function InsertActivity($ActivityName,$MaxPeople,$MaxPartner,$StartTime,$EndTime){
        $db_con = new DB_con();
        $dbh = $db_con->db;
        
        $sth = $dbh->prepare("INSERT INTO `NewActivity` (`ActivityName`,`MaxPeople`,`MaxPartner`,`StartTime`,`EndTime`)
 									VALUES (?, ?, ?, ?, ?)");
        $sth->bindParam(1, $ActivityName);
        $sth->bindParam(2, $MaxPeople);
        $sth->bindParam(3, $MaxPartner);
        $sth->bindParam(4, $StartTime);
        $sth->bindParam(5, $EndTime);
        $dbh = null;
        return $sth->execute();

    }
    
    
}
?>
