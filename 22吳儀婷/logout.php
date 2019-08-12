<?php
session_start();

$_SESSION['login']=null;
$_SESSION['user']=null;
unset($_SESSION['login']);
unset($_SESSION['user']);

header("location:index.php");

?>