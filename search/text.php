<?php
include_once('../pdo.php');

// $keyword = '%'.$_GET['q'].'%';
$sql = $db->query('SELECT * FROM ( SELECT * FROM MEN UNION SELECT * FROM WOMEN UNION SELECT * FROM KIDS )data WHERE ( data.title LIKE "%123%" ) ;');
$rows = $sql->fetchAll();
print_r($rows);
// foreach($sql->fetchAll() as $val){
//   print_r($val);
// }