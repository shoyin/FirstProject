<?php
include'../../config.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
</head>
<body>
	
	<form action="insert.php" method='post' enctype='multipart/form-data'>

		<fieldset><legend>添加版块</legend>
			<table>
				<tr><td>选择所属分区</td>
				<td>
<?php
			// 查出所有分区
			$sql = "select id,bname from bbs_bclass order by orderno asc";

			$result = mysql_query($sql);

			// 判断查询的结果
			if($result && mysql_num_rows($result)>0){
				echo '<select name="pid">';

				// 逐条获取分区数据便利到option内
				while($row = mysql_fetch_assoc($result)){
					echo '<option value="'.$row['id'].'">'.$row['bname'].'</option>';
				}
				echo '</select>';
			}
		?>
				</td></tr>
				<tr><td>版块名称</td><td><input type="text" name="sname" id=""></td></tr>
				<tr><td>版块图标</td><td><input type="file" name="logo" id=""></td></tr>
				<tr><td>版块说明</td><td><textarea name="content" id="" cols="30" rows="5"></textarea></td></tr>
				<tr><td>排列顺序</td><td><input type="number" name="orderno" id=""></td></tr>
				<tr><td></td><td><input type="submit" value='添加' ></td></tr>
				<tr><td></td><td></td></tr>	
			</table>
		</fieldset>

	</form>
	
</body>
</html>
<?php
// 释放结果集，关闭数据库
mysql_free_result($result);
mysql_close();
?>