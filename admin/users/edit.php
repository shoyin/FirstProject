<?php

include'../../config.php';

//格式化
$uid = intval($_GET['id']);

//查询当前用户
$sql = "select * from bbs_user where id='$uid'";

$result = mysql_query($sql);
if($result && mysql_num_rows($result)>0){

	//将用户信息赋值给$user
	$user = mysql_fetch_assoc($result);
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" /> 
	<link rel="stylesheet" href="../../static/css/admin.css">
	
</head>
<body>
	
	<form action="update.php?id=<?php echo $user['id'];?>" method="post" enctype="multipart/form-data">
	<table id=tb1>
		<tr><td>当前头像</td><td style="height:60px"><img src="../../static/uploads/<?php echo $user['headpic'];?>" alt="<?php echo $user['username'];?>" width="100" height="90"></td></tr>
	<tr>
		<td class=td1>用户名：</td>
		<td class=td2><input type="text" value="<?php echo $user['username'];?>" disabled></td>
	</tr>
	<tr>
		<td class=td1>密码：</td>
		<td class=td2><input type="password" name="userpwd" id=""></td>
	</tr>
	<tr>
		<td class=td1>确认密码：</td>
		<td class=td2><input type="password" name="reuserpwd" id=""></td>
	</tr>
	<tr>
		<td class=td1>email：</td>
		<td class=td2><input type="email" name="email" value="<?php echo $user['email'];?>"></td>
	</tr>
	<tr>
		<td class=td1>qq：</td>
		<td class=td2><input type="text" name="qq" value="<?php echo $user['qq'];?>"></td>
	</tr>
	<tr>
		<td class=td1>phone：</td>
		<td class=td2><input type="text" name="phoneno" value="<?php echo $user['phoneno'];?>"></td>
	</tr>
	<tr>
		<td class=td1>性别：</td>
		<td class=td2><input type="radio" name="sex" value='0' <?php if($user['sex']==0){echo 'checked';}?>>保密
		<input type="radio" name="sex" value='1'  <?php if($user['sex']==1){echo 'checked';}?>>女
		<input type="radio" name="sex" value='2'  <?php if($user['sex']==2){echo 'checked';}?>>男
		</td>
	</tr>
	<tr>
		<td class=td1>头像：</td>
		<td class=td2><input type="file" name="headpic"></td>
	</tr>
	<tr>
		<td class=td1>签名：</td>
		<td class=td2><textarea name="signtext" cols="30" rows="5"><?php echo $user['signtext'];?></textarea></td>
	</tr>
	<tr>
		<td class=td1>个人介绍：</td>
		<td class=td2><textarea name="intoduce" cols="30" rows="5"><?php echo $user['intoduce'];?></textarea></td>
	</tr>
	<tr>
		<td class=td1>等级权限：</td>
		<td class=td2><select name="level">
			<option value="0"<?php if($user['level']==0){echo 'selected';}?>>超级管理</option>
			<option value="1"<?php if($user['level']==1){echo 'selected';}?>>版主</option>
			<option value="2"<?php if($user['level']==2){echo 'selected';}?>>会员</option>
			<option value="3"<?php if($user['level']==3){echo 'selected';}?>>新人</option>

		</select></td>
	</tr>
	<tr>
		<td class=td1>

		</td>
		<td class=td2><input type="submit" name="" id="">
		<input type="reset" name="" id=""></td>
	</tr>
	</table>
	</form>	

</body>
</html>
<?php

//释放，关闭
mysql_free_result($result);
mysql_close();
?>