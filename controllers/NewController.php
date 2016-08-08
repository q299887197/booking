<?php

class NewController extends Controller
{
    ///=================================================================
    ////  新增活動頁面
    ///=================================================================
    function Activity(){
        $this->view("newActivity");
    }
    
    function NewActivity(){ //點擊 新增活動
        $Activity = $this->model("Activity");
        $resultID = $Activity->InsertActivity($_POST['ActivityName'],$_POST['MaxPeople'],$_POST['MaxPartner'],$_POST['StartTime'],$_POST['EndTime'],$_POST['Partner']);//新增活動
        // var_dump($resultID['alert']);
        // exit;
        if($resultID['OK']=="OK"){
            $data['ActivityRecord'] = $Activity->SelectActivityID($resultID['Id']); // 查詢活動所有內容
            $data['Partner'] = $_POST['Partner']; //判讀是否可攜伴
            $this->view("activityPeople",$data); //導頁至 新增人員
        }
        else{
            $this->view("newActivity",$resultID); //輸入有誤 一樣在本頁
        }

    }
    
    
    ///=================================================================
    ////  新增人員 畫面
    ///=================================================================    
    function NewPersonnel(){  //點擊 新增人員
        $IntPeople = $this->model("Activity");
        $result = $IntPeople -> InsertPeople($_POST['name'],$_POST['content'],$_POST['ActivityID']); // 員工名字 編號 活動ID
        if($result == true){
        $this->NewActOK($_POST['ActivityID']); //導頁至 顯示資料 完成所有新增活動
        }
    }
    

    ///=================================================================
    ////  新增完成後 顯示資料
    ///================================================================= 
    function NewActOK($ActivityID){
        $SelectActivity = $this->model("Activity");
        $data['ActivityRecord'] = $SelectActivity->SelectActivityID($ActivityID); // 用ID 查詢活動內容
        $data['join'] = $SelectActivity->SelectActivity($ActivityID);   // 用ID查詢可以參加的人
        $data['Partner'] = $_POST['Partner'];

        $this->view("NewActOK",$data);
    }
    
    ///=================================================================
    ////  顯示全部活動
    ///================================================================= 
    function ShowALL(){
        $AllActivity = $this->model("Activity");
        $data = $AllActivity->SelectActivityALL();

        $this->view("ShowAllActivity",$data);
    }
    
    
    
}

?>
