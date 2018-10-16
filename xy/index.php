<?php
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
require_once '../include/db_class.php';
require_once '../config.php';
$sql = 'select * from student';
$res = $db->getAll($sql);
$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>123456</title>
    <link rel="stylesheet" type="text/css" href="./layui/css/layui.css">
</head>

<body>
    <div class="layui-container">
        <div class="layui-row">
            <table lay-filter="demo">
                <thead>
                <tr>
                    <th lay-data="{field: 'id' ,width:65,totalRowText:'合计：'}">ID</th>
                    <th lay-data="{field: 'name_' ,width:80,totalRowText:'共有<?php echo count($res)?>人'}">姓名</th>
                    <th lay-data="{field: 'sex' ,width:65}">性别</th>
                    <th lay-data="{field: 'birth_date'}">出生日期</th>
                    <th lay-data="{field: 'height'}">身高</th>
                    <th lay-data="{field: 'weight'}">体重</th>
                    <th lay-data="{field: 'phone'}">手机号</th>
                    <th lay-data="{field: 'money' ,totalRow: true}">缴费</th>
                    <th lay-data="{field: 'type'}">类型</th>
                    <th lay-data="{field: 'max_count',width:65,totalRow: true}">次数</th>
                    <th lay-data="{field: 'start_time'}">start</th>
                    <th lay-data="{field: 'end_time'}">end</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($res as $key) {
                    echo "<tr><td>".$key['id']."</td><td>".$key['name_']."</td><td>".$key['sex']."</td><td>"
                        .$key['birth_date']."</td><td>".$key['height']."</td><td>".$key['weight']."</td><td>"
                        .$key['phone']."</td><td>".$key['money']."</td><td>".$key['type']."</td><td>"
                        .$key['max_count']."</td><td>".$key['start_time']."</td><td>".$key['end_time']."</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./layui/layui.js"></script>
    <script>
        layui.use('table', function(){
            var table = layui.table;
            table.init('demo', {
                limit: <?php echo count($res)?> //注意：请务必确保 limit 参数（默认：10）是与你服务端限定的数据条数一致
                //支持所有基础参数
                ,page: false
                ,totalRow:true
                ,toolbar:true
                ,defaultToolbar:['filter', 'exports']
            });
        });
    </script>
</body>

</html>