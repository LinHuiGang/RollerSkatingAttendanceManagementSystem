<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/15
 * Time: 18:06
 */
//if(!isset($_GET['id'])){
//    echo '未设置id';
//    exit();
//}
require_once '../include/db_class.php';
require_once '../config.php';

$sql = 'select * from student where id = 1010';
// \'' . $_GET['id'] . '\'';
$res = $db->getRow($sql);
$json=db_class::json($res);
echo $json;