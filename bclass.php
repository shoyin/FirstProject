<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
	<title>论坛</title>
	<link rel="stylesheet" type="text/css" href="static/css/index.css">
	<link rel="stylesheet" type="text/css" href="./static/css/top.css">
	<link rel="stylesheet" type="text/css" href="static/css/ft.css" />

</head>
<body>
<?php

//头部
include'header.php';

//格式化
@$bid = intval($_GET['bid']);

?>	

<main>
<a href="index.php">小栈导航</a>><a href="">小栈专区</a>
<?php
		

		
		//准备好查出所有的分区数据的SQL查询语句
		$sql = "select * from bbs_bclass where id=$bid";
		
		//发送SQL语句并返回查询结果
		$result = mysql_query($sql);

		//判断返回结果是否有效
		if($result && mysql_num_rows($result)>0){

			//如果有效，将分区的结果数据查询出来并赋值给$row变量
			$row = mysql_fetch_assoc($result)
				
		?>
		
		<div id=m2>
			<div id=m21> 
				<a id=a1 href="bclass.php?bid=<?php echo $row['id'];?>&userid=<?php echo @$uid;?>"><?php echo $row['bname']?></a>
			</div>
		<div class="sclass">

			<?php

			//查询版块信息orderno遍历
			$sqls = "select * from bbs_sclass where pid='$bid' order by orderno asc";
			$results = mysql_query($sqls);
			if($results && mysql_num_rows($results)>0){
				while($rows = mysql_fetch_assoc($results)){
			?>

			<section>
				<figure>
					<img src="./static/uploads/<?php echo $rows['logo'];?>" alt="" width="72" height="60">
				</figure>
				<figure>
					<figcaption><a id=a2 href="list.php?bid=<?php echo $bid;?>&sid=<?php echo $rows['id'];?>&page=0&userid=<?php echo @$uid;?>"><?php echo $rows['sname'];?></a></figcaption>
				<?php

						//查询版块下帖子总数
							$sqlb="select * from content where pid={$rows['id']} order by postime desc";
							$resb=mysql_query($sqlb);
							$total=mysql_num_rows($resb);
							$rowb=mysql_fetch_assoc($resb);

							//查询版主username
							$sqlu="select * from bbs_user where id={$rows['banzhu']}";
							
							$resu=mysql_query($sqlu);
							@$rowu=mysql_fetch_assoc($resu);
						?>
						<div class=d11>帖子:<?php echo $total;?>&nbsp&nbsp版主:<?php echo @$rowu['username'];?></div>
						<div class=d11>最后发帖:<?php  if(!empty($rowb['postime'])){echo date('Y-m-d ',@$rowb['postime']);}?></div>
					</figure>
				</section>

<?php
				}
			}
?>
		</div>

<?php		

}

include'publish.php';

//友链
include'friendlink.php';
		
?>
		
	</main>

<?php



//底部包含
include_once('footer.php');
?>	
  
</body>
</html>

<?php

//使用数据库完成后，释放结果集
mysql_free_result($result);
mysql_free_result($results);

//关闭数据库连接
mysql_close();

?>