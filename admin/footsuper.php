<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/9
 * Time: 8:12
 */
?>
<!DOCTYPE html>
<html>
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
    <title><?php echo $title?></title>
</head>
<body>
<?php echo '当前登陆的教练员是:'.$_SESSION['name'].'<br />当前身份：'.$_SESSION['identity'];?>
<div class="bg"><img src="../images/home-default17.jpg" width="100%" height="100%;"></div>
<div data-role="widget" data-widget="nav4" class="nav4">
    <nav><div id="nav4_ul" class="nav_4"><ul class="box">
                <li><a><span>管理</span></a>
                    <dl>
                        <dd><a href="../admin/tongji.php"><span>统计报表</span></a></dd>
                        <dd><a href="../jl/qd_list.php"><span>签到管理</span></a></dd>
                        <dd><a href="../admin/student_list.php">学员管理</span></a></dd>
                        <dd><a href="../admin/jl_management.php">教练管理</span></a></dd>
                    </dl></li>
                <li>
                    <a href="../admin/student_add.php"><span>学员添加</span></a>
                </li>
                <li>
                    <a href="../jl/plqd.php"><span>批量签到</span></a>
                </li>
                <li>
                    <a href="../login_out.php"><span>退出登陆</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="nav4_masklayer" class="masklayer_div on">&nbsp;</div>
    <script src="../js/nav4.js"></script>
    <script type="text/javascript">
        nav4.bindClick(document.getElementById("nav4_ul").querySelectorAll("li>a"), document.getElementById("nav4_masklayer"));
    </script>
</div>
<style>
    fieldset {
        margin-top: 1em;
        margin-bottom: 1em;
        border: 1px solid #ddd;
        padding: 1em 15px;
    }

    legend {
        font-weight: bold;
        font-size: 1.4em;
        font-weight: bold;
        padding: .2em 5px;
    }
</style>
