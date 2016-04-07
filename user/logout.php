<?php
header("content-type:text/html;charset=utf-8");
session_start();
$_SESSION['user'] = null;

if(!empty($_COOKIE[session_name()])){
	setcookie(session_name(),'',-3600,'/');
}
session_destroy();

if(!empty($_COOKIE['username']) || !empty($_COOKIE['userpwd'])){
	setcookie('username','',-3600,'/');
	setcookie('userpwd','',-3600,'/');
}

echo '<script type="text/javascript">alert("退出成功");window.location="../index.php";</script>';