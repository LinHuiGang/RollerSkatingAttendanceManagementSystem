<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/10
 * Time: 18:10
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
require_once '../include/db_class.php';
require_once '../config.php';
//查询所有学生信息
$sql='select * from student order by start_time desc';
$res=$db->getAll($sql);
//查询签到学生信息
$sql="SELECT name_,count(*) FROM qiandao GROUP BY name_";
$resqd=$db->getAll($sql,'row');
$db->close();
$title='轮滑倶乐部运营大师-后台管理-学员信息';
require_once 'footsuper.php';
?>
<fieldset>
    <legend>
        <p>学员信息</p>
    </legend>
    <table style="text-align: center;" width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000">
        <tr>
            <td>编号</td>
            <td>姓名</td>
            <td>性别</td>
            <td>类型</td>
            <td>余天</td>
            <td>次数</td>
            <td>已签</td>
            <td>余次</td>
            <td>起始</td>
            <td>结束</td>
            <td>备注</td>
            <td>场地</td>
            <td>修改</td>
        </tr>
        <?php
        foreach ($res as $key){
            $name_=$key['name_'];
            $qded=0;//已签
            foreach ($resqd as $arr){
                if($arr[0]==$key['name_']){
                    $qded=intval($arr[1]);
                }
            }

            $yuci=intval($key['max_count'])-$qded;//余次

            $overtime=(strtotime($key['end_time'])-strtotime('now'))/86400+2;//余天
            echo "
            <tr>
            <td> ".$key['id']."</td>
            <td> ".$key['name_']."</td>
            <td> ".$key['sex']."</td>
            <td> ".$key['type']."</td>
            <td>".floor($overtime)."</td>
            <td>".$key['max_count']."</td>
            <td>".$qded."</td>
            <td>".$yuci."</td>
            <td>".$key['start_time']."</td>
            <td>".$key['end_time']."</td>
            <td>".$key['integral']."</td>
            <td>".$key['scope']."</td>
            <td>
                <a href='../admin/student_xg.php?id=".$key['id']."&name_=".$key['name_']."');\"> 修改</a>
            </td>
            </tr>";
        }
        ?>
    </table>
</fieldset>

<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
</body>

</html>
