<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/8
 * Time: 22:30
 */
$_SESSION = array(); //清除SESSION值.
if(isset($_COOKIE[session_name()])){
    //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
    setcookie(session_name(),'',time()-1,'/');
}
//清除服务器的sesion文件
session_destroy();
header('Location:./login.php');
