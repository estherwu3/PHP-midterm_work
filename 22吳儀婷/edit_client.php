<?php

  if(!empty($_GET['id'])){
    $cus=find("customer",$_GET['id']);
  }

?>
<h1>修改客戶資料</h1>
<form action="api_client.php?do=editclient" method="post">
<ul class="list">
  <li>
    <div>客戶寶號</div>
    <div><input type="text" name="name" value="<?=$cus['客戶寶號'];?>"></div>
  </li>
  <li>
    <div>客戶代號</div>
    <div><input type="text" name="code" value="<?=$cus['客戶代號'];?>"></div>
  </li>
  <li>
    <div>縣市</div>
    <div>
      <select name="county">
        <?php
          $county=[
            '台北市',
            '台北縣',
            '基隆市',
            '宜蘭縣',
            '桃園縣',
            '新竹市',
            '新竹縣',
            '苗栗縣',
            '台中市',
            '台中縣',
            '彰化縣',
            '南投縣',
            '嘉義市',
            '嘉義縣',
            '雲林縣',
            '台南市',
            '台南縣',
            '高雄市',
            '高雄縣',
            '澎湖縣',
            '屏東縣',
            '台東縣',
            '花蓮縣',
            '金門縣',
            '連江縣',
            '南海諸島'
          ];
          foreach($cus as $c){
            $selected=($c==$cus['縣市'])?"selected":"";
            echo "<option value='".$c."' $selected>".$c."</option>";
          }
        ?>
      </select>
      
    </div>
  </li>
  <li>
    <div>地址</div>
    <div><input type="text" name="addr" value="<?=$cus['地址'];?>" style="width:350px"></div>
  </li>
  <li>
    <div>郵遞區號</div>
    <div><input type="text" name="postcode" value="<?=$cus['郵遞區號'];?>"></div>
  </li>
  <li>
    <div>聯絡人</div>
    <div><input type="text" name="contact" value="<?=$cus['聯絡人'];?>"></div>
  </li>
  <li>
    <div>職稱</div>
    <div><input type="text" name="pos" value="<?=$cus['職稱'];?>"></div>
  </li>

  <li>
    <div>電話</div>
    <div><input type="text" name="tel" value="<?=$cus['電話'];?>"></div>
  </li>
  <li>
    <div>行業別</div>
    <div><input type="text" name="industrial" value="<?=$cus['行業別'];?>"></div>
  </li>
  <li>
    <div>統一編號</div>
    <div><input type="text" name="uncode" value="<?=$cus['統一編號'];?>"></div>
  </li>
  <li>
    <input type="hidden" name="id" value="<?=$cus['id'];?>">
    <input type="submit" value="確認修改">

  </li>
</ul>
</form>