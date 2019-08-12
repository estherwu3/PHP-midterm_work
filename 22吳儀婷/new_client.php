<h1>新增客戶</h1>
<form action="api_client.php?do=newclient" method="post">
<ul class="list">
  <li>
    <div>客戶寶號</div>
    <div><input type="text" name="name" value=""></div>
  </li>
  <li>
    <div>客戶代號</div>
    <div><input type="text" name="code" value=""></div>
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
          foreach($county as $c){
            echo "<option value='".$c."'>".$c."</option>";
          }
        ?>
      </select>
      
    </div>
  </li>
  <li>
    <div>地址</div>
    <div><input type="text" name="addr" value="" style="width:350px"></div>
  </li>
  <li>
    <div>郵遞區號</div>
    <div><input type="text" name="postcode" value=""></div>
  </li>
  <li>
    <div>聯絡人</div>
    <div><input type="text" name="contact" value=""></div>
  </li>
  <li>
    <div>職稱</div>
    <div><input type="text" name="pos" value=""></div>
  </li>

  <li>
    <div>電話</div>
    <div><input type="text" name="tel" value=""></div>
  </li>
  <li>
    <div>行業別</div>
    <div><input type="text" name="industrial" value=""></div>
  </li>
  <li>
    <div>統一編號</div>
    <div><input type="text" name="uncode" value=""></div>
  </li>
  <li>
    <input type="submit" value="確認新增">
  </li>
</ul>
</form>