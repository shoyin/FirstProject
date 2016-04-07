
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登陆</title>
	<link rel="stylesheet" href="../static/css/top.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../static/css/zhuce.css" />
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

</head>
<body>
	

<?php

include '../header.php';

?>

		<main>
		<div id=maintop>用户登陆</div>
		<div>
		<form action="checklogin.php" method='post'>
				<table>
						<tr>
							<td class=td1></td>
							<td class=td2>
								

							</td>
						</tr>
				
						<tr>

							<td class=td1>用户名：</td>
							<td class=td2><input type="text" name="username" id="" size=35><a href="register.php">立即注册</a></td>
							
						</tr>	
						<tr>
							<td class=td1>密码：</td>
							<td class=td2><input type="password" name="userpwd" id="" size=35><a href="#">找回密码</a></td>
							
						</tr>	
							
					
						
						<tr>
							<td class=></td>
							<td class=td5>
							      <input type="checkbox" name="remember" val>自动登陆<br/>
								<input type="image" src="../static/images/dl1.jpg" name="" id="" />
							
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
