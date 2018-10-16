<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/9
 * Time: 8:14
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
$title='轮滑倶乐部运营大师-后台管理-教练管理';
$sql='select * from coach';
require_once '../include/db_class.php';
require_once '../config.php';
$res=$db->getAll($sql);

$now_date=date('Y-m');
$last_date=date('Y-m',strtotime('-1 month'));
$last_last_date=date('Y-m',strtotime('-2 month'));
//本月签到统计
$sql="SELECT name,count(*) FROM qiandao where qd_time > '$now_date-1 00:00:01' GROUP BY name";
$res1=$db->getAll($sql,'row');
//上月签到统计
$sql="SELECT name,count(*) FROM qiandao where qd_time > '$last_date-1 00:00:01' and qd_time < '$now_date-1 00:00:01' GROUP BY name";
$res2=$db->getAll($sql,'row');
//上上月签到统计
$sql="SELECT name,count(*) FROM qiandao where qd_time > '$last_last_date-1 00:00:01' and qd_time < '$last_date-1 00:00:01' GROUP BY name";
$res3=$db->getAll($sql,'row');
$db->close();
require_once 'footsuper.php';
?>
<fieldset>
    <legend>教练管理</legend>
    <table width="100%" border="1" style="text-align: center;" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000">
        <tr>
            <td>教练编号:</td>
            <td>教练名字:</td>
            <td>共上课时</td>
            <td>身份</td>
            <td>添加时间</td>
            <td>修改账号</td>
            <td>删除教练</td>
        </tr>
        <?php
        foreach ($res as $key){
            echo '<tr><td>'.$key['id'].'</td><td>'.$key['name'].'</td><td>'.$key['class_hour_sum'].'</td><td>'.$key['identity'].'</td><td>'.$key['add_time'].'</td>
                  <td><a href=\'jl_xg.php?name='.$key['name'].'\'> 修</a></td>
                  <td><a href=\'jl_delete_post.php?name='.$key['name'].'\' onClick=\'delete_confirm()\'> 删</a></td></tr>';
        }
        ?>
        <tr><td colspan="7"><p><a href="./jl_add.php"><input type="submit" value="添加教练" style="width:150px;height:40px" ></a></p></td> </tr>
    </table>
</fieldset>
<fieldset>
    <legend>教练上课统计报表</legend>
    <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000">
        <tr>
            <td align='center'>月份</td>
            <?php
            foreach ($res1 as $key) {
            echo '<td>' .$key[0].'</td>';
            }
            ?>
        </tr>
        <tr>
            <td> <?php echo $now_date?></td>
            <?php
            foreach ($res1 as $key) {
                echo '<td>' .$key[1].'</td>';
            }
            ?>
        </tr>
        <tr>
            <td> <?php echo $last_date?> </td>
            <?php
            foreach ($res2 as $key) {
                echo '<td>' .$key[1].'</td>';
            }
            ?>
        </tr>
        <tr>
            <td> <?php echo $last_last_date?> </td>
            <?php
            foreach ($res3 as $key) {
                echo '<td>' .$key[1].'</td>';
            }
            ?>
        </tr>
    </table>
</fieldset>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<script language="JavaScript">

    function delete_confirm()
    {
        event.returnValue = confirm("删除是不可恢复的，你确认要删除吗？");
    }
</script>
</body>

</html>