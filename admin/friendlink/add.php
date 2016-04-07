<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	body{

		font-family:"微软雅黑";
	}
	</style>
</head>
<body>
	
	<form action="insert.php" method='post' enctype='multipart/form-data'>
		<fieldset><legend>添加链接</legend>
			<table>
				<tr><td>链接名称</td><td><input type="text" name="linkname" id=""></td></tr>
				<tr><td>链接图标</td><td><input type="file" name="logo" id=""></td></tr>				
				<tr><td>链接地址</td><td><textarea name="url" id="" cols="30" rows="5"></textarea></td></tr>
				<tr><td>链接用户</td><td><input type="text" name="uid" id=""></td></tr>
				<tr><td>首页显示</td><td><input type="radio" name="isindex" value='1' checked>
				否<input type="radio" name="isindex" value='2'>是</td></tr>
				<tr><td>链接类型</td><td><input type="number" name="type" id=""></td></tr>
				<tr><td>排列顺序</td><td><input type="number" name="orderno" id=""></td></tr>
				<tr><td></td><td><input type="submit" value='添加' ></td></tr>
				<tr><td></td><td></td></tr>
			</table>			
		</fieldset>
	</form>
	
</body>
</html>