<?php

include'../../config.php';

//格式化
@$uid = intval($_GET['id']);

//sql查询
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
	<form action="insert.php" method="post">
		
		<table>
			
			<tr><td width=70>选择禁用</td><td></td></tr>
			<tr><td></td><td>
			<?php

			if($result && mysql_num_rows($result)>0){

			//将用户信息赋值给$user
			while($row=mysql_fetch_assoc($result)){
											
						if($row['level']>0){		

								//l联合查询在banip表内容
								$sqlb="select * from banip where ip>0";
								
								$resb=mysql_query($sqlb);
								if($resb){
											while($rowb=mysql_fetch_assoc($resb)){

												$rowu[]=$rowb['id'];
											}
											// 判断用户是否被禁用
											if(@!in_array(@$row['id'],$rowu)){

?><input type="checkbox" name="users[]" value="<?php echo $row['id'];?>"><?php echo $row['username'];?>
						<input type="hidden" name="ip[]" value="<?php echo $row['lastip'];?>">
<?php
										}
								}					
						}
					}
				}
			?>

			</td></tr>
			<tr><td width=70></td><td><input type="submit" value="添加禁用" onclick="return confirm('你是玩真的吗?');"></td></tr>
		</table>
	</form>
</body>
</html>
<?php
mysql_free_result($result);
mysql_close();
?>