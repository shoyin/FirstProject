<?php
//头部版块
include'header.php';
$sqli="select * from webmsg where id=1";
$resi=mysql_query($sqli);
$rowi=mysql_fetch_assoc($resi);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $rowi['webname'];?></title>
	<link rel="stylesheet" href="./static/css/top.css">
	<link rel="stylesheet" href="./static/css/index.css">

</head>
<body>

<main>

<a href="">小栈导航 </a>
<?php

	//查询数据表字段orderno排序
	$sql="select * from bbs_bclass order by orderno asc";

	$result=mysql_query($sql);
	
	//判断结果遍历
	if($result && mysql_num_rows($result)>0){
		while($row=mysql_fetch_assoc($result)){
				$pid=$row['id'];
	?>	
<!--分区遍历-->
<div id=m2>
		<div id=m21> 
			<a id=a1 href="bclass.php?bid=<?php echo $row['id'];?>&userid=<?php echo @$uid;?>"><?php echo $row['bname']?></a> 
		</div>
		<div class="sclass">
			<!-- 版块遍历开始 -->
			<?php

				//查询版块信息
				$sqls = "select * from bbs_sclass where pid='$pid' order by orderno asc limit 6";
				$results = mysql_query($sqls);

				// 判断查询版块的结果
				if($results && mysql_num_rows($results)>0){
					while($rows = mysql_fetch_assoc($results)){
			?>
				<section>
					<figure>
						<img src="./static/uploads/<?php echo $rows['logo'];?>" alt="" width="72" height="60">
					</figure>
					<figure>
						<figcaption>
							<a id=a2 href="bclass.php?bid=<?php echo $row['id'];?>&userid=<?php echo @$uid;?>"><?php echo $rows['sname'];?></a>
						</figcaption>
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
					<!-- 版块遍历结束 -->
				</div>
</div>

<!-- 分区遍历结束 -->
<?php
				}
		}
//网站用户信息
include 'users.php';

//友链版块		
include'friendlink.php';

//释放结果集
mysql_free_result($result);
mysql_free_result($results);

mysql_close();
?>
</main>		
<?php
//底部版块
include('footer.php');
?>
</body>
</html>	
	



	

