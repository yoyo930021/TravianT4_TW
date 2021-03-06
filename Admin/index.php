<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       admin.php                                                   ##
##  Developed by:  Dzoki                                                       ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
##                                                                             ##
#################################################################################
session_start();
include("../GameEngine/Database.php");
include("../GameEngine/Admin/database.php");  
?>                                             
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <link REL="shortcut icon" HREF="favicon.ico"/>
  	<title><?php if($_SESSION['access'] == ADMIN){ echo 'Admin Control Panel - TravianX'; } else if($_SESSION['access'] == MULTIHUNTER){ echo 'Multihunter Control Panel - TravianX'; } ?></title>    
  	<link rel=stylesheet type="text/css" href="../img/admin/admin.css">
  	<link rel=stylesheet type="text/css" href="../img/admin/acp.css">
  	<link rel=stylesheet type="text/css" href="../img/img.css">
  		<script src="/mt-full.js?423cb"  type="text/javascript"></script>
  	<script src="ajax.js" type="text/javascript"></script>

  	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  	<meta http-equiv="imagetoolbar" content="no">
  </head>

  <body>
    <script language="javascript">
      function aktiv() {this.srcElement.className='fl1'; }
      function inaktiv() {event.srcElement.className='fl2'; }

      function del(e,id){
        if(e == 'did'){ var conf = confirm('Dou you really want delete village id '+id+'?'); } 
        if(e == 'unban'){ var conf = confirm('Dou you really want unban player '+id+'?'); } 
        if(e == 'stopDel'){ var conf = confirm('Dou you really want stop deleting user '+id+'?'); } 
        if(conf){return true;}else{return false;}
      }
    </script>

    <div id="ltop1">

      <div style="position:relative; width:231px; height:100px; float:left;">
      	<img src="../img/x.gif" width="1" height="1">
      </div>
      
      <img class="fl2" src="../img/admin/x1.gif" width="70" height="100" border="0" onmouseover="this.className='fl1'" onmouseout="this.className='fl2'"><img class="fl2" src="../img/admin/x2.gif" width="70" height="100" border="0" onmouseover="this.className='fl1'" onmouseout="this.className='fl2'"><img class="fl2" src="../img/admin/x3.gif" width="70" height="100" border="0" onmouseover="this.className='fl1'" onmouseout="this.className='fl2'"><img class="fl2" src="../img/admin/x4.gif" width="70" height="100" border="0" onmouseover="this.className='fl1'" onmouseout="this.className='fl2'"><img class="fl2" src="../img/admin/x5.gif" width="70" height="100" border="0" onmouseover="this.className='fl1'" onmouseout="this.className='fl2'"></div>

      <div id="lmidall">
        <div id="lmidlc">
          <div id="lleft">
            <a href="<?php echo HOMEPAGE; ?>"><img src="../img/en/a/travian0.gif" class="logo_plus" width="116" height="60" border="0"></a>

            <!-- 顯示管理青單 -->

            <table id="navi_table" cellspacing="0" cellpadding="0">
              <tr>
                <td class="menu">
                <?php     
                  if($funct->CheckLogin()){?>

                  <!-- 管理員 -->

                	<?php if($_SESSION['access'] == ADMIN){ ?>
                    <a href="#"><b>主要連結</b></a>
                	  <a href="index.php">管理後台</a> 
                	  <a href="<?php echo HOMEPAGE; ?>">首頁</a>
                    <a href="?action=logout">登出</a>
                	  <br />

                    <a href="#"><b>伺服器管理</b></a>
                	  <a href="?p=server_info">伺服器資訊</a>
                    <a href="?p=online">在線玩家</a>
                    <a href="?p=config">伺服器設定</a>
                    <br />

                    <a href="#"><b>遊戲管理</b></a>
                    <a href="?p=ban">封禁</a>
                	  <a href="?p=give">給予金子 / 銀子</a>
                    <br />

                    <a href="#"><b>查詢</b></a>
                    <a href="?p=search">搜尋遊戲</a>
                    <a href="?p=message">搜尋訊息 / 報告</a>
                	  <a href="?p=admin_log"><font color="Red"><b>管理紀錄</font></b></a>

                  <!-- MH 管理員 -->

                	<?php } else if($_SESSION['access'] == MULTIHUNTER){ ?>
                    <a href="#"><b>主要連結</b></a>
                    <a href="index.php">管理後台</a> 
                    <a href="<?php echo HOMEPAGE; ?>">首頁</a>
                    <a href="?action=logout">登出</a>
                    <br />

                    <a href="#"><b>伺服器管理</b></a>
                    <a href="?p=server_info">伺服器資訊</a>
                    <a href="?p=online">在線玩家</a>
                    <a href="?p=config">伺服器設定</a>
                    <br />

                    <a href="#"><b>遊戲管理</b></a>
                    <a href="?p=ban">封禁</a>
                    <br />

                    <a href="#"><b>查詢</b></a>
                    <a href="?p=search">搜尋遊戲</a>
                    <a href="?p=message">搜尋訊息 / 報告</a>
                    <a href="?p=admin_log"><font color="Red"><b>管理紀錄</font></b></a>

                <?php } }?>
                </td>
              </tr>
            </table>
          </div>
          <div id="lmid1">
          <div id="lmid3">

          <?php     
            if($funct->CheckLogin()){            
              if($_POST or $_GET){  
                if($_GET['p'] and $_GET['p']!="search"){
                    $filename = '../Templates/Admin/'.$_GET['p'].'.tpl';
                    if(file_exists($filename)){
                      include($filename);
                    }else{
                      include('../Templates/Admin/404.tpl');
                    }
                }else{
                  include('../Templates/Admin/search.tpl');
                }  
                if($_POST['p'] and $_POST['s']){
                  $filename = '../Templates/Admin/results_'.$_POST['p'].'.tpl';
                    if(file_exists($filename)){
                      include($filename);
                    }else{
                      include('../Templates/Admin/404.tpl');
                    }        
                }
              }else{
                include('../Templates/Admin/home.tpl');  
              }
            }else{           
              include('../Templates/Admin/login.tpl');
            }    
          ?>
        </div>  
      </div>
    </div>

    <div id="lright1"></div>

    <div id="ce"></div>  
  </body>
</html>

