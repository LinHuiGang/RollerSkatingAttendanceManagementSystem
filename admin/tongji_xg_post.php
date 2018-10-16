<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/16
 * Time: 9:46
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(isset($_POST)) {
    require_once '../include/db_class.php';
    require_once '../config.php';
    $row=$db->update('tongji',$_POST,"id='0'");
    $db->close();
    if($row > 0){
        echo '修改成功！<br /><a href="tongji.php">点此返回</a> ';
    }else{
        echo '修改失败！<br /><a href="tongji.php">点此返回</a><br />源梦科技www.ym998.cn';
    }
}