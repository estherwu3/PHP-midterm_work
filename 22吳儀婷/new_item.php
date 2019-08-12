<h1>新增產品</h1>
<form action="api_item.php?do=newitem" method="post">
<ul class="list">
  <li>
    <div>產品名稱</div>
    <div><input type="text" name="name" value=""  style="width:350px"></div>
  </li>
  <li>
    <div>產品代號</div>
    <div><input type="text" name="code" value=""></div>
  </li>
  <li>
    <div>單　　價</div>
    <div><input type="text" name="price" value=""></div>
  </li>
  <li>
    <div>成　　本</div>
    <div><input type="text" name="cost" value=""></div>
  </li>
  <li>
    <input type="submit" value="確認新增">

  </li>
</ul>
</form>