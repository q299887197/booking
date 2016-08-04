<?php
if($data["alert"])
echo "<script language='javascript'> alert('{$data['alert']}'); </script>";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>活動中心</title>
    <link href="<?= $cssRoot ?>/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
    <!--<header>		-->
    <!--	<div class="navbar-collapse collapse">							-->
    <!--		<div class="menu">-->
    <!--			<ul class="nav nav-tabs" role="tablist">-->
    <!--				<li role="presentation"><a href="<?= $root ?>/New/Activity">所有活動</a></li>-->
    <!--				<li role="presentation"><a href="<?= $root ?>#">編輯報表</a></li>-->

    <!--			</ul>-->
    <!--		</div>-->
    <!--	</div>						-->
    <!--</header>-->

     <h1 style="color: red;" align="center">活動</h1>
        <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">活動資訊</font></td>
          </tr>
          <tr>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動名稱</font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">總人數</font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">攜伴</font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">開始時間</font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">結束時間</font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">報名連結</font></td>
          </tr>
          <?php foreach($data as $row): ?>
          <tr>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['ActivityName'] ?></font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['MaxPeople'] ?></font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['MaxPartner'] ?></font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['StartTime'] ?></font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['ActivityURL'] ?></font></td>
            <td height="30" colspan="2" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><a href="<?= $data['ActivityURL'] ?>"><?= $data['ActivityURL'] ?></a></font></td>
          </tr>
          <?php endif ?>

        </table>

    
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