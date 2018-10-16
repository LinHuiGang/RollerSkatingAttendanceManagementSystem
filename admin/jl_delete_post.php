<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/10
 * Time: 8:26
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(isset($_GET['name'])){
    require_once '../include/db_class.php';
    require_once '../config.php';
    $where = 'name=\''.$_GET['name'].'\'';
    $row=$db->deleteOne('coach',$where);
    if($row>0){
        echo '删除成功！<br /><a href="jl_management.php">点此返回</a> ';
    }else{
        echo '删除失败！<br /><a href="jl_management.php">点此返回</a><br />源梦科技www.ym998.cn ';
    }
    $db->close();
}
