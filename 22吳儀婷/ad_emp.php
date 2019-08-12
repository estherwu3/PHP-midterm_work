<button onclick="javascript:location='?do=admin&ad=newemp'">新增員工</button>
<?php

$rows=all("employee");

foreach($rows as $emp){
  echo "<ul class='list'>";
  echo "<li><div>姓名</div><div>".$emp['姓名']."</div></li>";
  echo "<li><div>現任職稱</div><div>".$emp['現任職稱']."</div></li>";
  echo "<li><div>部門代號</div><div>".$emp['部門代號']."</div></li>";
  echo "<li><div>縣市</div><div>".$emp['縣市']."</div></li>";
  echo "<li><div>地址</div><div>".$emp['地址']."</div></li>";
  echo "<li><div>電話</div><div>".$emp['電話']."</div></li>";
  echo "<li><div>郵遞區號</div><div>".$emp['郵遞區號']."</div></li>";
  echo "<li><div>目前月薪資</div><div>".$emp['目前月薪資']."</div></li>";
  echo "<li><div>年假天數</div><div>".$emp['年假天數']."</div></li>";

  echo "<li>";
  ?>
  <button onclick="javascript:location='?do=admin&ad=editemp&id=<?=$emp['id'];?>'">修改資料</button>
  <?php
  echo "</li>";
  echo "</ul>";
}

?>
