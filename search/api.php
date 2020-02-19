<?php
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
        $totalNum = 0;
        $totalPrice = 0;
        $listNum = 0;
        $cartListTable;
        function cartArea($id, $table, $num, $size, $color){
          global $db;
          $sql = $db->query('SELECT * FROM '.$table.' WHERE id='.$id.' ');
          foreach($sql->fetchAll() as $row){
            global $content, $totalPrice, $totalNum, $listNum, $cartListTable;
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

            $cartListTable .= 
            '
              <tr>
                <td><a href="../product/?s='.$table.'&item='.$id.'" class="d-block"><img src="../img/'.$table.'/'.$row['img1'].'"  alt="'.$row['title'].'"></a></td>
                <td>
                  <p>'.$row['title'].'</p>
                  <p>SIZE : <span style="color:#888">'.$size.'</span></p>
                </td>
                <td>
                  <div style="font-size: 0px" class="d-flex">
                    <div href="" class="less" alt="'.$listNum.'"></div>
                    <input type="text" class="buyNum align-middle" value='.$num.' style="font-size: 1rem">
                    <div href="" class="plus" alt="'.$listNum.'"></div>
                  </div>
                </td>
                <td>NT$ '.($row['sales_price'])*$num.'</td>
                <td class="text-center">
                  <button class="btn btn-danger cartTableDel" alt="'.$listNum.'">
                    <svg class="bi bi-trash" width="1.4em" height="1.4em" viewBox="0 0 20 20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"/>
                      <path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"/>
                    </svg>
                  </button>
                </td>
              </tr>
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
            'num' => $totalNum,
            'cartTable' => $cartListTable,
            'total' => $totalPrice
          ];
        echo $res = json_encode($res);
      }
    break;
    case 'numChange':
    break;
    case 'login':
      $sql = $db->prepare('SELECT * FROM customer WHERE acc=? AND psw=?');
      $sql->execute([$_POST['acc'], $_POST['psw']]);
      $result = $sql->fetchAll();
      if($result) {
        foreach($result as $row){
          echo $row['acc'];
        }
      }else{
        $sql = $db->prepare('SELECT * FROM admin WHERE acc=? AND psw=?');
            $sql->execute([$_POST['acc'], $_POST['psw']]);
              if($sql->fetchAll()){
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
      case 'couponFormEv':
        $sql = $db->prepare('INSERT INTO eventMail (id, state, mail, date) VALUES (NULL, 0, ?, NOW()) ;');
        echo $sql->execute([$_POST['eventMail']]);
      break;
    default:
      # code...
      break;
  }