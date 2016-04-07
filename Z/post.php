<?php
header("content-type:text/html;charset=utf-8");
session_start();


if(strtolower(trim($_POST['yz']))!=strtolower($_SESSION['yz'])){
	echo '<script type="text/javascript">alert("验证码输入错误，请重新输入");window.location="yanzheng.html";</script>';
	exit();
}

echo '登录成功！';




