<?php

/**

 * Created by PhpStorm.

 * User: yuange

 * Date: 2018/10/12

 * Time: 22:52

 */

session_start();

if(!isset($_SESSION['name'])){

    header('Location:../login.php');

    exit();

}

require_once '../include/db_class.php';

require_once '../config.php';

//分页查询所有签到信息

//当前请求页数
isset($_GET['page'])?$page=intval($_GET['page']):$page=1;
if($page <=0) {$page=1;}
//总页数
$numpages=ceil(intval($db->count('qiandao',"`qd_time` >= '0000 00:00:00'"))/50);
//定义每页显示的行数
$pageshow = 50;
$pagesize = ($page-1) * $pageshow;
//上一页
$prevpage = $page-1;
//下一页
$nextpage = $page+1;
$sql="select * from qiandao ORDER BY qd_time DESC limit $pagesize,$pageshow";

$res=$db->getAll($sql);


//查询统计

$time =date("Y-m-d").' 00:00:01';

$count1=$db->count('qiandao',"`qd_time` > '$time'");//今日签到人员



$time =date('Y-m-d', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600)).' 00:00:01';

$count2=$db->count('qiandao',"`qd_time` > '$time'");//本周签到人员





if (date('l',time()) == 'Monday'){

    $time= date('m-d-',strtotime('last monday')).' 00:00:01';

}else{

    $time =date('m-d-',strtotime('-1 week last monday')).' 00:00:01';

}

$time2 =date('Y-m-d',strtotime('-1 sunday', time())).' 00:00:01';

$count3=$db->count('qiandao',"`qd_time` > '$time' and `qd_time` < '$time2'");//上周签到人员



$time =date("Y-m-01").' 00:00:01';

$count4=$db->count('qiandao',"`qd_time` > '$time'");//本月签到人员



$time =date("Y-01-01").' 00:00:01';

$count5=$db->count('qiandao',"`qd_time` > '$time'");//本年签到人员



$db->close();

$title='轮滑倶乐部运营大师-签到管理';

if($_SESSION['identity']=='管理员'){

    require_once '../admin/footsuper.php';

}else{

    require_once 'foot.php';

}

?>

<fieldset>

    <legend>查询_修改_补签学员信息</legend>

    <form method="post"  name="form">

        <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000">

            <tr>

                <td align="center">

                    <p><a>学员姓名：<input type="text" name="name_" style="width:150px;height:40px"></a></p>

                    <!--<p><a>补签时间<input type="text" name="time_1" style="width:150px;height:40px" value=<?php echo $time?> "> </a></p>-->

                    <p><a>补签时间：<input type="date" name="bq_time" style="width:150px;height:40px" value="<?php echo $time?>"></a></p>

                    <p><a>补签次数：
                    	<select name="num" style="width:150px;height:40px">
                    	<?php
                    	for ($i=1; $i <= 20; $i++) {
                    		echo '<option value='.$i.'>'.$i.'</option>';
                    	}?>
                    	</select></p>

                    <p><a><input type="submit" name="Submit" value="查询学员信息" style="width:150px;height:40px" onClick="save()"></a></p>

                    <p><a><input type="submit" name="Submit" value="补签学员信息" style="width:150px;height:40px" onClick="pqsj()"></a></p>

                </td></tr>

            <tr>

                <td colspan="2" align="center"><p>友情提示:查询只需要输入姓名 </br> 补签需要输入时间 提升消课可以重复补签</p></td></tr>

        </table>

    </form>

</fieldset>

<script>

    function save(){

        document.form.action="../jl/student_select.php";

        document.form.submit();

    }

    function pqsj(){

        document.form.action="../jl/buqian.php";

        document.form.submit();

    }

</script>

<fieldset>

    <legend>签到统计</legend>

    <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000">

        <tr>

            <td>

                <p> 今日目前签到总数为 <?php echo $count1?></p>

                <p> 本周目前签到总数为 <?php echo $count2?> </p>

                <p> 上周目前签到总数为 <?php echo $count3?> </p>

                <p> 本月目前签到总数为 <?php echo $count4?> </p>

                <p> 本年目前签到总数为 <?php echo $count5?> </p>

            </td>

        </tr>

    </table>

</fieldset>

<fieldset>

    <legend>历史签到数据-第<?php echo $page; ?>页</legend>

    <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF0000" style="margin-bottom: 150px">

        <tr>

            <td>学员编号</td>

            <td>姓名</td>

            <td>签到时间</td>

            <td>签到教练</td>

        </tr>

        <?php

        foreach ($res as $key){

            echo "<tr><td>".$key['id']."</td><td>".$key['name_']."</td><td>".$key['qd_time']."</td><td>".$key['name']."</td></tr>";

        }
        //分页
        if($page > 1) {
			echo "<tr><td><a href='?page=1'>首页</a></td><td><a href='?page=".$prevpage."'>上一页</a></td>";
		}else{
			echo "<tr><td></td><td></td>";
		}
		if($page < $numpages){
			echo "<td><a href='?page=".$nextpage."'>下一页</a></td><td><a href='?page=".$numpages."'>尾页</a></td></tr>";
		}else{
			echo "<td></td><td></td></tr>";
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

