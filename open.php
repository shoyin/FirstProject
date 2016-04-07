<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="./static/css/top.css">
	
	<link rel="stylesheet" href="./static/css/style.css" type="text/css" />
	<style>
	.tit{
		
	}
	</style>

</head>
<body>
<?php
include 'header.php';

//格式化
@$userid=$_GET['userid'];
@$pt=$_GET['posttime'];
@$sid=intval($_GET['sid']);
@$bid=intval($_GET['bid']);

//查询信息
$sql="select * from content where postime='$pt'";

$result=mysql_query($sql);

$row=mysql_fetch_assoc($result);
@$uid=$row['uid'];
$sqlu="select * from bbs_user where id=$uid";
$resu=mysql_query($sqlu);
$rowu=mysql_fetch_assoc($resu);
@$pid=intval($_GET['pid']);
@$bid=intval($_GET['bid']);
?>	

	<main>
	<a href="index.php">小栈导航</a>><a href="list.php?page=0&sid=<?php echo $pid?>&bid=<?php echo $bid;?>">专区详情</a>><a href="alist.php?page=0&userid=<?php echo @$uid;?>&bid=<?php echo $bid;?>&sid=<?php echo $sid;?>">总贴庄园</a>
		
   </div> 
      <div class="w960 fum-con">
	  

	  
	  
	    <div class="fum-bk1 clearfix"> 
		 <div class="fum-bk1-left">
		   <p class="fum-left-h">
		     <em>查看：</em>
			 <em class="fc-f2">5</em>
			 <span>|</span>
			  <em>回复：</em>
			 <em class="fc-f2">0</em>
		   </p>
		   <div class="fum-left-con">
		     <p class="hh">
			   <a href="#"><?php echo $rowu['username'];?></a>
			 </p>
			 <p><a class="img" href="###"><img src="./static/uploads/<?php echo $rowu['headpic'];?>" alt=""></a></p>
			 <p class="xx">
			   <span><a href="###">1</a><em>主题</em></span>
			   <span><a href="###">1</a><em>帖子</em></span>
			   <span class="bor-0"><a href="###"><?php echo $rowu['money'];?></a><em>积分</em></span>
			  </p>
			  <p class="m-sty"><meter max="99" min='1' value="9"></meter></p>
			  <p class="jf"><em>等级权限</em><a href="###"><?php getlevel($rowu['level']); ?></a></p>
			  <p class="m-sty"><a class="fc-369"  href="###">新消息</a></p>
		   </div>
		 </div>
		 <div class="fum-bk1-right">
		   <p class="hh"><strong><?php echo $row['title'];?></strong>
		       <a href="./admin/article/edit.php?id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>">[编辑]</a>
<?php

			//设置置顶高亮删除隐藏
		       if(@$_SESSION['user']['level']<=1){
		       ?>
		       <a href="./admin/article/top.php?top=1&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[置顶]</a>
		       <a href="./admin/article/top.php?hot=1&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[热帖]</a>
		       <a href="./admin/article/top.php?jinghua=1&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[精华]</a>
		       <a href="./admin/article/top.php?lit=1&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[高亮]</a>
		       
		            <a href="./admin/article/top.php?top=2&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[干掉置顶]</a>
		       <a href="./admin/article/top.php?hot=2&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[删除热帖]</a>
		       <a href="./admin/article/top.php?jinghua=2&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[去除精华]</a>
		       <a href="./admin/article/top.php?lit=2&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[完败高亮]</a>
		       
		       
		       <?php
		     	} 
		     	?>
		      <a href="./admin/article/top.php?open=1&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[显示]</a>
		     	<a href="./admin/article/top.php?open=2&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[隐藏]</a>
		      <a href="./admin/article/delete.php?top=1&id=<?php echo $row['id'];?>&userid=<?php echo $userid;?>&posttime=<?php $pt;?>&sid=<?php echo $sid;?>">[删除]</a></span>
			   </p>
			 <div class="fum-right-con">
			   <p class="ff"><img src="./static/images/online_member.gif"><em>发表于<?php echo date("Y-m-d H:i:s",$row['postime']);?></em></p>
			   <div class="tit" style="word-wrap:break-word" >
			   <?php
			   					//关键字过滤
			   					@$rowk=$row['content'];
			   					@$sqlk="select * from keyword";
			   					@$resq=mysql_query($sqlk);
			   					if(@$resq&&mysql_num_rows($resq)>0){
			   						while(@$rowq=mysql_fetch_assoc($resq)){

			   							$key[]=$rowq['keyword'];

			   						}
			   						echo str_replace($key,'***',$rowk);
			   					}
			   					//echo $rowk;
			   					//print_r($key);
			   					//echo count($key);
			   		?>	</div>
			 </div>
		 </div>
	    </div> 
<?php

include './admin/reply/lc.php';


include './ht.php';



?>
</main>
<?php

include 'friendlink.php';
include 'footer.php';
 ?>
</body>
</html>

