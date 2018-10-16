<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/9
 * Time: 8:37
 */
$dbconfig=array(
    'host' => 'localhost', //数据库服务器
    'port' => 3306, //数据库端口
    'user' => 'lunhua_ym998_cn', //数据库用户名
    'pwd' => '2WXGFWepSMYAtWbZ', //数据库密码
    'dbname' => 'lunhua_ym998_cn', //数据库名
);
$db = new db_class($dbconfig);