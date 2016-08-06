<?php
foreach($data['ActivityRecord'] as $data);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>新增人員</title>
    <link href="<?= $cssRoot ?>/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <header>		
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation"><a href="<?= $root ?>/New/Activity">建立新活動</a></li>
						<li role="presentation"><a href="<?= $root ?>/New/ShowALL">查看所有活動</a></li>						
					</ul>
				</div>
			</div>						
	  </header>

    <div class="row">
    <div class="col-md-6" align="right">
     <h1 style="color: red;" align="center">Activity</h1>
          <table width="400" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">活動報名資訊</font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動報表編號</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['id'] ?></font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">活動名稱</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['ActivityName'] ?></font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">人數限制(總數量)</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['MaxPeople'] ?></font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">是否可攜伴</font></td>
            <?php if ($data['Partner'] == "PartnerNO" ) { ?>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">不能</font></td>
            <?php } 
             else { ?>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">攜伴最大人數:<?= $data['MaxPartner'] ?></font></td>
            <?php } ?>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">開始報名 時間</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['StartTime'] ?></font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000">截止報名 時間</font></td>
            <td width="80" height="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $data['EndTime'] ?></font></td>
          </tr>
        </table>
    </div>
    
    
    <div class="col-md-6" align="left">
     <h1 style="color: red;" align="center">ActivityPeople</h1>
      <form id="form1" name="form1" method="post" action="<?= $root ?>/New/NewPersonnel">
        <table id="mytable" width="400" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
          <tr>
            <input type="hidden" name="ActivityID" value="<?= $data['id'] ?>">
            <input type="hidden" name="ActivityName" value="<?= $data['ActivityName'] ?>">
            <input type="hidden" name="MaxPeople" value="<?= $data['MaxPeople'] ?>">
            <input type="hidden" name="MaxPartner" value="<?= $data['MaxPartner'] ?>">
            <input type="hidden" name="StartTime" value="<?= $data['StartTime'] ?>">
            <input type="hidden" name="EndTime" value="<?= $data['EndTime'] ?>">
            <input type="hidden" name="ActivityURL" value="<?= $data['ActivityURL'] ?>">
            <input type="hidden" name="Partner" value="<?= $data['Partner'] ?>">
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">活動編號_<?= $data['id'] ?></font></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">可以參加的人員</font></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline" class="td01" bgcolor="#FFFFFF"><font color="#000000">編號</font></td>
            <td width="80" align="center" valign="baseline" class="td01" bgcolor="#FFFFFF"><font color="#000000">名稱</font></td>
          </tr>
            <td valign="baseline" bgcolor="#FFFFFF"><input name="name[]" type="text" size="12" style="width:199px" placeholder="請輸入編號"></td>
            <td valign="baseline" bgcolor="#FFFFFF"><input name="content[]" type="text" size="12" style="width:199px" placeholder="請輸入名字"></td>
          </tr>
        </table>
        <table width="400" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
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