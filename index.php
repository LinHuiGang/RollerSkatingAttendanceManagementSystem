<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/8
 * Time: 21:44
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:login.php');
    exit();
} else{
    if($_SESSION['identity']=='管理员'){
        header('Location:./admin/tongji.php');
    } elseif ($_SESSION['identity']=='教练'){
        header('Location:./jl/plqd.php');
    }else{
        header('Location:./xy/index.php');
    }
}