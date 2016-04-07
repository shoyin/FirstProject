<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="./static/css/ft.css" /> 
	
	<link rel="stylesheet" type="text/css" href="./static/css/top.css" /> 
	<link rel="stylesheet" type="text/css" href="./static/css/style.css" /> 
	<style>
	#div10{

		float:left;
	}
	</style>
	
</head>
<?php
include'./header.php';

//格式话
$uid = intval($_GET['id']);

//获取用户信息
$sql = "select * from bbs_user where id='$uid'";

$result = mysql_query($sql);

if($result && mysql_num_rows($result)>0){

	//将用户信息赋值给$user
	$user = mysql_fetch_assoc($result);
}
?>
<body>

<main>

  <div class="w960 home-con clearfix">
	    <div class="home-con-left">
		 <p class="tit">个人中心</p>
		
		</div>
		<div class="home-con-right">
		   <div class="home-right-nav">
		     <ul class="clearfix">
			   <li class="active"><a href="###">基本资料</a></li>
			
			 </ul>
		   </div>
		   <div id=div10 >

	<form action="./admin/users/update.php?id=<?php echo $user['id'];?>" method="post" enctype="multipart/form-data">
	<table id=tb1 >
		<tr><td>当前头像</td><td style="height:60px"><img src="./static/uploads/<?php echo $user['headpic'];?>" alt="<?php echo $user['username'];?>" width="100" height="90"></td></tr>
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
		<td class=td2><textarea name="intoduce" cols="30" rows="5"><?php echo @$user['intoduce'];?></textarea></td>
	</tr>
	
	<tr>
		<td class=td1>

		</td>
		<td class=td2><input type="submit" name="" id="">
		<input type="reset" name="" id=""></td>
	</tr>
	</table>
	</form>	
	 </div>

</main>
</body>
</html>
<?php

//释放结果集 关闭数据库
mysql_free_result($result);
mysql_close();
?>