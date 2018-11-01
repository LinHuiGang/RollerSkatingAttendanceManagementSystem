<?php

/**

 * Created by PhpStorm.

 * User: yuange

 * Date: 2018/10/13

 * Time: 17:26

 */

session_start();

if(!isset($_SESSION['name'])){

    header('Location:../login.php');

    exit();

}

if(isset($_POST) && isset($_SESSION['identity'])) {

    require_once '../include/db_class.php';

    require_once '../config.php';

    $sql="select * from student where name_='".$_POST['name_']."'";

    $res=$db->getRow($sql);

    if(!$res){

        echo '系统无此学员！<br /><a href="qd_list.php">点此返回</a> ';

        exit();

    }

    $count=intval($_POST['num']);
    if($count>1){
        for ($i=0; $i < $count-1; $i++) {
            $db->insert('qiandao',array('id'=>$res['id'],'name_'=>$_POST['name_'],'qd_time'=>$_POST['bq_time'],'name'=>$_SESSION['name']));
        }
    }

    $row=$db->insert('qiandao',array('id'=>$res['id'],'name_'=>$_POST['name_'],'qd_time'=>$_POST['bq_time'],'name'=>$_SESSION['name']));

    if($row > 0){

        echo '补签成功！<br /><a href="qd_list.php">点此返回</a> ';

    }else{

        echo '补签失败！<br /><a href="qd_list.php">点此返回</a><br />源梦科技www.ym998.cn';

    }

}else{

    exit();

}

?>