<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/10
 * Time: 20:25
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
$title='轮滑倶乐部运营大师学员添加';
require_once 'footsuper.php';
?>
<form action="student_add_post.php" method="post">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <fieldset>
                    <legend>个人信息</legend>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                        <tr>
                            <td width="149" align="left">学员姓名 </td>
                            <td align="left">
                                <input name="name_" type="text" style="width:150px;height:40px" size="10" maxlength="10">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">性别</td>
                            <td align="left">
                                男<input name="sex" type="radio" style="width:40px;height:40px" value="男" checked>
                                女<input name="sex" type="radio" value="女" style="width:40px;height:40px"></td>
                        </tr>
                        <tr>
                            <td align="left">登录密码</td>
                            <td align="left">
                                <input name="password" type="text" value="111111" style="width:150px;height:40px" size="5" maxlength="3">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">年龄</td>
                            <td align="left">
                                <input name="age" type="text" value="20" style="width:150px;height:40px" size="5" maxlength="3">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">出生年月</td>
                            <td align="left">
                                <input name="birth_date" type="date" style="width:150px;height:40px" value="2001-01-01" size="10" maxlength="8">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">身高</td>
                            <td align="left">
                                <input name="height" type="text" value="0" style="width:150px;height:40px" size="5" maxlength="3">
                                *cm </td>
                        </tr>
                        <tr>
                            <td align="left">体重</td>
                            <td align="left">
                                <input name="weight" type="text" value="0" style="width:150px;height:40px" size="5" maxlength="3">
                                *斤 </td>
                        </tr>
                        <tr>
                            <td align="left">电话</td>
                            <td align="left">
                                <input name="phone" type="text" style="width:150px;height:40px" size="10" maxlength="11">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">所交费用</td>
                            <td align="left">
                                <input name="money" type="text" style="width:150px;height:40px" size="10" maxlength="6">
                                <span class="STYLE1">*</span>元</td>
                        </tr>
                        <tr>
                            <td align="left">报名日期</td>
                            <td align="left">
                                <input name="start_time" type="date" style="width:150px;height:40px" value="<?php echo date('Y-m-d');?>" size="10" maxlength="8">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">到期日期</td>
                            <td align="left">
                                <input name="end_time" type="date" style="width:150px;height:40px" value="<?php echo date('Y-m-d',strtotime("+1 year"));?>" size="10" maxlength="8">
                                <span class="STYLE1">*</span></td>
                        </tr>
                        <tr>
                            <td align="left">最大签到次数</td>
                            <td align="left">
                                <input name="max_count" type="text" style="width:150px;height:40px" size="5" maxlength="6">
                                <span class="STYLE1">*</span>次</td>
                        </tr>
                        <tr>
                            <td align="left">备注</td>
                            <td align="left">
                                <input name="integral" type="text" style="width:150px;height:40px">
                                <span class="STYLE1">*</span></td>
                        </tr>
                    </table>
                    <fieldset>
                        <legend>报名类型</legend>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                            <tr>
                                <td>
                                    <p><input type='radio' name='type' value='定金' style='width:20px;height:20px' /> 定金 </p>
                                    <p><input type='radio' name='type' value='次卡' style='width:20px;height:20px' /> 次卡 </p>
                                    <p><input type='radio' name='type' value='月卡' style='width:20px;height:20px' /> 月卡 </p>
                                    <p><input type='radio' name='type' value='年卡' style='width:20px;height:20px' /> 年卡 </p>
                                    <p><input type='radio' name='type' value='寒假班' style='width:20px;height:20px' /> 寒假班 </p>
                                    <p><input type='radio' name='type' value='暑假班' style='width:20px;height:20px' /> 暑假班 </p>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>场地</legend>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                            <tr>
                                <td>
                                    <p><input type='radio' name='scope' value='室内' style='width:20px;height:20px' /> 室内 </p>
                                    <p><input type='radio' name='scope' value='室外1' style='width:20px;height:20px' /> 室外1 </p>
                                    <p><input type='radio' name='scope' value='室外2' style='width:20px;height:20px' /> 室外2 </p>
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
        <td colspan="2" align="center"><input type="submit" value="增加学员" style="width:150px;height:40px" /></td>
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
