<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/16
 * Time: 8:18
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
require_once '../include/db_class.php';
require_once '../config.php';
//查询分月份收入
$sql='select * from tongji';
$res=$db->getRow($sql,'row');
//查询学生总数
$sql='select count(*) from student';
$sum_student=$db->getRow($sql,'row')[0];
//共计课时数
$sql='select sum(max_count) from student';
$sum_max_count=$db->getRow($sql,'row')[0];
//共上课时数
$sql='select count(*) from qiandao';
$sum_sed=$db->getRow($sql,'row')[0];
//共计定金数
$sum_dingjin=$db->count('student',"type='定金'");
//共计次卡数
$sum_cika=$db->count('student',"type='次卡'");
//共计月卡数
$sum_yueka=$db->count('student',"type='月卡'");
//共计年卡数
$sum_yearka=$db->count('student',"type='年卡'");
//共计寒假数
$sum_hanjia=$db->count('student',"type='寒假班'");
//共计暑假数
$sum_shujia=$db->count('student',"type='暑假班'");
//定义日期数组
$times=array();
for ($i=0;$i>-14;$i--)
{
    array_push($times,date("Y-m", strtotime($i." month")));
}
//定义总收入
$sum_rmb=0;
$db->close();
$title='轮滑倶乐部运营大师-后台管理-统计报表';
require_once 'footsuper.php';
?>
<fieldset>
    <legend>统计报表</legend>
    <p><a href="tongji_xg.php">修改</a></p>
    <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000">
        <tr>
            <td>分类</td>
            <td>数量</td>
        </tr>
        <?php
        foreach ($res as $key=>$va){
            if(intval($key)==14)
                break;
            echo "<tr><td>".$times[$key]."</td><td>".$va."</td></tr>";
            $sum_rmb+=intval($va);
        }
        ?>
        <tr>
            <td>学费总收入</td>
            <td> <?php echo $sum_rmb?> </td>
        </tr>
        <tr>
            <td>共计学员数</td>
            <td> <?php echo $sum_student?> </td>
        </tr>
        <tr>
            <td>共计课时数</td>
            <td> <?php echo $sum_max_count?> </td>
        </tr>
        <tr>
            <td>已上课时数</td>
            <td> <?php echo $sum_sed?> </td>
        </tr>
        <tr>
            <td>剩余课时</td>
            <td> <?php echo intval($sum_max_count)-intval($sum_sed)?> </td>
        </tr>
        <tr>
            <td>共计定金数</td>
            <td> <?php echo $sum_dingjin?> </td>
        </tr>
        <tr>
            <td>共计次卡数</td>
            <td> <?php echo $sum_cika?> </td>
        </tr>
        <tr>
            <td>共计月卡数</td>
            <td> <?php echo $sum_yueka?> </td>
        </tr>
        <tr>
            <td>共计年卡数</td>
            <td> <?php echo $sum_yearka?> </td>
        </tr>
        <tr>
            <td>共计寒假班数</td>
            <td> <?php echo $sum_hanjia?> </td>
        </tr>
        <tr>
            <td>共计暑假班数</td>
            <td> <?php echo $sum_shujia?> </td>
        </tr>
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
