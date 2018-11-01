<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/13
 * Time: 17:02
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
    $qded=$db->count('qiandao',"name_='".$_POST['name_']."'");
    $db->close();
    if(!$res){
        echo '系统无此学员！<br /><a href="qd_list.php">点此返回</a> ';
        exit();
    }
}else{
    exit();
}
if($_SESSION['identity']=='管理员'){
    require_once '../admin/footsuper.php';
}else{
    require_once 'foot.php';
}
?>
<fieldset>
    <legend><?php echo $res['name_']?>&nbsp&nbsp个人信息明细</legend>
<table width="100%" border="1" align="left" cellpadding="1" cellspacing="0" bordercolor="#FF0000">

    <tr><td width="290" align="left">个人信息明细 </td>
    </tr>
    <tr><td width="290" align="left">学员姓名: <?php echo $res['name_']?> </td>
    </tr>
    <tr><td width="302" align="left">学员编号: <?php echo $res['id']?> </td>
    </tr>
    <tr><td width="202" align="left">姓别: <?php echo $res['sex']?> </td>
    </tr>
    <tr><td width="190" align="left">年龄: <?php echo $res['age']?> </td>
    </tr>
    <tr><td width="290" align="left">出生年月日:<?php echo $res['birth_date']?> </td>
    </tr>
	<tr><td width="302" align="left">身高: <?php echo $res['height']?> </td>
	</tr>
    <tr><td width="202" align="left">体重: <?php echo $res['weight']?> </td>
    </tr>
    <tr><td width="190" align="left">电话: <?php echo $res['phone']?> </td>
    </tr>
    <tr><td width="290" align="left">报名类型: <?php echo $res['type']?> </td>
    </tr>
    <tr><td width="302" align="left">所交费用: <?php echo $res['money']?> </td>
    </tr>
    <tr><td width="202" align="left">报名日期: <?php echo $res['start_time']?> </td>
    </tr>
    <tr><td width="190" align="left">到期日期: <?php echo $res['end_time']?> </td>
    </tr>
    <tr><td width="290" align="left">最大签到次数: <?php echo $res['max_count']?> </td>
    </tr>
	<tr><td width="302" align="left">已经签到次数: <?php echo $qded ?> </td>
	</tr>
		<tr><td width="202" align="left">学员积分: <?php echo $res['integral']?> </td>
	</tr>
</table>
 </fieldset>
 <p>&nbsp</p><p><p>&nbsp</p><p>&nbsp</p>
</body>
</html>
