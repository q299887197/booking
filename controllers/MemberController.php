<?php

class MemberController extends Controller
{
    ///=================================================================
    ////  給員工看到的參加活動頁面
    ///=================================================================
    function iwantJoin(){   //近來顯示相對應的活動資訊
        if($_GET["id"]){ 
            $Activit = $this->model("MemberJoin");
            $result = $Activit->SelectActivityGET($_GET["id"]);
            
            // foreach($result as $data);
            
            // var_dump($result);
            // exit;
            if($result["joinOK"] == "OK"){
                $this->view("iwantJoin",$result);
            }
            elseif($result["display"]){
                $this->view("iwantJoin",$result);
            }
            
            // var_dump($data['date']);
            // exit;
            
            
            }
        
    }
    
    function iWantGO(){   //按下我要參加的動作
    
        $People = $this->model("MemberJoin");
        // var_dump($_POST['JionPartenr']);
        // exit;

        $data = $People->SelectJoinPeople($_POST['JoinManID'], $_POST['JoinManName'], $_POST['JionPartenr'], $_POST['ActID']); //參加人ID 名字 攜伴人數 , 活動ID

        $this->ActivityCenter($data);
        
    }
    
    ///=================================================================
    ////  給員工看到的 所有活動頁面
    ///=================================================================
    function ActivityCenter($data=""){
        $AllActivity = $this->model("MemberJoin");
        $data['date'] = date("Y-m-d");
        $data['AllActivity'] = $AllActivity->SelectAllActivity();
        
        $this->view("ActivityCenter",$data);
    }
    
    
    
    
    
    
}

?>