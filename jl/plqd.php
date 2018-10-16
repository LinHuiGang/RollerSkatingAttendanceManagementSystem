<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/9
 * Time: 16:33
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}

require_once '../include/db_class.php';
require_once '../config.php';
//查询所有学生信息
$sql='select * from student';
$res=$db->getAll($sql);
$sql="SELECT name_,count(*) FROM qiandao GROUP BY name_";
$resqd=$db->getAll($sql,'row');
$db->close();
$title='飘逸轮滑倶乐部-教练-批量学员签到';
if($_SESSION['identity']=='管理员'){
    require_once '../admin/footsuper.php';
}else{
    require_once 'foot.php';
}
?>
<fieldset>
    <legend>批量签到</legend>
    <form action="../jl/plqd_post.php" method="post">
        <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000" style="text-align: center;">
            <tr>
                <td>学员名字</td>
                <td>学员编号</td>
                <td>余次</td>
                <td>余天</td>
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
                $value=$key['id']."/".$key['name_'];
                echo '<tr></tr><td>'.$key['name_']."</td>
<td><input style='width:40px;height:40px' type='checkbox' name='check_box[]' value='$value'>".$key['id']."</td>
<td>".$yuci."</td>
<td>".floor($overtime)."</td>
</tr>";
            }
            ?>
            <tr>
                <td colspan="4" align="center"><input type="submit" value="提交学员编号" style="width:150px;height:40px" /> </td>
            </tr>
        </table>
    </form>
</fieldset>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
</body>

</html>


