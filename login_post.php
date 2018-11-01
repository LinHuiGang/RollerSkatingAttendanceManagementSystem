<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/8
 * Time: 21:44
 */
session_start();
if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['sf'])) {
    require_once './include/db_class.php';
    require_once './config.php';
    if($_POST['sf'] == '教练') {
        $sql = 'select * from coach where name = \'' . $_POST['name'] . '\'';
        $res = $db->getRow($sql);
        if (!$res) {
            echo '系统无此教练！<br /> <a href="login.php">重新登录</a>';
            exit();
        }
        if ($res['password'] == $_POST['password']) {
            $_SESSION['name'] = $res['name'];
            $_SESSION['identity'] = $res['identity'];
            header('Location:index.php');
        } else {
            echo '用户名或密码错误！<br /> <a href="login.php">重新登录</a>';
        }
    }else{
        $sql = 'select * from student where name_ = \'' . $_POST['name'] . '\'';
        $res = $db->getRow($sql);
        if (!$res) {
            echo '系统无此学员！<br /> <a href="login.php">重新登录</a>';
            exit();
        }
        if ($res['password'] == $_POST['password']) {
            $_SESSION['name_'] = $res['name_'];
            header('Location:./xy/index.php');
        } else {
            echo '用户名或密码错误！<br /> <a href="login.php">重新登录</a>';
        }
    }
    $db->close();
}