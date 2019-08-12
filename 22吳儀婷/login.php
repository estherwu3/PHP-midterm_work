<?php
  include_once "base.php";

if(!empty($_POST)){  //判斷是否有POST的值傳入

    $acc=$_POST['acc'];
    $pw=$_POST['pw'];

    //檢查欄位是否有輸入
    if($acc=="" || $pw==""){
      
      echo "請輸入帳號或密碼，不可空白";

    }else{
        //建立查詢帳號密碼的語法
        $sql="select count(*) from user where acc='" . $_POST['acc'] . "' && pw='".$_POST['pw']."'";
      
        //取得查詢結果的筆數
        $user=$pdo->query($sql)->fetchColumn();

        if($user){ //判斷帳號密碼是否正確
          $_SESSION['login']=true;
          $_SESSION['user']=$_POST['acc'];

          
          if($acc=='admin'){
            
            header("location:index.php?do=admin"); //帳密符符合的話導向MEMEBER.PHP頁面,並帶入成功的訊息

          }else{

            header("location:index.php?do=admin"); //帳密符符合的話導向MEMEBER.PHP頁面,並帶入成功的訊息
          }
        }else{
          echo "帳號或密碼錯誤，請重新登入";
        }
    }

  
}

?>


  <?php 
if(empty($_SESSION['login'])){ //判斷是否有狀態值或GET值
?>

<h1 style="width:100%">會員登入</h1>
<form action="index.php?do=login" method="post">
<table class="login">
  <tr>
    <td>帳號:</td>
    <td><input type="text" name="acc" value=""></td>
  </tr>
  <tr>
    <td>密碼:</td>
    <td><input type="password" name="pw" value=""></td>
  </tr>
  <tr>
    <td><input type="submit" value="確認"></td>
    <td><input type="reset" value="清除"></td>
  </tr>
</table>
</form>
<?php 
}else{
  echo "你已登入過<br>";
  echo "<a href='index.php?do=member'>回到會員中心</a>";
}
?>
  
