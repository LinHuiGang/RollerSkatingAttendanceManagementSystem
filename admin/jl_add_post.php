<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/9
 * Time: 12:17
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
$time = date("Y-m-d");
if(isset($_POST['name']) && isset($_POST['password'])  && isset($_POST['identity'])) {
    require_once '../include/db_class.php';
    require_once '../config.php';
    $row=$db->insert('coach',$_POST);
    if($row == 1){
        echo "添加成功!<br /> <a href=\"jl_management.php\">点此返回</a>";
    }
    else{
        echo '添加失败！<br /><a href="jl_management.php">点此返回</a><br />源梦科技www.ym998.cn';
    }
    $db->close();
}
