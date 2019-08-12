
<?php
  $year=(!empty($_GET['year']))?$_GET['year']:90;

  $salesSQL="SELECT 
	`sales2`.`業務姓名`,
    `customer`.`客戶寶號`,
    `sales2`.`數量`,
    `product`.`單價`,
    (`sales2`.`數量`*`product`.`單價`) AS `總額` 
FROM 
	`customer`,
    `sales2`,
    `product` 
WHERE 
	`customer`.`客戶代號`=`sales2`.`客戶代號` && 
    `sales2`.`產品代號`=`product`.`產品代號` && 
    (`sales2`.`數量`*`product`.`單價`)>=10000000 &&
    `sales2`.`交易年`='$year'

ORDER BY
	`總額` DESC,
    `product`.`單價` DESC,
    `sales2`.`數量` DESC,
    CONVERT(`sales2`.`業務姓名` using big5) ASC";

$sales=$pdo->query($salesSQL)->fetchAll();
?>
<ul class="btn">
  <li><a href="?do=content&repo=items&year=89" class="<?=($year==89)?'active':'';?>">89年</a></li>
  <li><a href="?do=content&repo=items&year=90" class="<?=($year==90)?'active':'';?>">90年</a></li>
</ul>
<table class="table">
  <tr>
    <td>業務姓名</td>
    <td>客戶寶號</td>
    <td>數量</td>
    <td>單價</td>
    <td>總額</td>
  </tr>
<?php 
  foreach($sales as $emp){
    echo "<tr>";
    echo "  <td>".$emp['業務姓名']."</td>";
    echo "  <td>".$emp['客戶寶號']."</td>";
    echo "  <td>".$emp['數量']."</td>";
    echo "  <td>".$emp['單價']."</td>";
    echo "  <td>".$emp['總額']."</td>";
    echo "</tr>";
  }
?>

</table>