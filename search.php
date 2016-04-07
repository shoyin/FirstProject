<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
	<title>论坛</title>
	<link rel="stylesheet" type="text/css" href="./static/css/index.css">
	<link rel="stylesheet" type="text/css" href="./static/css/top.css">
	<link rel="stylesheet" type="text/css" href="./static/css/ft.css" />
	<link rel="stylesheet" type="text/css" href="./static/css/style.css" />

</head>
<body>
<?php

//头部
include'header.php';

?>	

<main>

		<div id=m2>
			<div id=m21> 
				<a href="bclass.php?bid="></a>
			</div>
		<div class="lclass">
	 <div class="bm bm1 bm-d" style="border:0px">
		  <div class="bm-h clearfix">
			<div class="fl zhut">
				<a class="dow" href="alist.php?page=0&userid=<?php echo @$uid;?>">全部主题</a>
				<a href="#">最新</a>
				<a href="#">热门</a>
				<a href="#">热帖</a>
				<a href="#">精华</a>
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
if(intval(@$_GET['page'])==0){
	$page=1;
}else{
	$page=$_GET['page'];
}

@$like=trim($_GET['search']);
if(!empty($_POST['search'])){
	$like=trim($_POST['search']);
}

// 定义每页显示数据的条数
$pagesize =10;
@$sqls = "select * from content where title like '%$like%'";


$results=mysql_query($sqls);
$total=mysql_num_rows($results);

// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

$sqls = "select * from content where title like '%$like%' order by istop desc,ishot desc,isjinghua desc,postime desc limit $offset,$pagesize";
$results = mysql_query($sqls);


$prepage = ($page-1)<=0 ? 1:$page-1;
$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;

			if($results && mysql_num_rows($results)>0){
				while($rows = mysql_fetch_assoc($results)){

				//置顶高亮判断
			?>

			<div id=div0>
				<div id=div1><a href="open.php?sid=<?php echo $rows['id'];?>&userid=<?php echo @$uid;?>&page=0&posttime=<?php echo $rows['postime']?>"><?php echo $rows['title'];?></a>
				
					<?php
					if($rows['istop']==1){?>
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

<?php
				}
			}
?>
		</div>
		<div style="font:12px '微软雅黑'"><a href="?page=1&search=<?php echo $like;?>&userid=<?php echo @$uid;?>">首页</a>|
		<a href="?page=<?php echo $prepage;?>&search=<?php echo $like;?>&userid=<?php echo @$uid;?>">上一页</a>|
		<a href="?page=<?php echo $nextpage?>&search=<?php echo $like;?>&userid=<?php echo @$uid;?>">下一页</a>|
		<a href="?page=<?php echo $pagecount;?>&search=<?php echo $like;?>&userid=<?php echo @$uid;?>">尾页</a>当前是第<?php echo $page;?>页/总共<?php echo $pagecount;?>页</div>
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
mysql_free_result($results);

//关闭数据库连接
mysql_close();

?>