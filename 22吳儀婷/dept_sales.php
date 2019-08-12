<style>
.table td{
  padding:3px 10px;
  border:0px;
}
.table tr:nth-child(1){
  text-align:center;
}
.table .sum-sales{
  border-top:2px solid black;
}
.table .sum-dept{
  border-top:3px solid black;
  border-bottom:3px solid black;
}
.sum-sales,.sum-dept,.sum-cur{
  text-align:right;
}
</style>

<?php
  $year=(!empty($_GET['year']))?$_GET['year']:90;

$empSQL="SELECT 
  `dept`.`部門名稱`,
	`employee`.`姓名`
FROM 
    `dept`,
    `employee` 
WHERE 
  `dept`.`部門代號`=`employee`.`部門代號` && 
  `dept`.id BETWEEN 6 AND 9
ORDER BY
  CONVERT(`dept`.`部門名稱` using big5) ASC,
  CONVERT(`employee`.`姓名` using big5) ASC";



$saleSQL="SELECT 
  	`sales2`.`業務姓名`,
    `customer`.`客戶寶號`,
    `customer`.`聯絡人`,
    sum(`sales2`.`數量`*`product`.`單價`) AS `總額` 
FROM 
	`customer`,
    `sales2`,
    `product`
WHERE 
	`customer`.`客戶代號`=`sales2`.`客戶代號` && 
    `sales2`.`產品代號`=`product`.`產品代號` && 
    `sales2`.`交易年`='$year'
GROUP BY
    `customer`.`客戶代號`";

$emps=$pdo->query($empSQL)->fetchAll(PDO::FETCH_ASSOC);
$sale=$pdo->query($saleSQL)->fetchAll(PDO::FETCH_ASSOC);

$name=[];
foreach($sale as $s){
  $name[$s['業務姓名']][]=$s;
}
foreach($emps as $k => $e){
  if(!empty($name[$e['姓名']])){
     $emps[$k]['客戶']=$name[$e['姓名']];
  }else{
    unset($emps[$k]);
  }

}
$dept=[];
foreach($emps as $k => $e){
  $dept[$e['部門名稱']][]=$e;
}


?>
<ul class="btn">
  <li><a href="?do=content&repo=sales&year=89" class="<?=($year==89)?'active':'';?>">89年</a></li>
  <li><a href="?do=content&repo=sales&year=90" class="<?=($year==90)?'active':'';?>">90年</a></li>
</ul>
<table class="table">
  <tr>
    <td>部門名稱</td>
    <td>業務姓名</td>
    <td>客戶寶號</td>
    <td>聯絡人</td>
    <td>總額</td>
  </tr>
<?php 


 $sumAll=0;
  foreach($dept as $key => $dep){
    echo "<tr><td colspan='5' class='tal'>".$key."</td></tr>";
    $sumDept=0;
    foreach($dep as $emp){
      echo "<tr><td>&nbsp;</td><td class='tal'>".$emp['姓名']."</td>";
      $sumSales=0;
      foreach($emp['客戶'] as $cs){
        echo "<td>".$cs['客戶寶號']."</td>";
        echo "<td>".$cs['聯絡人']."</td>";
        echo "<td class='sum-cur'>".$cs['總額']."</td></tr>";
        echo "<tr><td>&nbsp;</td><td>&nbsp;</td>";
        $sumSales+=$cs['總額'];
      }
      echo "<td colspan='2'></td>";
      echo "<td class='sum-sales'>".$sumSales."</td></tr>";
      echo "<tr><td colspan='5'>&nbsp;</td></tr>";
      $sumDept+=$sumSales;
    }
    echo "<tr class='sum-dept'>";
    echo "<td>部門加總</td>";
    echo "<td colspan='4'>".$sumDept."</td>";
    echo "</tr>";
    $sumAll+=$sumDept;
  } 
?>
<tr><td colspan="5">&nbsp;</td></tr>
<tr><td colspan="5">&nbsp;</td></tr>
<tr>
  <td>銷售總額</td>
  <td colspan="4"><?=$sumAll;?></td>
</tr>
</table>