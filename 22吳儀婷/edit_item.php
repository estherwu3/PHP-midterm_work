<?php

  if(!empty($_GET['id'])){
    $item=find("product",$_GET['id']);
  }

?>
<h1>修改產品資料</h1>
<form action="api_item.php?do=edititem" method="post">
<ul class="list">
  <li>
    <div>產品名稱</div>
    <div><input type="text" name="name" value="<?=$item['產品名稱'];?>" style="width:350px"></div>
  </li>
  <li>
    <div>產品代號</div>
    <div><input type="text" name="code" value="<?=$item['產品代號'];?>"></div>
  </li>
  <li>
    <div>單　　價</div>
    <div><input type="text" name="price" value="<?=$item['單價'];?>"></div>
  </li>
  <li>
    <div>成　　本</div>
    <div><input type="text" name="cost" value="<?=$item['成本'];?>"></div>
  </li>
  <li>
    <input type="hidden" name="id" value="<?=$item['id'];?>">
    <input type="submit" value="確認修改">

  </li>
</ul>
</form>