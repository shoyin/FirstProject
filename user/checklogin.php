<?php
include '../config.php';

$username = trim($_POST['username']);
$userpwd = md5(trim($_POST['userpwd']));
$remember = @trim($_POST['remember']);
$lastlogin=time();

//准备SQL语句，查询用户登录输入的用户名和密码跟数据库中bbs_user表中的数据是否一致
//如果一致，就说明，用户名和密码都是对的，应该成为登录状态





$sql = "select * from bbs_user where username='$username' and userpwd='$userpwd'";

$result = mysql_query($sql);
$_SESSION['user'] = mysql_fetch_assoc($result);
$sqlban = "select * from banip where id={$_SESSION['user']['id']}";
	@$resban=mysql_query($sqlban);
	@$rowban=mysql_fetch_assoc($resban);
	if(@$rowban){
		echo '<script type="text/javascript">alert("用户被禁用");window.location="logout.php";</script>';exit;
	}

if($result && mysql_num_rows($result)>0){

	

	
	if($remember){
		setcookie('username',$username,time()+3600*24*7,'/');
		setcookie('userpwd',$userpwd,time()+3600*24*7,'/');
	}
		if($_SESSION['user']['lastlogin']<mktime(0,0,0,date('m'),date('d'),date('Y'))){
			 //$i=$_SESSION['user']['id'];
		
		$sqlb="update bbs_user set money = money + 5 where id={$_SESSION['user']['id']}";
		
		 $resultb = mysql_query($sqlb);


		 $sqlt="update bbs_user set lastlogin='.$lastlogin.' where id={$_SESSION['user']['id']}";
		 
		 $resultt=mysql_query($sqlt);
	}
	echo '<script type="text/javascript">alert("登录成功");window.location="../index.php?userid='.$_SESSION['user']['id'].'";</script>';
}else{
	echo '<script type="text/javascript">alert("登陆失败请重新登陆");window.location="login.php";</script>';
}
mysql_close();