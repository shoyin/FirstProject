<?php

include'../../config.php';

//格式化
$uid = intval($_GET['id']);

//网站信息获取
$sql = "select * from webmsg where id=1";
$result = mysql_query($sql);
if($result && mysql_num_rows($result)>0){

	//将用户信息赋值给$user
	$row = mysql_fetch_assoc($result);
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" /> 
	<link rel="stylesheet" href="../../static/css/admin.css">
	<style type="text/css">
	table{
		height:300px
	}

	</style>
	
</head>
<body>
	
	<form action="update.php?" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>网站信息修改</legend>
	<table id=tb1>
		<tr><td>当前logo</td><td style="height:60px"><img src="../../static/uploads/<?php echo $row['logo'];?>" alt="<?php echo $row['webname'];?>" width="100"></td></tr>
	<tr>
		<td class=td1>网站名称：</td>
		<td class=td2><input type="text" name="webname" value="<?php echo $row['webname'];?>"></td>
	</tr>
	
	<tr>
		<td class=td1>logo：</td>
		<td class=td2><input type="file" name="headpic"></td>
	</tr>
	<tr>
		<td class=td1>网站简述：</td>
		<td class=td2><textarea name="msg" cols="30" rows="5"><?php echo $row['msg'];?></textarea></td>
	</tr>
	<tr>
		<td class=td1>网站版权：</td>
		<td class=td2><textarea name="ban" cols="30" rows="5"><?php echo $row['ban'];?></textarea></td>
	</tr>
	
	<tr>
		<td class=td1>

		</td>
		<td class=td2><input type="submit" name="" id="">
		<input type="reset" name="" id=""></td>
	</tr>
	
	


	</table>
	</fieldset>
	</form>	

</body>
</html>
<?php

//释放关闭
mysql_free_result($result);
mysql_close();
?>