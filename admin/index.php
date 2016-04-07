<?php

include '../config.php';

//格式化
$qid=$_GET['qid'];

//sql查询
$sqlq="select * from bbs_user where id='$qid'";
$resq=mysql_query($sqlq);
$rowq=mysql_fetch_assoc($resq);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../static/css/admin.css">
	<style type="text/css">
	*,body{
		margin:0px auto;
		font-family:"微软雅黑";
		
	}
	.d10{
		float:left
	}
	.d11{
		margin-top:10px;
		font-size:50px ;
		text-align:center
	}
	</style>
</head>
<body>
	<header>
		<figure><div class=d10><img src="../static/images/log.jpg" alt=""></div><div class=d11>小 栈 后 院</div></figure>
		
		<ul>
			
			<li><a href="../index.php?userid=<?php echo $qid;?>" target="_top">前台首页</a></li>
			<li>管理员：<?php echo $rowq['username']; echo'|'; getlevel($rowq['level']);?></li>
			<li><a href="../user/logout.php"  target="_top">注销</a></li>
		</ul>
	</header>
	<main>
		<div class="menu">
			<ul>
				<?php

				//判断权限区分功能
				if($rowq['level']==0){

				?>

				<li><a href="users/list.php?page=0" target="main">用户管理</a></li>
				<li><a href="users/adduser.php" target="main">添加用户</a></li>
				<li><a href="ban/add.php" target="main">禁用用户</a></li>
				<li><a href="ban/list.php" target="main">禁用管理</a></li>
				<li><a href="bclass/list.php" target="main">分区管理</a></li>
				<li><a href="bclass/add.php" target="main">添加分区</a></li>
				<li><a href="sclass/ban.php" target="main">版主管理</a></li>
				
				<?php
				}

				if($rowq['level']<=1){
				?>
				<li><a href="sclass/list.php" target="main">版块管理</a></li>
				<li><a href="sclass/add.php" target="main">添加板块</a></li>
				<li><a href="article/key.php" target="main">过滤设置</a></li>
				<li><a href="article/klist.php" target="main">过滤字段</a></li>
				
				<?php
			}
				?>

				<li><a href="article/list.php?qid=<?php echo $rowq['id'];?>" target="main">帖子管理</a></li>
				<li><a href="reply/list.php" target="main">回帖管理</a></li>
				<?php
				if($rowq['level']==0){

				?>
				<li><a href="friendlink/add.php" target="main">添加友链</a></li>
				<li><a href="friendlink/list.php" target="main">友链管理</a></li>
				<li><a href="web/list.php" target="main">网站信息</a></li>
				<?php
					}
				?>
			</ul>
		</div>
		<div class="rdiv">
			<iframe name="main" src="main.php" width="800" height="600"></iframe>
		</div>
	</main>
<?php
include '../footer.php';
?>
</body>
</html>
<?php

	function getlevel($n){

		switch($n){

			case 0: 
				echo'超级管理';
				break;
			case 1:
				echo '版主';
				break;
			case 2:
				echo '会员';
				break;
			case 3:
				echo '新人';
				break;
			default:
			break;
			}
	}
?>

