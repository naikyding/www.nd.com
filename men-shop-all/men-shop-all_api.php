<?php
  include_once('../php/sql.php'); //PDO & SESSION START


  switch ($_GET['do']) {
    case 'select':
      ///////////////////////////////////////////////// IF SELECT ALL ///////////////////////
      if($_POST['sortBy'] == 'all'){
        $rows = $db->query('SELECT * FROM '.$_POST['table'].' WHERE 1 ;');
      }
      else if($_POST['sortBy'] == 'toH'){
        $rows = $db->query('SELECT * FROM '.$_POST['table'].' ORDER BY sales_price ASC ;');
      }
      else if($_POST['sortBy'] == 'toL'){
        $rows = $db->query('SELECT * FROM '.$_POST['table'].' ORDER BY sales_price DESC ;');
      }
      else if($_POST['sortBy'] == 'toA'){
        $rows = $db->query('SELECT * FROM '.$_POST['table'].' ORDER BY title DESC');
      }
      else if($_POST['sortBy'] == 'toZ'){
        $rows = $db->query('SELECT * FROM '.$_POST['table'].' ORDER BY title ASC');
      }
      foreach($rows->fetchAll() as $row){
  ?>
          <div class="col ">
            <a href="../product?s=<?=$_POST['table']?>&item=<?=$row['id']?>" class="text-reset text-decoration-none itemCard">
              <img src="../img/<?=$_POST['table']?>/<?=$row['img1']?>" width="100%" alt="">
              <div class="titleItem "><?=$row['title']?></div>
              <div class="tagItem text-secondary"><span class="border-bottom"><?=$row['tag']?></span></div>
              <div class="priceItem text-secondary"><span  class="">NT$ </span><span ><?=$row['sales_price']?></span></div>
            </a>
            <div class="colorItem">
            <ul style="padding-inline-start:0" class="d-flex">
              <li><div class="colorSpace mt-2 mr-2"><div class="<?=$row['color']?>"></div></div></li>
              <li><div class="colorSpace mt-2 mr-2"><div class="RED"></div></div></li>
              <li><div class="colorSpace mt-2 mr-2"><div class="BLUE"></div></div></li>
            </ul>
            </div>
          </div>
  <?php
        }
      
      
    break;
    
    default:
      # code...
      break;
  }