<?php
if($data["alert"])
echo "<script language='javascript'> alert('{$data['alert']}'); </script>";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>參加活動</title>
    <link href="<?= $cssRoot ?>/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
    <header>		
    	<div class="navbar-collapse collapse">							
    		<div class="menu">
    			<ul class="nav nav-tabs" role="tablist">
    				<li role="presentation"><a href="<?= $root ?>/New/Activity">建立新活動</a></li>
    				<!--<li role="presentation"><a href="<?= $root ?>#">編輯報表</a></li>-->
    				<li role="presentation"><a href="<?= $root ?>#">查看所有活動</a></li>								
    				<!--<li role="presentation"><a href="<?= $root ?>#">服務據點</a></li>-->
    				<!--<li role="presentation"><a href="<?= $root ?>#">會員專區</a></li>-->
    			</ul>
    		</div>
    	</div>						
    </header>
      
    <div class="row" >
     <h1 style="color: red;" align="center">活動建立成功</h1>
     <div class="col-md-7" >
      <form id="form1" name="form1" method="post" action="<?= $root ?>/Member/iWantGO">
        <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">活動資訊</font></td>
          </tr>
          <tr>
            <input type="hidden" name="ActID" value="<?= $data['id'] ?>">
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動名稱</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['ActivityName'] ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="ActivityName" id="ActivityName" value=""  style= "color:#000000" readonly /></td>-->
          </tr>
          <tr>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">總人數限制</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['MaxPeople'] ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="MaxPeople" id="MaxPeople" value="" style= "color:#000000" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'')" /></td>-->
          </tr>
          <tr>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">攜伴</font></td>
            <?php if ($data['Partner'] == "PartnerNO" ) { ?>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">不能</font></td>
            <?php } 
             else { ?>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">攜伴最大人數:<?= $data['MaxPartner'] ?></font></td>
            <?php } ?>
          </tr>
          <tr>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">開始報名 時間</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['StartTime'] ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="date" name="StartTime" id="StartTime" value="" style= "color:#000000" /></td>-->
          </tr>
          <tr>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">截止報名 時間</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['EndTime'] ?></font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="date" name="EndTime" id="EndTime" value="" style= "color:#000000" /></td>-->
          </tr>
          <tr>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">報名網址</font></td>
          </tr>
          <tr>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><a href="<?= $data['ActivityURL'] ?>"><?= $data['ActivityURL'] ?></a></font></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00">
            <input type="submit" name="iwant" id="iwant" value="我要參加"   style=background-color:pink;color:#000000 />
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div class="col-md-1" align="left">
        <form id="form1" name="form1" method="post" action="<?= $root ?>/Member/iWantGO">
        <table width="320"  border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">可以參加的員工</font></td>
          </tr>
          <tr>
            <input type="hidden" name="ActID" value="<?= $data['id'] ?>">
            <td width="80" height="25" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">員工編號</font></td>
            <td width="80" height="25" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">員工名字</font></td>
            <!--<td valign="baseline" bgcolor="#FFFFFF"><input type="text" name="ActivityName" id="ActivityName" value=""  style= "color:#000000" readonly /></td>-->
          </tr>
          
          <?php foreach( $data['join'] as $row ){ ?>
          <tr>
              <td width="80" height="25" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $row[2] ?></font></td>
              <td width="80" height="25" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $row[3] ?></font></td>
          </tr>
         <?php }  ?>
         
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00">
            <input type="submit" name="iwant" id="iwant" value="我要參加"   style=background-color:pink;color:#000000 />
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
  </body>
</html>