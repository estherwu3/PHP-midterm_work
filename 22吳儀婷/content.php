<?php

if(!empty($_GET['repo'])){
  switch($_GET['repo']){
    case "items":
      include "item_sales.php";
    break;
    case "sales":
      include "dept_sales.php";
    break;
    case "season":
      include "season_sales.php";
    break;
  }
}else{
?>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem architecto accusantium perspiciatis consequuntur in vitae placeat quod unde, facilis doloribus aspernatur iusto! Pariatur, officiis aperiam natus quos eligendi quibusdam accusantium.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem architecto accusantium perspiciatis consequuntur in vitae placeat quod unde, facilis doloribus aspernatur iusto! Pariatur, officiis aperiam natus quos eligendi quibusdam accusantium.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem architecto accusantium perspiciatis consequuntur in vitae placeat quod unde, facilis doloribus aspernatur iusto! Pariatur, officiis aperiam natus quos eligendi quibusdam accusantium.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem architecto accusantium perspiciatis consequuntur in vitae placeat quod unde, facilis doloribus aspernatur iusto! Pariatur, officiis aperiam natus quos eligendi quibusdam accusantium.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem architecto accusantium perspiciatis consequuntur in vitae placeat quod unde, facilis doloribus aspernatur iusto! Pariatur, officiis aperiam natus quos eligendi quibusdam accusantium.



<?php
}
?>