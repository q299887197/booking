<?php

class NewController extends Controller
{
    ///=================================================================
    ////  新增活動頁面
    ///=================================================================
    function Activity(){
        $this->view("newActivity");
    }
    
    function NewActivity(){
        // $data['ActivityName'] = $_POST['ActivityName'];
        // $data['MaxPeople'] = $_POST['MaxPeople'];
        // $data['MaxPartner'] = $_POST['MaxPartner'];
        // $data['StartTime'] = $_POST['StartTime'];
        // $data['EndTime'] = $_POST['EndTime'];
        
        $ActivityName = $_POST['ActivityName'];
        $MaxPeople = $_POST['MaxPeople'];
        $MaxPartner = $_POST['MaxPartner'];
        $StartTime = $_POST['StartTime'];
        $EndTime = $_POST['EndTime'];
        // $data['Partner'] = $_POST['Partner'];

        $Insert = $this->model("Activity");
        $result = $Insert->InsertActivity($ActivityName,$MaxPeople,$MaxPartner,$StartTime,$EndTime);
        // foreach ($result as $data);
        // $data["id"] = $result[0];
        // $data["ActivityName"] = $result[1];
        // $data["MaxPeople"] = $result[2];
        // $data["MaxPartner"] = $result[3];
        // $data["StartTime"] = $result[4];
        // $data["EndTime"] = $result[5];

        $this->view("activityPeople",$result);
    }
    
    
    ///=================================================================
    ////  人員
    ///=================================================================    
    
    function Personnel(){
        $this->view("activityPeople");
    }
    
    
    function NewPersonnel(){
        $resultName = $_POST['name'];
        $resultConrent = $_POST['content'];
        $resultActivityID = $_POST['ActivityID'];
        
        
        $IntPeople = $this->model("Activity");
        $IntPeople -> InsertPeople($resultName,$resultConrent,$resultActivityID);
        
        var_dump($resultName);
        echo "<br><br><br><br><br><br>";
        var_dump($resultConrent);
        echo "<br><br><br><br><br><br>";
        var_dump($resultActivityID);
        exit;
        
        
        
        
    }
    
}

?>
