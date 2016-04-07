<?php
include '../../config.php';

//获取参数
$username=trim($_POST['username']);
$userpwd=md5(trim($_POST['userpwd']));
$email=trim($_POST['email']);
$level=$_POST['level'];
$regtime=$lastlogin = time();
$lastip=ip2long($_SERVER['REMOTE_ADDR']);

//判定用户
if($username==null){
	echo '<script type="text/javascript">alert("用户不能为空!");window.location="adduser.php";</script>';
	exit;
}

if(empty($userpwd)){
	echo '<script type="text/javascript">alert("密码不能为空!");window.location="adduser.php";</script>';
	exit;
}

//判断用户名是否被注册过，如果有，就不能再使用该用户名，需要重新填写用户名
$sql = "select username from bbs_user where username='$username'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该用户('.$username.')名已经被注册!");window.location="adduser.php";</script>';
	exit;
}

//准备插入数据库的SQL语句
$sql = "insert into bbs_user(username,userpwd,email,regtime,lastlogin,lastip,level)value('$username','$userpwd','$email','$regtime','$lastlogin','$lastip','$level')";

//发送SQL 语句并返回执行结果
$result = mysql_query($sql);
$uid = mysql_insert_id();

if($result && $uid>0){
	//需要去查询用户数据


	echo '<script type="text/javascript">alert("添加成功");window.location="list.php";</script>';

}

mysql_close();


