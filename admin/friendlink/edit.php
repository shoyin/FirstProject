<?php
include '../../config.php';
$id=intval($_GET['id']);
$sql = "select * from friendlink where id='$id'";
$result = mysql_query($sql);

if($result && mysql_num_rows($result)>0){
	$row = mysql_fetch_assoc($result);
}
?>

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
	
	<form action="update.php?id=<?php echo $row['id']; ?>" method='post' enctype='multipart/form-data'>
		<fieldset><legend>修改链接</legend>
			<table>
				<tr><td>链接名称</td><td><input type="text" name="linkname" value="<?php echo $row['linkname'];?>"></td></tr>
				<tr><td>链接图标</td><td><input type="file" name="logo" ></td></tr>
				
				<tr><td>链接地址</td><td><textarea name="url" id="" cols="30" rows="5"> <?php echo $row['url'];?></textarea></td></tr>
				<tr><td>链接用户</td><td><input type="text" name="uid"  value="<?php echo $row['uid'];?>"></td></tr>
				<tr><td>首页显示</td><td><input type="radio" name="isindex" value="1"<?php if($row['isindex']==1){ echo "checked";}?>>
				否<input type="radio" name="isindex" value="2"<?php if($row['isindex']==2){echo "checked";}?>
>是</td></tr>
				<tr><td>链接类型</td><td><input type="number" name="type"  value="<?php echo $row['type'];?>"></td></tr>
				<tr><td>排列顺序</td><td><input type="number" name="orderno"  value="<?php echo $row['orderno'];?>"></td></tr>
				<tr><td></td><td><input type="submit" value='修改' ></td></tr>
				<tr><td></td><td></td></tr>
					

			</table>
		
		
		</fieldset>

	</form>
	

</body>
</html>
<?php
mysql_free_result($result);
mysql_close();
?>