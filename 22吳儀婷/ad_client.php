<button onclick="javascript:location='?do=admin&ad=newclient'">新增客戶</button>
<?php

$rows=all("customer");

foreach($rows as $cus){
  echo "<ul class='list'>";
  echo "<li><div>客戶寶號</div><div>".$cus['客戶寶號']."</div></li>";
  echo "<li><div>客戶代號</div><div>".$cus['客戶代號']."</div></li>";
  echo "<li><div>縣市</div><div>".$cus['縣市']."</div></li>";
  echo "<li><div>地址</div><div>".$cus['地址']."</div></li>";
  echo "<li><div>郵遞區號</div><div>".$cus['郵遞區號']."</div></li>";
  echo "<li><div>聯絡人</div><div>".$cus['聯絡人']."</div></li>";
  echo "<li><div>職稱</div><div>".$cus['職稱']."</div></li>";
  echo "<li><div>電話</div><div>".$cus['電話']."</div></li>";
  echo "<li><div>行業別</div><div>".$cus['行業別']."</div></li>";
  echo "<li><div>統一編號</div><div>".$cus['統一編號']."</div></li>";
  
  echo "<li>";
  ?>
  <button  onclick="javascript:location='?do=admin&ad=editclient&id=<?=$cus['id'];?>'">修改資料</button>
  <?php
  echo "</li>";
  echo "</ul>";
}

?>
