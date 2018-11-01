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
header('Content-Type:application/json; charset=utf-8');
require_once '../include/db_class.php';
require_once '../config.php';
$sql = 'select * from student';
// \'' . $_GET['id'] . '\'';
$res = $db->getAll($sql);
$json=db_class::json($res);
exit($json);