<h1>新增員工</h1>
<form action="api_emp.php?do=newemp" method="post">
<ul class="list">
  <li>
    <div>姓名</div>
    <div><input type="text" name="name" value=""></div>
  </li>
  <li>
    <div>現任職稱</div>
    <div>
      <select name="pos">
        <?php
          $sql="SELECT `現任職稱` FROM `employee` group by `現任職稱`";
          $pos=$pdo->query($sql)->fetchAll();
          foreach($pos as $p){
            echo "<option value='".$p['現任職稱']."'>".$p['現任職稱']."</option>";
          }
        ?>
      </select>

    </div>
  </li>
  <li>
    <div>部門代號</div>
    <div>
      <select name="deptcode">
        <?php
          $sql="SELECT `部門名稱`,`部門代號` FROM `dept`";
          $dept=$pdo->query($sql)->fetchAll();
          foreach($dept as $d){
            echo "<option value='".$d['部門代號']."'>".$d['部門名稱']."</option>";
          }
        ?>
      </select>
    </div>
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
    <div><input type="text" name="addr" value=""></div>
  </li>
  <li>
    <div>電話</div>
    <div><input type="text" name="tel" value=""></div>
  </li>
  <li>
    <div>郵遞區號</div>
    <div><input type="text" name="postcode" value=""></div>
  </li>
  <li>
    <div>目前月薪資</div>
    <div><input type="text" name="salary" value=""></div>
  </li>
  <li>
    <div>年假天數</div>
    <div>
      <select name="leave">
        <option value="7">7天</option>
        <option value="14">14天</option>
      </select>
    </div>  
  </li>
  <li>
    <input type="submit" value="確認新增">

  </li>
</ul>
<form>