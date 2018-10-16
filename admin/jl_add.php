<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/9
 * Time: 12:09
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
$title='轮滑倶乐部运营大师教练添加';
require_once 'footsuper.php';
?>
<section class="container">
    <div class="login">
        <form action="jl_add_post.php" method="post">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <fieldset>
                            <legend>轮滑倶乐部运营大师教练添加</legend>
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                                <tr>
                                    <td width="149" align="left">名字: </td>
                                    <td align="left"> <input type="text" name="name" placeholder="教练名字" style="width:150px;height:40px">
                                        <span class="STYLE1">*</span></td>
                                </tr>

                                <tr>
                                    <td width="149" align="left">密码: </td>
                                    <td align="left"> <input type="text" name="password" placeholder="教练密码" style="width:150px;height:40px">
                                        <span class="STYLE1">*</span></td>
                                </tr>
                                <tr>
                                    <td width="149" height="50" align="left">身份： </td>
                                    <td align="left">
                                        <input value="教练" type="radio" name="identity" checked>教练
                                        <input value="管理员" type="radio" name="identity">管理员
                                            <span class="STYLE1">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" value="增加教练" style="width:150px;height:40px"/>
                                    </td>
                                </tr>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
<p>&nbsp</p>
</body>

</html>
