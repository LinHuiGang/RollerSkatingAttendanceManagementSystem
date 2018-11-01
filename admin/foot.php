<?php
/**
 * Created by PhpStorm.
 * User: yuange
 * Date: 2018/10/9
 * Time: 16:26
 */
?>
<div data-role="widget" data-widget="nav4" class="nav4">

    <nav><div id="nav4_ul" class="nav_4"><ul class="box">
                <li><a><span>其它</span></a>
                    <dl>
                        <dd><a href="../login.php"><span>反回登陆</span></a><dd>
                        <dd><a href="../jl/jl_dk.php?name=李学子"><span>打卡开发中</span></a><dd>
                    </dl>
                </li>
                <li><a href="../jl/qd_list.php?name=李学子"><span>签到管理</span></a></li>
                <li><a href="../jl/plqd.php?name=李学子"><span>批量签到</span></a></li>
            </ul>
        </div>
    </nav>
    <div id="nav4_masklayer" class="masklayer_div on">&nbsp;</div>
    <script src="../js/nav4.js"></script>
    <script type="text/javascript">
        nav4.bindClick(document.getElementById("nav4_ul").querySelectorAll("li>a"), document.getElementById("nav4_masklayer"));
    </script>
</div>

