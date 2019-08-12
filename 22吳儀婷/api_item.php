<?php
include_once "base.php";

$do=(!empty($_GET['do']))?$_GET['do']:"";
switch($do){
  case "newitem":
    $sql="insert into product (
                                `產品名稱`,
                                `產品代號`,
                                `單價`,
                                `成本`
                                )
                         values(
                                '".$_POST['name']."',
                                '".$_POST['code']."',
                                '".$_POST['price']."',
                                '".$_POST['cost']."'
                                )";
    echo $sql;                                
    $pdo->exec($sql);
    header("location:index.php?do=admin&ad=items");
  break;
  case "edititem":
    $sql="update product set
                             `產品名稱`='".$_POST['name']."',
                             `產品代號`='".$_POST['code']."',
                             `單價`='".$_POST['price']."',
                             `成本`='".$_POST['cost']."'
                          where
                           id='".$_POST['id']."'";
    echo $sql;                           
    $pdo->exec($sql);
    header("location:index.php?do=admin&ad=items");
  break;
  case "delitem":
    $id=$_GET['id'];
    $sql="delete from product where id='$id'";
    $pdo->exec($sql);
    header("location:index.php?do=admin&ad=items");
  break;
  default:
    header("location:index.php");
    exit();

}

?>