<?php
include '../../config.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
</head>
<body>
	<form action="user.php" method='post' >
	<fieldset><legend>添加新用户</legend>
		<table>
			
		<tr><td>用户名：</td></tr>
		<tr><td><input type="text" name="username" id=""></td></tr>
		<tr><td>密码：</td></tr>
		<tr><td><input type="password" name="userpwd" id=""></td></tr>
		<tr><td>Email:</td></tr>
		<tr><td><input type="email" name="email" id=""></td></tr>
		<tr><td>用户组：</td></tr>
		<tr><td><select name="level">
			<option value="0">超级管理</option>
			<option value="1">版主</option>
			<option value="2">会员</option>
			<option value="3" selected>新人</option>

		</select></td></tr>
		<tr><td><input type="submit" name="" id=""></td></tr>
		</fieldset>
	</table>

	</form>
</body>
</html>