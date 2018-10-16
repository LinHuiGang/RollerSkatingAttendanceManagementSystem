<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/16
 * Time: 9:29
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
$res=$db->getRow($sql);
$times=array();
for ($i=0;$i>-14;$i--)
{
    array_push($times,date("Y-m", strtotime($i." month")));
}
$title='统计修改';
require_once 'footsuper.php';
?>
<form action="tongji_xg_post.php" method="post">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <body align="center">
                <fieldset>
                    <legend><?php echo $title?></legend>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
                        <tr>
                            <td width='149' align='left'>月份</td>
                            <td align='left'>收入</td>
                        </tr>
                        <?php
                        $i=0;
                        foreach ($res as $key=>$value){
                            if(intval($i)==14)
                                break;
                            echo '<tr>';
                            echo "<td width='149' align='left'>".$times[$i]."</td>
                                  <td align='left'>
                                <input name='".$key."' type='text' value='".$value."'style='width:150px;height:40px' size='10'>
                                <span class='STYLE1'>*</span></td>";
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </table>
                </fieldset>
            </body>
        </tr>
    </table>
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
