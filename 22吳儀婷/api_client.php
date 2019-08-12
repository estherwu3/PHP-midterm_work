<?php
include_once "base.php";

$do=(!empty($_GET['do']))?$_GET['do']:"";
switch($do){
  case "newclient":
    $sql="insert into customer (
                                `客戶寶號`,
                                `客戶代號`,
                                `縣市`,
                                `地址`,
                                `郵遞區號`,
                                `聯絡人`,
                                `職稱`,
                                `電話`,
                                `行業別`,
                                `統一編號`
                                )
                         values(
                                '".$_POST['name']."',
                                '".$_POST['code']."',
                                '".$_POST['county']."',
                                '".$_POST['addr']."',
                                '".$_POST['postcode']."',
                                '".$_POST['contact']."',
                                '".$_POST['pos']."',
                                '".$_POST['tel']."',
                                '".$_POST['industrial']."',
                                '".$_POST['uncode']."'
                                )";
    echo $sql;                                
    $pdo->exec($sql);
    header("location:index.php?do=admin&ad=client");
  break;
  case "editclient":
    $sql="update customer set
                             `客戶寶號`='".$_POST['name']."',
                             `客戶代號`='".$_POST['code']."',
                             `縣市`='".$_POST['county']."',
                             `地址`='".$_POST['addr']."',
                             `郵遞區號`='".$_POST['postcode']."',
                             `聯絡人`='".$_POST['contact']."',
                             `職稱`='".$_POST['pos']."',
                             `電話`='".$_POST['tel']."',
                             `行業別`='".$_POST['industrial']."',
                             `統一編號`='".$_POST['uncode']."'
                          where
                           id='".$_POST['id']."'";
    echo $sql;                           
    $pdo->exec($sql);
    header("location:index.php?do=admin&ad=client");
  break;
  default:
    header("location:index.php");
    exit();

}

?>