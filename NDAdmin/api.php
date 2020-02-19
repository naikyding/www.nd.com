<?php
// 待辦 防呆  非管理人員轉回首頁
  include_once('../php/sql.php'); //PDO & SESSION START

  switch ($_GET['do']) {
    //////////////////////////////////////////// SELECT
    case 'select':
      $sql = 'SELECT * FROM '.$_POST['itemName'].' WHERE 1';
      $rows = $db->query($sql)->fetchAll();
?>
      <table class="table table-hover text-center mt-2">
        <thead class="thead-light">
          <th scope="col">主圖</th>
          <th scope="col">名稱</th>
          <th scope="col">類別</th>
          <th scope="col">價錢</th>
          <th scope="col">顏色</th>
          <th scope="col">尺吋</th>
          <th scope="col" ><button type="button" class="btn btnEv addItemBtn" style="border:1px solid #C79C57" value="<?=$_POST['itemName']?>"  data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-plus" ></i></button></th>
        </thead>
        <tbody>
<?php
$colors = '';
function sizeEV($clr){
  if(!empty($clr)){
    global $colors;
    $colors .= $clr.'、';
  };
};
  foreach($rows as $row){
    sizeEV($row['XS']);
    sizeEV($row['S']);
    sizeEV($row['M']);
    sizeEV($row['L']);
    sizeEV($row['XL']);
    sizeEV($row['XXL']);
    echo '
          <tr>
            <td ><img class="" style="width:100px" src="../img/'.$_POST['itemName'].'/'.$row['img1'].'"></td>
            <td>'.$row['title'].'</td>
            <td>'.$row['tag'].'</td>
            <td><span style="font-size:.3rem">NT$ </span>'.$row['sales_price'].'</td>
            <td>'.$row['color'].'</td>
            <td>'.mb_substr($colors,0,(mb_strlen($colors)-1)).'</td>
            <td class="'.$_POST['itemName'].'">
              <p class="my-3"><button type="button" class="btn btn-secondary editBtn"  data-toggle="modal" data-target="#editModal" alt="'.$_POST['itemName'].'" value="'.$row['id'].'"><img src="../icon/pencil.svg"></button></p>
              <p class="my-3"><button type="button" class="btn btn-danger delBtn" value="'.$row['id'].'"><img src="../icon/trash.svg"></button></p>
            </td>
          </tr>
          ';
    $colors = '';
  }
?>
        </tbody>
      </table>
<?php
    break;

    ////////////////////////// SLIDE SELECT
    case 'slide':
      $sql = 'SELECT * FROM slide WHERE 1';
      $rows = $db->query($sql);
      $html = '';
      $dsp = '';
      foreach($rows->fetchAll() as $row){
        $dsp = ($row['display'] == 1)?'checked':'';
        $html .= '
            <tr>
              <td><input name="dsp['.$row['id'].']" type="checkbox" '.$dsp.' value="1"></td>
              <td><img src="../img/slide/'.$row['img'].'" alt="'.$row['title'].'" width="200px"></td>
              <td>
                <input name="title['.$row['id'].']" class="form-control" type="text" value="'.$row['title'].'">
              <td>            
                  <textarea class="form-control" name="info['.$row['id'].']" rows="3">'.$row['info'].'</textarea>
              </td>
              <td >
                <p class="my-3"><button type="submit" class="btn btn-secondary slideUpdate" value="'.$row['id'].'"><img src="../icon/arrow-repeat.svg"></button></p>
                <p class="my-3"><button type="button" class="btn btn-danger slideDel" value="'.$row['id'].'"><img src="../icon/trash.svg"></button></p>
              </td>
            </tr>
        ';
      }
      $area = '
        <!-- landingPage Area-->
        <form id="slideChg">
        <input hidden type="text" name="item">
          <table class="table table-hover text-center mt-2" id="landingPageArea">
            <thead class="thead-light">
              <tr>
                <th scope="col">顯示</th>
                <th scope="col">圖片</th>
                <th scope="col">標題</th>
                <th scope="col">說明</th>
                <th scope="col" ><button type="button" class="btn btnEv  slideAdd" style="border:1px solid #C79C57"   data-toggle="modal" data-target="#slideModal"><i class="fas fa-plus" ></i></button></th>
                </tr>
            </thead>
            <tbody>'.$html.'</tbody>
          </table>
        </form>
      ';
      echo $area;
    break;
    ////////////////////////// eventMail SELECT
    case 'eventMailSelect':
      $sql = 'SELECT * FROM eventMail WHERE 1';
      $rows = $db->query($sql);
      $html = '';
      $dsp = '';
      $num = 0;
      function selectOption($val, $id){
        if($val == 0){
          return '
              <select name="eventMail" alt="'.$id.'" class="bg-warning text-white" >
                <option value="0" selected="selected">未寄送優惠</option>
                <option value="1">已處理</option>
              </select>
          ';
        }else{
          return '
          <select name="" class="bg-success text-white" >
            <option value="0" >未寄送優惠</option>
            <option value="1" selected="selected">已處理</option>
          </select>
        ';
        }
      }
      foreach($rows->fetchAll() as $row){
        // $dsp = ($row['display'] == 1)?'checked':'';
        $sendDate = (empty($row['sendDate']))?' - ':$row['sendDate'];
        $html .= '
            <tr>
              <td>
                '.selectOption($row['state'], $row['id']).'
              </td>
              <td class="text-right"><span id="copy'.$num.'">'.$row['mail'].'　</span><button class="btn btn-primary copyMailBtn" alt="'.$num.'"><svg class="bi bi-documents" width="1.3rem" height="1.3rem" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 4h8a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2zm0 1a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V6a1 1 0 00-1-1H5z" clip-rule="evenodd"/>
              <path d="M7 2h8a2 2 0 012 2v10a2 2 0 01-2 2v-1a1 1 0 001-1V4a1 1 0 00-1-1H7a1 1 0 00-1 1H5a2 2 0 012-2z"/>
            </svg></button></td>
              <td>'.$row['date'].'</td>
              <td>'.$sendDate.'</td>
              <td >
                <p class="my-3"><button type="button" class="btn btn-danger eventMailDel" alt="'.$row['id'].'" ><img src="../icon/trash.svg"></button></p>
              </td>
            </tr>
        ';
        $num++;
      }
      $area = '
        <!-- landingPage Area-->
        <form id="eventMailChange">
          <table class="table table-hover text-center mt-2" id="landingPageArea">
            <thead class="thead-light">
              <tr>
                <th scope="col">狀態</th>
                <th scope="col">信箱</th>
                <th scope="col">索取時間</th>
                <th scope="col">寄發時間</th>
                <th scope="col" > - </th>
                </tr>
            </thead>
            <tbody>'.$html.'</tbody>
          </table>
        </form>
      ';
      echo $area;
    break;
    ///////////////////////////////// eventMail CHANGE
    case 'eventMailChange':
      $sql = $db->prepare('UPDATE '.$_POST['table'].' SET state=?, sendDate = NOW() WHERE id=?');
      echo $sql->execute([$_POST['state'], $_POST['item']]);
    break;
    case 'eventMailDel':
      $sql = $db->prepare('DELETE FROM eventMail WHERE id = ?');
      echo $sql->execute([$_POST['item']]);
    break;
    ///////////////////////////////// SLIDE add
    case 'slideAdd':
      // print_r($_POST);
      // print_r($_FILES);
      $index = 'id';
      $value = 'NULL';
      foreach($_POST as $key => $val){
        $index .= ', '.$key;
        $value .= ', "'.$val.'"';
      }
      if($_FILES['img']['error'] == 0){
        $index .= ', img';
        $value .= ', "'.$_FILES['img']['name'].'"';
        $src = $_FILES['img']['tmp_name'];
        copy($src,'../img/slide/'.$_FILES['img']['name']);
      }
      $sql = 'INSERT INTO slide ('.$index.') VALUES ('.$value.') ;';
      $query = $db->query($sql);
      // print_r($query);
      echo $res = ($query)?true:false;
    break;
    ////////////////////// SLIDE UPDATE
    case 'slideUpdate':
      $dsp = (!empty($_POST['dsp'][$_POST['item']]))?1:0;
      $sql = 'UPDATE slide SET title = "'.$_POST['title'][$_POST['item']].'", info = "'.$_POST['info'][$_POST['item']].'", display = '.$dsp.' WHERE id = '.$_POST['item'].';';
      $res = $db->query($sql);
      echo $res = ($res)?true:false;
    break;
    //////////////////////////////////////////// DEL
    case 'del':
      $sql = 'DELETE FROM '.$_POST['item'].' WHERE id = '.$_POST['id'].'';
      $query = $db->query($sql);
      echo $res = ($query)?true:false;
    break;

    //////////////////////////////////////////// ADD
    case 'add':
      $index = 'id, tableName';
      $value = 'null, "'.$_POST['table'].'"';
      foreach($_POST as $key => $val){
        if( $key != 'table' ){
          $index .= ', '.$key;
          $value .= is_numeric($val)?', '.$val:', "'.$val.'"'; //判定是否為數字
        }
      }
      $num = 0;
      if(!empty($_FILES['img']['name'][0])){
        foreach($_FILES['img']['name'] as $imgKey => $imgName){
          $num ++;
          $index .= ', img'.$num;
          $value .= ', "'.$imgName.'"';
          // copyImgEV
          $name = '';
          $src = '';
          $name = $imgName;
          $src = $_FILES['img']['tmp_name'][$imgKey];
          copy($src,'../img/'.$_POST['table'].'/'.$name);
        }
        // foreach($_FILES['img']['tmp_name'] as $imgSrc){
        // }
        // foreach($_FILES['img']['name'] as $imgKey => $imgName){
        //   $name = '';
        //   $src = '';
        //   $name = $imgName;
        //   $src = $_FILES['img']['tmp_name'][$imgKey];
        //   copy($src,'../img/'.$name);
        // }
      }
      $sql = 'INSERT INTO '.$_POST['table'].' ( '.$index.' ) VALUES ('.$value.') ;';
      $db->query($sql);
      echo $_POST['table'];

      // print_r($_POST);
      // print_r($_FILES);
    break;

    //////////////////////////////// EDIT ////////////////////////////////////////
    case 'selectItem':
      $men = $_POST['table'];
      $sql = $db->prepare('SELECT * FROM '.$men.' WHERE id=? ');
      $sql->execute([$_POST['id']]);
      // $rows = $sql->fetchAll();
      function optionSelect($orTag,$mysqlTag){
        if($orTag == $mysqlTag){
          return $orTag .= '"  selected ';
        }else{
          return $orTag.= '"';
        }
      }
      function sizeSelect($orSize,$mysqlSize){
        if($mysqlSize[$orSize.'num'] != 0){
          return $orSize .= '" checked';
        }else{
          return $orSize .= '"';
        }
      }
      function sizeQ($disTxt,$sizeNum){
        if($sizeNum != 0){
          return $disTxt = ' value="'.$sizeNum.'" ';
        }else{
          return $disTxt;
        }
      }

      foreach($sql->fetchAll() as $row){
?>
        <!--------------------- editFromModal --------------------->
          <div class="modal-body" id="editItemModalBody">
            <class="container-fluid">
                <div class="row">
                  <div class="col-12 col-sm-6"><!-- left-->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="productTitle">產品名稱</label>
                        <input type="text" class="form-control" placeholder="請輸入產品名稱" name="title" id="productTitle" value="<?=$row['title']?>">
                        <input type="text" id="editModalName" name="table" value="<?=$_POST['table']?>" hidden>
                        <input type="text" id="editModalID" name="id" value="<?=$_POST['id']?>" hidden>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="productTag">產品類別</label>
                        <select name="tag"  class="form-control" id="productTag">
                          <option value="<?=optionSelect('APPAREL',$row['tag'])?> >APPAREL</option>
                          <option value="<?=optionSelect('UNDERWEAR',$row['tag'])?> >UNDERWEAR</option>
                          <option value="<?=optionSelect('ACTIVEWEAR',$row['tag'])?> >ACTIVEWEAR</option>
                          <option value="<?=optionSelect('ACCESSORIES',$row['tag'])?> >ACCESSORIES</option>
                        </select>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label for="productPrice">產品售價</label>
                      <input type="number" class="form-control" placeholder="請輸入台幣售價" min="99" name="sales_price" id="productPrice" value="<?=$row['sales_price']?>">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="productColor">顏色</label>
                        <select id="productColor" class="form-control" name="color">
                          <option <?=optionSelect('WHITE',$row['color'])?> >WHITE</option>
                          <option value="<?=optionSelect('BLACK',$row['color'])?> >BLACK</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <!-- <label for="productStock">庫存(件)</label>
                        <input type="number" class="form-control" min="0" name="stock" id="productStock"> -->
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="radio_txt">尺吋</div>
                      <div class="row mb-2">
                        <div class="col ">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sizeXs" name="<?=sizeSelect('XS',$row)?> value="XS">
                            <label class="form-check-label mr-2" for="sizeXs">XS</label>
                            <input class="num form-control form-control-sm " <?=sizeQ('disabled',$row['XSnum'])?> type="text"  name="XSnum" placeholder="輸入庫存量">
                          </div>
                        </div>
                        <div class="col d-flex justify-content-end pr-1">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sizeS" name="<?=sizeSelect('S',$row)?> value="S">
                            <label class="form-check-label mr-2" for="sizeS">S</label>
                            <input class="num form-control form-control-sm" <?=sizeQ('disabled',$row['Snum'])?> type="text"  name="Snum" placeholder="輸入庫存量">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sizeM" name="<?=sizeSelect('M',$row)?> value="M">
                            <label class="form-check-label mr-3" for="sizeM">M</label>
                            <input class="num form-control form-control-sm" <?=sizeQ('disabled',$row['Mnum'])?> type="text"  name="Mnum" placeholder="輸入庫存量">
                          </div>
                        </div>
                        <div class="col  d-flex justify-content-end pr-1">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sizeL" name="<?=sizeSelect('L',$row)?> value="L">
                            <label class="form-check-label mr-2" for="sizeL">L</label>
                            <input class="num form-control form-control-sm" <?=sizeQ('disabled',$row['Lnum'])?> type="text"  name="Lnum" placeholder="輸入庫存量">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2 ">
                        <div class=" col">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sizeXL" name="<?=sizeSelect('XL',$row)?> value="XL">
                            <label class="form-check-label mr-2" for="sizeXL">XL</label>
                            <input class="num form-control form-control-sm" <?=sizeQ('disabled',$row['XLnum'])?> type="text"  name="XLnum" placeholder="輸入庫存量">
                          </div>
                        </div>
                        <div class="col  d-flex justify-content-end pr-1">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sizeXXL" name="<?=sizeSelect('XXL',$row)?> value="XXL">
                            <label class="form-check-label mr-2" for="sizeXXL">XXL</label>
                            <input class="num form-control form-control-sm" <?=sizeQ('disabled',$row['XXLnum'])?> type="text"  name="XXLnum" placeholder="輸入庫存量">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- leftEnd -->
                  </div>
                  <div class="col-12 col-sm-6"><!-- right-->
                    <div class="form-group">
                      <label for="productDetailes">產品說明</label>
                      <textarea class="form-control" id="productDetailes" name="details" rows="3"><?=$row['details']?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="productCare">商品成分</label>
                      <textarea class="form-control" id="productCare" name="care" rows="3"><?=$row['care']?></textarea>
                    </div>
                    <!-- uploadPhoto -->
                    <div class="input-group mb-3 d-block">
                      <label class="btn btn-secondary w-100 mb-0">
                        <input type="file"  name="img[]" accept="image/*" hidden id="" multiple="multiple">
                        <i class="fas fa-arrow-circle-up"></i> 更新商品圖片
                      </label>
                      <span class="infoTxt" style="font-size: .5rem;">請選取 3 個檔案</span>
                      <span class="yourSelectTxt" style="font-size: .5rem;"></span>
                      <div class="row justify-content-around ">
<?php
  for($i=1;$i<4;$i++){
    if($row['img'.$i]!=''){
      echo '<div class="col-12 col-lg-4 text-center"><img class="w-50" src="../img/'.$_POST['table'].'/'.$row['img'.$i].'"></div>';
    }else{
      echo '<div class="col-12 col-lg-4 text-center d-flex align-items-center justify-content-center"></div>';    
    }
  }
?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer justify-content-around">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">關閉</button>
              <button type="submit" class="btn btn-lg btn-primary editModalSubmitBtn" >送 出</button>
              <button type="reset" class="btn btn-outline-secondary">還 原</button>
            </div>
<?php
      }
      // print_r($rows);
    break;

    case 'update':
      $content = '';
      foreach($_POST as $item => $val){
        if($item!='id' && $item!='table') $content .= (is_numeric($val))? $item.' = '.$val.', ' : $item.' = "'.$val.'", ';
      }
      //$_FILES
      $num = 0;
      if(!empty($_FILES['img']['name'][0])){
        foreach($_FILES['img']['name'] as $imgKey => $imgName){
          $num ++;
          $content .= 'img'.$num.' = "'.$imgName.'", ';
          // copyImgEV
          $name = '';
          $src = '';
          $name = $imgName;
          $src = $_FILES['img']['tmp_name'][$imgKey];
          copy($src,'../img/'.$_POST['table'].'/'.$name);
        }
      }
      // echo $sql = 'UPDATE '.$_POST['table'].' SET '.mb_substr($content,0,(mb_strlen($content)-2)).' WHERE id = '.$_POST['id'].' ;'; //去除最後2個字串
      $sql = $db->prepare('UPDATE '.$_POST['table'].' SET '.mb_substr($content,0,(mb_strlen($content)-2)).' WHERE id = ? ');
      $sql->execute([$_POST['id']]);
      echo $_POST['table'];
      // print_r($_POST);
      // print_r($_FILES);
    break;

    default:
      # code...
    break;
  }



