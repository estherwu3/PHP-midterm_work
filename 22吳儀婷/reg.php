<?php
  include_once "base.php";

  //檢查是否有透過POST傳遞過來的值
  if(!empty($_POST)){

    //將POST過的值存入相應的變數
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $name=$_POST['name'];



  /*********************檢查帳號************************************* */
    $accErr=chkform(['space','length','sym'],$acc);

  /*********************檢查密碼************************************* */
    $pwErr=chkform(['space','length','num','eng','sym'],$pw);

  /*********************檢查名稱************************************* */
    $nameErr=chkform(['space','sym'],$name);


  /*******檢查帳號是否已存在 */

  $sql="select acc from user where acc='$acc'";
  $chkAcc=$pdo->query($sql)->fetch();
  if($chkAcc){
    $chkAccount=true;
    echo "帳號重覆";
  }else{
    $chkAccount=false;
  }

  if($accErr=="" && $pwErr=="" && $nameErr=="" && $chkAccount==false){
    $pr=serialize([1,2]);
     //建立新增資料的語法
     $sql="insert into user (`acc`,`pw`,`name`,`pr`) values('$acc','$pw','$name','$pr')";
    
     //送出新增語法
     $res=$pdo->query($sql);
       if($res){
         echo "新增成功";
       }else{
         echo "新增異常";
       }
    }
}
?>

<h1 style="width:100%">註冊會員</h1>
  <form action="index.php?do=reg" method="post">
  <table class="reg">
    <tr>
      <td>帳號</td>
      <td>
        <input type="text" name="acc" id="acc">
        <p class="errmeg">
        <?php
          if(!empty($accErr)){
            echo $accErr;
          }
        ?>
        </p>

      </td>
    </tr>
    <tr>
      <td>密碼</td>
      <td><input type="password" name="pw" id="pw">
      <p class="errmeg">
        <?php
          if(!empty($pwErr)){
            echo $pwErr;
          }
        ?>
        </p>
        </td>      
    </tr>
    <tr>
      <td>本名

      </td>
      <td>
        <input type="text" name="name" id="name">
        <p class="errmeg">
          <?php
            if(!empty($nameErr)){
              echo $nameErr;
            }
          ?>
          </p>
      </td>
    </tr>
    <tr>
      <td><input type="submit" value="新增"></td>
      <td><input type="reset" value="重置"></td>
    </tr>
  </table>
</form>

