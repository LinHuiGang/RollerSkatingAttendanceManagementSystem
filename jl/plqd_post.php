<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/11
 * Time: 17:55
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(isset($_POST) && isset($_SESSION['identity'])) {
    require_once '../include/db_class.php';
    require_once '../config.php';
    /** 分割post数组 存入$arr**/
    $arr=array();
    foreach ($_POST['check_box'] as $key){
        array_push($arr,explode('/',$key));
    }
    /** 存入$arr end **/
    $now_date=date('Y-m-d H:i:s');
    $data=array();
    foreach ($arr as $key){
        array_push($data,'\''.$key[0].'\',\''.$key[1].'\',\''.$now_date.'\',\''.$_SESSION['name'].'\'');
    }
    $row=$db->inserts('qiandao','`id`, `name_`, `qd_time`, `name`',$data);
    if($row>0){
        echo '您成功为 '.$row.' 名学员签到！<br /><a href="plqd.php">点此返回</a>';
        $_POST = array();
    }else{
        echo '签到失败<br /><a href="plqd.php">点此返回</a><br />源梦科技www.ym998.cn';
    }
    $db->close();
}