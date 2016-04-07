<?php
include '../../config.php';

// 获取我们要修改的版块的id
$id=intval($_GET['id']);

// 查询要修改的版块的信息，以显示在修改的form表单中
$sqls = "select * from bbs_sclass where id='$id'";
$results = mysql_query($sqls);

if($results && mysql_num_rows($results)>0){
	$rows=mysql_fetch_assoc($results);
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
	<form action="update.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
		所属分区:
<?php
			// 查出所有分区
			$sql = "select id,bname from bbs_bclass order by orderno asc";

			$result = mysql_query($sql);

			// 判断查询的结果
			if($result && mysql_num_rows($result)>0){
				echo '<select name="pid">';

				// 逐条获取分区数据便利到option内
				while($row = mysql_fetch_assoc($result)){
			?>
			<option value="<?php echo $row['id'];?>" <?php if($rows['pid']==$row['id']){echo 'selected';}?>><?php echo $row['bname'];?></option>;
<?php
				}
				echo '</select><br />';
			}
		?>
		
		版块名称：<input type="text" name="sname" value="<?php echo $rows['sname'];?>"><br />
		上传版块图标：<input type="file" name="logo"><br />
		分区说明：<textarea name="content" cols="30" rows="10"><?php echo $rows['content'];?></textarea><br />
		排列顺序：<input type="number" name="orderno" value="<?php echo $rows['orderno'];?>"><br />
		<input type="submit" value="添加">
	</form>
</body>
</html>
<?php
// 释放结果集，关闭数据库
mysql_free_result($result);
mysql_free_result($results);
mysql_close();
?>