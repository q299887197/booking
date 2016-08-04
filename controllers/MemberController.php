<?php

class MemberController extends Controller
{
    ///=================================================================
    ////  給員工看到的參加活動頁面
    ///=================================================================
    function iwantJoin(){
        if($_GET["id"]){
            $Activit = $this->model("MemberJoin");
            $result = $Activit->SelectActivityID($_GET["id"]);
            
            foreach($result as $data);
                $data['id'] = $data['0'] ;
                $data['ActivityName'] = $data['1'] ;
                $data['MaxPeople'] = $data['2'] ;
                $data['MaxPartner'] = $data['3'] ;
                $data['StartTime'] = $data['4'] ;
                $data['EndTime'] = $data['5'] ;
                $data['ActivityURL'] = $data['6'] ;
                $data['JoinNumber'] = $data['6'] ;
            }
        $this->view("iwantJoin",$data);
    }
    
    function iWantGO(){
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
    
    
    
    
    
    
}

?>