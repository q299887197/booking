<?php
foreach($data as $row);

// if(isset($_POST['Newbtn'])){
// $resultName = $_POST['name'];
// $resultConrent = $_POST['content'];

// var_dump($resultName);
// echo "<br><br><br><br><br><br>";
// var_dump($resultConrent);
// exit;
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>建立新活動</title>
    <link href="<?= $cssRoot ?>/bootstrap.min.css" rel="stylesheet">
  </head>
  
  
  <body>

    <div class="row">
    <div class="col-md-4">
     <h1 style="color: red;" align="center">Activity</h1>
          <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">活動報名資訊</font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動報表編號</font></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input type="text"value="<?= $row[0] ?>"  style= "color:#000000" readonly /></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動名稱</font></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input type="text" value="<?= $row[1] ?>"  style= "color:#000000" /></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">人數限制(總數量)</font></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input type="text" value="<?= $row[2] ?>" style= "color:#000000" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'')" /></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">是否可攜伴</font></td>
            <td valign="baseline" bgcolor="#FFFFFF">
              <input type=radio value="PartnerNO" name="Partner" id="PartnerNO"><font color="red"> 不能</font>
              <input type=radio value="PartnerOK" name="Partner" id="PartnerOK"><font color="red"> 可以</font>
              <input type="text" value="<?= $row[3] ?>" style= "color:#000000; width:100px" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'')" />攜伴人數限制</td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">開始報名 時間</font></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input type="text" value="<?= $row[4] ?>" style= "color:#000000" /></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">截止報名 時間</font></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input type="text" value="<?= $row[5] ?>" style= "color:#000000" /></td>
          </tr>
        </table>
    </div>
    
    
    <div class="col-md-6">
     <h1 style="color: red;" align="center">ActivityPeople</h1>
      <form id="form1" name="form1" method="post" action="<?= $root ?>/New/NewPersonnel">
        <table id="mytable" width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <input type="hidden" name="ActivityID" value="<?= $row[0] ?>">
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">活動編號_<?= $row[0] ?></font></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">可以參加的人員</font></td>
          </tr>
          <!--<tr>-->
            <!--<td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動名稱</font></td>-->
          <!--  <td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="ActivityName" id="ActivityName" value=""  style= "color:#000000" /></td>-->
          <!--</tr>-->

          <tr>
            <td width="80" align="center" valign="baseline" class="td01" bgcolor="#FFFFFF"><font color="#000000">編號</font></td>
            <td width="80" align="center" valign="baseline" class="td01" bgcolor="#FFFFFF"><font color="#000000">名稱</font></td>
            <!--<td width="150" class="td01">名稱</td>-->
            <!--<td width="200" class="td01">備註</td>-->
          </tr>
            <td valign="baseline" bgcolor="#FFFFFF"><input name="name[]" type="text" size="12"></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input name="content[]" type="text" size="12"></td>
          </tr>
        </table>
        <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00">
            <input type="button" name="" id="" value="新增欄位" onclick="add_new_data()"  style=background-color:pink;color:#000000 />
            <input type="button" name="" id="" value="刪除欄位" onclick="remove_data()"  style=background-color:pink;color:#000000 />
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00">
            <input type="submit" name="Newbtn" id="Newbtn" value="新增"   style=background-color:pink;color:#000000 />
            </td>
          </tr>
        </table>
        
      </form>
    </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= $jsRoot ?>/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= $jsRoot ?>/bootstrap.min.js"></script>
    <script src="<?= $jsRoot ?>/jquery.prettyPhoto.js"></script>
    <script src="<?= $jsRoot ?>/jquery.isotope.min.js"></script>  
    <script src="<?= $jsRoot ?>/wow.min.js"></script>
    <script src="<?= $jsRoot ?>/functions.js"></script>
    <script src="<?= $jsRoot ?>/hello.js"></script>
    
  </body>
</html>