<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/11
 * Time: 12:56
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(!isset($_GET['id'])){
    exit();
}
require_once '../include/db_class.php';
require_once '../config.php';
$sql = 'select * from student where id = \'' . $_GET['id'] . '\'';
$res = $db->getRow($sql);
$db->close();
$title='编号:'.$_GET['id'].'学员信息修改';
require_once 'footsuper.php';
?>
<form action="student_xg_post.php?id=<?php echo $_GET['id'].'&name_='.$_GET['name_'] ?>" method="post">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <fieldset>
                    <legend><?php echo $title?></legend>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                        <tr>
                            <td width="149" align="left">学员姓名 </td>
                            <td align="left">
                                <input name="name_" type="text" value="<?php echo $res['name_']; ?>" style="width:150px;height:40px" size="10" maxlength="10">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">性别</td>
                            <td align="left">
                                男<input name="sex" type="radio" value="男" style="width:40px;height:40px" <?php echo $res['sex']=='男'?'checked':''; ?>>
                                女<input name="sex" type="radio" value="女" style="width:40px;height:40px" <?php echo $res['sex']=='女'?'checked':''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">登录密码</td>
                            <td align="left">
                                <input name="password" type="text" value="<?php echo $res['password']; ?>" style="width:150px;height:40px" size="5" maxlength="20">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">年龄</td>
                            <td align="left">
                                <input name="age" type="text" value="<?php echo $res['age']; ?>" style="width:150px;height:40px" size="5" maxlength="3">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">出生年月</td>
                            <td align="left">
                                <input name="birth_date" type="text" value="<?php echo $res['birth_date']; ?>" style="width:150px;height:40px" size="10">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">身高</td>
                            <td align="left">
                                <input name="height" type="text" value="<?php echo $res['height']; ?>" style="width:150px;height:40px" size="5" maxlength="5">
                                *cm </td>
                        </tr>
                        <tr>
                            <td align="left">体重</td>
                            <td align="left">
                                <input name="weight" type="text" value="<?php echo $res['weight']; ?>" style="width:150px;height:40px" size="5" maxlength="5">
                                *斤 </td>
                        </tr>
                        <tr>
                            <td align="left">电话</td>
                            <td align="left">
                                <input name="phone" type="text" value="<?php echo $res['phone']; ?>" style="width:150px;height:40px" size="10" maxlength="11">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">所交费用</td>
                            <td align="left">
                                <input name="money" type="text" value="<?php echo $res['money']; ?>" style="width:150px;height:40px" size="10" maxlength="6">
                                <span class="STYLE1">*</span>元</td>
                        </tr>
                        <tr>
                            <td align="left">报名日期</td>
                            <td align="left">
                                <input name="start_time" type="text" style="width:150px;height:40px" value="<?php echo $res['start_time']; ?>" size="10" >
                                <span class="STYLE1">*</span>日期必须中间加‘-’，否则无法正常修改</td>
                        </tr>
                        <tr>
                            <td align="left">到期日期</td>
                            <td align="left">
                                <input name="end_time" type="text" style="width:150px;height:40px" value="<?php echo $res['end_time']; ?>" size="10" >
                                <span class="STYLE1">*</span>日期必须中间加‘-’，否则无法正常修改</td>
                        </tr>
                        <tr>
                            <td align="left">最大签到次数</td>
                            <td align="left">
                                <input name="max_count" type="text" value="<?php echo $res['max_count']; ?>" style="width:150px;height:40px" size="5" maxlength="6">
                                <span class="STYLE1">*</span>次</td>
                        </tr>
                        <tr>
                            <td align="left">备注</td>
                            <td align="left">
                                <input name="integral" type="text" value="<?php echo $res['integral']; ?>" style="width:150px;height:40px">
                                <span class="STYLE1">*</span></td>
                        </tr>
                    </table>
                    <fieldset>
                        <legend>报名类型</legend>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                            <tr>
                                <td>
                                    <p><input type='radio' name='type' value="定金" style='width:20px;height:20px' <?php echo $res['type']=='定金'?'checked':''; ?>/> 定金 </p>
                                    <p><input type='radio' name='type' value="次卡" style='width:20px;height:20px' <?php echo $res['type']=='次卡'?'checked':''; ?>/> 次卡 </p>
                                    <p><input type='radio' name='type' value="月卡" style='width:20px;height:20px' <?php echo $res['type']=='月卡'?'checked':''; ?>/> 月卡 </p>
                                    <p><input type='radio' name='type' value="年卡" style='width:20px;height:20px' <?php echo $res['type']=='年卡'?'checked':''; ?>/> 年卡 </p>
                                    <p><input type='radio' name='type' value="寒假班" style='width:20px;height:20px' <?php echo $res['type']=='寒假班'?'checked':''; ?>/> 寒假班 </p>
                                    <p><input type='radio' name='type' value="暑假班" style='width:20px;height:20px' <?php echo $res['type']=='暑假班'?'checked':''; ?>/> 暑假班 </p>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>场地</legend>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                            <tr>
                                <td>
                                    <p><input type='radio' name='scope' value="室内" style='width:20px;height:20px' <?php echo $res['scope']=='室内'?'checked':''; ?>/> 室内 </p>
                                    <p><input type='radio' name='scope' value="室外1" style='width:20px;height:20px' <?php echo $res['scope']=='室外1'?'checked':''; ?>/> 室外1 </p>
                                    <p><input type='radio' name='scope' value="室外2" style='width:20px;height:20px' <?php echo $res['scope']=='室外2'?'checked':''; ?>/> 室外2 </p>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
            </td>
        </tr>
    </table>
    </fieldset>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="2" align="center"><input type="submit" value="确定修改" style="width:150px;height:40px" /></td>
        </tr>
        <tr>
            <td colspan="2" align="left">
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
