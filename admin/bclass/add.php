<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
	<style type="text/css">
	body{

		font-family:"微软雅黑";
	}
	</style>
</head>
<body>
	
	<form action="insert.php" method='post' enctype='multipart/form-data'>
		<fieldset><legend>添加分区</legend>
			<table>
				<tr><td>分区名称</td><td><input type="text" name="bname" id=""></td></tr>
				<tr><td>分区图标</td><td><input type="file" name="logo" id=""></td></tr>
				<tr><td>分区说明</td><td><textarea name="content" id="" cols="30" rows="5"></textarea></td></tr>
				<tr><td>排列顺序</td><td><input type="number" name="orderno" id=""></td></tr>
				<tr><td></td><td><input type="submit" value='添加' ></td></tr>
				<tr><td></td><td></td></tr>
			</table>	
		</fieldset>
	</form>

</body>
</html>