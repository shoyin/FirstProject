<?php

include'../../config.php';

//格式化
@$uid = intval(@$_GET['id']);

//查询所有用户
$sql = "select * from bbs_user";
$result = mysql_query($sql);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	form{

		font:14px "微软雅黑";
	}
	</style>
</head>

<body>
	<form action="deall.php" method="post">
		
		<table>
			
			<tr><td width=70>全部删除</td><td><input type="checkbox" name="dall" value="1">慎用！！！</td></tr>
			<tr><td>批量删除</td><td>
<?php
			if($result && mysql_num_rows($result)>0){

			//将用户信息赋值给$user
			while($row=mysql_fetch_assoc($result)){

						//遍历除了超级管理外的所有用户
						if($row['level']>0){
												?>
		
						<input type="checkbox" name="users[]" value="<?php echo $row['id'];?>"><?php echo $row['username'];?>

						<?php
						}
					}
				}
			?>

			</td></tr>
			<tr><td width=70></td><td><input type="submit" value="删除" onclick="return confirm('你是玩真的吗?');"></td></tr>
		</table>
	</form>
</body>
</html>
<?php

//释放结果。关闭
mysql_free_result($result);
mysql_close();
?>