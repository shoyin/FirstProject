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
	#a12{

		float:right;
		line-height:35px;
		margin-right:10px

	}

	</style>
</head>
<body>

<?php

//头部
include'header.php';

//格式化
@$sid=intval($_GET['sid']);
@$bid=intval($_GET['bid']);
@$pid=intval($_GET['sid']);

		//准备好查出所有的分区数据的SQL查询语句
		$sql = "select * from bbs_sclass where id='$sid'";

		//发送SQL语句并返回查询结果
		$result = mysql_query($sql);

		//判断返回结果是否有效
		if($result && mysql_num_rows($result)>0){

		//如果有效，将分区的结果数据查询出来并赋值给$row变量
		$row = mysql_fetch_assoc($result);

		$sqlu="select * from bbs_user where id={$row['banzhu']}";
							
		$resu=mysql_query($sqlu);
		@$rowu=mysql_fetch_assoc($resu);
?>	

<main>
<a href="index.php">小栈导航</a>><a href="bclass.php?bid=<?php echo $bid;?>&userid=<?php echo @$uid;?>">小栈专区</a>	><a href="">专区详情</a>><a href="alist.php?page=0&userid=<?php echo @$uid;?>&bid=<?php echo $bid;?>&sid=<?php echo $sid;?>">总贴庄园</a>

<div id=m2>
			<div id=m21> 
				<a id=a1 href=""><?php echo $row['sname']?></a><a id=a12 href="" >版主大大：<?php echo $rowu['username'];?></a>
			</div>
		<div class="lclass">
	 <div class="bm bm1 bm-d" style="border:0px">
		  <div class="bm-h clearfix">
			<div class="fl zhut" width=600px>
				<a class="dow" href="alist.php?page=0&userid=<?php echo @$uid;?>">全部主题</a>
				
			
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
$sqls = "select * from content where pid='$sid'";
$results=mysql_query($sqls);
$total=mysql_num_rows($results);

// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

$sqls = "select * from content where pid='$sid' order by istop desc,ishot desc,isjinghua desc,islit desc,postime desc limit $offset,$pagesize";
$results = mysql_query($sqls);


$prepage = ($page-1)<=0 ? 1:$page-1;
$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;

			if($results && mysql_num_rows($results)>0){
				while($rows = mysql_fetch_assoc($results)){


						//高亮置顶判断公开
					if($rows['isopen']==1){
			?>
<div id=div0>
				<div id=div1><?php if($rows['islit']==1){?>
				<a id=a11 href="open.php?sid=<?php echo $rows['id'];?>&userid=<?php echo @$uid;?>&page=0&posttime=<?php echo $rows['postime']?>&bid=<?php echo $bid;?>&pid=<?php echo @$pid;?>"><?php echo $rows['title'];?></a><?php 
				}elseif($rows['islit']==0){ 
					?>
					<a href="open.php?sid=<?php echo $rows['id'];?>&userid=<?php echo @$uid;?>&page=0&posttime=<?php echo $rows['postime']?>&bid=<?php echo $bid;?>&pid=<?php echo @$pid;?>"><?php echo $rows['title'];?></a>
				
					<?php
				}
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

					//查询用户信息
					$sqlu = "select * from bbs_user where id={$rows['uid']}";
					$resu=mysql_query($sqlu);
					$rowu=mysql_fetch_assoc($resu);

					?>
					<div class=div2></div>
				<div class=div2><?php echo $rowu['username'];?></div>
				
				<div class=div2><?php echo date('Y-m-d H:i:s',$rows['postime']);?></div>
				

			</div>

<?php				}
				}
			}

		//分页开始
?>
		</div>
		<div style="font:12px '微软雅黑'"><a href="?page=1&sid=<?php echo $sid;?>&userid=<?php echo @$uid;?>">首页</a>|
		<a href="?page=<?php echo $prepage;?>&sid=<?php echo $sid;?>&userid=<?php echo @$uid;?>">上一页</a>|
		<a href="?page=<?php echo $nextpage?>&sid=<?php echo $sid;?>&userid=<?php echo @$uid;?>">下一页</a>|
		<a href="?page=<?php echo $pagecount;?>&sid=<?php echo $sid;?>&userid=<?php echo @$uid;?> ">尾页</a>
		当前是第<?php echo $page;?>页/总共<?php echo $pagecount;?>页</div>
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