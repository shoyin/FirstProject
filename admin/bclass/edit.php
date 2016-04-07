<?php
include '../../config.php';
$id=intval($_GET['id']);
$sql="select * from bbs_bclass where id='$id'";
$result=mysql_query($sql);

if($result && mysql_num_rows($result)>0){
	$row=mysql_fetch_assoc($result);
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
</head>
<body>
	
	<form action="update.php?id=<?php echo $row['id']?>" method='post' enctype='multipart/form-data'>
		<fieldset><legend>添加分区</legend>
			<table>
				<tr><td>分区名称</td><td><input type="text" name="bname" value="<?php echo $row['bname']?>"></td></tr>
				<tr><td>分区图标</td><td><input type="file" name="logo" id=""></td></tr>
				<tr><td>分区说明</td><td><textarea name="content" id="" cols="30" rows="5"> <?php echo $row['content']?></textarea></td></tr>
				<tr><td>排列顺序</td><td><input type="number" name="orderno" value="<?php echo $row['orderno']?>"></td></tr>
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