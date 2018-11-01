<?php
session_start();
if(!isset($_SESSION['name_'])){
    header('Location:../login.php');
    exit();
}
require_once '../include/db_class.php';
require_once '../config.php';
$sql = "select * from student where name_='".$_SESSION['name_']."'";
$res = $db->getRow($sql);
$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $res['name_'];?>学员-信息</title>
    <link rel="stylesheet" type="text/css" href="./layui/css/layui.css">
</head>

<body>
    <div class="layui-container">
        <div class="layui-row">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend><?php echo $res['name_'];?>学员信息</legend>
            </fieldset>
            <table  lay-even class="layui-table">
                <thead>
                <tr>
                    <th>类别</th>
                    <th>信息</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>编号</td>
                    <td><?php echo $res['id'];?></td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td><?php echo $res['name_'];?></td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td><?php echo $res['sex'];?></td>
                </tr>
                <tr>
                    <td>出生日期</td>
                    <td><?php echo $res['birth_date'];?></td>
                </tr>
                <tr>
                    <td>身高</td>
                    <td><?php echo $res['height'];?></td>
                </tr>
                <tr>
                    <td>体重</td>
                    <td><?php echo $res['weight'];?></td>
                </tr>
                <tr>
                    <td>手机号</td>
                    <td><?php echo $res['phone'];?></td>
                </tr>
                <tr>
                    <td>缴费</td>
                    <td><?php echo $res['money'];?></td>
                </tr>
                <tr>
                    <td>类型</td>
                    <td><?php echo $res['type'];?></td>
                </tr>
                <tr>
                    <td>次数</td>
                    <td><?php echo $res['max_count'];?></td>
                </tr>
                <tr>
                    <td>开始时间</td>
                    <td><?php echo $res['start_time'];?></td>
                </tr>
                <tr>
                    <td>结束时间</td>
                    <td><?php echo $res['end_time'];?></td>
                </tr>
                </tbody>
            </table>
            <div style="text-align: center;margin-top: 200px;">
                <hr class="layui-bg-cyan">
                © Powered by<a href="http://www.ym998.cn" target="_blank"> 源梦科技</a>
            </div>
        </div>
    </div>
    <script src="./layui/layui.js"></script>

</body>

</html>