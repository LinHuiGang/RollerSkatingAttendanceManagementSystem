<?php
session_start();
if(isset($_SESSION['name'])){
    header('Location:index.php');
}
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
    <link rel="stylesheet" type="text/css" href="css/menu.css" media="all">
    <link rel="stylesheet" href="css/logo.css">
    <title>飘逸轮滑倶乐部用户登录</title>
</head>

<body>
    <div data-role="widget" data-widget="nav4" class="nav4">
            <nav>
                <div id="nav4_ul" class="nav_4">
                    <ul class="box">
                        <li>
                        	<a href="login.php"><span>教练登陆</span></a>
<!--                             <dl>
                                <dd><a href="admin/login.php"><span>教练登陆</span></a></dd>
                            </dl> -->
                        </li>
                        <li>
                        	<a href="login.php"><span>学员登陆</span></a>
                        </li>
                        </li>
                        <li>
                        	<a href="index.html"><span>返回首页</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        <div id="nav4_masklayer" class="masklayer_div on">&nbsp;</div>
        <script src="js/nav4.js"></script>
        <script type="text/javascript">
        nav4.bindClick(document.getElementById("nav4_ul").querySelectorAll("li>a"), document.getElementById("nav4_masklayer"));
        </script>
    </div>
    <section class="container">
        <div class="login">
            <h1>用户登录</h1>
            <form name="login" action="login_post.php" method="post">
                <p>姓名：<input name="name" type=text style="width:150px;height:40px" placeholder="名字"></p>
                <p>密码：<input name="password" type=password style="width:150px;height:40px" placeholder="密码"></p>
                <p>身份：
                    <input name="sf" type=radio style="width:24px;height:24px" value="学员" checked>学员
                    <input name="sf" type=radio style="width:24px;height:24px" value="教练" >教练
                </p>
                <p class="remember_me">
                    <label>
                        <input name="remember_pass" type="checkbox" id="remember_pass" style="width:24px;height:24px" value="remember_pass" checked>记住用户名密码
                    </label>
                </p>
                <p class="submit"><input type="submit" name="submit" value="登录"></p>
            </form>
        </div>
    </section>
</body>
</html>