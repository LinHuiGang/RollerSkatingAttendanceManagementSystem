<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/11
 * Time: 17:10
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(isset($_POST) && isset($_GET['id']) && isset($_GET['name_'])) {
    require_once '../include/db_class.php';
    require_once '../config.php';
    if($_POST['name_'] != $_GET['name_']){
        $sql="update qiandao set name_='".$_POST['name_']."' where name_ = '".$_GET['name_']."'";
        $row=$db->queryrows($sql);
        if($row < 0){
            echo '学员签到信息修改失败！<br />源梦科技www.ym998.cn';
        }
    }
    $where='id=\''.$_GET['id'].'\'';
    $row=$db->update('student',$_POST,$where);
    if($row > 0){
        echo '学员信息修改成功！<br /><a href="student_list.php">点此返回</a> ';
    }else{
        echo '学员信息修改失败！<br /><a href="student_list.php">点此返回</a><br />源梦科技www.ym998.cn';
    }
    $db->close();
}