<?php
  // session_start();

  // $db = new PDO('mysql:host=localhost;dbname=s1080417;charset=utf8','root','');
  include_once('../php/sql.php'); //PDO & SESSION START

  switch ($_GET['do']) {
    case 'selectSize':
      // print_r($_GET);
      $rows = $db->query('SELECT '.$_GET['size'].'num FROM '.$_GET['table'].' WHERE id = '.$_GET['id'].'');
      foreach($rows->fetchAll() as $row){
        echo $row[0];
      }
    break;
    case 'addToBag':
      // print_r($_POST);
      if(empty($_POST['list'])){
        echo false;
      }else{
        $content = '';
        $totalNum = 0;
        $totalPrice = 0;
        $listNum = 0;
        function cartArea($id, $table, $num, $size, $color){
          global $db;
          $sql = $db->query('SELECT * FROM '.$table.' WHERE id='.$id.' ');
          foreach($sql->fetchAll() as $row){
            global $content, $totalPrice, $totalNum, $listNum;
            $totalPrice = $totalPrice + ($row['sales_price'])*$num;
            $totalNum = $totalNum + $num;
            $content .= '
            <div class="cartProduct row mt-3 ">
              <div class="col-4 ">
                <img class="cartListImg" src="../img/'.$table.'/'.$row['img1'].'" style="width:100%" alt="'.$row['title'].'">
              </div>
              <div class="col-8 position-relative">
                <div class="del position-absolute " style="right:.7em; top:-.8em">
                  <a class="btn  ListItemDelBtn" alt="'.$listNum.'"></a>
                </div>
                <ul style="padding-inline-start: 0px;font-size:13px">
                  <li class=""  style="color:#333;"><b>'.$row['title'].'</b></li>
                  <li style="color:#555">COLOR: <span style="color:#888">'.$color.'</span></li>
                  <li style="color:#555">SIZE: <span style="color:#888">'.$size.'</span></li>
                  <li style="color:#555">QTY: <span style="color:#888">'.$num.'</span></li>
                  <li class=""><div class="text-right ml-auto productPrice"><span style="font-size:1rem">NT$ '.($row['sales_price'])*$num.'</span></div></li>
                </ul>
              </div>
            </div>
            <hr class="my-0">
            ';
            $listNum ++;
          }
        }
        foreach($_POST['list'] as $key => $val){
          // cartArea($id, $table, $num, $size, $color);
          cartArea(
            $_POST['list'][$key]['id'],
            $_POST['list'][$key]['table'],
            $_POST['list'][$key]['carNum'],
            $_POST['list'][$key]['size'],
            $_POST['list'][$key]['cartColor']
          );
        }
        $html = '
          <div class="cartListItem" style="overflow:scroll">
            '.$content.'
          </div>
          <hr class="m-0">
          <div class="productTotal mt-3">
            <div class="txt d-flex">
              <span style="font-size:1rem"><b>SUBTOTAL　</b></span><span class="text-dark mr-1" style="font-size:1rem;">'.$totalNum.'</span><span style="line-height:25px; font-size: 12px">ITEM</span><span class="ml-auto" style="color:#f00;font-size:1rem"><b>NT$ '.$totalPrice.'</b></span>
            </div>
            <input class="btn w-100 cartBtn my-2" type="button" value="CHECKOUT">
          </div>
        ';
        $res = 
          [
            'html' => $html,
            'num' => $totalNum
          ];
        echo $res = json_encode($res);
      }
    break;
    case 'login':
      $query = $db->query('SELECT * FROM customer WHERE 1 ;');
      foreach($query->fetchAll() as $row){
        if($row['acc'] == $_POST['acc'] && $row['psw'] == $_POST['psw']){
          echo $row['acc'];
        }else{
          $sql = $db->prepare('SELECT * FROM admin WHERE acc=? AND psw=?');
          $sql->execute([$_POST['acc'], $_POST['psw']]);
          foreach($sql->fetchAll() as $row){
            if(isset($row['acc'])){
              $res = 
                    [
                      'url' => 'NDAdmin',
                      'user' => 'admin'
                    ];
              echo $res = json_encode($res);
            }else{
              echo false;
            }
          }
        }
      }
      break;
      case 'check':
        $sql = $db->prepare('SELECT * FROM customer WHERE acc=? ;');
        $sql->execute([$_POST['val']]); 
        $result = $sql->fetchAll();
        if($result == null){
          $sql = $db->prepare('SELECT * FROM admin WHERE acc=? ;');
          $sql->execute([$_POST['val']]); 
          if(!empty($sql->fetchAll())){
            echo true;
          }else{
            echo false;
          }
        }
        else echo true;
      break;
      case 'couponFormEv':
        $sql = $db->prepare('INSERT INTO eventMail (id, state, mail, date) VALUES (NULL, 0, ?, NOW()) ;');
        echo $sql->execute([$_POST['eventMail']]);
      break;
      case 'setListToSession':
        $_SESSION['customer'][$_POST['user']] = 
        [
          'cartList' => $_POST['cartList'],
          'cartListItemNum' => $_POST['cartListItemNum']
        ];
      break;
      
      case 'getListFromSession':
        if(!empty($_SESSION['customer'][$_POST['user']])){
          echo json_encode($_SESSION['customer'][$_POST['user']]);
        }else{
          echo false;
        }
      break;
      case 'delSession':
        unset($_SESSION['customer'][$_POST['userName']]);
      break;
    default:
      # code...
      break;
  }