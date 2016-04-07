<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
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
		#td10{
		text-align:center;
		}
	</style>
</head>
<body>
<?php
include '../../config.php';

	echo '<table>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>过滤字段</th>';
	
	echo '<th>操作</th>';
	echo '</tr>';

//查询所有关键字
$sql = "select * from keyword";

$result = mysql_query($sql);

if($result && mysql_num_rows($result)>0){
	while($row= mysql_fetch_assoc($result)){
		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td>'.$row['keyword'].'</td>';
		
	?>

		<td><a href="dk.php?id=<?php echo $row['id'];?>" onclick="return confirm('你确定要删除吗?');">删除</a><br><a href="key.php">添加</a></td>
<?php
		echo '</tr>';
	}
}
echo '</table>';

mysql_free_result($result);
mysql_close();
?>
	
</body>
</html>