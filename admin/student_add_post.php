<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/10
 * Time: 20:33
 * `name_`, `sex`, `age`, `birth_date`, `height`, `weight`, `phone`, `money`,
 * `type`, `max_count`, `integral`, `password`, `start_time`, `end_time`
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(isset($_POST['name_']) && isset($_POST['sex'])  && isset($_POST['birth_date']) && isset($_POST['height'])
        && isset($_POST['weight']) && isset($_POST['phone']) && isset($_POST['money']) && isset($_POST['type'])
        && isset($_POST['max_count']) && isset($_POST['integral']) && isset($_POST['password'])
        && isset($_POST['start_time']) && isset($_POST['end_time'])){
    require_once '../include/db_class.php';
    require_once '../config.php';
    $row=$db->insert('student',$_POST);
    if($row == 1){
        echo "添加成功!<br /> <a href=\"student_add.php\">点此返回</a>";
        $_POST=array();
    }
    $db->close();
}else{
    echo '学员信息填写不完整，添加失败！<br /><a href="student_list.php">点此返回</a><br />源梦科技www.ym998.cn';
}