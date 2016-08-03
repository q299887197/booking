<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>參加活動</title>
  </head>
  
  <body>
     <h1 style="color: red;" align="center">Activity</h1>
      <form id="form1" name="form1" method="post" action="<?= $root ?>/New/NewActivity">
        <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">我要參加活動</font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動名稱</font></td>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?php ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="ActivityName" id="ActivityName" value=""  style= "color:#000000" readonly /></td>-->
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">總人數限制</font></td>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?php ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="MaxPeople" id="MaxPeople" value="" style= "color:#000000" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'')" /></td>-->
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">開始報名 時間</font></td>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?php ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="date" name="StartTime" id="StartTime" value="" style= "color:#000000" /></td>-->
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">截止報名 時間</font></td>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?php ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="date" name="EndTime" id="EndTime" value="" style= "color:#000000" /></td>-->
          </tr>
          <tr>
            <td colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">&nbsp</font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">員工編號</font></td>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">員工名字</font></td>
          </tr>
          <tr>
            <td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="ActivityName" id="ActivityName" value=""  style= "color:#000000"  /></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="ActivityName" id="ActivityName" value=""  style= "color:#000000"  /></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00">
            <input type="submit" name="Newbtn" id="Newbtn" value="我要參加"   style=background-color:pink;color:#000000 />
            </td>
          </tr>
        </table>
      </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= $jsRoot ?>/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= $jsRoot ?>/bootstrap.min.js"></script>
    <script src="<?= $jsRoot ?>/jquery.prettyPhoto.js"></script>
    <script src="<?= $jsRoot ?>/jquery.isotope.min.js"></script>  
    <script src="<?= $jsRoot ?>/wow.min.js"></script>
    <script src="<?= $jsRoot ?>/functions.js"></script>
  </body>
</html>