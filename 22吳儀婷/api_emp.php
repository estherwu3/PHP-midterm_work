<?php
include_once "base.php";

$do=(!empty($_GET['do']))?$_GET['do']:"";
switch($do){
  case "newemp":
    $sql="insert into employee (
                                `姓名`,
                                `現任職稱`,
                                `部門代號`,
                                `縣市`,
                                `地址`,
                                `電話`,
                                `郵遞區號`,
                                `目前月薪資`,
                                `年假天數`
                                )
                         values(
                                '".$_POST['name']."',
                                '".$_POST['pos']."',
                                '".$_POST['deptcode']."',
                                '".$_POST['county']."',
                                '".$_POST['addr']."',
                                '".$_POST['tel']."',
                                '".$_POST['postcode']."',
                                '".$_POST['salary']."',
                                '".$_POST['leave']."'
                                )";
    echo $sql;                                
    $pdo->exec($sql);
    header("location:index.php?do=admin&ad=emp");
  break;
  case "editemp":
    $sql="update employee set
                             `姓名`='".$_POST['name']."',
                             `現任職稱`='".$_POST['pos']."',
                             `部門代號`='".$_POST['deptcode']."',
                             `縣市`='".$_POST['county']."',
                             `地址`='".$_POST['addr']."',
                             `電話`='".$_POST['tel']."',
                             `郵遞區號`='".$_POST['postcode']."',
                             `目前月薪資`='".$_POST['salary']."',
                             `年假天數`='".$_POST['leave']."'
                          where
                            id='".$_POST['id']."'";
    echo $sql;                           
    $pdo->exec($sql);
    header("location:index.php?do=admin&ad=emp");
  break;
  default:
    header("location:index.php");
    exit();

}

?>