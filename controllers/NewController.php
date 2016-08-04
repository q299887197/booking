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
        $Insert = $this->model("Activity");
        $result = $Insert->InsertActivity($_POST['ActivityName'],$_POST['MaxPeople'],$_POST['MaxPartner'],$_POST['StartTime'],$_POST['EndTime'],$_POST['Partner']);
        foreach($result as $data);
        
        $data['ActivityID'] = $data[0] ;
        $data['ActivityName'] = $data[1] ;
        $data['MaxPeople'] = $data[2] ;
        $data['MaxPartner'] = $data[3] ;
        $data['StartTime'] = $data[4] ;
        $data['EndTime'] = $data[5] ;
        $data['ActivityURL'] = "https://lab-bob-chen.c9users.io/booking/Member/iwantJoin?id=".$data[0]."";
        
        $data['Partner'] = $_POST['Partner'];

        $this->view("activityPeople",$data);
    }
    
    
    ///=================================================================
    ////  新增人員 畫面
    ///=================================================================    
    
    function Personnel(){
        $this->view("activityPeople");
    }
    
    
    function NewPersonnel(){  //點擊 新增人員
        $IntPeople = $this->model("Activity");
        $result = $IntPeople -> InsertPeople($_POST['name'],$_POST['content'],$_POST['ActivityID']); // 員工名字 編號 活動ID
        if($result == "OK"){
        $this->NewActOK($_POST['ActivityID']);
        }
        
    }
    
    
    ///=================================================================
    ////  新增完成後 顯示資料
    ///================================================================= 
    function NewActOK($ActivityID){
        $SelectActivity = $this->model("Activity");
        $resultActivity = $SelectActivity->SelectActivityID($ActivityID); // 用ID 查詢活動內容
        $result = $SelectActivity->SelectActivity($ActivityID);   // 用ID查詢可以參加的人
        
        foreach($resultActivity as $data);
        $data['id'] = $data[0];
        $data['ActivityName'] = $data[1];
        $data['MaxPeople'] = $data[2];
        $data['MaxPartner'] = $data[3];
        $data['StartTime'] = $data[4];
        $data['EndTime'] = $data[5];
        // $data['ActivityURL'] = $data[6];
        $data['ActivityURL'] = "https://lab-bob-chen.c9users.io/booking/Member/iwantJoin?id=".$data[0]."";
        $data['join'] = $result;
        $this->view("NewActOK",$data);
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
