<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/10
 * Time: 9:25
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(isset($_POST) && isset($_GET['name'])) {
    require_once '../include/db_class.php';
    require_once '../config.php';
    $data = array(
        'name' => $_POST['name'],
        'password' => $_POST['password'],
        'class_hour_sum' => $_POST['ks'],
        'identity' => $_POST['jl_sf'],
        'add_time' => $_POST['add_time']
    );
    $where='name=\''.$_GET['name'].'\'';
    $row=$db->update('coach',$data,$where);
    if($row>0){
        echo '修改成功！<br /><a href="jl_management.php">点此返回</a> ';
    }else{
        echo '修改失败！<br /><a href="jl_management.php">点此返回</a><br />源梦科技www.ym998.cn';
    }
    $db->close();
}