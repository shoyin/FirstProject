<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
	<title>论坛</title>
	<link rel="stylesheet" type="text/css" href="static/css/index.css">
	<link rel="stylesheet" type="text/css" href="static/css/top.css">
	<link rel="stylesheet" type="text/css" href="static/css/ft.css" />
	<link rel="stylesheet" type="text/css" href="static/css/style.css" />
	<style>
	#a11{
		font-weight:bold ;
		font-size:24px;
		color:#D1E84B;
	}
	#a2{
	font-size:16px;
	color:#551A8B
}
.d11{
	font-size:12px;
}

	</style>
</head>
<body>
<?php

//头部
include'header.php';

//获取url传参
@$bid=intval($_GET['bid']);
@$pid=intval($_GET['sid']);
?>	

<main>
<a href="index.php">小栈导航</a>><a href="bclass.php?bid=<?php echo $bid;?>&userid=<?php echo @$uid;?>">小栈专区</a>	><a href="">专区详情</a>><a href="">总贴庄园</a>
		<div id=m2>
			<div id=m21> 
				<a id=a1 href="">总贴庄园</a>
			</div>
		<div class="lclass">
	 	<div class="bm bm1 bm-d" style="border:0px">
		  <div class="bm-h clearfix">
			<div class="fl zhut">
				<a class="dow" href="#">全部主题</a>
				<a href="#">[置顶]</a>
				<a href="#">[高亮]</a>
				<a href="#">[热帖]</a>
				<a href="#">[精华]</a>
				<a class="dow" href="#">更多</a>
			</div>
			<div style="float:right" >
				<div class=d3><a class="dow" href="#"></a></div>
				<div class=d3><a class="dow" href="#">作者</a></div>
				
				
				<div  class=d3><a href="#">最后发表</a></div>
				
			</div>
			
			
			
		 </div>
<?php

//查询版块信息orderno遍历
if(intval($_GET['page'])==0){
	$page=1;
}else{
	$page=$_GET['page'];
}

// 定义每页显示数据的条数
$pagesize =10;

//遍历所有帖子
$sqls = "select * from content where id>=0 ";
$results=mysql_query($sqls);
$total=mysql_num_rows($results);

// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

//查询所有信息
$sqls = "select * from content where id>=0 order by istop desc,ishot desc,isjinghua desc,islit desc,postime desc limit $offset,$pagesize";
$results = mysql_query($sqls);

//边界处理
$prepage = ($page-1)<=0 ? 1:$page-1;
$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;

			if($results && mysql_num_rows($results)>0){
				while($rows = mysql_fetch_assoc($results)){

						//判断是否隐藏帖子
						if($rows['isopen']==1){

			?>

			<div id=div0>
				<div id=div1><?php if($rows['islit']==1){?>
				<a id=a11 href="open.php?sid=<?php echo $rows['id'];?>&userid=<?php echo @$uid;?>&page=0&posttime=<?php echo $rows['postime']?>&bid=<?php echo $bid;?>&pid=<?php echo $pid;?>"><?php echo $rows['title'];?></a><?php 
				}elseif($rows['islit']==0){ 
					?>
					<a href="open.php?sid=<?php echo $rows['id'];?>&userid=<?php echo @$uid;?>&page=0&posttime=<?php echo $rows['postime']?>&bid=<?php echo $bid;?>&pid=<?php echo $pid;?>"><?php echo $rows['title'];?></a>
				
					<?php
				}

				//判断高亮置顶等
					if($rows['istop']==1){
						?>
						<img src="./static/images/ding.png">
					<?php
					}

					if($rows['isjinghua']==1){
					?>
						<img src="./static/images/jing.gif">
					<?php
					}

					if($rows['ishot']==1){
					?>
						<img src="./static/images/re.png">
					<?php
					}

					?>

				</div>

				<?php

					//查询用户作者信息
					$sqlu = "select * from bbs_user where id={$rows['uid']}";
					$resu=mysql_query($sqlu);
					$rowu=mysql_fetch_assoc($resu);

					?>

				<div class=div2></div>
				<div class=div2><?php echo $rowu['username'];?></div>
				
				<div class=div2><?php echo date('Y-m-d H:i:s',$rows['postime']);?></div>
				

			</div>

<?php
				}
			}
		}

		//分页版块
?>
		</div>
		<div style="font:12px '微软雅黑'">
			<a href="?page=1">首页</a>|
			<a href="?page=<?php echo $prepage;?>&userid=<?php echo @$uid;?>">上一页</a>|
			<a href="?page=<?php echo $nextpage?>&userid=<?php echo @$uid;?>">下一页</a>|
			<a href="?page=<?php echo $pagecount;?>&userid=<?php echo @$uid;?>">尾页</a>
			当前是第<?php echo $page;?>页/总共<?php echo $pagecount;?>页|
			共<?php echo $total;?>
		</div>
<?php		

//发帖
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
mysql_free_result($resu);
mysql_free_result($results);

//关闭数据库连接
mysql_close();

?>