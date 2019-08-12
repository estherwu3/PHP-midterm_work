<?php

//引入基本程式碼片段，可能包含常用的變數，設定，或自訂函式
include_once "base.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>強強滾電子股份有限公司</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    //判斷是否有GET 變數 do 存在並設定$do的值
    if(!empty($_GET['do'])){
      $do=$_GET['do'];
    }else{
      $do="content";  //如果沒有$_GET值時，$do以空字串來代替
    }

?>
<div class="wrap">
  <div id="header">
    <!--插入導覽列檔案-->
    <div id="banner"></div>
    <?php include_once "header.php" ;?>
  </div>
    <!--插入左側選單檔案-->
    <?php include "sidebar.php" ;?>
  <div id="content">
  <?php
    //利用$do的值來決定在主區塊要插入那個檔案的內容
    switch($do){
      case "login":
        include "login.php";
      break;
      case "reg":
        include "reg.php";
      break;
      case "member":
        include "member.php";
      break;
      case "admin":
        include "admin.php";
      break;
      case "content":
        include "content.php";
      break;  
      default:

      break;
    }

    ?>
  </div>
  <!--插入頁腳檔案-->
  <?php include "footer.php" ;?>
</div>  
</body>
</html>