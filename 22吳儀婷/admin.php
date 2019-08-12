<?php

$do=(!empty($_GET['ad']))?$_GET['ad']:"items";
switch($do){
  case "items":
    include "ad_item.php";
  break;
  case "newitem":
    include "new_item.php";
  break;
  case "edititem":
    include "edit_item.php";
  break;
  case "emp":
    include "ad_emp.php";
  break;
  case "newemp":
    include "new_emp.php";
  break;
  case "editemp":
    include "edit_emp.php";
  break;
  case "client":
    include "ad_client.php";
  break;
  case "newclient":
    include "new_client.php";
  break;
  case "editclient":
    include "edit_client.php";
  break;
  case "delitem":
    include "del_item.php";
  break;
}

?>