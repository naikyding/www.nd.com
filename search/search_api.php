<?php
  include_once('../php/sql.php'); //PDO & SESSION START

  switch ($_GET['do']) {
    case 'search':
      $num = 0;
      $html = '';
      $keyWord = '%'.$_POST['q'].'%';
      $sql = $db->prepare('SELECT * FROM ( SELECT * FROM MEN UNION SELECT * FROM WOMEN ) as data WHERE ( data.title LIKE ? OR data.details LIKE ? OR data.tag LIKE ? )');
      $sql->execute([$keyWord, $keyWord, $keyWord]);
      foreach($sql->fetchAll() as $row){
        $html .= '
        <div class="col ">
        <a href="../product?s='.$row['tableName'].'&item='.$row['id'].'" class="text-reset text-decoration-none itemCard">
          <img src="../img/'.$row['tableName'].'/'.$row['img1'].'" width="100%" alt="">
          <div class="titleItem ">'.$row['title'].'</div>
          <div class="tagItem text-secondary"><span class="border-bottom">'.$row['tag'].'</span></div>
          <div class="priceItem text-secondary"><span  class="">NT$ </span><span >'.$row['sales_price'].'</span></div>
        </a>
        <div class="colorItem">
        <ul style="padding-inline-start:0" class="d-flex">
          <li><div class="colorSpace mt-2 mr-2"><div class="'.$row['color'].'"></div></div></li>
          <li><div class="colorSpace mt-2 mr-2"><div class="RED"></div></div></li>
          <li><div class="colorSpace mt-2 mr-2"><div class="BLUE"></div></div></li>
        </ul>
        </div>
      </div>
        ';
      $num++;
      }
      $data = 
      [
        'html' => $html,
        'num' => $num,
        'q' => $_POST['q']
      ];
      echo json_encode($data);
    break;
    case 'select':
      ///////////////////////////////////////////////// filter SELECT ///////////////////////
      $html = '';
      $keyWord = '%'.$_POST['q'].'%';
      switch ($_POST['s']) {
        case 'all':
          $sql = $db->prepare('SELECT * FROM ( SELECT * FROM MEN UNION SELECT * FROM WOMEN ) as data WHERE ( data.title LIKE ? OR data.details LIKE ? OR data.tag LIKE ? )');
        break;
        case 'toH':
          $sql = $db->prepare('SELECT * FROM ( SELECT * FROM MEN UNION SELECT * FROM WOMEN ) as data WHERE ( data.title LIKE ? OR data.details LIKE ? OR data.tag LIKE ? )  ORDER BY sales_price ASC ;');
        break;
        case 'toL':
          $sql = $db->prepare('SELECT * FROM ( SELECT * FROM MEN UNION SELECT * FROM WOMEN ) as data WHERE ( data.title LIKE ? OR data.details LIKE ? OR data.tag LIKE ? ) ORDER BY sales_price DESC ;');
        break;
        case 'toA':
          $sql = $db->prepare('SELECT * FROM ( SELECT * FROM MEN UNION SELECT * FROM WOMEN ) as data WHERE ( data.title LIKE ? OR data.details LIKE ? OR data.tag LIKE ? ) ORDER BY title DESC');
        break;
        case 'toZ':
          $sql = $db->prepare('SELECT * FROM ( SELECT * FROM MEN UNION SELECT * FROM WOMEN ) as data WHERE ( data.title LIKE ? OR data.details LIKE ? OR data.tag LIKE ? ) ORDER BY title ASC');
        break;
      }
      $sql->execute([$keyWord, $keyWord, $keyWord]);
      foreach($sql->fetchAll() as $row){
        $html .= '
        <div class="col ">
        <a href="../product?s='.$row['tableName'].'&item='.$row['id'].'" class="text-reset text-decoration-none itemCard">
          <img src="../img/'.$row['tableName'].'/'.$row['img1'].'" width="100%" alt="">
          <div class="titleItem ">'.$row['title'].'</div>
          <div class="tagItem text-secondary"><span class="border-bottom">'.$row['tag'].'</span></div>
          <div class="priceItem text-secondary"><span  class="">NT$ </span><span >'.$row['sales_price'].'</span></div>
        </a>
        <div class="colorItem">
        <ul style="padding-inline-start:0" class="d-flex">
          <li><div class="colorSpace mt-2 mr-2"><div class="'.$row['color'].'"></div></div></li>
          <li><div class="colorSpace mt-2 mr-2"><div class="RED"></div></div></li>
          <li><div class="colorSpace mt-2 mr-2"><div class="BLUE"></div></div></li>
        </ul>
        </div>
      </div>
        ';
      }
      echo $html;
    break;
    
    default:
      # code...
      break;
  }