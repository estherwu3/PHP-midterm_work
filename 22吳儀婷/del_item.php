<?php
  if(!empty($_GET['id'])){
    $item=find("product",$_GET['id']);
  }
?>
<h1>確認要刪除以下這筆資料嗎？</h1>
<ul class='list'>
  <li>
    <div>產品名稱：</div>
    <div><?=$item['產品名稱'];?></div>
  </li>
  <li>
    <div>產品代號：</div>
    <div><?=$item['產品代號'];?></div>
  </li>
  <li>
    <div>單　　價：</div>
    <div><?=$item['單價'];?></div>
  </li>
  <li>
    <div>成　　本：</div>
    <div><?=$item['成本'];?></div>
  </li>
  <li>
    <button onclick="javascript:location='api_item.php?do=delitem&id=<?=$item['id'];?>'">確認刪除</button>
  </li>
</ul>