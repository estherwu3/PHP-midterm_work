<style>
.table td{
  padding:3px 3px;
  text-align:right;
}
.table td:nth-child(1){
  text-align:left;
}
</style>
<?php
$year=(!empty($_GET['year']))?$_GET['year']:90;
  $salesSQL="SELECT
                `product`.`產品名稱`,
                FLOOR((`sales2`.`交易月`-1)/3)+1 AS '季',
                sum(`sales2`.`數量`) AS '數量',
                SUM(`sales2`.`數量`*`product`.`單價`) AS '銷售額'
              FROM
                `sales2`,
                `product`
              WHERE 
                `sales2`.`產品代號`=`product`.`產品代號` && 
                `sales2`.`交易年`='$year'
              GROUP BY
                `sales2`.`產品代號`,
                FLOOR((`sales2`.`交易月`-1)/3)+1
              ORDER BY
                CONVERT(`product`.`產品名稱` using big5) ASC , 
                FLOOR((`sales2`.`交易月`-1)/3)+1
              ";

  $sales=$pdo->query($salesSQL)->fetchAll();
  $pro=[];
  $sumAll=0;
  foreach($sales as $key => $s){
    if(!empty($pro[$s['產品名稱']]["銷售額"])){
      $pro[$s['產品名稱']]["銷售額"]+=$s['銷售額'];
    }else{
      $pro[$s['產品名稱']]["銷售額"]=$s['銷售額'];
    }
    $pro[$s['產品名稱']][$s['季']]=$s['數量'];
    $sumAll+=$s['銷售額'];
  }

  foreach($pro as $key => $p){
    $sumQ=0;
    $p['銷售百分比']=round($p['銷售額']/$sumAll,4)*100 . "%";
    for($i=1;$i<=4;$i++){
      if(!empty($p[$i])){
        $sumQ+=$p[$i];
      }else{
        $p[$i]=0;
      }
    }
    $p['平均數量']= round($sumQ/4,2);
    $pro[$key]=$p;
  }
  
?>
<ul class="btn">
  <li><a href="?do=content&repo=season&year=89" class="<?=($year==89)?'active':'';?>">89年</a></li>
  <li><a href="?do=content&repo=season&year=90" class="<?=($year==90)?'active':'';?>">90年</a></li>
</ul>

<table class="table">
  <tr>
    <td>產品名稱</td>
    <td>第一季</td>
    <td>第二季</td>
    <td>第三季</td>
    <td>第四季</td>
    <td>平均數量</td>
    <td>銷售額</td>
    <td>銷售百分比</td>
  </tr>
  <?php
  foreach($pro as $key => $p){
   echo "<tr>";
   echo "  <td>".trim($key)."</td>";
   echo "  <td>".number_format($p['1'],0,'.',',')."</td>";
   echo "  <td>".number_format($p['2'],0,'.',',')."</td>";
   echo "  <td>".number_format($p['3'],0,'.',',')."</td>";
   echo "  <td>".number_format($p['4'],0,'.',',')."</td>";
   echo "  <td>".number_format($p['平均數量'],2,'.',',')."</td>";
   echo "  <td>".number_format($p['銷售額'],0,'.',',')."</td>";
   echo "  <td>".$p['銷售百分比']."</td>";
   echo "</tr>";
  }
  ?>

</table>