<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/top.css" />
	<style>
		table{
			width:800px;
			border:1px solid #ededed;
			text-align:center;
		}
		table th{
			border-top:1px solid #ededed;
			border-bottom:1px solid #ededed;
		}
		table td{
			border:1px solid #ededed;
			/*border-bottom:1px solid #ededed;*/
		}
	</style>
</head>
<body>
<?php
	include'../../config.php';

		echo '<table>';
		echo '<tr>';
		echo '<th>网站名称</th>';
		echo '<th>网站版logo</th>';
		echo '<th>网站版权</th>';
		echo '<th>操作</th>';
		echo '</tr>';

	//网站信息查询
	$sql="select * from webmsg where id=1";

	$result=mysql_query($sql);

	$row=mysql_fetch_assoc($result);
			echo '<tr>';
			echo '<td>'.$row['webname'].'</td>';
			echo '<td><img src="../../static/uploads/'.$row['logo'].'" width="180" height="140"></td>';
			echo '<td>'.$row['ban'].'</td>';
		?>

	<td>
		<a href="edit.php?id=<?php echo $row['id'];?>">修改</a><br>
<?php
		echo '</tr>';
		echo '</table>';

mysql_free_result($result);
mysql_close();
?>
	
</body>
</html>