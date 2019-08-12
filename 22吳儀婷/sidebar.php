<!---左側選單欄--->
<?php
switch($do){
  case "login":
  case "reg":
  case "member":
  case "content":
?>
<div id="sidebar">
      <ul class="menu">
      <!-- <a href="index.php?do=content&repo=items">年度業務狀況</a>
      <a href="index.php?do=content&repo=sales">業務部銷售狀況</a>
      <a href="index.php?do=content&repo=season">年度品項銷售狀況</a> -->
      <li><a href="index.php?do=content&repo=items">年度業務狀況</a></li>

      <li><a href="index.php?do=content&repo=sales">業務部銷售狀況</a></li>
      <li><a href="index.php?do=content&repo=season">年度品項銷售狀況</a></li>
 
    </ul>
  </div>
<?php
  break;
  case "admin":
  ?>
<div id="sidebar">
      <ul class="menu">
       <li><a href="index.php?do=admin&ad=items">產品管理</a></li>
      <li><a href="index.php?do=admin&ad=emp">員工管理</a></li>
      <li><a href="index.php?do=admin&ad=client">客戶管理</a></li>
 
    </ul>
  </div>
  <?php
  break;
}
?>


<?php

?>