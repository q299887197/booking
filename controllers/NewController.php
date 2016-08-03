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
        $this->view("activityPeople",$result);
    }
    
    
    ///=================================================================
    ////  人員
    ///=================================================================    
    
    function Personnel(){
        $this->view("activityPeople");
    }
    
    
    function NewPersonnel(){
        $IntPeople = $this->model("Activity");
        $result = $IntPeople -> InsertPeople($_POST['name'],$_POST['content'],$_POST['ActivityID']);
        $data['alert'] = $result['alert'];
        $this->view("activityPeople",$data);
        
    }
    
    ///=================================================================
    ////  顯示資料
    ///================================================================= 
    
    function ShowActivity(){
        $SelectActivity = $this->model("Activity");
        $resultActivity = $SelectActivity->SelectActivityID(29);
        $result = $SelectActivity->SelectActivity(29);
        
        foreach($resultActivity as $data);
        $data['id'] = $data[0];
        $data['ActivityName'] = $data[1];
        $data['MaxPeople'] = $data[2];
        $data['MaxPartner'] = $data[3];
        $data['StartTime'] = $data[4];
        $data['EndTime'] = $data[5];
        $data['ActivityURL'] = $data[6];
        $data['join'] = $result;

        // foreach($resultJoin as $data){
        //     $data[''] = $resultJoin[1];
        //     $data[''] = $resultJoin[2];
        //     $data[''] = $resultJoin[3];

        // }
        
        $this->view("ShowJoin",$data);
    }
    
    
    
}

?>
