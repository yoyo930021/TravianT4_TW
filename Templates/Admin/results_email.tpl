<?php 
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       resutls_email.tpl                                           ##
##  Developed by:  Dzoki                                                       ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
##                                                                             ##
#################################################################################
?>
<?php
$result = $admin->search_email($_POST['s']);
?>
<table id="member">
  <thead>
    <tr>
        <th class="dtbl"><a href="">1 «</a></th><th>找到電子郵箱 (<?php echo count($result);?>)</th><th class="dtbl"><a href="">» 100</a></th>
    </tr>
  </thead> 

</table>
<table id="profile">    
    <tr>
        <td class="b">玩家 ID</td>
        <td class="b">名稱</td>
        <td class="b">電子郵箱</td>         
    </tr>
<?php      
if($result){  
for ($i = 0; $i <= count($result)-1; $i++) {    
echo '
    <tr>
        <td>'.$result[$i]["id"].'</td>
        <td><a href="?p=player&uid='.$result[$i]["id"].'">'.$database->getUserField($result[$i]["id"],'username',0).'</a></td>
        <td>'.$result[$i]["email"].'</td>
    </tr>  
'; 
}}
else{  
echo '
    <tr>
        <td colspan="4">查無資料</td>  
    </tr>  
';
}
?>    
  
</table>
