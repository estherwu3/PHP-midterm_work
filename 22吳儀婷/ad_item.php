<style>

</style>
<button onclick="javascript:location='?do=admin&ad=newitem'">新增產品</button>
<?php

$rows=all("product");

foreach($rows as $item){
  echo "<ul class='list'>";
  echo "<li><div>產品名稱：</div><div>".$item['產品名稱']."</div></li>";
  echo "<li><div>產品代號：</div><div>".$item['產品代號']."</div></li>";
  echo "<li><div>單　　價：</div><div>".$item['單價']."</div></li>";
  echo "<li><div>成　　本：</div><div>".$item['成本']."</div></li>";
  
  echo "<li>";
  ?>
    <button  onclick="javascript:location='?do=admin&ad=edititem&id=<?=$item['id'];?>'">修改資料</button>
    <button  onclick="javascript:location='?do=admin&ad=delitem&id=<?=$item['id'];?>'">刪除資料</button>
  <?php
  echo "</li>";
  echo "</ul>";
}

?>
