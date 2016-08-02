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
        $ActivityName = $_POST['ActivityName'];
        $MaxPeople = $_POST['MaxPeople'];
        $MaxPartner = $_POST['MaxPartner'];
        $StartTime = $_POST['StartTime'];
        $EndTime = $_POST['EndTime'];
        
        $Insert = $this->model("Activity");
        $result = $Insert->InsertActivity($ActivityName,$MaxPeople,$MaxPartner,$StartTime,$EndTime);
        
        $this->view("newActivity");
    }
    
    
    ///=================================================================
    ////  人員
    ///=================================================================    
    
    function Personnel(){
        $this->view("activityPeople");
    }
    
}

?>
