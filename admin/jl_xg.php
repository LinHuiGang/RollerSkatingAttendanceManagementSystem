<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/10
 * Time: 8:26
 */
session_start();
if(!isset($_SESSION['name'])){
    header('Location:../login.php');
    exit();
}
if(isset($_GET['name'])){
    require_once '../include/db_class.php';
    require_once '../config.php';
    $jlname=$_GET['name'];
    $sql='select * from coach where name = \''.$jlname.'\'';
    $res=$db->getRow($sql);
    $db->close();
    if(!$res){
        echo '教练数据查询错误！<br />源梦科技www.ym998.cn';
        exit();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
</head>

<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />
    <meta name="Generator" content="EditPlus">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <link rel="stylesheet" type="text/css" href="../css/menu.css" media="all">
    <link href="../css/cebian.css" rel="stylesheet" media="screen" type="text/css" />
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <title>轮滑倶乐部运营大师-后台管理-教练管理_修改教练信息</title>
</head>

<body>
    <div class="bg"><img src="../images/home-default17.jpg" width="100%" height="100%;"></div>
    <?php
    if($_SESSION['identity']=='管理员'){
        include_once 'footsuper.php';
    }else{
        include_once 'foot.php';
    }
    ?>
    <?php echo '当前登陆的教练员是:'.$_SESSION['name'].'<br />当前身份：'.$_SESSION['identity'];?>
    <style>
        fieldset{margin-top:1em;margin-bottom:1em;border:1px solid #ddd;padding:1em 15px;}
        legend{font-weight:bold;font-size:1.4em; font-weight:bold; padding:.2em 5px;}
        p{margin:0 auto}
    </style>
        <fieldset>
            <legend>教练修改</legend>
            <form action="jl_xg_post.php?name=<?php echo $jlname ?>" method="post">
                <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#FF9900">
                    <tr>
                        <td>教练名字</td>
                        <td><input name="name" type="text" style="width:150px;height:40px" value="<?php echo $res['name']; ?>" ></td>
                    </tr>
                    <tr>
                        <td>教练密码</td>
                        <td> <input name="password" type="text" style="width:150px;height:40px" value="<?php echo $res['password']; ?>" ></td>
                    </tr>
                    <tr>
                        <td>身份设置</td>
                        <td><p>管理员
                                <input type="radio" value="管理员" name="jl_sf" style="width:25px;height:25px" <?php echo $res['identity']=='管理员'?'checked':''; ?>>
                            </p>
                            <p>教练
                                <input type="radio" value="教练" name="jl_sf" style="width:25px;height:25px" <?php echo $res['identity']=='教练'?'checked':''; ?>>
                            </p></td>
                    </tr>
                    <tr>
                        <td>共上课时</td>
                        <td> <input name="ks" type="text" style="width:150px;height:40px" value="<?php echo $res['class_hour_sum']; ?>" size="5" maxlength="3">
                        </td>
                    </tr>
                    <tr>
                        <td>添加时间</td>
                        <td> <input name="add_time" type="text" style="width:150px;height:40px" value="<?php echo $res['add_time']?$res['add_time']:'无法显示'; ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=" 2" align="center"><input type="submit" value="确定修改" style="width:150px;height:40px">
                        </td>
                    </tr>
                </table>
                <fieldset>
            </form>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <p>&nbsp</p>

</body>
</html>