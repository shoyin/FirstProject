
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>立即注册</title>
	<link rel="stylesheet" href="../static/css/top.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../static/css/zhuce.css" />
	

</head>
<body>
<?php

include'../header.php';
?>
		<main>
		<div id=maintop>立即注册</div>
		<div>
		<form action="insert.php" method='post'>
				<table>
						<tr>
							<td class=td1>用户名：</td>
							<td class=td2><input type="text" name="username" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td1>密码：</td>
							<td class=td2><input type="password" name="userpwd" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td1>确认密码：</td>
							<td class=td2><input type="password" name="rpwd" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td1>Email：</td>
							<td class=td2><input type="email" name="email" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td3>验证码：</td>
							<td class=td4><input type="text" name="yz" id="" size=18><img 
							 id='yz' src="../common/yanzheng.php" alt="" onclick='change(this)'><br/>
	<div style="text-align:left" onclick="changeimg()">看不清,点击更换验证码</div>
							
							</td>
						</tr>
						<tr>
							<td class=></td>
							<td class=td5>
								<input type="image" src="../static/images/sumbit.jpg" name="" id="" />
							
							</td>
						</tr>		

					

				</table>

		</form>
		</div>
		</main>

	<?php
	include'../footer.php';
	?>

</body>
</html>
<script type="text/javascript">
	function change(obj){
		obj.src="../common/yanzheng.php?r="+Math.random();
	}
	function changeimg(){
		//根据id获取一个元素对象
		var obj = document.getElementById("yz");
		obj.src="../common/yanzheng.php?r="+Math.random();
	}

	</script>