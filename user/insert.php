<?php
include '../config.php';
$username = trim($_POST['username']);
$userpwd =@md5( trim($_POST['userpwd']));
$reuserpwd = @md5(trim($_POST['rpwd']));
$email = trim($_POST['email']);
$vcode = strtolower(trim($_POST['yz']));
$regtime = $lastlogin = time();
$lastip = ip2long($_SERVER['REMOTE_ADDR']);

//判断是否同意协议



//判断两次密码输入是否一致
if($userpwd != $reuserpwd){
	echo '<script type="text/javascript">alert("两次密码不一致");window.location="register.php";</script>';
	exit;
}

if(strtolower($_SESSION['yz']) != $vcode){
	echo '<script type="text/javascript">alert("验证码输入错误");window.location="register.php";</script>';
	exit;
}
//判断用户名是否被注册过，如果有，就不能再使用该用户名，需要重新填写用户名
$sql = "select username from bbs_user where username='$username'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该用户('.$username.')名已经被注册!");window.location="register.php";</script>';
	exit;
}

//准备插入数据库的SQL语句
$sql = "insert into bbs_user(username,userpwd,email,regtime,lastlogin,lastip)value('$username','$userpwd','$email','$regtime','$lastlogin','$lastip')";

//发送SQL 语句并返回执行结果
$result = mysql_query($sql);
$uid = mysql_insert_id();

if($result && $uid>0){
	//需要去查询用户数据
	$result = mysql_query("select * from bbs_user where id='$uid'");
	//返回首页，成为登录状态
	$_SESSION['user'] = mysql_fetch_assoc($result);
	
	echo '<script type="text/javascript">alert("注册成功");window.location="../index.php?userid='.$uid.'";</script>';

}

mysql_close();
