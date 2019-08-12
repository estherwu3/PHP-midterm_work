<style>
.table td{
  padding:3px 10px;
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
部門銷售狀況
<?php
  $salesSQL="SELECT 
  `dept`.`部門名稱`,
	`sales2`.`業務姓名`,
    `customer`.`客戶寶號`,
    `customer`.`聯絡人`,
    sum(`sales2`.`數量`*`product`.`單價`) AS `總額` 
FROM 
	`customer`,
    `sales2`,
    `product`,
    `dept`,
    `employee` 
WHERE 
  `dept`.`部門代號`=`employee`.`部門代號` && 
  `employee`.`姓名`=`sales2`.`業務姓名` &&
	`customer`.`客戶代號`=`sales2`.`客戶代號` && 
    `sales2`.`產品代號`=`product`.`產品代號` && 
    `sales2`.`交易年`='90'
GROUP BY
    `customer`.`客戶代號`,
    `sales2`.`業務姓名`
ORDER BY
  CONVERT(`dept`.`部門名稱` using big5) ASC,
    CONVERT(`sales2`.`業務姓名` using big5) ASC,
	`總額` DESC";


$sales=$pdo->query($salesSQL)->fetchAll();
$dept=[];
foreach($sales as $key => $cus){
  $dept[$cus['部門名稱']][$cus['業務姓名']][]=
    [
      '客戶寶號'=>$cus['客戶寶號'],
      '聯絡人'=>$cus['聯絡人'],
      '總額'=>$cus['總額']
    ];
}

?>
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
    foreach($dep as $ek => $emp){
      echo "<tr><td>&nbsp;</td><td class='tal'>".$ek."</td>";
      $sumSales=0;
      foreach($emp as $ck => $cs){
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