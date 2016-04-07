<?php

$cid=$_GET['sid'];

if(intval($_GET['page'])==0){
	$page=1;
}else{
	$page=$_GET['page'];
}

//SQL查询
$sqls = "select * from reply where cid='$cid' ";
$results=mysql_query($sqls);
$total=mysql_num_rows($results);

$pagesize =6;
// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

$sqls = "select * from reply where cid='$cid' order by posttime asc limit $offset,$pagesize";

$results = mysql_query($sqls);


$prepage = ($page-1)<=0 ? 1:$page-1;

$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;

			$count=($page-1)*$pagesize;

			if($results && mysql_num_rows($results)>0){
				while($rows = mysql_fetch_assoc($results)){

					//楼层级数
					$count++;

					if($rows['isopen']==1){
				?>

		<div class="fum-bk1 fum-bk2 clearfix"> 
		<div class="fum-bk1-left">

		   <div class="fum-left-con">
		    
		    <?php

		    //用户信息
		    $sqlh="select * from bbs_user where id={$rows['uid']}";
		    $resh=mysql_query($sqlh);
		    $rowh=mysql_fetch_assoc($resh);

		    ?>
			 <p><a class="img" href="###"><img src="./static/uploads/<?php echo $rowh['headpic'];?>" alt=""></a></p>
			 <p style="text-align:center"> 回帖用户：<?php echo $rowh['username'];?></p>
			
			
		   </div>
         </div>
		 <div class="fum-bk1-right1">
		<a href="">主题：</a> <?php echo $rows['title'];?><br/>
		<div id=sf><div id=shafa>
				<?php if($count==1){
							echo '沙发';
						}elseif($count==2){
							echo '椅子';
						}elseif($count==3){
							echo '板凳';
						}else{
							echo '第'.$count.'楼';
						}?>
					</div>
					<div id=htime>
						<?php echo date("Y-m-d",$rows['posttime']).'<br>'.date('H:i:s',$rows['posttime']);?>
					</div>
					<div><a href="admin/reply/edit.php?id=<?php echo $rows['id'];?>&sid=<?php echo $sid;?>&posttime=<?php echo $pt;?>&userid=<?php echo $uid;?>">编辑回复</a>
					</div>
				</div>

		<a href="">内容：</a>
<?php
 		//过滤设置屏蔽
		@$rows=$rows['content'];
		@$sqlm="select * from keyword";
		@$resm=mysql_query($sqlm);
		if($resm){

			while(@$rowm=mysql_fetch_assoc(@$resm)){
					$keys[]=$rowm['keyword'];
				
			}
			
				echo str_replace($keys,'***',$rows);
		}	
		?>
		</div>
	    </div> 
</div>
<?php
		}
	}
}
?>
<div style="font:12px '微软雅黑'">
	<a href="?page=1&sid=<?php echo $cid;?>&posttime=<?php echo $pt;?>">首页</a>|
	<a href="?page=<?php echo $prepage;?>&sid=<?php echo $cid;?>&posttime=<?php echo $pt;?>">上一页</a>|
	<a href="?page=<?php echo $nextpage?>&sid=<?php echo $cid;?>&posttime=<?php echo $pt;?>">下一页</a>|
	<a href="?page=<?php echo $pagecount;?>&sid=<?php echo $cid;?>&posttime=<?php echo $pt;?>">尾页</a>
</div>








