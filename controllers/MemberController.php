<?php

class MemberController extends Controller
{
    ///=================================================================
    ////  給員工看到的參加活動頁面
    ///=================================================================
    function iwantJoin(){   //近來顯示相對應的活動資訊
        if($_GET["id"]){
            $Activit = $this->model("MemberJoin");
            $result = $Activit->SelectActivityID($_GET["id"]);
            foreach($result as $data);
            }
        $this->view("iwantJoin",$data);
    }
    
    function iWantGO(){   //按下我要參加的動作
        $People = $this->model("MemberJoin");
        // $JoinID = $_POST['JoinID'];
        // $JoinName = $_POST['JoinName'];
        // $ActID = $_POST['ActID'];
        $result = $People->SelectJoinPeople($_POST['JoinManID'], $_POST['JoinManName'], $_POST['ActID']);

        if($result["join"]=="OK"){ 
        	   // header("Location: ../Home/$dataGo");
        	   // exit();
        	   $this->view("iwantJoin",$result);
        	}
        	elseif($result){
        	    $this->view("iwantJoin",$result);
        	}
        
    }
    
    ///=================================================================
    ////  給員工看到的 所有活動頁面
    ///=================================================================
    function ActivityCenter(){
        $AllActivity = $this->model("MemberJoin");
        $data['date'] = date("Y-m-d");
        $data['AllActivity'] = $AllActivity->SelectAllActivity();

        $this->view("ActivityCenter",$data);
    }
    
    
    
    
    
    
}

?>